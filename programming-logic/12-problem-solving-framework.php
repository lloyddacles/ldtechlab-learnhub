<?php $pageTitle = 'A Problem-Solving Framework'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 12; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>A Problem-Solving Framework</h1>
    <p class="lesson-desc">Bring it all together with a step-by-step framework for solving any programming problem.</p>
</div>

<h2>The Framework</h2>
<p>Every programming problem can be approached with this five-step framework. This is the capstone of everything you've learned — use it as your mental model for every new challenge.</p>

<table>
    <thead>
        <tr><th>Step</th><th>Name</th><th>Key Question</th><th>Skills Used</th></tr>
    </thead>
    <tbody>
        <tr><td>1</td><td><strong>Understand</strong></td><td>"What exactly am I being asked to do?"</td><td>Reading, analysis</td></tr>
        <tr><td>2</td><td><strong>Plan</strong></td><td>"How will I solve this?"</td><td>Algorithmic thinking, pattern recognition</td></tr>
        <tr><td>3</td><td><strong>Code</strong></td><td>"How do I write this in PHP?"</td><td>Syntax, structure</td></tr>
        <tr><td>4</td><td><strong>Test</strong></td><td>"Does it work correctly?"</td><td>Debugging, edge cases</td></tr>
        <tr><td>5</td><td><strong>Reflect</strong></td><td>"Can I improve this?"</td><td>Abstraction, DRY</td></tr>
    </tbody>
</table>

<h2>Step 1: Understand</h2>
<p>Before writing any code, make sure you truly understand the problem. Read it multiple times. Ask questions.</p>

<div class="info-box tip">
    <div class="box-title">Understanding Checklist</div>
    <p class="mb-0">✓ What are the inputs?<br>
    ✓ What should the output be?<br>
    ✓ What are the rules or constraints?<br>
    ✓ Are there example inputs and outputs?<br>
    ✓ What happens with edge cases (empty input, very large input)?</p>
</div>

<p><strong>Think About It:</strong> Why do beginners often start coding before they understand the problem? What problems does this cause?</p>

<h2>Step 2: Plan</h2>
<p>Write out your algorithm in plain English (or pseudocode) before writing PHP. This is where algorithmic thinking and pattern recognition shine.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Planning Example</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// PROBLEM: Find the most frequent word in a sentence

// Step 1: Understand
// Input: a string of words
// Output: the word that appears most often
// Rules: ignore case, ignore punctuation

// Step 2: Plan (pseudocode)
// 1. Convert sentence to lowercase
// 2. Remove punctuation
// 3. Split into words
// 4. Count occurrences of each word
// 5. Find the word with the highest count

// Step 3: Code
$sentence = "the cat sat on the mat and the cat liked the mat";

$sentence = strtolower($sentence);
$sentence = str_replace(",", "", $sentence);
$words = explode(" ", $sentence);

$counts = [];
foreach ($words as $word) {
    if (isset($counts[$word])) {
        $counts[$word]++;
    } else {
        $counts[$word] = 1;
    }
}

$maxCount = 0;
$maxWord = "";
foreach ($counts as $word => $count) {
    if ($count > $maxCount) {
        $maxCount = $count;
        $maxWord = $word;
    }
}

echo "Most frequent word: \\"$maxWord\\" (appears $maxCount times)\\n";
echo "\\nAll counts:\\n";
print_r($counts);
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

<h2>Step 3: Code</h2>
<p>Now write the PHP code. Start with the simplest version that works, then add features. Write one piece at a time and test as you go.</p>

<div class="info-box note">
    <div class="box-title">Coding Tips</div>
    <p class="mb-0">✓ Write one function or section at a time<br>
    ✓ Test with known inputs before moving on<br>
    ✓ Use meaningful variable names<br>
    ✓ Add comments explaining your logic<br>
    ✓ Don't aim for perfection — aim for working</p>
</div>

