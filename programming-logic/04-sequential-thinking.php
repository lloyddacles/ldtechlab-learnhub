<?php $pageTitle = 'Sequential Thinking'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<?php $num = 4; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Sequential Thinking</h1>
    <p class="lesson-desc">Understand that code executes top-to-bottom and why the order of operations changes everything.</p>
</div>

<h2>Order Matters</h2>
<p>In programming, instructions execute from top to bottom, one line at a time. This seems obvious, but it's one of the biggest sources of bugs for beginners.</p>

<p>Consider two recipes:</p>

<table>
    <thead>
        <tr><th>Recipe A (Correct)</th><th>Recipe B (Wrong Order)</th></tr>
    </thead>
    <tbody>
        <tr><td>1. Preheat oven</td><td>1. Put cake in oven</td></tr>
        <tr><td>2. Mix ingredients</td><td>2. Preheat oven</td></tr>
        <tr><td>3. Pour into pan</td><td>3. Mix ingredients</td></tr>
        <tr><td>4. Put in oven</td><td>4. Pour into pan</td></tr>
        <tr><td>Result: Delicious cake</td><td>Result: Disaster</td></tr>
    </tbody>
</table>

<p>The same ingredients, the same steps — but different order produces completely different results. Programming is the same.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Same variables, different order = different results

// Version A: Correct order
$a = 5;
$b = $a + 3;  // b = 8
echo "Version A: a=$a, b=$b\n";

// Version B: Wrong order
$a = 5;
$a = $a + 3;  // a = 8
$b = $a;      // b = 8
echo "Version B: a=$a, b=$b\n";

// Version C: Another wrong order
$a = 5;
$b = $a;      // b = 5
$a = $a + 3;  // a = 8
echo "Version C: a=$a, b=$b\n";
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

<h2>Tracing Code</h2>
<p><strong>Tracing</strong> means reading through code line by line and tracking what each variable holds at each step. This is the single most important skill for debugging.</p>

<h3>Example: Trace This Code</h3>
<p>What will this code output? Try to trace it yourself before looking at the answer.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Trace through this code line by line

$x = 10;
echo "Line 1: x = $x\n";

$y = $x + 5;
echo "Line 2: y = $y\n";

$x = $y - $x;
echo "Line 3: x = $x\n";

$y = $x * 2;
echo "Line 4: y = $y\n";

echo "\nFinal: x = $x, y = $y\n";
echo "The values changed at each step!\n";
echo "Tracing helps you follow the changes.\n";
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
    <div class="box-title">Practice Tracing</div>
    <p class="mb-0">Before running any code, grab a piece of paper and trace through it. Write down the value of each variable at each line. This habit will make you a much better programmer.</p>
</div>

<h2>Variables as Memory</h2>
<p>Variables are like labeled boxes that store values. When you assign a value, it goes in the box. When you reassign, the old value is replaced.</p>

<h3>Assignment Overwrites</h3>
<div class="syntax-ref">
    <h4>How Assignment Works</h4>
    <code>$x = 5;&nbsp;&nbsp;&nbsp;&nbsp;// Box labeled $x contains 5</code><br>
    <code>$x = 10;&nbsp;&nbsp;&nbsp;// Old value (5) is gone, now contains 10</code><br>
    <code>$x = $x + 1;// Read current value (10), add 1, store result (11)</code><br>
    <code>// $x is now 11 — the old 10 is replaced</code>
</div>

<p>Think of it like a whiteboard: you can erase and write new values, but only one value exists at a time.</p>

<h2>Assignment vs Equality</h2>
<p>This is a critical distinction that confuses many beginners:</p>

<table>
    <thead>
        <tr><th>Concept</th><th>Symbol</th><th>Meaning</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td>Assignment</td><td><code>=</code></td><td>Puts a value into a variable</td><td><code>$x = 5;</code></td></tr>
        <tr><td>Equality check</td><td><code>==</code></td><td>Compares two values</td><td><code>if ($x == 5)</code></td></tr>
        <tr><td>Strict equality</td><td><code>===</code></td><td>Compares value AND type</td><td><code>if ($x === 5)</code></td></tr>
    </tbody>
</table>

<div class="info-box warning">
    <div class="box-title">Common Mistake</div>
    <p class="mb-0">Writing <code>if ($x = 5)</code> instead of <code>if ($x == 5)</code> will assign 5 to $x instead of comparing! PHP won't always warn you about this. Always use <code>===</code> when possible.</p>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Assignment vs Equality

$x = 10;

// This is assignment (=), not comparison
// It sets $x to 5, then evaluates 5 as true
if ($x = 5) {
    echo "Assignment: x is now $x (was 10, now 5)\n";
}

// Reset
$x = 10;

// This is comparison (==)
if ($x == 10) {
    echo "Comparison: x equals 10 (still 10)\n";
}

// Reset
$x = 10;

// This is strict comparison (===)
if ($x === 10) {
    echo "Strict: x is exactly 10 (value and type match)\n";
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

<h2>Practice Tracing</h2>
<p>Trace through this code and predict the output before running it:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Tracing exercise - predict the output first!

$a = 3;
$b = 7;
$c = $a + $b;    // c = ?
$a = $c - $a;    // a = ?
$b = $c - $b;    // b = ?
echo "After swap: a=$a, b=$b, c=$c\n";

// What happened? We swapped a and b using c!
// Original: a=3, b=7
// Final:    a=7, b=3
echo "\nThis is a classic swap algorithm.\n";
echo "The variable c holds temporary values.\n";
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

<h2>Fixing Sequence Errors</h2>
<p>Sometimes code has the right operations but wrong order. Here's an exercise to practice finding and fixing sequence errors:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// This code has a bug! The order is wrong.
// Fix the sequence to get the correct output.

$price = 100;
$discount = 20;

// BUG: This applies discount to discounted price
$price = $price - $discount;  // price = 80
$tax = $price * 0.10;         // tax = 8 (wrong!)
echo "Buggy result: $price + $tax = " . ($price + $tax) . "\n";

// FIXED: Calculate tax first, then apply discount
$price = 100;
$tax = $price * 0.10;         // tax = 10 (correct)
$price = $price - $discount;  // price = 80
echo "Fixed result: $price + $tax = " . ($price + $tax) . "\n";

echo "\nThe order of operations matters!\n";
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

<div class="info-box note">
    <div class="box-title">Key Takeaway</div>
    <p class="mb-0">When your code produces wrong results, the first thing to check is the <strong>order of operations</strong>. Trace through your code line by line and verify that each step happens at the right time.</p>
</div>

<h2>Summary</h2>
<ul>
    <li>Code executes top to bottom — order is everything</li>
    <li><strong>Tracing</strong> is reading code line by line to track variable values</li>
    <li>Variables store one value at a time; assignment overwrites the old value</li>
    <li><code>=</code> is assignment, <code>==</code> is comparison, <code>===</code> is strict comparison</li>
    <li>When debugging, trace through your code on paper first</li>
    <li>Many bugs come from wrong operation order, not wrong operations</li>
</ul>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>