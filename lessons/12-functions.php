<?php
$pageTitle = 'PHP Functions';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 12;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Functions</h1>
    <p class="lesson-desc">Create reusable blocks of code with functions. Write once, use many times!</p>
</div>

<h2>What Are Functions?</h2>
<p>A function is a <strong>named block of code</strong> that performs a specific task. You write it once and can "call" it whenever you need it.</p>

<h2>Defining and Calling Functions</h2>

<div class="syntax-ref">
    <h4>Syntax: Function Definition</h4>
    <code>function functionName($param1, $param2) {</code>
    <code>&nbsp;&nbsp;// Code to execute</code>
    <code>&nbsp;&nbsp;return $result;  // Optional return value</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Simple function with no parameters
function sayHello() {
    echo "Hello, World!\n";
}

// Call the function
sayHello();       // Outputs: Hello, World!
sayHello();       // Can call it multiple times

echo "\n";

// Function with parameters
function greet($name) {
    echo "Hello, $name!\n";
}

greet("Alice");
greet("Bob");
greet("Charlie");

echo "\n";

// Function with multiple parameters
function add($a, $b) {
    return $a + $b;
}

$sum = add(5, 3);
echo "5 + 3 = $sum\n";

$sum2 = add(100, 200);
echo "100 + 200 = $sum2\n";
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

<h2>Default Parameter Values</h2>
<p>You can set default values for parameters. If the caller doesn't provide a value, the default is used:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Default value for $greeting
function greet($name, $greeting = "Hello") {
    echo "$greeting, $name!\n";
}

greet("Alice");                    // Uses default: "Hello, Alice!"
greet("Bob", "Good morning");      // Custom: "Good morning, Bob!"
greet("Charlie", "Hey");           // Custom: "Hey, Charlie!"

echo "\n";

// Multiple defaults
function createUser($name, $role = "student", $active = true) {
    $status = $active ? "Active" : "Inactive";
    echo "Name: $name | Role: $role | Status: $status\n";
}

createUser("Alice");                              // All defaults
createUser("Bob", "teacher");                     // Custom role
createUser("Carol", "admin", false);              // All custom
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

<h2>Return Values</h2>
<p>Functions can send back a value using the <code>return</code> keyword:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Return a value
function square($n) {
    return $n * $n;
}

echo "5 squared = " . square(5);
echo "\n";
echo "10 squared = " . square(10);
echo "\n\n";

// Return multiple values using an array
function calculate($a, $b) {
    return [
        "sum" => $a + $b,
        "difference" => $a - $b,
        "product" => $a * $b,
        "quotient" => ($b != 0) ? $a / $b : "undefined"
    ];
}

$result = calculate(10, 3);
echo "10 and 3:\n";
echo "  Sum: " . $result["sum"] . "\n";
echo "  Difference: " . $result["difference"] . "\n";
echo "  Product: " . $result["product"] . "\n";
echo "  Quotient: " . $result["quotient"] . "\n\n";

// Function that returns boolean
function isEven($n) {
    return $n % 2 === 0;
}

echo "4 is even: " . var_export(isEven(4), true) . "\n";
echo "7 is even: " . var_export(isEven(7), true) . "\n";
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

<h2>Type Declarations (Type Hints)</h2>
<p>You can specify what types a function expects and returns:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Type hints for parameters and return type
function addNumbers(int $a, int $b): int {
    return $a + $b;
}

echo "3 + 4 = " . addNumbers(3, 4);
echo "\n\n";

// String type hint
function repeatText(string $text, int $times): string {
    return str_repeat($text . " ", $times);
}

echo repeatText("Hello", 3);
echo "\n\n";

// Float type
function percentage(float $part, float $total): float {
    return round(($part / $total) * 100, 2);
}

echo "Score: " . percentage(85, 100) . "%\n";
echo "Sales: " . percentage(750, 1000) . "%\n";
echo "\n";

// Nullable type (accepts the type OR null)
function formatName(string $first, ?string $last = null): string {
    if ($last !== null) {
        return "$first $last";
    }
    return $first;
}

echo formatName("Alice");           // "Alice"
echo "\n";
echo formatName("Alice", "Smith");  // "Alice Smith"
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

<h2>Variable Scope</h2>
<p>Variables created inside a function are <strong>local</strong> &mdash; they can't be accessed outside that function:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$globalVar = "I am global";

function testScope() {
    $localVar = "I am local";
    echo "Inside function: $globalVar\n";   // Not accessible!
    echo "Inside function: $localVar\n";    // This works
}

testScope();
// echo $localVar;  // This would cause an error!

// To access a global variable inside a function:
function testGlobal() {
    global $globalVar;
    echo "Using global: $globalVar\n";
}

testGlobal();

// Alternative: use the $GLOBALS array
function testGlobals() {
    echo "Using \$GLOBALS: " . $GLOBALS["globalVar"] . "\n";
}

testGlobals();
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
    <div class="box-title">Best Practice: Avoid global</div>
    <p class="mb-0">Using <code>global</code> makes code harder to understand. Instead, pass values as parameters and use <code>return</code> to send results back.</p>
</div>

<h2>Built-in Functions</h2>
<p>PHP has over 1,000 built-in functions. Here are some commonly used ones:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== String Functions ===\n";
echo "strlen: " . strlen("Hello") . "\n";
echo "strtoupper: " . strtoupper("hello") . "\n";
echo "str_lower: " . strtolower("HELLO") . "\n";
echo "str_word_count: " . str_word_count("Hello World How Are You") . "\n";
echo "str_replace: " . str_replace("World", "PHP", "Hello World") . "\n";
echo "\n";

echo "=== Math Functions ===\n";
echo "abs: " . abs(-42) . "\n";
echo "round: " . round(3.14159, 2) . "\n";
echo "sqrt: " . sqrt(144) . "\n";
echo "pow: " . pow(2, 10) . "\n";
echo "max: " . max(10, 20, 30) . "\n";
echo "min: " . min(10, 20, 30) . "\n";
echo "\n";

echo "=== Array Functions ===\n";
$data = [3, 1, 4, 1, 5, 9, 2, 6];
echo "count: " . count($data) . "\n";
echo "array_sum: " . array_sum($data) . "\n";
sort($data);
echo "sorted: " . implode(", ", $data) . "\n";
echo "\n";

echo "=== Other Useful Functions ===\n";
echo "date: " . date("Y-m-d H:i:s") . "\n";
echo "phpversion: " . phpversion() . "\n";
echo "isset: " . var_export(isset($x), true) . "\n";
echo "empty: " . var_export(empty(""), true) . "\n";
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
        <li>Write a function <code>calculateAverage($numbers)</code> that takes an array of numbers and returns their average</li>
        <li>Write a function <code>isPalindrome($text)</code> that returns true if a string reads the same forwards and backwards</li>
        <li>Write a function <code>factorial($n)</code> that returns the factorial of a number using a loop</li>
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
