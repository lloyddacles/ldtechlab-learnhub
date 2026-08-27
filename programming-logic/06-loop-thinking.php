<?php $pageTitle = 'Loop Thinking'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson 6</span>
    <h1>Loop Thinking</h1>
    <p class="lesson-desc">Stop writing the same line 100 times — learn to think in repetition and let loops do the heavy lifting.</p>
</div>

<div class="info-box tip">
    <div class="box-title">Core Idea</div>
    <p class="mb-0">If you find yourself copying and pasting code with small changes each time, you're thinking in loops. Loops let you say <strong>"do this for each thing"</strong> instead of writing it over and over.</p>
</div>

<h2>Why Loops?</h2>
<p>What if you had to print "Hello" 100 times? Writing <code>echo "Hello\n"</code> 100 times is tedious and error-prone. A loop does it in 3 lines. What if the count changes to 1,000? With a loop, you change one number. Without one, you rewrite everything.</p>
<p>Loops are how programmers solve <strong>repetition</strong> — and repetition is everywhere: processing lists, validating input, building strings, searching data.</p>

<h2>For Loop</h2>
<p>The <code>for</code> loop is best when you <strong>know how many times</strong> to repeat:</p>

<div class="syntax-ref">
    <h4>Syntax: for Loop</h4>
    <code>for (init; condition; update) {</code>
    <code>&nbsp;&nbsp;// runs while condition is true</code>
    <code>}</code>
</div>

<table>
    <thead><tr><th>Part</th><th>Purpose</th><th>Example</th></tr></thead>
    <tbody>
        <tr><td>init</td><td>Starting point</td><td><code>$i = 0</code></td></tr>
        <tr><td>condition</td><td>Continue while true</td><td><code>$i &lt; 10</code></td></tr>
        <tr><td>update</td><td>After each iteration</td><td><code>$i++</code></td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Count from 1 to 5
for ($i = 1; $i <= 5; $i++) {
    echo "Count: {$i}\\n";
}

echo "\\n";

// Count by 2s
for ($i = 0; $i <= 10; $i += 2) {
    echo "Even: {$i}\\n";
}

echo "\\n";

// Count backwards
for ($i = 5; $i >= 1; $i--) {
    echo "Countdown: {$i}\\n";
}
echo "Go!";
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

<h2>While Loop</h2>
<p>The <code>while</code> loop is best when you <strong>don't know how many times</strong> — you just know a condition to keep going:</p>

<div class="syntax-ref">
    <h4>Syntax: while Loop</h4>
    <code>while (condition) {</code>
    <code>&nbsp;&nbsp;// runs as long as condition is true</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Keep halving until we reach 1
$number = 64;
$steps = 0;

while ($number > 1) {
    $number = $number / 2;
    $steps++;
    echo "Step {$steps}: {$number}\\n";
}
echo "Took {$steps} steps to reach 1.\\n";

echo "\\n";

// Guessing game simulation
$secret = 7;
$guess = 1;
$attempts = 0;

while ($guess !== $secret) {
    $guess++;
    $attempts++;
}
echo "Found {$secret} in {$attempts} attempts!\\n";
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

<h2>Do-While Loop</h2>
<p>A <code>do-while</code> loop always runs <strong>at least once</strong> because the condition is checked after the body:</p>

<div class="syntax-ref">
    <h4>Syntax: do-while Loop</h4>
    <code>do {</code>
    <code>&nbsp;&nbsp;// runs at least once</code>
    <code>} while (condition);</code>
</div>

<div class="info-box note">
    <div class="box-title">When to Use Do-While</div>
    <p>Use <code>do-while</code> when you need to execute the code first, then check if you should repeat. Example: show a menu, get input, repeat if input is invalid.</p>
</div>

<h2>Choosing the Right Loop</h2>
<table>
    <thead><tr><th>Loop</th><th>When to Use</th><th>Example</th></tr></thead>
    <tbody>
        <tr><td><code>for</code></td><td>Known number of iterations</td><td>Process 10 items in an array</td></tr>
        <tr><td><code>while</code></td><td>Unknown iterations, condition-based</td><td>Read lines until EOF</td></tr>
        <tr><td><code>do-while</code></td><td>Must run at least once</td><td>Menu input validation</td></tr>
    </tbody>
</table>

<h2>Loop Patterns</h2>
<p>Once you recognize these patterns, you'll see them everywhere:</p>

<table>
    <thead><tr><th>Pattern</th><th>What It Does</th><th>Example Use</th></tr></thead>
    <tbody>
        <tr><td>Accumulation</td><td>Build a result step by step</td><td>Sum numbers, build a string</td></tr>
        <tr><td>Searching</td><td>Find something in a collection</td><td>Find first even number</td></tr>
        <tr><td>Counting</td><td>Count occurrences</td><td>Count passing grades</td></tr>
        <tr><td>Building</td><td>Construct a new structure</td><td>Create formatted output</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Accumulation Patterns</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$numbers = [10, 20, 30, 40, 50];

// SUM
$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}
echo "Sum: {$sum}\\n";

// PRODUCT
$product = 1;
for ($i = 0; $i < count($numbers); $i++) {
    $product *= $numbers[$i];
}
echo "Product: {$product}\\n";

// CONCATENATION
$result = "";
for ($i = 0; $i < count($numbers); $i++) {
    $result .= $numbers[$i];
    if ($i < count($numbers) - 1) {
        $result .= " + ";
    }
}
echo "Concatenated: {$result}\\n";

// FIND MAX
$max = $numbers[0];
for ($i = 1; $i < count($numbers); $i++) {
    if ($numbers[$i] > $max) {
        $max = $numbers[$i];
    }
}
echo "Maximum: {$max}\\n";
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

<h2>Nested Loops</h2>
<p>A loop inside a loop — the inner loop completes all its iterations before the outer loop moves on:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Multiplication Table</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// 5x5 multiplication table
echo "Multiplication Table:\\n";
echo str_repeat("-", 30) . "\\n";

// Header row
echo str_pad("*", 5);
for ($j = 1; $j <= 5; $j++) {
    echo str_pad($j, 5);
}
echo "\\n";

// Table rows
for ($i = 1; $i <= 5; $i++) {
    echo str_pad($i, 5);
    for ($j = 1; $j <= 5; $j++) {
        echo str_pad($i * $j, 5);
    }
    echo "\\n";
}
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

<h2>Infinite Loops</h2>
<p>An infinite loop runs forever because the condition never becomes false. This is usually a bug:</p>

<div class="info-box warning">
    <div class="box-title">Danger: Infinite Loop</div>
    <p><code>while (true) { echo "forever"; }</code> — this never stops! Always make sure your loop has a way to end.</p>
    <p class="mb-0"><strong>How to escape:</strong> Press Ctrl+C in the terminal, or close the browser tab.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Print all numbers from 1 to 50 that are divisible by 3</li>
        <li>Calculate the factorial of 10 using a loop (10 × 9 × 8 × ... × 1)</li>
        <li>Build a right triangle of stars: 1 star on row 1, 2 on row 2, up to 5</li>
        <li>Write a loop that finds the first power of 2 greater than 1,000</li>
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
