<?php
$pageTitle = 'PHP Operators';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 8;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Operators</h1>
    <p class="lesson-desc">Perform operations on values using arithmetic, comparison, logical, and assignment operators.</p>
</div>

<h2>1. Arithmetic Operators</h2>
<p>You've already seen these in the Numbers lesson:</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Name</th><th>Example</th><th>Result</th></tr>
    </thead>
    <tbody>
        <tr><td><code>+</code></td><td>Addition</td><td><code>5 + 3</code></td><td><code>8</code></td></tr>
        <tr><td><code>-</code></td><td>Subtraction</td><td><code>5 - 3</code></td><td><code>2</code></td></tr>
        <tr><td><code>*</code></td><td>Multiplication</td><td><code>5 * 3</code></td><td><code>15</code></td></tr>
        <tr><td><code>/</code></td><td>Division</td><td><code>6 / 3</code></td><td><code>2</code></td></tr>
        <tr><td><code>%</code></td><td>Modulus</td><td><code>7 % 3</code></td><td><code>1</code></td></tr>
        <tr><td><code>**</code></td><td>Exponentiation</td><td><code>2 ** 3</code></td><td><code>8</code></td></tr>
    </tbody>
</table>

<h2>2. Assignment Operators</h2>
<p>Assignment operators combine an operation with assignment:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$x = 10;       // Basic assignment
echo "x = $x";
echo "\n";

$x += 5;       // Same as: $x = $x + 5
echo "x += 5 -> $x";
echo "\n";

$x -= 3;       // Same as: $x = $x - 3
echo "x -= 3 -> $x";
echo "\n";

$x *= 2;       // Same as: $x = $x * 2
echo "x *= 2 -> $x";
echo "\n";

$x /= 4;       // Same as: $x = $x / 4
echo "x /= 4 -> $x";
echo "\n";

$x %= 3;       // Same as: $x = $x % 3
echo "x %%= 3 -> $x";
echo "\n";

// String concatenation assignment
$name = "Hello";
$name .= " World";   // Same as: $name = $name . " World"
echo "name .= \" World\" -> $name";
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

<h2>3. Comparison Operators</h2>
<p>Comparison operators compare two values and return a boolean (<code>true</code> or <code>false</code>):</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Name</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td><code>==</code></td><td>Equal</td><td>Value equal (loose comparison)</td></tr>
        <tr><td><code>===</code></td><td>Identical</td><td>Value AND type equal (strict)</td></tr>
        <tr><td><code>!=</code></td><td>Not Equal</td><td>Value not equal</td></tr>
        <tr><td><code>!==</code></td><td>Not Identical</td><td>Value or type not equal</td></tr>
        <tr><td><code>&lt;</code></td><td>Less Than</td><td></td></tr>
        <tr><td><code>&gt;</code></td><td>Greater Than</td><td></td></tr>
        <tr><td><code>&lt;=</code></td><td>Less Than or Equal</td><td></td></tr>
        <tr><td><code>&gt;=</code></td><td>Greater Than or Equal</td><td></td></tr>
        <tr><td><code>&lt;=&gt;</code></td><td>Spaceship</td><td>Returns -1, 0, or 1</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Equal (==) vs Identical (===) ===\n";

// == only checks value, not type
echo "5 == \"5\": " . var_export(5 == "5", true);      // true
echo "\n";
echo "5 === \"5\": " . var_export(5 === "5", true);     // false (different types)
echo "\n";
echo "5 == 5: " . var_export(5 == 5, true);             // true
echo "\n";
echo "5 === 5: " . var_export(5 === 5, true);           // true
echo "\n\n";

echo "=== Comparison Examples ===\n";
$a = 10;
$b = 20;

echo "10 < 20: " . var_export($a < $b, true);         // true
echo "\n";
echo "10 > 20: " . var_export($a > $b, true);         // false
echo "\n";
echo "10 >= 10: " . var_export($a >= 10, true);       // true
echo "\n\n";

echo "=== Spaceship Operator ===\n";
echo "5 <=> 10: " . (5 <=> 10);     // -1 (left is less)
echo "\n";
echo "10 <=> 10: " . (10 <=> 10);   // 0 (equal)
echo "\n";
echo "15 <=> 10: " . (15 <=> 10);   // 1 (left is greater)
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
    <div class="box-title">Always Use === (Strict Comparison)</div>
    <p class="mb-0">Loose comparison (<code>==</code>) can cause unexpected bugs. <code>"0" == false</code> is <code>true</code>, <code>"" == 0</code> is <code>true</code>. Use <code>===</code> whenever possible to avoid these surprises.</p>
</div>

<h2>4. Logical Operators</h2>
<p>Logical operators combine boolean expressions:</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Name</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td><code>&&</code> or <code>and</code></td><td>And</td><td>True if BOTH are true</td></tr>
        <tr><td><code>||</code> or <code>or</code></td><td>Or</td><td>True if at least ONE is true</td></tr>
        <tr><td><code>!</code></td><td>Not</td><td>Reverses the boolean value</td></tr>
        <tr><td><code>^</code></td><td>Xor</td><td>True if exactly one is true</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$age = 25;
$hasID = true;

echo "=== AND (&&) ===\n";
echo "age >= 18 && hasID = " . var_export($age >= 18 && $hasID, true);
echo "\n\n";

echo "=== OR (||) ===\n";
$isSenior = false;
$isStudent = true;
echo "isSenior || isStudent = " . var_export($isSenior || $isStudent, true);
echo "\n\n";

echo "=== NOT (!) ===\n";
$isDeleted = false;
echo "!isDeleted = " . var_export(!$isDeleted, true);
echo "\n";
echo "!!isDeleted = " . var_export(!!$isDeleted, true);   // Double not = original
echo "\n\n";

echo "=== Practical Examples ===\n";
$score = 85;

// Grading with logical operators
$passed = $score >= 60;
$honorRoll = $score >= 90;
$goodStanding = $score >= 70 && $score < 90;

echo "Score: $score\n";
echo "Passed: " . var_export($passed, true) . "\n";
echo "Honor Roll: " . var_export($honorRoll, true) . "\n";
echo "Good Standing: " . var_export($goodStanding, true) . "\n";
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

<h2>5. Ternary Operator</h2>
<p>A shorthand for simple if/else conditions:</p>

<div class="syntax-ref">
    <h4>Syntax: Ternary Operator</h4>
    <code>$result = condition ? valueIfTrue : valueIfFalse;</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$age = 20;

// Ternary operator
$status = ($age >= 18) ? "Adult" : "Minor";
echo "Age $age: $status";
echo "\n\n";

// Nested ternary (avoid nesting when possible)
$score = 85;
$grade = ($score >= 90) ? "A" :
         (($score >= 80) ? "B" :
         (($score >= 70) ? "C" : "F"));
echo "Score $score: Grade $grade";
echo "\n\n";

// Null coalescing operator (??)
$username = null;
$displayName = $username ?? "Guest";
echo "Username is null -> Display: $displayName";
echo "\n";

$username = "Alice";
$displayName = $username ?? "Guest";
echo "Username is Alice -> Display: $displayName";
echo "\n";

// Practical example
$firstName = "";
$name = $firstName ?: "Anonymous";  // Uses falsy check
echo "Empty name -> Display: $name";
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

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a program that uses comparison operators to determine if a number is positive, negative, or zero</li>
        <li>Create a login checker: if username is "admin" AND password is "1234" then print "Welcome", otherwise print "Invalid credentials"</li>
        <li>Use the ternary operator to check if a number is even or odd, then print the result</li>
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
