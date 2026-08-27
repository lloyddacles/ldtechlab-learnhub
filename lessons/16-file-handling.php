<?php
$pageTitle = 'PHP File Handling';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 16;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP File Handling</h1>
    <p class="lesson-desc">Read, write, and manage files using PHP's file functions.</p>
</div>

<h2>Why File Handling?</h2>
<p>File handling lets PHP interact with the filesystem &mdash; reading configuration files, writing logs, storing user data, and more.</p>

<h2>Reading Files</h2>

<div class="syntax-ref">
    <h4>Syntax: Reading Files</h4>
    <code>file_get_contents("file.txt")     // Read entire file into a string</code>
    <code>file("file.txt")                  // Read entire file into an array (one line per element)</code>
    <code>fopen("file.txt", "r")            // Open file for reading</code>
    <code>fread($handle, $length)           // Read specific number of bytes</code>
    <code>fgets($handle)                    // Read one line at a time</code>
    <code>fclose($handle)                   // Close the file</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Reading Files ===\n\n";

// Method 1: file_get_contents() - simplest
echo "Method 1: file_get_contents()\n";
echo "  \$content = file_get_contents(\"data.txt\");\n";
echo "  Reads entire file into a string.\n";
echo "  Best for small files.\n\n";

// Method 2: file() - reads into array
echo "Method 2: file()\n";
echo "  \$lines = file(\"data.txt\");\n";
echo "  Each line becomes an array element.\n";
echo "  \$lines[0] is the first line, etc.\n\n";

// Method 3: fopen/fread/fgets - detailed control
echo "Method 3: fopen/fread/fgets()\n";
echo "  \$handle = fopen(\"data.txt\", \"r\");\n";
echo "  \$line = fgets(\$handle);  // One line at a time\n";
echo "  fclose(\$handle);\n\n";

// Practical: read a CSV-like file
echo "=== Practical: Processing Lines ===\n";
$sampleData = "Alice,95\nBob,87\nCarol,92\nDavid,78";
echo "Sample data (like a CSV):\n$sampleData\n\n";

$lines = explode("\n", $sampleData);
$sum = 0;

foreach ($lines as $line) {
    $parts = explode(",", $line);
    $name = $parts[0];
    $score = (int)$parts[1];
    $sum += $score;
    echo "  $name: $score\n";
}

$average = $sum / count($lines);
echo "\nAverage score: " . round($average, 1) . "\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Writing Files</h2>

<div class="syntax-ref">
    <h4>Syntax: Writing Files</h4>
    <code>file_put_contents("file.txt", $data)       // Write string to file</code>
    <code>fopen("file.txt", "w")                     // Open for writing (creates/overwrites)</code>
    <code>fopen("file.txt", "a")                     // Open for appending (adds to end)</code>
    <code>fwrite($handle, $data)                     // Write data to open file</code>
    <code>fclose($handle)                            // Close the file</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Writing Files ===\n\n";

echo "Method 1: file_put_contents() - simplest\n";
echo "  file_put_contents(\"output.txt\", \"Hello World\");\n";
echo "  Creates the file and writes the content.\n";
echo "  Overwrites if file exists.\n\n";

echo "Method 2: file_put_contents() with append\n";
echo "  file_put_contents(\"output.txt\", \"Line 2\n\", FILE_APPEND);\n";
echo "  Adds to end of file instead of overwriting.\n\n";

echo "Method 3: fopen/fwrite - detailed control\n";
echo "  \$handle = fopen(\"output.txt\", \"w\");  // \"w\" = write mode\n";
echo "  fwrite(\$handle, \"Line 1\n\");\n";
echo "  fwrite(\$handle, \"Line 2\n\");\n";
echo "  fclose(\$handle);\n\n";

echo "=== File Write Modes ===\n";
echo "  \"w\"  - Write (creates or overwrites)\n";
echo "  \"a\"  - Append (adds to end, doesn\'t overwrite)\n";
echo "  \"x\"  - Create (fails if file already exists)\n";
echo "  \"r\"  - Read only\n";
echo "  \"r+\" - Read and write\n\n";

