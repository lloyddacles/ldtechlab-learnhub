<?php $pageTitle = 'Conditional Logic'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson 5</span>
    <h1>Conditional Logic</h1>
    <p class="lesson-desc">Learn to think in decisions — every conditional is just asking a question and acting on the answer.</p>
</div>

<div class="info-box tip">
    <div class="box-title">Core Idea</div>
    <p class="mb-0">Every <code>if</code> statement is a <strong>question</strong>. "Is the user logged in?" "Is the score passing?" "Is the file open?" Frame your logic as questions, and the code writes itself.</p>
</div>

<h2>Decisions Are Questions</h2>
<p>Real life is full of decisions: If it's raining, grab an umbrella. If the light is red, stop. If you're hungry, eat. Programming works the same way — you ask a question, and based on the answer (true or false), you take different actions.</p>
<p>The <code>if</code> statement is how PHP asks a question:</p>

<div class="syntax-ref">
    <h4>Syntax: if Statement</h4>
    <code>if (condition) {</code>
    <code>&nbsp;&nbsp;// runs when condition is TRUE</code>
    <code>}</code>
</div>

<h2>If / Else / Elseif</h2>
<p>Use <code>else</code> for the "otherwise" case, and <code>elseif</code> for multiple alternatives:</p>

<div class="syntax-ref">
    <h4>Syntax: if / elseif / else</h4>
    <code>if (condition1) {</code>
    <code>&nbsp;&nbsp;// runs when condition1 is true</code>
    <code>} elseif (condition2) {</code>
    <code>&nbsp;&nbsp;// runs when condition1 false, condition2 true</code>
    <code>} else {</code>
    <code>&nbsp;&nbsp;// runs when all conditions are false</code>
    <code>}</code>
</div>

<div class="info-box note">
    <div class="box-title">Real-World Example: Traffic Light</div>
    <p>A traffic light asks "What color am I?" Green → go, Yellow → slow down, Red → stop. That's <code>if / elseif / else</code> in action.</p>
</div>

<h2>Boolean Logic</h2>
<p>Conditions return <code>true</code> or <code>false</code>. You combine conditions using logical operators:</p>

<table>
    <thead><tr><th>Operator</th><th>Name</th><th>Meaning</th></tr></thead>
    <tbody>
        <tr><td><code>&&</code></td><td>AND</td><td>Both must be true</td></tr>
        <tr><td><code>||</code></td><td>OR</td><td>At least one must be true</td></tr>
        <tr><td><code>!</code></td><td>NOT</td><td>Reverses true/false</td></tr>
    </tbody>
</table>

<h2>Truth Tables</h2>
<p>Truth tables show every possible combination. Memorize these — they're the foundation of all logic:</p>

<table>
    <thead><tr><th>A</th><th>B</th><th>A && B</th><th>A || B</th><th>!A</th></tr></thead>
    <tbody>
        <tr><td>true</td><td>true</td><td>true</td><td>true</td><td>false</td></tr>
        <tr><td>true</td><td>false</td><td>false</td><td>true</td><td>false</td></tr>
        <tr><td>false</td><td>true</td><td>false</td><td>true</td><td>true</td></tr>
        <tr><td>false</td><td>false</td><td>false</td><td>false</td><td>true</td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">Think About It</div>
    <p>If <code>$age >= 18</code> is true and <code>$hasID</code> is false, what does <code>$age >= 18 && $hasID</code> evaluate to? (Answer: false — both must be true for AND.)</p>
</div>

