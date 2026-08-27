<?php $pageTitle = 'Flowcharts & Pseudocode'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<?php $num = 3; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Flowcharts &amp; Pseudocode</h1>
    <p class="lesson-desc">Learn to plan your programs before writing code — save time, catch errors early, and think clearly.</p>
</div>

<h2>Why Plan Before Coding?</h2>
<p>Imagine building a house without blueprints. You'd make mistakes, waste materials, and end up with something that doesn't work. The same happens when you code without planning.</p>
<p><strong>Flowcharts</strong> and <strong>pseudocode</strong> are your blueprints. They help you:</p>
<ul>
    <li>Think through the logic before writing syntax</li>
    <li>Spot errors early when they're easy to fix</li>
    <li>Communicate your plan to others</li>
    <li>Save time by reducing trial and error</li>
</ul>

<div class="info-box tip">
    <div class="box-title">Pro Tip</div>
    <p class="mb-0">Professional developers spend more time planning than beginners expect. A 30-minute plan can save hours of debugging.</p>
</div>

<h2>Flowcharts</h2>
<p>A flowchart is a visual diagram that shows the flow of a program using shapes and arrows. It makes logic visible and easy to follow.</p>

<h3>Common Flowchart Symbols</h3>
<table>
    <thead>
        <tr><th>Shape</th><th>Meaning</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td>Oval / Rounded Rectangle</td><td>Start or End</td><td>"Start", "End"</td></tr>
        <tr><td>Rectangle</td><td>Process / Action</td><td>"Add 1 to counter"</td></tr>
        <tr><td>Diamond</td><td>Decision (Yes/No)</td><td>"Is age >= 18?"</td></tr>
        <tr><td>Parallelogram</td><td>Input / Output</td><td>"Read name", "Print result"</td></tr>
        <tr><td>Arrow</td><td>Flow direction</td><td>Connects shapes in order</td></tr>
    </tbody>
</table>

<h3>Flowchart Example: Grade Calculator</h3>
<p>Let's plan a program that determines a letter grade from a numeric score:</p>

<div class="info-box note">
    <div class="box-title">Flowchart Steps</div>
    <p><strong>1.</strong> Start (Oval)<br>
    <strong>2.</strong> Input: Read score (Parallelogram)<br>
    <strong>3.</strong> Decision: Is score >= 90? (Diamond)<br>
    &nbsp;&nbsp;&nbsp;&nbsp;Yes → Grade = "A"<br>
    &nbsp;&nbsp;&nbsp;&nbsp;No → Decision: Is score >= 80?<br>
    <strong>4.</strong> ...continue checking ranges...<br>
    <strong>5.</strong> Output: Print grade (Parallelogram)<br>
    <strong>6.</strong> End (Oval)</p>
</div>

<h2>Pseudocode</h2>
<p>Pseudocode is English-like code that describes what a program does without using actual programming syntax. It's readable by humans and translates easily into real code.</p>

<h3>Pseudocode Example: Greeting</h3>
<div class="syntax-ref">
    <h4>Pseudocode</h4>
    <code>START</code><br>
    <code>&nbsp;&nbsp;READ name</code><br>
    <code>&nbsp;&nbsp;IF name is not empty THEN</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;PRINT "Hello, " + name</code><br>
    <code>&nbsp;&nbsp;ELSE</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;PRINT "Hello, Guest"</code><br>
    <code>&nbsp;&nbsp;END IF</code><br>
    <code>END</code>
</div>

<h3>Same Logic in PHP</h3>
<div class="syntax-ref">
    <h4>PHP Code</h4>
    <code>&lt;?php</code><br>
    <code>&nbsp;&nbsp;$name = "Alice";</code><br>
    <code>&nbsp;&nbsp;if (!empty($name)) {</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;echo "Hello, $name";</code><br>
    <code>&nbsp;&nbsp;} else {</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;echo "Hello, Guest";</code><br>
    <code>&nbsp;&nbsp;}</code><br>
    <code>?&gt;</code>
