<?php
$pageTitle = 'PHP Variables';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 4;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Variables</h1>
    <p class="lesson-desc">Learn how to store and use data with variables in PHP.</p>
</div>

<h2>What Are Variables?</h2>
<p>Variables are <strong>named containers</strong> that store data. Think of them as labeled boxes where you can put values and retrieve them later by name.</p>

<h2>Variable Rules</h2>

<div class="syntax-ref">
    <h4>Syntax: PHP Variable Rules</h4>
    <code>$variableName = value;  // Variables start with $</code>
</div>

<ul>
    <li>All variables start with a <strong>dollar sign</strong> <code>$</code></li>
    <li>The variable name starts with a <strong>letter</strong> or <strong>underscore</strong> <code>_</code></li>
    <li>After the first character, you can use letters, numbers, and underscores</li>
    <li>Variable names are <strong>case-sensitive</strong>: <code>$name</code> &ne; <code>$Name</code></li>
    <li>You do <strong>not</strong> declare the type &mdash; PHP figures it out automatically</li>
</ul>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Creating variables (using the assignment operator =)
$name = "Alice";
$age = 20;
$gpa = 3.85;
$isStudent = true;

// Output variables
echo "Name: " . $name;
echo "\n";
echo "Age: " . $age;
echo "\n";
echo "GPA: " . $gpa;
echo "\n";
echo "Student: " . ($isStudent ? "Yes" : "No");
echo "\n";

// Changing a variable value
$age = 21;
echo "Updated Age: " . $age;
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

<h2>Valid vs Invalid Variable Names</h2>

<table>
    <thead>
        <tr><th>Valid</th><th>Invalid</th></tr>
    </thead>
    <tbody>
        <tr><td><code>$name</code></td><td><code>$1name</code> (starts with number)</td></tr>
        <tr><td><code>$my_name</code></td><td><code>$my-name</code> (contains hyphen)</td></tr>
        <tr><td><code>$_private</code></td><td><code>$_ name</code> (contains space)</td></tr>
        <tr><td><code>$name2</code></td><td><code>$@name</code> (contains special character)</td></tr>
        <tr><td><code>$MAX_SIZE</code></td><td><code>name$</code> (missing dollar sign)</td></tr>
    </tbody>
</table>

<h2>Variable Assignment</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Direct assignment
$color = "blue";

// Assign from another variable
$favoriteColor = $color;

// Assign the result of an expression
$x = 10;
$y = 20;
$sum = $x + $y;

echo "Color: " . $color;
echo "\n";
echo "Favorite: " . $favoriteColor;
echo "\n";
echo "Sum: " . $sum;
echo "\n";

// Assign with concatenation
$firstName = "John";
$lastName = "Smith";
$fullName = $firstName . " " . $lastName;
echo "Full Name: " . $fullName;
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

<h2>PHP is Loosely Typed</h2>
<p>In PHP, you don't need to declare a variable's type. PHP automatically determines the type based on the value assigned. You can even change the type by assigning a different type of value.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// PHP figures out the type automatically
$var = 10;           // integer
echo "Type: " . gettype($var) . ", Value: " . $var;
echo "\n";

$var = 10.5;         // Now it\'s a float
echo "Type: " . gettype($var) . ", Value: " . $var;
echo "\n";

$var = "Hello";      // Now it\'s a string
echo "Type: " . gettype($var) . ", Value: " . $var;
echo "\n";

$var = true;         // Now it\'s a boolean
echo "Type: " . gettype($var) . ", Value: " . ($var ? "true" : "false");
echo "\n";

$var = [1, 2, 3];   // Now it\'s an array
echo "Type: " . gettype($var) . ", Count: " . count($var);
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

<h2>Printing Variable Info</h2>

<div class="syntax-ref">
    <h4>Syntax: Debugging Functions</h4>
    <code>gettype($var)      // Returns the type as a string</code>
    <code>var_dump($var)     // Shows type AND value (great for debugging)</code>
    <code>print_r($var)      // Human-readable output for arrays</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// var_dump is great for debugging
$name = "Alice";
$age = 20;
$scores = [95, 87, 92];

var_dump($name);
echo "\n";
var_dump($age);
echo "\n";
var_dump($scores);
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

<div class="info-box tip">
    <div class="box-title">Naming Conventions</div>
    <p class="mb-0">Use <strong>camelCase</strong> for variables: <code>$firstName</code>, <code>$totalAmount</code>. Use <strong>UPPER_CASE</strong> for constants: <code>MAX_SIZE</code>.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create variables for your name, age, and favorite color, then output them in a sentence</li>
        <li>Create two number variables and store their sum, difference, product, and quotient in new variables</li>
        <li>Use <code>gettype()</code> to check the types of different values you assign to a variable</li>
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
