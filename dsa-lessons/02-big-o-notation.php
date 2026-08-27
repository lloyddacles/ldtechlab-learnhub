<?php $pageTitle = 'Big O Notation'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 2; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Big O Notation</h1>
    <p class="lesson-desc">Learn how to measure algorithm efficiency and understand time and space complexity.</p>
</div>

<h2>What Is Big O Notation?</h2>
<p><strong>Big O notation</strong> describes how an algorithm's performance scales with input size. It answers the question: <em>"How does the runtime grow as the data grows?"</em></p>

<div class="info-box note">
    <div class="box-title">Why It Matters</div>
    <p class="mb-0">An algorithm that works fine for 100 items might crash with 1 million items. Big O helps us predict performance before deploying code.</p>
</div>

<h2>Time vs Space Complexity</h2>

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Measures</th>
            <th>Example</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Time Complexity</strong></td>
            <td>How long an algorithm takes to run</td>
            <td>Searching through a list</td>
        </tr>
        <tr>
            <td><strong>Space Complexity</strong></td>
            <td>How much memory an algorithm uses</td>
            <td>Creating a copy of an array</td>
        </tr>
    </tbody>
</table>

<h2>Common Complexities</h2>

<table>
    <thead>
        <tr>
            <th>Big O</th>
            <th>Name</th>
            <th>Example</th>
            <th>10 items</th>
            <th>1000 items</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>O(1)</code></td>
            <td>Constant</td>
            <td>Array access by index</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <tr>
            <td><code>O(log n)</code></td>
            <td>Logarithmic</td>
            <td>Binary search</td>
            <td>3</td>
            <td>10</td>
        </tr>
        <tr>
            <td><code>O(n)</code></td>
            <td>Linear</td>
            <td>Loop through array</td>
            <td>10</td>
            <td>1,000</td>
        </tr>
        <tr>
            <td><code>O(n log n)</code></td>
            <td>Linearithmic</td>
            <td>Merge sort</td>
            <td>33</td>
            <td>10,000</td>
        </tr>
        <tr>
            <td><code>O(n&sup2;)</code></td>
            <td>Quadratic</td>
            <td>Nested loops</td>
            <td>100</td>
            <td>1,000,000</td>
        </tr>
        <tr>
            <td><code>O(2&sup;n;)</code></td>
            <td>Exponential</td>
            <td>Recursive Fibonacci</td>
            <td>1,024</td>
            <td>1.07 &times; 10&sup3;&sup3;&sup2;</td>
        </tr>
    </tbody>
</table>

<h2>Practical Examples</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; O(1) Constant Time</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// O(1): Constant time - always takes the same time
// regardless of array size

$numbers = range(1, 1000000);

$start = microtime(true);

// Access element at index 500000
$value = $numbers[500000];

$end = microtime(true);
$time = ($end - $start) * 1000;

echo "Accessed index 500000\n";
echo "Value: $value\n";
echo "Time: " . round($time, 6) . " ms\n";
echo "This is O(1) - constant time!\n";
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

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; O(n) vs O(n&sup2;)</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Comparing O(n) vs O(n²)

$n = 1000;
$arr = range(1, $n);

// O(n) - Linear: one loop
$start = microtime(true);
$count = 0;
for ($i = 0; $i < $n; $i++) {
    $count++;
}
$end = microtime(true);
$linearTime = ($end - $start) * 1000;

// O(n²) - Quadratic: nested loops
$start = microtime(true);
$count = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $count++;
    }
}
$end = microtime(true);
$quadraticTime = ($end - $start) * 1000;

echo "Array size: $n elements\n\n";
echo "O(n) Linear:\n";
echo "  Operations: $n\n";
echo "  Time: " . round($linearTime, 4) . " ms\n\n";
echo "O(n²) Quadratic:\n";
echo "  Operations: " . ($n * $n) . "\n";
echo "  Time: " . round($quadraticTime, 4) . " ms\n\n";
echo "Ratio: O(n²) is " . round($quadraticTime / $linearTime) . "x slower!\n";
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
    <div class="box-title">How to Analyze Code</div>
    <p class="mb-0">Look for loops. A single loop over n elements is O(n). Two nested loops is O(n&sup2;). Three nested loops is O(n&sup3;). If the loop count halves each time (binary search), it's O(log n).</p>
</div>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'dsa-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'dsa-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>