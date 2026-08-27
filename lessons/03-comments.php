<?php
$pageTitle = 'PHP Comments';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 3;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Comments</h1>
    <p class="lesson-desc">Learn how to write comments to document your code and make it easier to understand.</p>
</div>

<h2>Why Use Comments?</h2>
<p>Comments are notes in your code that PHP ignores completely. They are for <strong>humans</strong> to read. Good comments explain <em>why</em> something is done, not just <em>what</em> is done.</p>

<h2>Types of Comments</h2>

<div class="syntax-ref">
    <h4>Syntax: PHP Comment Styles</h4>
    <code>// This is a single-line comment</code>
    <code># This is also a single-line comment</code>
    <code>/* This is a multi-line comment */</code>
</div>

<h3>1. Single-Line Comments with <code>//</code></h3>
<p>The most common comment style. Everything after <code>//</code> on that line is ignored.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// This is a comment - PHP ignores this line
echo "Hello World!";
echo "\n";

$price = 10;    // Set the price to 10
$tax = $price * 0.1;  // Calculate 10% tax

echo "Price: " . $price;
echo "\n";
echo "Tax: " . $tax;
echo "\n";
echo "Total: " . ($price + $tax);
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

<h3>2. Single-Line Comments with <code>#</code></h3>
<p>The hash symbol also creates single-line comments. Less common but valid.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
# This is also a valid comment
echo "Hash comments work too!";
echo "\n";

# Use # at the start of a section
$name = "Alice";  # Store the name
echo "Hello, " . $name;
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

<h3>3. Multi-Line Comments with <code>/* ... */</code></h3>
<p>Use block comments for longer descriptions spanning multiple lines.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
/*
 * This program calculates the area of a rectangle.
 * 
 * Author: Student
 * Date: 2024
 * Purpose: Learning PHP comments
 */

$length = 10;
$width = 5;

// Calculate the area
$area = $length * $width;

echo "Area of " . $length . " x " . $width . " rectangle = " . $area;
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

<h2>Commenting Out Code</h2>
<p>Comments are also useful for temporarily disabling code while debugging.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "This line runs.";
echo "\n";

// echo "This line is commented out - it won\'t run";
// echo "Neither will this one";

echo "But this line runs!";
echo "\n";

/*
 * This whole block is ignored
 * echo "This won\'t run";
 * echo "Neither will this";
 */

echo "Back to running code!";
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
    <div class="box-title">Warning</div>
    <p class="mb-0">Multi-line comments <code>/* ... */</code> cannot be nested. If you have a <code>/*</code> inside another block comment, it will cause errors.</p>
</div>

<h2>When to Comment</h2>
<ul>
    <li><strong>Explain why</strong> you're doing something, not what the code does</li>
    <li><strong>Document functions</strong> with their purpose, parameters, and return values</li>
    <li><strong>Mark sections</strong> of your code for easy navigation</li>
    <li><strong>Disable code</strong> temporarily while debugging</li>
    <li><strong>Avoid obvious comments</strong> like <code>// add 1 to counter</code></li>
</ul>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a PHP script with at least one comment of each type (//, #, /* */)</li>
        <li>Write a block comment that describes a script that calculates BMI (Body Mass Index)</li>
        <li>Write code that adds two numbers, with comments explaining each step</li>
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
