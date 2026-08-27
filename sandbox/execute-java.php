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

$javac = trim(shell_exec('which javac 2>/dev/null') ?? '');
$java = trim(shell_exec('which java 2>/dev/null') ?? '');
if (empty($javac) || empty($java)) {
    echo json_encode(['error' => 'Java JDK is not installed on this server. Install JDK to run Java code.']);
    exit;
}

// Verify Java actually works (not just a stub)
$javaCheck = trim(shell_exec('java -version 2>&1') ?? '');
if (strpos($javaCheck, 'Unable to locate') !== false || strpos($javaCheck, 'not found') !== false || empty($javaCheck)) {
    echo json_encode(['error' => 'Java runtime not available. The java binary exists but no JDK is installed. Please install a JDK (e.g., OpenJDK 17+) to run Java code.']);
    exit;
}

$tmpDir = sys_get_temp_dir() . '/php-tutorial-java-sandbox';
if (!is_dir($tmpDir)) { mkdir($tmpDir, 0700, true); }

// Extract class name from code or use default
$className = 'Sandbox';
if (preg_match('/class\s+(\w+)/', $code, $m)) {
    $className = $m[1];
}

$tmpFile = $tmpDir . '/' . $className . '.java';
file_put_contents($tmpFile, $code);

// Compile
$compileCmd = sprintf('%s %s 2>&1', escapeshellarg($javac), escapeshellarg($tmpFile));
$output = '';
$descriptors = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
$process = proc_open($compileCmd, $descriptors, $pipes);
if (is_resource($process)) {
    fclose($pipes[0]);
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
    }
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);
    $output = $stdout;
    if (!empty($stderr)) { $output .= ($output ? "\n" : '') . $stderr; }
}

// If compile failed, return error
$classFile = $tmpDir . '/' . $className . '.class';
if (!file_exists($classFile)) {
    @unlink($tmpFile);
    echo json_encode(['output' => trim($output) ?: 'Compilation failed.']);
    exit;
}

// Run
$runCmd = sprintf('cd %s && java %s 2>&1', escapeshellarg($tmpDir), escapeshellarg($className));
$descriptors = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
$process = proc_open($runCmd, $descriptors, $pipes);
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
@unlink($classFile);
$output = trim($output);
if (empty($output)) { $output = '(No output - use System.out.println() to display results)'; }
echo json_encode(['output' => $output]);
