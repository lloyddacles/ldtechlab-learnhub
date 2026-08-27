<?php
$pageTitle = 'PHP Data Types';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 5;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Data Types</h1>
    <p class="lesson-desc">Understand the different types of data PHP can work with.</p>
</div>

<h2>PHP Data Types</h2>
<p>PHP has eight data types. Each serves a specific purpose:</p>

<table>
    <thead>
        <tr><th>Type</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><code>string</code></td><td>Text (sequence of characters)</td><td><code>"Hello"</code></td></tr>
        <tr><td><code>integer</code></td><td>Whole numbers (no decimal)</td><td><code>42</code>, <code>-7</code></td></tr>
        <tr><td><code>float</code></td><td>Floating-point numbers (decimal)</td><td><code>3.14</code>, <code>-0.5</code></td></tr>
        <tr><td><code>boolean</code></td><td>True or false</td><td><code>true</code>, <code>false</code></td></tr>
        <tr><td><code>array</code></td><td>Collection of values</td><td><code>[1, 2, 3]</code></td></tr>
        <tr><td><code>NULL</code></td><td>No value / empty</td><td><code>null</code></td></tr>
        <tr><td><code>object</code></td><td>Instances of classes</td><td><code>new stdClass()</code></td></tr>
        <tr><td><code>resource</code></td><td>External references (files, DB)</td><td><code>fopen()</code> result</td></tr>
    </tbody>
</table>

<h2>Strings</h2>
<p>A string is a sequence of characters. You can use single or double quotes:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Single-quoted strings: literal text, no variable parsing
$single = \'Hello World\';
echo "Single: " . $single;
echo "\n";

// Double-quoted strings: variables are parsed
$name = "Alice";
$double = "Hello $name";
echo "Double: " . $double;
echo "\n";

// Special characters in double quotes
echo "Line one\nLine two\n";
echo "Tab\there\n";

// Length of a string
echo "Length: " . strlen("Hello") . " characters";
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

<h2>Integers</h2>
<p>Integers are whole numbers without a decimal point. They can be positive, negative, or zero.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$positive = 42;
$negative = -7;
$zero = 0;

echo "Positive: " . $positive;
echo "\n";
echo "Negative: " . $negative;
echo "\n";
echo "Zero: " . $zero;
echo "\n";

// Check if a value is an integer
echo "42 is int: " . (is_int(42) ? "Yes" : "No");
echo "\n";
echo "42.0 is int: " . (is_int(42.0) ? "Yes" : "No");
echo "\n";

// Integer overflow
echo "Max PHP int: " . PHP_INT_MAX;
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

<h2>Floats</h2>
<p>Floats (floating-point numbers) have decimal points.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$pi = 3.14159;
$temperature = -2.5;
$price = 19.99;

echo "Pi: " . $pi;
echo "\n";
echo "Temperature: " . $temperature . " degrees";
echo "\n";
echo "Price: $" . $price;
echo "\n";

// Check float type
echo "3.14 is float: " . (is_float(3.14) ? "Yes" : "No");
echo "\n";

// Rounding
echo "Rounded pi: " . round($pi, 2);
echo "\n";
echo "Ceiling: " . ceil(4.2);    // Rounds up
echo "\n";
echo "Floor: " . floor(4.8);     // Rounds down
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

<h2>Booleans</h2>
<p>A boolean represents a true or false value.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$isActive = true;
$isDeleted = false;

echo "Active: " . var_export($isActive, true);
echo "\n";
echo "Deleted: " . var_export($isDeleted, true);
echo "\n";

// Booleans from comparisons
echo "5 > 3 is: " . var_export(5 > 3, true);
echo "\n";
echo "5 < 3 is: " . var_export(5 < 3, true);
echo "\n";
echo "5 == 5 is: " . var_export(5 == 5, true);
echo "\n";

// Truthy and falsy values
// In PHP, these values are considered "falsy":
echo "0 is falsy: " . var_export((bool)0, true);
echo "\n";
echo "1 is truthy: " . var_export((bool)1, true);
echo "\n";
echo "\"\" is falsy: " . var_export((bool)"", true);
echo "\n";
echo "\"hello\" is truthy: " . var_export((bool)"hello", true);
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

<h2>NULL</h2>
<p>The <code>null</code> type has only one value: <code>null</code>. It represents an empty or undefined variable.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// A variable with no value
$nothing = null;

echo "Value: " . var_export($nothing, true);
echo "\n";
echo "Is null: " . var_export(is_null($nothing), true);
echo "\n";

// Unset variable is also null
$something = "Hello";
echo "Before unset: " . var_export($something, true);
echo "\n";

// You cannot unset in sandbox, so show null directly:
$empty = null;
echo "Is empty null? " . var_export($empty === null, true);
echo "\n";

// NULL is the only value where == returns true for both null and false
echo "null == false: " . var_export(null == false, true);
echo "\n";
echo "null === false: " . var_export(null === false, true);
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

<h2>Type Checking Functions</h2>

<div class="syntax-ref">
    <h4>Syntax: Type Checking</h4>
    <code>gettype($var)      // Returns type as string: "integer", "string", etc.</code>
    <code>is_int($var)       // Checks if integer</code>
    <code>is_string($var)    // Checks if string</code>
    <code>is_float($var)     // Checks if float</code>
    <code>is_bool($var)      // Checks if boolean</code>
    <code>is_array($var)     // Checks if array</code>
    <code>is_null($var)      // Checks if null</code>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create one variable of each basic type (string, int, float, bool, null) and use <code>gettype()</code> to print each type</li>
        <li>What happens when you add a string "5" to the number 10? Try it and explain why</li>
        <li>Use <code>var_dump()</code> to display the full details of different variable types</li>
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
