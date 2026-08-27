<?php $pageTitle = 'Searching Algorithms'; require_once __DIR__ . '/../includes/functions.php'; $num = 11; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Searching Algorithms</h1>
    <p class="lesson-desc">Master linear search, binary search, and PHP's built-in search functions.</p>
</div>

<h2>Linear Search</h2>
<p>The simplest search algorithm. It checks each element one by one until the target is found or the array ends.</p>

<table class="table">
    <thead>
        <tr><th>Aspect</th><th>Linear Search</th><th>Binary Search</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Time Complexity</strong></td><td>O(n)</td><td>O(log n)</td></tr>
        <tr><td><strong>Requirement</strong></td><td>None</td><td>Array must be sorted</td></tr>
        <tr><td><strong>Best For</strong></td><td>Small/unsorted arrays</td><td>Large sorted arrays</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">When to Use Linear Search</div>
    <p class="mb-0">Use linear search when the array is small, unsorted, or when you only need to search once. The overhead of sorting for binary search may not be worth it for small datasets.</p>
</div>

<h2>Linear Search Implementation</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function linearSearch($arr, $target) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === $target) {
            return $i;
        }
    }
    return -1;
}

$numbers = [23, 45, 12, 67, 34, 89, 56, 11];
echo "Array: " . implode(", ", $numbers) . "\n\n";

$target = 67;
$result = linearSearch($numbers, $target);
echo "Search for $target: " . ($result !== -1 ? "Found at index $result" : "Not found") . "\n";

$target = 99;
$result = linearSearch($numbers, $target);
echo "Search for $target: " . ($result !== -1 ? "Found at index $result" : "Not found") . "\n\n";

// Search for string
$fruits = ["apple", "banana", "cherry", "date"];
$result = linearSearch($fruits, "cherry");
echo "Search \"cherry\" in fruits: " . ($result !== -1 ? "Found at index $result" : "Not found") . "\n";
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

<h2>Binary Search Implementation</h2>
<p>Binary search repeatedly divides the search interval in half. The array must be sorted first:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function binarySearch($arr, $target) {
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        $mid = intdiv($low + $high, 2);
        if ($arr[$mid] === $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }
    return -1;
}

$sorted = [11, 23, 34, 45, 56, 67, 89];
echo "Sorted Array: " . implode(", ", $sorted) . "\n\n";

$target = 56;
$result = binarySearch($sorted, $target);
echo "Search for $target: " . ($result !== -1 ? "Found at index $result" : "Not found") . "\n";

$target = 30;
$result = binarySearch($sorted, $target);
echo "Search for $target: " . ($result !== -1 ? "Found at index $result" : "Not found") . "\n\n";

// Trace the search process
echo "Tracing search for 67:\n";
$low = 0;
$high = count($sorted) - 1;
while ($low <= $high) {
    $mid = intdiv($low + $high, 2);
    echo "  low=$low, high=$high, mid=$mid -> $sorted[$mid]\n";
    if ($sorted[$mid] === 67) {
        echo "  Found!\n";
        break;
    } elseif ($sorted[$mid] < 67) {
        $low = $mid + 1;
    } else {
        $high = $mid - 1;
    }
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

<h2>PHP Built-in Search Functions</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$fruits = ["apple", "banana", "cherry", "date", "elderberry"];
echo "Array: " . implode(", ", $fruits) . "\n\n";

// in_array() - check if value exists
echo "in_array(\"cherry\"): " . var_export(in_array("cherry", $fruits), true) . "\n";
echo "in_array(\"fig\"):    " . var_export(in_array("fig", $fruits), true) . "\n\n";

// array_search() - find key of value
$key = array_search("date", $fruits);
echo "array_search(\"date\"): " . ($key !== false ? "Found at key $key" : "Not found") . "\n";
$key = array_search("grape", $fruits);
echo "array_search(\"grape\"): " . ($key !== false ? "Found at key $key" : "Not found") . "\n\n";

// array_key_exists() - check if key exists
echo "array_key_exists(2): " . var_export(array_key_exists(2, $fruits), true) . "\n";
echo "array_key_exists(10): " . var_export(array_key_exists(10, $fruits), true) . "\n\n";

// array_column() - extract values by column (useful for 2D arrays)
$students = [
    ["name" => "Alice", "grade" => 95],
    ["name" => "Bob", "grade" => 87],
    ["name" => "Carol", "grade" => 92],
];
$names = array_column($students, "name");
echo "Names: " . implode(", ", $names) . "\n";
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

<h2>Interpolation Search</h2>
<p>An improvement over binary search for uniformly distributed data. It estimates the position of the target based on its value, rather than always checking the middle:</p>

<div class="info-box note">
    <div class="box-title">Interpolation Search Formula</div>
    <p class="mb-0"><code>$pos = $low + (($target - $arr[$low]) * ($high - $low)) / ($arr[$high] - $arr[$low]);</code></p>
    <p class="mb-0">Best case: O(log log n) for uniform data. Worst case: O(n) for skewed data.</p>
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