<h2>Step 4: Test</h2>
<p>Testing means checking your code with different inputs, especially edge cases. Don't just test with the example — test with your own inputs too.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Testing Your Solution</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Function to test: find the largest number
function findLargest($numbers) {
    if (empty($numbers)) {
        return null;
    }
    $largest = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] > $largest) {
            $largest = $numbers[$i];
        }
    }
    return $largest;
}

// Test Case 1: Normal case
$test1 = [3, 7, 2, 9, 5];
echo "Test 1: " . implode(",", $test1) . " -> " . findLargest($test1) . "\\n";

// Test Case 2: Single element
$test2 = [42];
echo "Test 2: " . implode(",", $test2) . " -> " . findLargest($test2) . "\\n";

// Test Case 3: All same values
$test3 = [5, 5, 5, 5];
echo "Test 3: " . implode(",", $test3) . " -> " . findLargest($test3) . "\\n";

// Test Case 4: Negative numbers
$test4 = [-3, -7, -1, -9];
echo "Test 4: " . implode(",", $test4) . " -> " . findLargest($test4) . "\\n";

// Test Case 5: Empty array
$test5 = [];
$result = findLargest($test5);
echo "Test 5: empty -> " . ($result === null ? "null (correct)" : $result) . "\\n";
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

<h2>Step 5: Reflect</h2>
<p>After your code works, ask: "Can I make this better?" This is where abstraction, DRY, and pattern recognition come together.</p>

<ul>
    <li>Is there repeated code I can extract into a function?</li>
    <li>Are there patterns I can reuse elsewhere?</li>
    <li>Is the code clear enough for someone else to understand?</li>
    <li>Are there edge cases I haven't handled?</li>
</ul>

<h2>Edge Cases</h2>
<p><strong>Edge cases</strong> are unusual inputs that might break your code. Good programmers always think about them.</p>

<table>
    <thead>
        <tr><th>Problem Type</th><th>Edge Cases to Consider</th></tr>
    </thead>
    <tbody>
        <tr><td>Arrays</td><td>Empty array, single element, all same values</td></tr>
        <tr><td>Strings</td><td>Empty string, very long string, special characters</td></tr>
        <tr><td>Numbers</td><td>Zero, negative, very large, decimal</td></tr>
        <tr><td>Loops</td><td>Zero iterations, one iteration, many iterations</td></tr>
    </tbody>
</table>

<h2>Starting Small</h2>
<p>When facing a big problem, start with the smallest version that works. Build up from there. This is called <strong>incremental development</strong>.</p>

<div class="info-box tip">
    <div class="box-title">Build Up Strategy</div>
    <p class="mb-0">1. Solve the simplest case first<br>
    2. Add one feature at a time<br>
    3. Test after each addition<br>
    4. Don't try to write the whole thing at once</p>
</div>

<h2>Your Journey Continues</h2>
<p>You now have a complete toolkit for thinking like a programmer:</p>

<ul>
    <li><strong>Debugging:</strong> Find and fix bugs systematically</li>
    <li><strong>Algorithmic Thinking:</strong> Break problems into clear steps</li>
    <li><strong>Pattern Recognition:</strong> See the similarities and abstract them</li>
    <li><strong>Problem-Solving Framework:</strong> Understand, Plan, Code, Test, Reflect</li>
</ul>

<div class="info-box tip">
    <div class="box-title">Final Advice</div>
    <p class="mb-0">Programming is not about memorizing syntax — it's about learning to think clearly. The syntax is easy; the thinking is the hard part. Practice problems, read other people's code, and never stop being curious. Every expert was once a beginner.</p>
</div>

<div class="exercise">
    <h4>Practice Problems</h4>
    <ol>
        <li><strong>Challenge:</strong> Write a function that takes a string and returns the number of vowels. Use the full framework: understand, plan, code, test, reflect.</li>
        <li><strong>Challenge:</strong> Given an array of numbers, return a new array with only the numbers that are both even and greater than 10. Apply abstraction — make it reusable.</li>
        <li><strong>Capstone:</strong> Build a simple quiz game: store questions and answers in an array, ask each question, check the answer, and keep score. Start with one question and build up.</li>
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
