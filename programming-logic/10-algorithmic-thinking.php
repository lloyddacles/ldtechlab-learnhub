<?php $pageTitle = 'Algorithmic Thinking'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 10; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Algorithmic Thinking</h1>
    <p class="lesson-desc">Learn to break problems down into clear, step-by-step instructions — the foundation of all programming.</p>
</div>

<h2>What Is an Algorithm?</h2>
<p>An <strong>algorithm</strong> is a finite sequence of clear, unambiguous instructions to solve a problem. You already use algorithms every day — following a recipe, getting dressed, or navigating to school are all algorithms.</p>

<div class="info-box tip">
    <div class="box-title">Key Property</div>
    <p class="mb-0">An algorithm must have: (1) a clear starting point, (2) definite steps, (3) a stopping point, and (4) it must eventually terminate.</p>
</div>

<p><strong>Think About It:</strong> Describe the algorithm for making a peanut butter sandwich. Be so precise that someone who has never seen peanut butter could follow your instructions.</p>

<h2>Everyday Algorithms</h2>
<p>Before we code, let's practice writing algorithms for non-coding tasks. This builds the same thinking skills you need for programming.</p>

<table>
    <thead>
        <tr><th>Task</th><th>Bad Algorithm (vague)</th><th>Good Algorithm (precise)</th></tr>
    </thead>
    <tbody>
        <tr><td>Make tea</td><td>"Make some tea"</td><td>1. Fill kettle with water. 2. Turn on kettle. 3. Put tea bag in mug. 4. Pour boiling water into mug. 5. Wait 3 minutes. 6. Remove tea bag.</td></tr>
        <tr><td>Find a book</td><td>"Look for it"</td><td>1. Check your desk. 2. Check your bag. 3. Check under your bed. 4. Check the bookshelf. 5. If found, stop. If not, ask someone.</td></tr>
    </tbody>
</table>

<h2>Writing Algorithms Step by Step</h2>
<p>The key to algorithmic thinking is being <strong>precise</strong> and <strong>complete</strong>. Every step must be something a computer could do — no assumptions, no shortcuts.</p>

<div class="info-box note">
    <div class="box-title">Practice Tip</div>
    <p class="mb-0">When writing an algorithm, imagine you're explaining it to a very literal robot that does exactly what you say — nothing more, nothing less.</p>
</div>

<h2>From Algorithm to Code</h2>
<p>Once you have a clear algorithm, converting it to code is often the easy part. The hard part is thinking through the algorithm first.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Algorithm: Find the largest number in a list
// Step 1: Start with the first number as the largest
// Step 2: Compare each number to the current largest
// Step 3: If a number is bigger, it becomes the new largest
// Step 4: After checking all numbers, we have the answer

$numbers = [14, 7, 23, 3, 19, 8];
$largest = $numbers[0];

echo "Numbers: " . implode(", ", $numbers) . "\\n";
echo "Start with: $largest\\n\\n";

for ($i = 1; $i < count($numbers); $i++) {
    if ($numbers[$i] > $largest) {
        echo $numbers[$i] . " > $largest -> new largest!\\n";
        $largest = $numbers[$i];
    } else {
        echo $numbers[$i] . " <= $largest -> keep $largest\\n";
    }
}

echo "\\nLargest number: $largest\\n";
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

<h2>Comparing Two Approaches</h2>
<p>The same problem can often be solved multiple ways. Algorithmic thinking helps you evaluate which approach is better.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Two Ways to Count</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Problem: Count how many even numbers are in a list

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Approach 1: Use a counter
$count = 0;
foreach ($numbers as $num) {
    if ($num % 2 == 0) {
        $count++;
    }
}
echo "Approach 1 (counter): $count even numbers\\n";

// Approach 2: Build a new array
$evens = [];
foreach ($numbers as $num) {
    if ($num % 2 == 0) {
        $evens[] = $num;
    }
}
echo "Approach 2 (array): " . count($evens) . " even numbers\\n";
echo "The evens are: " . implode(", ", $evens) . "\\n";

// Which is better? It depends on what you need!
// If you only need the count, Approach 1 uses less memory.
// If you need the actual numbers, Approach 2 is necessary.
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

<h2>Efficiency Matters</h2>
<p>Some algorithms are faster than others. When working with large amounts of data, the right algorithm can mean the difference between seconds and hours.</p>

<table>
    <thead>
        <tr><th>Approach</th><th>Steps for 10 items</th><th>Steps for 1,000 items</th><th>Steps for 1,000,000 items</th></tr>
    </thead>
    <tbody>
        <tr><td>Check each one (linear)</td><td>10</td><td>1,000</td><td>1,000,000</td></tr>
        <tr><td>Sort first, then check</td><td>~33</td><td>~10,000</td><td>~20,000,000</td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">Start Simple</div>
    <p class="mb-0">Don't worry about efficiency at first. Write the clearest algorithm you can. Optimize later if needed. Clear code is easier to debug than clever code.</p>
</div>

<h2>Common Algorithmic Patterns</h2>
<p>As you practice, you'll recognize these patterns appearing over and over:</p>

<ul>
    <li><strong>Linear Search:</strong> Check each item one by one until you find what you want</li>
    <li><strong>Counting:</strong> Start at zero, add one each time something matches</li>
    <li><strong>Finding Maximum/Minimum:</strong> Start with the first item, compare and update</li>
    <li><strong>Accumulation:</strong> Start with zero, add each value to a running total</li>
    <li><strong>Filtering:</strong> Check each item, keep only the ones that pass a test</li>
</ul>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write an algorithm (in plain English) for finding a word in a dictionary. Then code it in PHP.</li>
        <li>Write two different algorithms to calculate the average of a list of numbers. Which is clearer?</li>
        <li>Given a list of numbers, write an algorithm to find the second largest number. Hint: you may need to track two values.</li>
    </ol>
</div>

<p><strong>Remember:</strong> Programming is not about typing code — it's about thinking clearly. The better your algorithm, the easier the code writes itself.</p>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
