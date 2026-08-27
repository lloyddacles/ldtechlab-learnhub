<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'POST method required.']);
    exit;
}
$code = $_POST['code'] ?? '';
if (empty(trim($code))) {
    echo json_encode(['error' => 'No code provided.']);
    exit;
}

$python = trim(shell_exec('which python3 2>/dev/null') ?? '');
if (empty($python)) {
    echo json_encode(['error' => 'Python3 is not installed on this server. Install Python 3 to run Python code.']);
    exit;
}

$tmpDir = sys_get_temp_dir() . '/php-tutorial-python-sandbox';
if (!is_dir($tmpDir)) { mkdir($tmpDir, 0700, true); }

$tmpFile = $tmpDir . '/code_' . uniqid() . '.py';
file_put_contents($tmpFile, $code);

$cmd = sprintf('%s %s 2>&1', escapeshellarg($python), escapeshellarg($tmpFile));

$descriptors = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
$process = proc_open($cmd, $descriptors, $pipes);
$output = '';

if (is_resource($process)) {
    fclose($pipes[0]);
    $startTime = microtime(true);
    $timeout = 5;
    stream_set_blocking($pipes[1], false);
    stream_set_blocking($pipes[2], false);
    $stdout = '';
    $stderr = '';
    while (true) {
        $read = [$pipes[1], $pipes[2]];
        $write = null;
        $except = null;
        $numChanged = stream_select($read, $write, $except, 0, 200000);
        if ($numChanged === false) break;
        if (in_array($pipes[1], $read)) {
            $chunk = fread($pipes[1], 8192);
            if ($chunk === false || $chunk === '') { if (feof($pipes[1])) break; } else { $stdout .= $chunk; }
        }
        if (in_array($pipes[2], $read)) {
            $chunk = fread($pipes[2], 8192);
            if ($chunk !== false && $chunk !== '') { $stderr .= $chunk; }
        }
        if (microtime(true) - $startTime > $timeout) {
            proc_terminate($process, 9);
            $stdout .= "\n\n[Execution timed out after {$timeout} seconds]";
            break;
        }
    }
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);
    $output = $stdout;
    if (!empty($stderr)) { $output .= ($output ? "\n" : '') . $stderr; }
}
@unlink($tmpFile);
$output = trim($output);
if (empty($output)) { $output = '(No output - use print() to display results)'; }
echo json_encode(['output' => $output]);
