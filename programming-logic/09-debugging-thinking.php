<?php $pageTitle = 'Debugging Thinking'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 9; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Debugging Thinking</h1>
    <p class="lesson-desc">Learn to think like a detective — finding and fixing bugs is a core programmer skill.</p>
</div>

<h2>Bugs Are Normal</h2>
<p>Every programmer writes code with bugs. Even experienced developers spend a significant portion of their time debugging. A <strong>bug</strong> is simply an error in your program — it could be a typo, a wrong formula, or an unexpected input.</p>

<div class="info-box tip">
    <div class="box-title">Mindset Shift</div>
    <p class="mb-0">Bugs are not a sign of failure. They are a normal part of programming. The difference between a beginner and an expert is that the expert has gotten faster at finding and fixing them.</p>
</div>

<p><strong>Think About It:</strong> How long did it take you to find the last bug in your code? What helped you find it?</p>

<h2>The Debugging Process</h2>
<p>Good debugging follows a systematic process. Think of yourself as a detective investigating a crime scene:</p>

<table>
    <thead>
        <tr><th>Step</th><th>Action</th><th>Question to Ask</th></tr>
    </thead>
    <tbody>
        <tr><td>1. Reproduce</td><td>Make the bug happen again</td><td>"Can I make this happen reliably?"</td></tr>
        <tr><td>2. Isolate</td><td>Narrow down where it happens</td><td>"Which part of the code causes this?"</td></tr>
        <tr><td>3. Understand</td><td>Figure out why it happens</td><td>"What is the code actually doing vs. what I expected?"</td></tr>
        <tr><td>4. Fix</td><td>Change the code</td><td>"What one change will correct this?"</td></tr>
        <tr><td>5. Test</td><td>Verify the fix works</td><td>"Does this fix the bug without breaking anything else?"</td></tr>
    </tbody>
</table>

<h2>Reading Error Messages</h2>
<p>PHP error messages are your friends, not your enemies. They tell you exactly what went wrong and where.</p>

<div class="syntax-ref">
    <h4>Error Message Anatomy</h4>
    <code>Parse error: syntax error, unexpected '}' in file.php on line 15</code>
    <code>│ Type of error │ Specific problem │ File │ Line number</code>
</div>

<div class="info-box note">
    <div class="box-title">Common Error Types</div>
    <p class="mb-0"><strong>Parse error:</strong> Your code has a syntax mistake (missing semicolon, unmatched bracket).<br>
    <strong>Notice:</strong> Something minor is wrong (undefined variable) but PHP continues.<br>
    <strong>Warning:</strong> Something unexpected happened but PHP continues.<br>
    <strong>Fatal error:</strong> Something so wrong PHP must stop immediately.</p>
</div>

<h2>Debugging Techniques</h2>
<h3>var_dump and print_r</h3>
<p>These functions let you inspect what's happening inside your variables:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Debugging with var_dump and print_r

$users = ["Alice", "Bob", "Charlie"];
$score = 85;

// var_dump shows type AND value
echo "=== var_dump ===" . "\\n";
var_dump($score);
echo "\\n";

// print_r shows arrays nicely
echo "=== print_r ===" . "\\n";
print_r($users);
echo "\\n";

// echo to check values at specific points
echo "=== Step-by-step check ===" . "\\n";
for ($i = 0; $i < count($users); $i++) {
    echo "Processing index $i: " . $users[$i] . "\\n";
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

<h3>Rubber Duck Debugging</h3>
<p>Explain your code line by line to someone (or something) who knows nothing about it. The act of explaining forces you to slow down and think clearly. Many bugs become obvious when you verbalize what the code does.</p>

<div class="info-box tip">
    <div class="box-title">Try This</div>
    <p class="mb-0">Next time you're stuck, grab a rubber duck (or any object) and explain your code to it. Say: "First I do this, then I check this, then I expect this to happen..." You'll be surprised how often you find the bug mid-sentence.</p>
</div>

<h2>Common Bug Types</h2>
<table>
    <thead>
        <tr><th>Bug Type</th><th>Example</th><th>How to Spot</th></tr>
    </thead>
    <tbody>
        <tr><td>Syntax</td><td>Missing semicolon, unclosed string</td><td>Parse error on specific line</td></tr>
        <tr><td>Logic</td><td>Wrong comparison operator (== vs =)</td><td>Code runs but gives wrong result</td></tr>
        <tr><td>Off-by-one</td><td>Loop goes one too many or too few times</td><td>Wrong number of iterations</td></tr>
        <tr><td>Runtime</td><td>Divide by zero, undefined variable</td><td>Works sometimes, crashes other times</td></tr>
    </tbody>
</table>

<h2>Practice Finding Bugs</h2>
<p>The following code has several bugs. Can you find and fix them?</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Find and Fix the Bugs</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Buggy code - find the errors!

// Bug 1: Missing semicolon
$names = ["Ana" "Ben" "Cat"]

// Bug 2: Wrong operator (should be count, not strlen)
for ($i = 0; $i < strlen($names); $i++) {
    echo $names[$i] . "\\n";
}

// Bug 3: Off-by-one error
$numbers = [10, 20, 30, 40, 50];
$sum = 0;
for ($i = 0; $i <= count($numbers); $i++) {
    $sum += $numbers[$i];
}
echo "Sum: $sum" . "\\n";

// Bug 4: Logic error
$temperature = 35;
if ($temperature = 30) {
    echo "It is exactly 30 degrees.";
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

<h2>Trace Through the Code</h2>
<p>Sometimes the best way to debug is to trace through the code line by line, writing down what each variable holds at each step.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Trace and Find the Bug</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// This code should find the largest number
// but it has a subtle bug. Trace through it.

$numbers = [3, 7, 2, 9, 5];
$largest = 0;

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] > $largest) {
        $largest = $numbers[$i];
    }
    echo "Step $i: checking " . $numbers[$i] . ", largest is now $largest" . "\\n";
}

echo "\\nFinal largest: $largest" . "\\n";

// Now test with negative numbers - does it still work?
$negatives = [-5, -1, -8, -3];
$largest = 0;

for ($i = 0; $i < count($negatives); $i++) {
    if ($negatives[$i] > $largest) {
        $largest = $negatives[$i];
    }
}

echo "Largest of negatives: $largest (should be -1)" . "\\n";
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

<h2>Prevention Strategies</h2>
<ul>
    <li><strong>Write one line at a time</strong> and test frequently — don't write 50 lines and then try to run it</li>
    <li><strong>Use meaningful variable names</strong> so you can tell what each variable is supposed to do</li>
    <li><strong>Add comments</strong> explaining what you expect each section to accomplish</li>
    <li><strong>Start with known inputs</strong> — if you test with values where you know the answer, you can verify your code works</li>
    <li><strong>Take breaks</strong> — fresh eyes catch bugs that tired eyes miss</li>
</ul>

<div class="info-box tip">
    <div class="box-title">The 15-Minute Rule</div>
    <p class="mb-0">If you've been stuck on a bug for more than 15 minutes without progress, step away. Take a walk, get water, or explain the problem to someone. When you come back, you'll often see the solution immediately.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a program that intentionally has 3 different types of bugs (syntax, logic, runtime). Then fix them one by one.</li>
        <li>Use var_dump to trace through a loop that calculates factorial. Find where the value changes unexpectedly.</li>
        <li>Explain a piece of buggy code to a rubber duck (or classmate) and see if the bug reveals itself.</li>
    </ol>
</div>

<p><strong>Remember:</strong> Every great programmer was once a beginner who spent hours staring at bugs. Debugging is not a punishment — it is a skill that makes you a stronger programmer.</p>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
