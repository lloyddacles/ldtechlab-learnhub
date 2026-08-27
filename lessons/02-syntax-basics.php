<?php
$pageTitle = 'PHP Syntax Basics';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 2;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Syntax Basics</h1>
    <p class="lesson-desc">Master the fundamental syntax rules of PHP programming.</p>
</div>

<h2>PHP Opening and Closing Tags</h2>
<p>All PHP code must be placed between PHP tags. The most common form is:</p>

<div class="syntax-ref">
    <h4>Syntax: PHP Tags</h4>
    <code>&lt;?php   // Code goes here   ?&gt;</code>
</div>

<p>In a file that is <em>entirely</em> PHP (no HTML), the closing tag <code>?&gt;</code> is optional and <strong>should be omitted</strong> to prevent accidental whitespace output.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Both of these are valid PHP tags
echo "Standard tags work!";
echo "\n";

// When a file is only PHP, you can omit the closing tag
// This is considered best practice
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

<h2>Statements and Semicolons</h2>
<p>Every PHP statement must end with a <strong>semicolon</strong> <code>;</code>. This tells PHP where one statement ends and the next begins.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Each statement ends with a semicolon
echo "First statement";
echo "\n";
echo "Second statement";
echo "\n";

// Without a semicolon, PHP will give an error
// Try commenting/uncommenting lines below:
echo "This works ";
echo "because each line has a semicolon";
echo "\n";

// Multi-line assignment (semicolons end each statement)
$message = "Hello"
    . " "
    . "World";
echo $message;
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

<h2>Case Sensitivity</h2>
<p>PHP is <strong>partially case-sensitive</strong>:</p>
<ul>
    <li><strong>Function names</strong> are case-insensitive: <code>ECHO()</code>, <code>Echo()</code>, <code>echo()</code> all work</li>
    <li><strong>Keywords</strong> are case-insensitive: <code>IF</code>, <code>For</code>, <code>WHILE</code> all work</li>
    <li><strong>Variables</strong> are case-sensitive: <code>$name</code> and <code>$Name</code> are different variables</li>
</ul>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Variables ARE case-sensitive
$greeting = "hello";
$Greeting = "HELLO";

echo "Lowercase: " . $greeting;
echo "\n";
echo "Uppercase: " . $Greeting;
echo "\n";

// Functions are NOT case-sensitive
ECHO "Echo in uppercase works\n";
echo "Regular echo works too\n";
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

<h2>The Dot Operator (String Concatenation)</h2>
<p>In PHP, you join (concatenate) strings using the <strong>dot</strong> <code>.</code> operator, not the plus sign.</p>

<div class="syntax-ref">
    <h4>Syntax: String Concatenation</h4>
    <code>$result = "Hello" . " " . "World";  // "Hello World"</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$firstName = "John";
$lastName = "Doe";

// Concatenate strings with the dot operator
$fullName = $firstName . " " . $lastName;
echo "Name: " . $fullName;
echo "\n";

// You can chain concatenation
$greeting = "Hello" . ", " . $fullName . "!";
echo $greeting;
echo "\n";

// Concatenating with numbers (PHP converts automatically)
$age = 25;
echo "I am " . $age . " years old.";
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

<h2>Whitespace and Formatting</h2>
<p>PHP ignores most whitespace (spaces, tabs, newlines) between statements. This means you can format your code however you like, but following consistent style is important for readability.</p>

<div class="info-box tip">
    <div class="box-title">Coding Convention</div>
    <p class="mb-0">Use <strong>4 spaces</strong> for indentation (not tabs). This is the standard recommended by PHP's coding standards (PSR-12).</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a script with at least 3 separate <code>echo</code> statements that form a short story</li>
        <li>Create two variables and concatenate them together with a space between</li>
        <li>What happens if you forget a semicolon? Try it and read the error message!</li>
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
