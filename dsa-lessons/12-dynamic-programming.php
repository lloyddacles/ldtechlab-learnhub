<?php $pageTitle = 'Dynamic Programming'; require_once __DIR__ . '/../includes/functions.php'; $num = 12; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Dynamic Programming</h1>
    <p class="lesson-desc">Solve complex problems by breaking them into overlapping subproblems with memoization and tabulation.</p>
</div>

<h2>What Is Dynamic Programming?</h2>
<p><strong>Dynamic Programming (DP)</strong> is an algorithmic technique that solves problems by combining solutions to <strong>overlapping subproblems</strong>. It stores previously computed results to avoid redundant calculations.</p>

<h2>Memoization vs Tabulation</h2>

<table class="table">
    <thead>
        <tr><th>Approach</th><th>Description</th><th>Direction</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Memoization</strong></td><td>Top-down: cache results of recursive calls</td><td>Recursive</td></tr>
        <tr><td><strong>Tabulation</strong></td><td>Bottom-up: fill a table iteratively</td><td>Iterative</td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">When to Use DP</div>
    <p class="mb-0">Use DP when a problem has <strong>overlapping subproblems</strong> and <strong>optimal substructure</strong> (the optimal solution contains optimal solutions to subproblems).</p>
</div>

<h2>Fibonacci: Recursive vs DP</h2>
<p>The classic example showing how DP eliminates redundant computation:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Without DP - exponential time
function fibRecursive($n) {
    if ($n <= 1) return $n;
    return fibRecursive($n - 1) + fibRecursive($n - 2);
}

// With Memoization - O(n) time
function fibMemo($n, &$memo = []) {
    if (isset($memo[$n])) return $memo[$n];
    if ($n <= 1) return $n;
    $memo[$n] = fibMemo($n - 1, $memo) + fibMemo($n - 2, $memo);
    return $memo[$n];
}

// With Tabulation - O(n) time, O(n) space
function fibTab($n) {
    if ($n <= 1) return $n;
    $dp = [0, 1];
    for ($i = 2; $i <= $n; $i++) {
        $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
    }
    return $dp[$n];
}

// With Space Optimization - O(n) time, O(1) space
function fibOptimized($n) {
    if ($n <= 1) return $n;
    $prev2 = 0;
    $prev1 = 1;
    for ($i = 2; $i <= $n; $i++) {
        $current = $prev1 + $prev2;
        $prev2 = $prev1;
        $prev1 = $current;
    }
    return $prev1;
}

echo "Fibonacci(10):\n";
echo "  Recursive:  " . fibRecursive(10) . "\n";
echo "  Memoized:   " . fibMemo(10) . "\n";
echo "  Tabulation: " . fibTab(10) . "\n";
echo "  Optimized:  " . fibOptimized(10) . "\n\n";

echo "First 10 Fibonacci numbers:\n";
for ($i = 0; $i < 10; $i++) {
    echo "  fib($i) = " . fibTab($i) . "\n";
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

<h2>Classic DP: Climbing Stairs</h2>
<p>You can climb 1 or 2 steps at a time. How many distinct ways can you reach step n?</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function climbStairs($n) {
    if ($n <= 2) return $n;
    $dp = [0, 1, 2];
    for ($i = 3; $i <= $n; $i++) {
        $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
    }
    return $dp[$n];
}

echo "Climbing Stairs:\n";
for ($i = 1; $i <= 10; $i++) {
    echo "  $i steps: " . climbStairs($i) . " ways\n";
}
echo "\n";

// Coin Change Problem
function coinChange($coins, $amount) {
    $dp = array_fill(0, $amount + 1, $amount + 1);
    $dp[0] = 0;

    for ($i = 1; $i <= $amount; $i++) {
        foreach ($coins as $coin) {
            if ($coin <= $i) {
                $dp[$i] = min($dp[$i], $dp[$i - $coin] + 1);
            }
        }
    }
    return $dp[$amount] > $amount ? -1 : $dp[$amount];
}

$coins = [1, 5, 10, 25];
echo "Coin Change (coins: 1, 5, 10, 25):\n";
$amounts = [11, 30, 41, 50];
foreach ($amounts as $amt) {
    $result = coinChange($coins, $amt);
    echo "  Amount $amt: " . ($result !== -1 ? "$result coins" : "Impossible") . "\n";
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

<h2>Longest Common Subsequence</h2>
<p>Find the longest subsequence common to two strings (characters in same relative order):</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function lcs($s1, $s2) {
    $m = strlen($s1);
    $n = strlen($s2);
    $dp = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

    for ($i = 1; $i <= $m; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($s1[$i - 1] === $s2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    // Backtrack to find the LCS string
    $i = $m;
    $j = $n;
    $result = "";
    while ($i > 0 && $j > 0) {
        if ($s1[$i - 1] === $s2[$j - 1]) {
            $result = $s1[$i - 1] . $result;
            $i--;
            $j--;
        } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            $i--;
        } else {
            $j--;
        }
    }

    return ["length" => $dp[$m][$n], "string" => $result];
}

$pairs = [
    ["ABCBDAB", "BDCAB"],
    ["AGGTAB", "GXTXAYB"],
    ["HELLO", "WORLD"],
];

foreach ($pairs as [$s1, $s2]) {
    $result = lcs($s1, $s2);
    echo "\"$s1\" vs \"$s2\":\n";
    echo "  LCS: \"{$result["string"]}\" (length {$result["length"]})\n\n";
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

<h2>Steps to Solve a DP Problem</h2>
<ol>
    <li><strong>Identify</strong> overlapping subproblems and optimal substructure</li>
    <li><strong>Define</strong> the state (what does dp[i] represent?)</li>
    <li><strong>Write</strong> the recurrence relation</li>
    <li><strong>Set</strong> base cases</li>
    <li><strong>Implement</strong> using memoization or tabulation</li>
</ol>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'dsa-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'dsa-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
