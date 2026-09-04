<?php
$pageTitle = 'System Status';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/header.php';

function checkCommand($cmd) {
    $output = trim(shell_exec("$cmd 2>&1") ?? '');
    return $output;
}

function findJava() {
    $userHome = $_SERVER['HOME'] ?? exec('echo $HOME');
    $paths = glob($userHome . '/Library/Java/JavaVirtualMachines/jdk-*/Contents/Home/bin/java');
    foreach ($paths as $p) { if (file_exists($p)) return $p; }
    return trim(shell_exec('which java 2>/dev/null') ?? '');
}

$phpOk = false;
$phpVersion = '';
$pythonOk = false;
$pythonVersion = '';
$javaOk = false;
$javaVersion = '';

// Check PHP (bundled first, then system)
$phpBin = __DIR__ . '/../bin/php';
if (PHP_OS === 'Darwin' || PHP_OS === 'Linux') {
    if (file_exists($phpBin) && is_executable($phpBin)) {
        $phpOk = true;
        $phpVersion = trim(shell_exec(escapeshellarg($phpBin) . ' -v 2>&1 | head -1') ?? '');
    } elseif (($sysPhp = trim(shell_exec('which php 2>/dev/null') ?? '')) !== '') {
        $phpOk = true;
        $phpVersion = trim(shell_exec('php -v 2>&1 | head -1') ?? '');
    }
} else {
    $phpOk = true;
    $phpVersion = PHP_VERSION . ' (current process)';
}

// Check Python
$pythonBin = trim(shell_exec('which python3 2>/dev/null') ?? '');
if ($pythonBin !== '' && file_exists($pythonBin)) {
    $pythonOk = true;
    $pythonVersion = trim(shell_exec('python3 --version 2>&1') ?? '');
}

// Check Java
$javaBin = findJava();
if ($javaBin !== '' && file_exists($javaBin)) {
    $javaCheck = trim(shell_exec(escapeshellarg($javaBin) . ' -version 2>&1') ?? '');
    if (strpos($javaCheck, 'Unable to locate') === false && !empty($javaCheck)) {
        $javaOk = true;
        $javaVersion = trim(explode("\n", $javaCheck)[0] ?? '');
    }
}
?>

<div class="lesson-header">
    <h1>System Status</h1>
    <p class="lesson-desc">Check which language sandboxes are available on this server.</p>
</div>

<div class="info-box note">
    <div class="box-title">About Sandboxes</div>
    <p class="mb-0">Each programming language requires its runtime to be installed for the "Try It Yourself" sandboxes to work. Lessons are always viewable as reference material even without the runtime.</p>
</div>

<table style="width:100%; border-collapse:collapse; margin:1.5rem 0;">
    <thead>
        <tr style="background:#1e293b; color:#fff;">
            <th style="padding:0.75rem 1rem; text-align:left;">Language</th>
            <th style="padding:0.75rem 1rem; text-align:left;">Status</th>
            <th style="padding:0.75rem 1rem; text-align:left;">Version / Details</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom:1px solid #334155;">
            <td style="padding:0.75rem 1rem;"><strong>PHP</strong> (server)</td>
            <td style="padding:0.75rem 1rem;">
                <?php if ($phpOk): ?>
                    <span style="color:#22c55e; font-weight:bold;">&#10003; Installed</span>
                <?php else: ?>
                    <span style="color:#ef4444; font-weight:bold;">&#10007; Not Found</span>
                <?php endif; ?>
            </td>
            <td style="padding:0.75rem 1rem; font-family:monospace; font-size:0.9em;">
                <?= htmlspecialchars($phpVersion ?: 'N/A') ?>
            </td>
        </tr>
        <tr style="border-bottom:1px solid #334155;">
            <td style="padding:0.75rem 1rem;"><strong>Python 3</strong></td>
            <td style="padding:0.75rem 1rem;">
                <?php if ($pythonOk): ?>
                    <span style="color:#22c55e; font-weight:bold;">&#10003; Installed</span>
                <?php else: ?>
                    <span style="color:#f59e0b; font-weight:bold;">&#9888; Not Found</span>
                <?php endif; ?>
            </td>
            <td style="padding:0.75rem 1rem; font-family:monospace; font-size:0.9em;">
                <?= htmlspecialchars($pythonVersion ?: 'Install: brew install python3') ?>
            </td>
        </tr>
        <tr>
            <td style="padding:0.75rem 1rem;"><strong>Java JDK</strong></td>
            <td style="padding:0.75rem 1rem;">
                <?php if ($javaOk): ?>
                    <span style="color:#22c55e; font-weight:bold;">&#10003; Installed</span>
                <?php else: ?>
                    <span style="color:#f59e0b; font-weight:bold;">&#9888; Not Found</span>
                <?php endif; ?>
            </td>
            <td style="padding:0.75rem 1rem; font-family:monospace; font-size:0.9em;">
                <?= htmlspecialchars($javaVersion ?: 'Install: brew install openjdk@17') ?>
            </td>
        </tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">Quick Install Commands</div>
    <p><strong>Python 3:</strong> <code>brew install python3</code></p>
    <p class="mb-0"><strong>Java JDK:</strong> <code>brew install openjdk@17</code> then <code>sudo ln -sfn /opt/homebrew/opt/openjdk@17/libexec/openjdk.jdk /Library/Java/JavaVirtualMachines/openjdk-17.jdk</code></p>
</div>

<div class="info-box note">
    <div class="box-title">Lesson Counts</div>
    <p>
        <strong>PHP:</strong> <?= count(getLessons()) ?> lessons &bull;
        <strong>Python:</strong> <?= count(getLessons('python-lessons')) ?> lessons &bull;
        <strong>Java:</strong> <?= count(getLessons('java-lessons')) ?> lessons &bull;
        <strong>DSA:</strong> <?= count(getLessons('dsa-lessons')) ?> lessons &bull;
        <strong>DBMS:</strong> <?= count(getLessons('dbms-lessons')) ?> lessons &bull;
        <strong>MySQL:</strong> <?= count(getLessons('mysql-lessons')) ?> lessons &bull;
        <strong>Logic:</strong> <?= count(getLessons('programming-logic')) ?> lessons
    </p>
    <p class="mb-0"><strong>Total:</strong> <?= count(getLessons()) + count(getLessons('python-lessons')) + count(getLessons('java-lessons')) + count(getLessons('dsa-lessons')) + count(getLessons('dbms-lessons')) + count(getLessons('mysql-lessons')) + count(getLessons('programming-logic')) ?> lessons</p>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
