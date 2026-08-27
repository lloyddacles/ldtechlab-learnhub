<?php
$pageTitle = 'PHP Numbers';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 7;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Numbers</h1>
    <p class="lesson-desc">Work with integers, floats, and mathematical operations in PHP.</p>
</div>

<h2>Two Types of Numbers</h2>
<table>
    <thead>
        <tr><th>Type</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><code>int</code> (integer)</td><td>Whole numbers, no decimal</td><td><code>42</code>, <code>-100</code>, <code>0</code></td></tr>
        <tr><td><code>float</code></td><td>Numbers with decimal points</td><td><code>3.14</code>, <code>-0.001</code></td></tr>
    </tbody>
</table>

<h2>Arithmetic Operators</h2>

<div class="syntax-ref">
    <h4>Syntax: Math Operators</h4>
    <code>$a + $b    // Addition</code>
    <code>$a - $b    // Subtraction</code>
    <code>$a * $b    // Multiplication</code>
    <code>$a / $b    // Division</code>
    <code>$a % $b    // Modulus (remainder)</code>
    <code>$a ** $b   // Exponentiation (power)</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$a = 15;
$b = 4;

echo "a = $a, b = $b";
echo "\n\n";

echo "Addition:       " . ($a + $b);    // 19
echo "\n";
echo "Subtraction:    " . ($a - $b);    // 11
echo "\n";
echo "Multiplication: " . ($a * $b);    // 60
echo "\n";
echo "Division:       " . ($a / $b);    // 3.75
echo "\n";
echo "Modulus:        " . ($a % $b);    // 3 (remainder of 15/4)
echo "\n";
echo "Power:          " . ($a ** $b);   // 50625 (15^4)
echo "\n\n";

// Practical example: calculate total with tax
$price = 29.99;
$taxRate = 0.08;
$tax = $price * $taxRate;
$total = $price + $tax;

echo "Price: $" . number_format($price, 2);
echo "\n";
echo "Tax (8%): $" . number_format($tax, 2);
echo "\n";
echo "Total: $" . number_format($total, 2);
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

<h2>Order of Operations</h2>
<p>PHP follows standard mathematical order of operations (PEMDAS/BODMAS):</p>
<ol>
    <li><strong>Parentheses</strong> <code>()</code></li>
    <li><strong>Exponents</strong> <code>**</code></li>
    <li><strong>Multiplication/Division</strong> <code>* / %</code> (left to right)</li>
    <li><strong>Addition/Subtraction</strong> <code>+ -</code> (left to right)</li>
</ol>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "2 + 3 * 4 = " . (2 + 3 * 4);        // 14 (not 20)
echo "\n";
echo "(2 + 3) * 4 = " . ((2 + 3) * 4);     // 20
echo "\n";
echo "10 - 2 ** 3 = " . (10 - 2 ** 3);     // 2 (10 - 8)
echo "\n";
echo "(10 - 2) ** 3 = " . ((10 - 2) ** 3); // 512 (8^3)
echo "\n\n";

// Always use parentheses when unsure!
$cost = 100;
$discount = 20;
$tax = 8;

$total = $cost - ($cost * $discount / 100);
$total = $total + ($total * $tax / 100);

echo "Cost: $" . $cost;
echo "\n";
echo "Discount: $discount%";
echo "\n";
echo "Tax: $tax%";
echo "\n";
echo "Total: $" . number_format($total, 2);
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

<h2>Math Functions</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Rounding ===\n";
echo "round(3.7) = " . round(3.7);           // 4
echo "\n";
echo "round(3.2) = " . round(3.2);           // 3
echo "\n";
echo "round(3.5) = " . round(3.5);           // 4
echo "\n";
echo "ceil(4.1) = " . ceil(4.1);             // 5 (always rounds up)
echo "\n";
echo "floor(4.9) = " . floor(4.9);           // 4 (always rounds down)
echo "\n\n";

echo "=== Absolute & Random ===\n";
echo "abs(-15) = " . abs(-15);                // 15
echo "\n";
echo "Random 1-100: " . rand(1, 100);
echo "\n\n";

echo "=== Min and Max ===\n";
echo "min(5, 10, 3) = " . min(5, 10, 3);     // 3
echo "\n";
echo "max(5, 10, 3) = " . max(5, 10, 3);     // 10
echo "\n";

echo "=== Number Formatting ===\n";
echo "1234567 formatted: " . number_format(1234567);          // 1,234,567
echo "\n";
echo "With decimals: " . number_format(1234.5678, 2);         // 1,234.57
echo "\n";

echo "=== Conversion ===\n";
echo "(int)\"42\" = " . (int)"42";             // 42
echo "\n";
echo "(float)\"3.14\" = " . (float)"3.14";   // 3.14
echo "\n";
echo "intval(\"hello\") = " . intval("hello"); // 0
echo "\n";
echo "floatval(\"3.14abc\") = " . floatval("3.14abc"); // 3.14
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
    <div class="box-title">Warning: Floating Point Precision</div>
    <p class="mb-0">Never compare floats with <code>==</code> because of precision issues. For example, <code>0.1 + 0.2</code> doesn't exactly equal <code>0.3</code> in binary. Use <code>abs($a - $b) < 0.0001</code> instead.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a program that converts Celsius temperatures to Fahrenheit using the formula: <code>F = (C × 9/5) + 32</code></li>
        <li>Calculate the area of a circle with radius 7 using: <code>Area = π × r²</code></li>
        <li>Write a tip calculator: given a bill amount and tip percentage, calculate the tip and total</li>
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
