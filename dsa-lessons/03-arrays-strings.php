<?php $pageTitle = 'Arrays & Strings'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 3; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Arrays & Strings</h1>
    <p class="lesson-desc">Master PHP arrays as dynamic arrays, learn common operations, and explore string manipulation techniques.</p>
</div>

<h2>PHP Arrays as Dynamic Arrays</h2>
<p>Unlike languages with fixed-size arrays, PHP arrays grow and shrink dynamically. They're implemented as hash maps, giving you flexible key-value storage.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Array Operations</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Dynamic array operations
$colors = ["Red", "Green", "Blue"];
echo "Original: " . implode(", ", $colors) . "\n";

// Insert at end
$colors[] = "Yellow";
echo "After push: " . implode(", ", $colors) . "\n";

// Insert at position 1
array_splice($colors, 1, 0, "Orange");
echo "After insert at 1: " . implode(", ", $colors) . "\n";

// Delete at position 2
$removed = array_splice($colors, 2, 1);
echo "Removed: " . $removed[0] . "\n";
echo "After delete: " . implode(", ", $colors) . "\n";

// Search
$search = "Blue";
$index = array_search($search, $colors);
echo "Index of $search: " . ($index !== false ? $index : "not found") . "\n";

// Sort
$numbers = [42, 8, 15, 23, 4];
sort($numbers);
echo "Sorted: " . implode(", ", $numbers) . "\n";
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

<h2>Common Array Operations</h2>

<table>
    <thead>
        <tr>
            <th>Operation</th>
            <th>PHP Function</th>
            <th>Time Complexity</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Access by index</td>
            <td><code>$arr[$i]</code></td>
            <td>O(1)</td>
        </tr>
        <tr>
            <td>Push to end</td>
            <td><code>$arr[] = $val</code></td>
            <td>O(1)</td>
        </tr>
        <tr>
            <td>Pop from end</td>
            <td><code>array_pop($arr)</code></td>
            <td>O(1)</td>
        </tr>
        <tr>
            <td>Insert at position</td>
            <td><code>array_splice()</code></td>
            <td>O(n)</td>
        </tr>
        <tr>
            <td>Search</td>
            <td><code>array_search()</code></td>
            <td>O(n)</td>
        </tr>
        <tr>
            <td>Sort</td>
            <td><code>sort()</code></td>
            <td>O(n log n)</td>
        </tr>
    </tbody>
</table>

<h2>Strings as Character Arrays</h2>
<p>In PHP, strings can be treated as arrays of characters. Use <code>[]</code> or <code>{}</code> syntax to access individual characters.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; String Manipulation</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// String as character array
$str = "Hello, World!";
echo "String: $str\n";
echo "Length: " . strlen($str) . " characters\n";
echo "First char: $str[0]\n";
echo "Last char: {$str[(strlen($str) - 1)]}\n\n";

// Reverse a string
$reversed = strrev($str);
echo "Reversed: $reversed\n";

// Check if palindrome
function isPalindrome($str) {
    $clean = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $str));
    return $clean === strrev($clean);
}

$test = "racecar";
echo "\"$test\" is palindrome: " . (isPalindrome($test) ? "Yes" : "No") . "\n";

$test = "hello";
echo "\"$test\" is palindrome: " . (isPalindrome($test) ? "Yes" : "No") . "\n";
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

<h2>Two-Pointer Technique</h2>
<p>The two-pointer technique uses two indices to traverse a data structure, often reducing O(n&sup2;) to O(n).</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Two Pointers</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Two pointers: Check if array is sorted
function isSorted($arr) {
    $left = 0;
    $right = count($arr) - 1;
    
    while ($left < $right) {
        if ($arr[$left] > $arr[$right]) {
            return false;
        }
        $left++;
        $right--;
    }
    return true;
}

$sorted = [1, 2, 3, 4, 5];
$unsorted = [1, 3, 2, 4, 5];

echo "Array [1,2,3,4,5] sorted? " . (isSorted($sorted) ? "Yes" : "No") . "\n";
echo "Array [1,3,2,4,5] sorted? " . (isSorted($unsorted) ? "Yes" : "No") . "\n\n";

// Two pointers: Find pair that sums to target
function findPair($arr, $target) {
    sort($arr);
    $left = 0;
    $right = count($arr) - 1;
    
    while ($left < $right) {
        $sum = $arr[$left] + $arr[$right];
        if ($sum == $target) {
            return [$arr[$left], $arr[$right]];
        } elseif ($sum < $target) {
            $left++;
        } else {
            $right--;
        }
    }
    return null;
}

$numbers = [2, 7, 11, 15, 1];
$pair = findPair($numbers, 9);
echo "Pair summing to 9: " . implode(" + ", $pair) . "\n";
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

<h2>Sliding Window Technique</h2>
<p>The sliding window technique is used to perform operations on a specific window size of an array or string.</p>

<div class="info-box tip">
    <div class="box-title">When to Use Sliding Window</div>
    <p class="mb-0">Use sliding window when you need to find a contiguous subarray or substring that satisfies a condition (max sum, longest substring, etc.).</p>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Sliding Window</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Sliding window: Maximum sum of k consecutive elements
function maxSumSubarray($arr, $k) {
    $n = count($arr);
    if ($n < $k) return null;
    
    // Calculate sum of first window
    $windowSum = array_sum(array_slice($arr, 0, $k));
    $maxSum = $windowSum;
    
    // Slide the window
    for ($i = $k; $i < $n; $i++) {
        $windowSum += $arr[$i] - $arr[$i - $k];
        $maxSum = max($maxSum, $windowSum);
    }
    
    return $maxSum;
}

$numbers = [1, 4, 2, 10, 23, 3, 1, 0, 20];
$k = 4;
echo "Array: " . implode(", ", $numbers) . "\n";
echo "Window size: $k\n";
echo "Maximum sum of $k consecutive: " . maxSumSubarray($numbers, $k) . "\n";
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

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'dsa-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'dsa-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>