</div>

<div class="info-box note">
    <div class="box-title">Notice</div>
    <p class="mb-0">The pseudocode and the PHP code have the same structure. Pseudocode is just the logic without the syntax rules. Once you can write pseudocode, converting to PHP is straightforward.</p>
</div>

<h2>From Problem to Plan</h2>
<p>Let's walk through converting a real problem into both pseudocode and a flowchart:</p>

<h3>Problem: "Is this number even or odd?"</h3>

<h4>Pseudocode:</h4>
<div class="syntax-ref">
    <code>START</code><br>
    <code>&nbsp;&nbsp;READ number</code><br>
    <code>&nbsp;&nbsp;IF number MODULO 2 equals 0 THEN</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;PRINT "Even"</code><br>
    <code>&nbsp;&nbsp;ELSE</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;PRINT "Odd"</code><br>
    <code>&nbsp;&nbsp;END IF</code><br>
    <code>END</code>
</div>

<h4>PHP Translation:</h4>
<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$number = 7;

if ($number % 2 == 0) {
    echo "$number is Even";
} else {
    echo "$number is Odd";
}
echo "\n";

// Try different numbers
foreach ([10, 15, 22, 33, 40] as $num) {
    $result = ($num % 2 == 0) ? "Even" : "Odd";
    echo "$num is $result\n";
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

<h2>Practice Converting</h2>
<p>Try converting this problem to pseudocode, then to PHP:</p>

<div class="exercise">
    <h4>Problem</h4>
    <p>Write a program that takes a person's age and tells them if they can vote (18 or older) or not.</p>
</div>

<p><strong>Pseudocode:</strong></p>
<div class="syntax-ref">
    <code>START</code><br>
    <code>&nbsp;&nbsp;READ age</code><br>
    <code>&nbsp;&nbsp;IF age >= 18 THEN</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;PRINT "You can vote!"</code><br>
    <code>&nbsp;&nbsp;ELSE</code><br>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;PRINT "You cannot vote yet."</code><br>
    <code>&nbsp;&nbsp;END IF</code><br>
    <code>END</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Voting age check - translated from pseudocode
$age = 20;

if ($age >= 18) {
    echo "You can vote!";
} else {
    echo "You cannot vote yet.";
}
echo "\n\n";

// Test with multiple ages
$ages = [15, 17, 18, 21, 65];
foreach ($ages as $a) {
    $status = ($a >= 18) ? "Can vote" : "Cannot vote";
    echo "Age $a: $status\n";
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

<h2>More Complex Example</h2>
<p>Here's a slightly more complex problem — a simple calculator:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Simple calculator from pseudocode
// Pseudocode:
//   READ num1, operator, num2
//   IF operator is "+" THEN result = num1 + num2
//   ELSE IF operator is "-" THEN result = num1 - num2
//   ELSE IF operator is "*" THEN result = num1 * num2
//   ELSE IF operator is "/" THEN result = num1 / num2
//   PRINT result

$num1 = 10;
$operator = "+";
$num2 = 5;

switch ($operator) {
    case "+":
        $result = $num1 + $num2;
        break;
    case "-":
        $result = $num1 - $num2;
        break;
    case "*":
        $result = $num1 * $num2;
        break;
    case "/":
        $result = ($num2 != 0) ? $num1 / $num2 : "Error: division by zero";
        break;
    default:
        $result = "Unknown operator";
}

echo "$num1 $operator $num2 = $result\n";
'); ?></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Summary</h2>
<ul>
    <li><strong>Flowcharts</strong> are visual diagrams using shapes to represent logic flow</li>
    <li><strong>Pseudocode</strong> is English-like descriptions of program logic</li>
    <li>Both help you plan before coding, reducing errors and saving time</li>
    <li>Common flowchart symbols: Oval (start/end), Rectangle (process), Diamond (decision), Parallelogram (input/output)</li>
    <li>Pseudocode translates directly into real code with minimal changes</li>
</ul>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>