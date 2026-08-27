<?php $pageTitle = 'Sorting Algorithms'; require_once __DIR__ . '/../includes/functions.php'; $num = 10; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Sorting Algorithms</h1>
    <p class="lesson-desc">Learn fundamental sorting algorithms and their performance characteristics.</p>
</div>

<h2>Why Sorting Matters</h2>
<p>Sorting is one of the most fundamental operations in computer science. It enables efficient searching, data organization, and is a building block for more complex algorithms.</p>

<h2>Sorting Algorithm Comparison</h2>

<table class="table">
    <thead>
        <tr><th>Algorithm</th><th>Best</th><th>Average</th><th>Worst</th><th>Space</th><th>Stable</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Bubble Sort</strong></td><td>O(n)</td><td>O(n&sup2;)</td><td>O(n&sup2;)</td><td>O(1)</td><td>Yes</td></tr>
        <tr><td><strong>Selection Sort</strong></td><td>O(n&sup2;)</td><td>O(n&sup2;)</td><td>O(n&sup2;)</td><td>O(1)</td><td>No</td></tr>
        <tr><td><strong>Insertion Sort</strong></td><td>O(n)</td><td>O(n&sup2;)</td><td>O(n&sup2;)</td><td>O(1)</td><td>Yes</td></tr>
        <tr><td><strong>Merge Sort</strong></td><td>O(n log n)</td><td>O(n log n)</td><td>O(n log n)</td><td>O(n)</td><td>Yes</td></tr>
        <tr><td><strong>Quick Sort</strong></td><td>O(n log n)</td><td>O(n log n)</td><td>O(n&sup2;)</td><td>O(log n)</td><td>No</td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">When to Use Each Sort</div>
    <p class="mb-0">Use <strong>Insertion Sort</strong> for small or nearly sorted arrays. Use <strong>Merge Sort</strong> for guaranteed O(n log n) performance. Use <strong>Quick Sort</strong> for fast average performance in practice.</p>
</div>

<h2>Bubble Sort</h2>
<p>Repeatedly steps through the list, compares adjacent elements, and swaps them if they are in the wrong order:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function bubbleSort(&$arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $swapped = false;
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
                $swapped = true;
            }
        }
        if (!$swapped) break; // Already sorted
    }
    return $arr;
}

$data = [64, 34, 25, 12, 22, 11, 90];
echo "Original: " . implode(", ", $data) . "\n";
bubbleSort($data);
echo "Sorted:   " . implode(", ", $data) . "\n\n";

// Demonstrate passes
$data2 = [5, 3, 8, 1, 2];
echo "Tracing: " . implode(", ", $data2) . "\n";
$n = count($data2);
for ($i = 0; $i < $n - 1; $i++) {
    $swapped = false;
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($data2[$j] > $data2[$j + 1]) {
            [$data2[$j], $data2[$j + 1]] = [$data2[$j + 1], $data2[$j]];
            $swapped = true;
        }
    }
    echo "Pass " . ($i + 1) . ": " . implode(", ", $data2) . "\n";
    if (!$swapped) break;
}
'); ?>" ></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Insertion Sort</h2>
<p>Builds the sorted array one element at a time by inserting each element into its correct position:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function insertionSort(&$arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

$data = [64, 34, 25, 12, 22, 11, 90];
echo "Original: " . implode(", ", $data) . "\n";
insertionSort($data);
echo "Sorted:   " . implode(", ", $data) . "\n\n";

// Trace through small array
$data2 = [5, 3, 8, 1, 2];
echo "Tracing: " . implode(", ", $data2) . "\n";
$n = count($data2);
for ($i = 1; $i < $n; $i++) {
    $key = $data2[$i];
    $j = $i - 1;
    while ($j >= 0 && $data2[$j] > $key) {
        $data2[$j + 1] = $data2[$j];
        $j--;
    }
    $data2[$j + 1] = $key;
    echo "Insert " . $key . ": " . implode(", ", $data2) . "\n";
}
'); ?>" ></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>PHP Built-in Sort Functions</h2>
<p>PHP provides efficient built-in sorting functions for production use:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$data = [3, 1, 4, 1, 5, 9, 2, 6];
echo "Original: " . implode(", ", $data) . "\n\n";

// sort() - ascending (modifies original)
sort($data);
echo "sort():     " . implode(", ", $data) . "\n";

// rsort() - descending
rsort($data);
echo "rsort():    " . implode(", ", $data) . "\n";

// asort() - ascending with keys preserved
$fruits = ["d" => "date", "a" => "apple", "c" => "cherry", "b" => "banana"];
asort($fruits);
echo "\nasort():\n";
foreach ($fruits as $k => $v) echo "  $k => $v\n";

// usort() - custom comparison
$numbers = [10, 2, 8, 4, 6];
usort($numbers, function($a, $b) { return $a - $b; });
echo "\nusort():  " . implode(", ", $numbers) . "\n";
'); ?>" ></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
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