<h2>Comparison Operators</h2>
<table>
    <thead><tr><th>Operator</th><th>Meaning</th><th>Example</th></tr></thead>
    <tbody>
        <tr><td><code>==</code></td><td>Equal value</td><td><code>5 == "5"</code> → true</td></tr>
        <tr><td><code>===</code></td><td>Equal value AND type</td><td><code>5 === "5"</code> → false</td></tr>
        <tr><td><code>!=</code></td><td>Not equal</td><td><code>5 != 3</code> → true</td></tr>
        <tr><td><code>!==</code></td><td>Not identical</td><td><code>5 !== "5"</code> → true</td></tr>
        <tr><td><code>&gt;</code> <code>&lt;</code> <code>&gt;=</code> <code>&lt;=</code></td><td>Greater/Less than</td><td><code>10 &gt; 5</code> → true</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">Use === Whenever Possible</div>
    <p class="mb-0"><code>==</code> does type juggling (<code>0 == "foo"</code> is true!). <code>===</code> is stricter and prevents surprising bugs.</p>
</div>

<h2>Nested Conditions</h2>
<p>You can put conditions inside other conditions, but keep nesting shallow for readability:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$age = 25;
$hasLicense = true;

if ($age >= 18) {
    echo "Old enough to drive.\\n";
    if ($hasLicense) {
        echo "Has a license — go ahead!";
    } else {
        echo "No license — cannot drive yet.";
    }
} else {
    echo "Too young to drive.";
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

<h2>Guard Clauses</h2>
<p>A <strong>guard clause</strong> handles edge cases first and returns early, reducing nesting:</p>

<div class="syntax-ref">
    <h4>Pattern: Guard Clause</h4>
    <code>function process($user) {</code>
    <code>&nbsp;&nbsp;if (!$user) return "No user";</code>
    <code>&nbsp;&nbsp;if (!$user['active']) return "Inactive";</code>
    <code>&nbsp;&nbsp;// Main logic here — no nesting!</code>
    <code>}</code>
</div>

<h2>Common Logic Mistakes</h2>
<table>
    <thead><tr><th>Mistake</th><th>Example</th><th>Fix</th></tr></thead>
    <tbody>
        <tr><td>Off-by-one</td><td><code>for ($i=0; $i<=10; $i++)</code> loops 11 times</td><td><code>$i &lt; 10</code> for exactly 10</td></tr>
        <tr><td>Wrong operator</td><td><code>=</code> instead of <code>==</code></td><td>Assignment vs comparison</td></tr>
        <tr><td>Missing else</td><td>No fallback for unexpected input</td><td>Always handle the else case</td></tr>
        <tr><td>Confusing && and ||</td><td>Wrong grouping of conditions</td><td>Draw a truth table</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Build a Grading System</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
function getGrade($score) {
    if (!is_numeric($score) || $score < 0 || $score > 100) {
        return "Invalid score";
    }
    if ($score >= 90) return "A";
    if ($score >= 80) return "B";
    if ($score >= 70) return "C";
    if ($score >= 60) return "D";
    return "F";
}

$scores = [95, 82, 74, 61, 55, -5, 105, 78];
foreach ($scores as $s) {
    echo "Score {$s} → Grade: " . getGrade($s) . "\\n";
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

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Fix Broken Conditional Logic</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// This code has bugs — can you spot them?
// Fix the logic so it works correctly.

$temperature = 35;
$isRaining = false;

// BUG: Uses = instead of ==
if ($isRaining = true) {
    echo "Take an umbrella!\\n";
}

// BUG: Wrong comparison
if ($temperature > 30) {
    echo "It is NOT hot outside.\\n";
} else {
    echo "It is hot outside.\\n";
}

// FIXED version:
echo "--- Fixed ---\\n";
if ($isRaining === true) {
    echo "Take an umbrella!\\n";
} else {
    echo "No umbrella needed.\\n";
}
if ($temperature > 30) {
    echo "It is hot outside.\\n";
} else {
    echo "It is NOT hot outside.\\n";
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

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a program that checks if a number is positive, negative, or zero</li>
        <li>Create a login validator: username must be at least 3 chars, password at least 8 chars</li>
        <li>Write a leap year checker: divisible by 4, but not by 100 unless also by 400</li>
        <li>Draw a truth table for <code>(A || B) && !C</code> — does the order of operations matter?</li>
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
