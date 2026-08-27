<?php $pageTitle = 'Functions & Modularity'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson 7</span>
    <h1>Functions &amp; Modularity</h1>
    <p class="lesson-desc">Give a name to a thought — functions let you write code once and reuse it everywhere.</p>
</div>

<div class="info-box tip">
    <div class="box-title">Core Idea</div>
    <p class="mb-0">A function is a <strong>named thought</strong>. Instead of repeating "check if age is valid, then check if name is empty, then save to database" every time, you write <code>saveUser()</code> once and call it whenever you need it.</p>
</div>

<h2>Why Functions?</h2>
<p>Imagine you're writing a program that calculates grades for three classes. Without functions, you'd copy-paste the grading logic three times. If the grading rules change, you'd have to update three places. That's a bug waiting to happen.</p>
<p>Functions solve this by letting you write logic <strong>once</strong> and reuse it:</p>

<div class="syntax-ref">
    <h4>Syntax: Defining a Function</h4>
    <code>function functionName($param1, $param2) {</code>
    <code>&nbsp;&nbsp;// code here</code>
    <code>&nbsp;&nbsp;return $result;</code>
    <code>}</code>
</div>

<h2>Anatomy of a Function</h2>
<table>
    <thead><tr><th>Part</th><th>What It Is</th><th>Example</th></tr></thead>
    <tbody>
        <tr><td><code>function</code></td><td>Keyword to define</td><td><code>function greet()</code></td></tr>
        <tr><td>Name</td><td>What you call it</td><td><code>greet</code></td></tr>
        <tr><td>Parameters</td><td>Inputs (variables)</td><td><code>($name, $age)</code></td></tr>
        <tr><td>Body</td><td>The code to run</td><td><code>{ echo ...; }</code></td></tr>
        <tr><td><code>return</code></td><td>Output (optional)</td><td><code>return $result;</code></td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Simple function — no parameters, no return
function sayHello() {
    echo "Hello, World!\\n";
}
sayHello();

// Function with parameters
function greet($name) {
    echo "Hello, {$name}!\\n";
}
greet("Alice");
greet("Bob");

// Function with return value
function add($a, $b) {
    return $a + $b;
}
$sum = add(5, 3);
echo "5 + 3 = {$sum}\\n";

// Function returning boolean
function isEven($n) {
    return $n % 2 === 0;
}
echo "4 is even: " . (isEven(4) ? "yes" : "no") . "\\n";
echo "7 is even: " . (isEven(7) ? "yes" : "no") . "\\n";
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

<h2>Parameters vs Arguments</h2>
<p><strong>Parameters</strong> are the variables in the function definition. <strong>Arguments</strong> are the actual values you pass when calling it. It's like a form (parameter) vs the data you fill in (argument).</p>

<h2>Scope: Local vs Global</h2>
<p>Variables inside a function are <strong>local</strong> — they vanish when the function ends. Variables outside are <strong>global</strong>. Don't mix them carelessly:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$globalVar = "I am global";

function testScope() {
    // $globalVar is NOT accessible here by default
    $localVar = "I am local";
    echo "Inside: {$localVar}\\n";
}

testScope();
// echo $localVar; // ERROR — local variable is gone

// To access a global inside a function:
function useGlobal() {
    global $globalVar;
    echo "Accessed global: {$globalVar}\\n";
}
useGlobal();
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

<div class="info-box note">
    <div class="box-title">Best Practice</div>
    <p class="mb-0">Avoid <code>global</code>. Pass data as parameters and return results. Global variables make code hard to track and debug.</p>
</div>

<h2>Naming Functions</h2>
<p>Good function names read like sentences:</p>
<ul>
    <li><code>calculateTotal()</code> — says what it does</li>
    <li><code>isOldEnough()</code> — returns a boolean, starts with "is"</li>
    <li><code>getUserById()</code> — describes the action</li>
</ul>

<div class="info-box warning">
    <div class="box-title">Avoid Bad Names</div>
    <p class="mb-0"><code>doStuff()</code>, <code>process()</code>, <code>handle()</code> — these tell you nothing. Be specific.</p>
</div>

<h2>Single Responsibility Principle</h2>
<p>Each function should do <strong>one thing</strong> and do it well. If your function validates input AND saves to database AND sends an email, it's doing too much. Split it:</p>

<div class="syntax-ref">
    <h4>Good Modularity</h4>
    <code>function validateUser($data) { ... }</code>
    <code>function saveUser($data) { ... }</code>
    <code>function sendWelcomeEmail($email) { ... }</code>
    <code>// Each function does ONE thing</code>
</div>

<h2>DRY — Don't Repeat Yourself</h2>
<p>If you see the same code in two places, extract it into a function. Duplication is the enemy of maintainability:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Refactor Into Functions</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// BEFORE: repeated code
$students = ["Alice", "Bob", "Charlie"];

echo "=== WITHOUT FUNCTIONS ===\\n";
echo "Welcome, Alice!\\n";
echo "Your grade will be calculated.\\n";
echo "---\\n";
echo "Welcome, Bob!\\n";
echo "Your grade will be calculated.\\n";
echo "---\\n";
echo "Welcome, Charlie!\\n";
echo "Your grade will be calculated.\\n";

// AFTER: using functions
echo "\\n=== WITH FUNCTIONS ===\\n";

function welcomeStudent($name) {
    echo "Welcome, {$name}!\\n";
    echo "Your grade will be calculated.\\n";
    echo "---\\n";
}

foreach ($students as $student) {
    welcomeStudent($student);
}
'); ?></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>When to Create a Function</h2>
<ul>
    <li>When you copy-paste code more than twice</li>
    <li>When a block of code has a clear purpose</li>
    <li>When you want to test a piece of logic independently</li>
    <li>When the code is getting hard to read</li>
</ul>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Build a Utility Library</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function clamp($value, $min, $max) {
    if ($value < $min) return $min;
    if ($value > $max) return $max;
    return $value;
}

function repeatStr($text, $times) {
    $result = "";
    for ($i = 0; $i < $times; $i++) {
        $result .= $text;
    }
    return $result;
}

function isBlank($str) {
    return trim($str) === "";
}

function capitalize($str) {
    return strtoupper($str[0]) . substr($str, 1);
}

// Using the utilities
echo "clamp(15, 0, 10) = " . clamp(15, 0, 10) . "\\n";
echo "clamp(-5, 0, 10) = " . clamp(-5, 0, 10) . "\\n";
echo "repeatStr(\"ha\", 3) = " . repeatStr("ha", 3) . "\\n";
echo "isBlank(\"\") = " . (isBlank("") ? "true" : "false") . "\\n";
echo "isBlank(\"hello\") = " . (isBlank("hello") ? "true" : "false") . "\\n";
echo "capitalize(\"hello\") = " . capitalize("hello") . "\\n";
'); ?></textarea>
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
        <li>Write a function <code>fahrenheitToCelsius($f)</code> that converts temperature</li>
        <li>Write a function <code>splitWords($sentence)</code> that returns the word count</li>
        <li>Create a <code>clamp($value, $min, $max)</code> function and test it with edge cases</li>
        <li>Refactor this into functions: calculate area of a circle, rectangle, and triangle</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
