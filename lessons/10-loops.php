<?php
$pageTitle = 'PHP Loops';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 10;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Loops</h1>
    <p class="lesson-desc">Repeat code efficiently using while, for, foreach, and do-while loops.</p>
</div>

<h2>Why Use Loops?</h2>
<p>Loops let you execute a block of code <strong>multiple times</strong>. Instead of writing the same code 10 times, you write it once inside a loop and run it 10 times automatically.</p>

<h2>The while Loop</h2>
<p>Repeats code as long as a condition is true:</p>

<div class="syntax-ref">
    <h4>Syntax: while Loop</h4>
    <code>while (condition) {</code>
    <code>&nbsp;&nbsp;// Code runs repeatedly while condition is true</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Count from 1 to 5
$count = 1;

while ($count <= 5) {
    echo "Count: $count\n";
    $count++;  // Important! Increment to avoid infinite loop
}

echo "\n";

// Sum numbers 1 to 10
$sum = 0;
$i = 1;

while ($i <= 10) {
    $sum += $i;  // Same as: $sum = $sum + $i
    $i++;
}

echo "Sum of 1-10: $sum";
echo "\n\n";

// While loop with string
$text = "Hello";
$iterations = 0;

while (strlen($text) < 20) {
    $text .= "!";
    $iterations++;
}

echo "Built string: $text";
echo "\n";
echo "Iterations: $iterations";
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
    <div class="box-title">Beware of Infinite Loops!</div>
    <p class="mb-0">If the condition never becomes false, the loop runs forever and freezes your program. Always make sure the loop variable changes toward ending the loop.</p>
</div>

<h2>The for Loop</h2>
<p>Best when you know exactly how many times to loop. Combines initialization, condition, and increment in one line:</p>

<div class="syntax-ref">
    <h4>Syntax: for Loop</h4>
    <code>for (init; condition; increment) {</code>
    <code>&nbsp;&nbsp;// Code runs repeatedly</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Count from 1 to 5
echo "=== Counting 1-5 ===\n";
for ($i = 1; $i <= 5; $i++) {
    echo "$i ";
}
echo "\n\n";

// Countdown
echo "=== Countdown ===\n";
for ($i = 5; $i >= 1; $i--) {
    echo "$i... ";
}
echo "Liftoff!";
echo "\n\n";

// Multiplication table
echo "=== Multiplication Table (5) ===\n";
for ($i = 1; $i <= 10; $i++) {
    $result = 5 * $i;
    echo "5 x $i = $result\n";
}
echo "\n";

// Nested loops: draw a pattern
echo "=== Star Pattern ===\n";
for ($row = 1; $row <= 5; $row++) {
    for ($col = 1; $col <= $row; $col++) {
        echo "* ";
    }
    echo "\n";
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

<h2>The foreach Loop</h2>
<p>Specifically designed for iterating over arrays:</p>

<div class="syntax-ref">
    <h4>Syntax: foreach Loop</h4>
    <code>foreach ($array as $value) {</code>
    <code>&nbsp;&nbsp;// $value contains each element</code>
    <code>}</code>
    <code>foreach ($array as $key => $value) {</code>
    <code>&nbsp;&nbsp;// $key is the index/key, $value is the element</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Simple foreach
$colors = ["Red", "Green", "Blue", "Yellow"];

echo "=== Colors ===\n";
foreach ($colors as $color) {
    echo "- $color\n";
}
echo "\n";

// Foreach with key
$student = [
    "name" => "Alice",
    "age" => 20,
    "major" => "Computer Science",
    "gpa" => 3.8
];

echo "=== Student Info ===\n";
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value\n";
}
echo "\n";

// Practical: calculate total
$prices = [10.99, 25.50, 7.99, 42.00, 15.75];
$total = 0;

foreach ($prices as $index => $price) {
    $total += $price;
    echo "Item " . ($index + 1) . ": $" . number_format($price, 2) . "\n";
}

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

<h2>The do...while Loop</h2>
<p>Like <code>while</code>, but the code runs <strong>at least once</strong> before checking the condition:</p>

<div class="syntax-ref">
    <h4>Syntax: do...while Loop</h4>
    <code>do {</code>
    <code>&nbsp;&nbsp;// Runs at least once</code>
    <code>} while (condition);</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// do...while always runs at least once
$i = 10;

echo "=== do...while (condition is false from start) ===\n";
do {
    echo "This runs once even though $i is $i (>= 10)\n";
    $i++;
} while ($i < 5);

echo "\ni is now: $i\n\n";

// Practical example: number guessing
$secret = 7;
$guess = 1;  // Start with wrong guess
$attempts = 0;

echo "=== Guessing Game ===\n";
do {
    $attempts++;
    if ($guess == $secret) {
        echo "Guessed $guess in $attempts attempts!\n";
    } else {
        $guess++;  // Try next number
    }
} while ($guess <= $secret && $guess != $secret);

echo "The secret number was $secret\n";
echo "Total attempts: $attempts\n";
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

<h2>break and continue</h2>

<div class="syntax-ref">
    <h4>Syntax: Loop Control</h4>
    <code>break;      // Immediately exit the loop</code>
    <code>continue;   // Skip to the next iteration</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// break: exit the loop early
echo "=== break Example ===\n";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        echo "\nFound 5! Stopping.\n";
        break;  // Exit the loop
    }
    echo "$i ";
}
echo "\n\n";

// continue: skip to next iteration
echo "=== continue Example (skip even numbers) ===\n";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue;  // Skip even numbers
    }
    echo "$i ";
}
echo "\n\n";

// Practical: find first divisible by 7
$numbers = [12, 23, 35, 42, 51, 63, 70];

echo "=== First number divisible by 7 ===\n";
foreach ($numbers as $num) {
    if ($num % 7 == 0) {
        echo "Found: $num\n";
        break;
    }
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

<h2>When to Use Each Loop</h2>
<table>
    <thead>
        <tr><th>Loop</th><th>Best For</th></tr>
    </thead>
    <tbody>
        <tr><td><code>for</code></td><td>When you know the exact number of iterations</td></tr>
        <tr><td><code>foreach</code></td><td>Iterating over arrays</td></tr>
        <tr><td><code>while</code></td><td>When the number of iterations depends on a condition</td></tr>
        <tr><td><code>do...while</code></td><td>When you need the code to run at least once</td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a loop that prints all even numbers from 1 to 50</li>
        <li>Use a for loop to calculate the factorial of 10 (10 × 9 × 8 × ... × 1)</li>
        <li>Write a program that finds all prime numbers between 1 and 50 using nested loops</li>
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