// Practical: Create a log file
echo "=== Practical: Activity Log ===\n";
$logEntry = date("Y-m-d H:i:s") . " - Page visited: homepage\n";
echo "Would write: $logEntry";

$logEntry2 = date("Y-m-d H:i:s") . " - User logged in: Alice\n";
echo "Would append: $logEntry2";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>File Information Functions</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== File Information Functions ===\n\n";

// Check if file exists
echo "file_exists(\"style.css\"): " . var_export(file_exists("style.css"), true) . "\n";
echo "file_exists(\"nonexistent.txt\"): " . var_export(file_exists("nonexistent.txt"), true) . "\n\n";

// Get file size
echo "filesize(\"style.css\"): " . filesize("style.css") . " bytes\n\n";

// Get file modification time
$mtime = filemtime("style.css");
echo "Last modified: " . date("Y-m-d H:i:s", $mtime) . "\n\n";

// File type
echo "filetype(\"style.css\"): " . filetype("style.css") . "\n\n";

// Directory listing
echo "=== Directory Functions ===\n";
echo "getcwd(): " . getcwd() . "\n";
echo "scandir(\".\") would list directory contents\n";
echo "is_dir(\"css\"): " . var_export(is_dir("css"), true) . "\n";
echo "is_file(\"style.css\"): " . var_export(is_file("style.css"), true) . "\n\n";

// Path information
$path = "/var/www/html/index.php";
echo "=== Path Info for: $path ===\n";
echo "Directory: " . dirname($path) . "\n";
echo "Basename: " . basename($path) . "\n";
echo "Extension: " . pathinfo($path, PATHINFO_EXTENSION) . "\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>JSON File Handling</h2>
<p>A common pattern is reading and writing data as JSON files (simple database alternative):</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== JSON Data Storage ===\n\n";

// Simulating JSON file operations
$students = [
    ["name" => "Alice", "grade" => "A", "score" => 95],
    ["name" => "Bob", "grade" => "B", "score" => 87],
    ["name" => "Carol", "grade" => "A", "score" => 92],
];

// Convert to JSON (like file_put_contents for JSON)
$json = json_encode($students, JSON_PRETTY_PRINT);
echo "=== JSON Output ===\n";
echo $json;
echo "\n\n";

// Parse JSON back to array (like file_get_contents for JSON)
$parsed = json_decode($json, true);
echo "=== Parsed Back ===\n";
foreach ($parsed as $student) {
    echo $student["name"] . " - Grade: " . $student["grade"] . " (" . $student["score"] . "%)\n";
}
echo "\n";

// Practical: Simple file-based database pattern
echo "=== File-Based Database Pattern ===\n";
echo "// Save data to file\n";
echo "\$json = json_encode(\$data);\n";
echo "file_put_contents(\"students.json\", \$json);\n\n";
echo "// Load data from file\n";
echo "\$json = file_get_contents(\"students.json\");\n";
echo "\$data = json_decode(\$json, true);\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box warning">
    <div class="box-title">Security: File Upload Validation</div>
    <ul class="mb-0">
        <li>Always validate file type and size before accepting uploads</li>
        <li>Rename uploaded files to prevent directory traversal attacks</li>
        <li>Store uploads outside the web root when possible</li>
        <li>Check the actual file type with <code>finfo_file()</code>, not just the extension</li>
    </ul>
</div>

<h2>What You've Learned</h2>
<div class="card">
    <p>Congratulations! You've completed all 16 lessons. Here's what you now know:</p>
    <ul>
        <li><strong>PHP Basics</strong> &mdash; syntax, variables, data types</li>
        <li><strong>Operators</strong> &mdash; arithmetic, comparison, logical</li>
        <li><strong>Control Flow</strong> &mdash; conditionals, loops</li>
        <li><strong>Data Structures</strong> &mdash; arrays, functions</li>
        <li><strong>Web Development</strong> &mdash; forms, sessions, file handling</li>
    </ul>
    <p><strong>Next Steps:</strong> Learn about MySQL databases, OOP in PHP, and frameworks like Laravel!</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a program that reads a text file and counts the number of words in it</li>
        <li>Create a simple "todo list" that stores tasks in a JSON file</li>
        <li>Write a function that copies a file from one location to another</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug']) ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug']) ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
