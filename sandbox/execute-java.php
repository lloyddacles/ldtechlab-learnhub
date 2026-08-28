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

// Find Java installation
$javac = '';
$java = '';

// Try system PATH first
$javac = trim(shell_exec('which javac 2>/dev/null') ?? '');
$java = trim(shell_exec('which java 2>/dev/null') ?? '');

// Check common installation paths if not in PATH
if (empty($javac) || empty($java)) {
    $userHome = $_SERVER['HOME'] ?? exec('echo $HOME');
    $searchPaths = [
        glob($userHome . '/Library/Java/JavaVirtualMachines/jdk-*/Contents/Home'),
        glob('/opt/homebrew/opt/openjdk@*/libexec/openjdk.jdk/Contents/Home'),
        glob('/usr/local/opt/openjdk@*/libexec/openjdk.jdk/Contents/Home'),
        glob('/Library/Java/JavaVirtualMachines/*.jdk/Contents/Home'),
    ];
    foreach ($searchPaths as $paths) {
        foreach ($paths as $path) {
            if (is_dir($path) && file_exists($path . '/bin/javac') && file_exists($path . '/bin/java')) {
                $javac = $path . '/bin/javac';
                $java = $path . '/bin/java';
                break 2;
            }
        }
    }
}

if (empty($javac) || empty($java)) {
    echo json_encode(['error' => 'Java JDK is not installed. Install OpenJDK 17+ to run Java code.']);
    exit;
}

// Verify Java works
$javaCheck = trim(shell_exec(escapeshellarg($java) . ' -version 2>&1') ?? '');
if (strpos($javaCheck, 'Unable to locate') !== false || strpos($javaCheck, 'not found') !== false || empty($javaCheck)) {
    echo json_encode(['error' => 'Java runtime not available. Please install OpenJDK 17+.']);
    exit;
}

$tmpDir = sys_get_temp_dir() . '/php-tutorial-java-sandbox';
if (!is_dir($tmpDir)) { mkdir($tmpDir, 0700, true); }

// Extract class name
$className = 'Sandbox';
if (preg_match('/class\s+(\w+)/', $code, $m)) {
    $className = $m[1];
}

$tmpFile = $tmpDir . '/' . $className . '.java';
file_put_contents($tmpFile, $code);

// Compile
$compileOutput = trim(shell_exec(sprintf('cd %s && %s %s 2>&1', escapeshellarg($tmpDir), escapeshellarg($javac), escapeshellarg($tmpFile))) ?? '');

// Check if compilation succeeded
$classFile = $tmpDir . '/' . $className . '.class';
if (!file_exists($classFile)) {
    @unlink($tmpFile);
    echo json_encode(['output' => $compileOutput ?: 'Compilation failed.']);
    exit;
}

// Run (shell_exec with PHP's own max_execution_time as safety net)
$runOutput = trim(shell_exec(sprintf('cd %s && %s -cp %s %s 2>&1', escapeshellarg($tmpDir), escapeshellarg($java), escapeshellarg($tmpDir), escapeshellarg($className))) ?? '');

// Cleanup
@unlink($tmpFile);
@unlink($classFile);

$output = $runOutput;
if (empty($output)) { $output = '(No output - use System.out.println() to display results)'; }
echo json_encode(['output' => $output]);
