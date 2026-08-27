<?php $pageTitle = 'Pattern Recognition & Abstraction'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 11; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Pattern Recognition & Abstraction</h1>
    <p class="lesson-desc">Learn to spot repeated patterns in code and transform them into clean, reusable solutions.</p>
</div>

<h2>Patterns Are Everywhere</h2>
<p>Humans are pattern-recognition machines. You recognize faces, melodies, and seasons automatically. In programming, recognizing patterns is the key to writing cleaner, shorter, and more maintainable code.</p>

<p><strong>Think About It:</strong> Look at the code below. What pattern do you see repeated?</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Spot the Pattern</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Three separate greetings - notice the repetition?

$name1 = "Alice";
$age1 = 25;
echo "Hello, $name1! You are $age1 years old.\\n";
echo "Welcome to our program, $name1.\\n\\n";

$name2 = "Bob";
$age2 = 30;
echo "Hello, $name2! You are $age2 years old.\\n";
echo "Welcome to our program, $name2.\\n\\n";

$name3 = "Charlie";
$age3 = 22;
echo "Hello, $name3! You are $age3 years old.\\n";
echo "Welcome to our program, $name3.\\n\\n";

// The SAME two lines repeat with different data
// This is a pattern waiting to be abstracted!
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

<h2>Code Patterns</h2>
<p>Programmers encounter the same patterns over and over. Learning to recognize them gives you a vocabulary for thinking about code:</p>

<table>
    <thead>
        <tr><th>Pattern</th><th>What It Looks Like</th><th>Better Solution</th></tr>
    </thead>
    <tbody>
        <tr><td>Repeated logic</td><td>Same if/else block in multiple places</td><td>Extract into a function</td></tr>
        <tr><td>Repeated structure</td><td>Same loop doing slightly different things</td><td>Use a loop with parameters</td></tr>
        <tr><td>Repeated data</td><td>Many variables like $var1, $var2, $var3</td><td>Use an array</td></tr>
        <tr><td>Repeated code blocks</td><td>Copy-pasted sections</td><td>Extract into a reusable block</td></tr>
    </tbody>
</table>

<h2>From Repetition to Abstraction</h2>
<p><strong>Abstraction</strong> means hiding the complexity behind a simple interface. When you use <code>count()</code>, you don't need to know HOW it counts — you just use it. That's abstraction.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Before and After</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// BEFORE: Repeated pattern
function greetAlice() {
    echo "Hello, Alice!\\n";
    echo "Your score is: 95\\n";
    echo "Status: Excellent\\n\\n";
}

function greetBob() {
    echo "Hello, Bob!\\n";
    echo "Your score is: 82\\n";
    echo "Status: Good\\n\\n";
}

function greetCharlie() {
    echo "Hello, Charlie!\\n";
    echo "Your score is: 71\\n";
    echo "Status: Average\\n\\n";
}

greetAlice();
greetBob();
greetCharlie();

// AFTER: Abstracted into one reusable function
function greet($name, $score) {
    echo "Hello, $name!\\n";
    echo "Your score is: $score\\n";
    
    if ($score >= 90) {
        $status = "Excellent";
    } elseif ($score >= 80) {
        $status = "Good";
    } else {
        $status = "Average";
    }
    echo "Status: $status\\n\\n";
}

greet("Alice", 95);
greet("Bob", 82);
greet("Charlie", 71);
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

<h2>The DRY Principle in Action</h2>
<p><strong>DRY = Don't Repeat Yourself.</strong> Every piece of knowledge should have a single, unambiguous representation. If you find yourself copying and pasting code, that's a signal to abstract.</p>

<div class="info-box tip">
    <div class="box-title">The Rule of Three</div>
    <p class="mb-0">If you see the same pattern three times, abstract it. One time is a coincidence. Two times is a coincidence. Three times is a pattern that needs a function.</p>
</div>

<h2>Common Programming Patterns</h2>
<h3>The Accumulator Pattern</h3>
<p>Build up a result piece by piece:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Accumulator Pattern</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Accumulator: build a result step by step

$numbers = [1, 2, 3, 4, 5];

// Sum accumulator
$sum = 0;
foreach ($numbers as $num) {
    $sum += $num;
}
echo "Sum: $sum\\n";

// String accumulator
$words = ["PHP", "is", "fun"];
$sentence = "";
foreach ($words as $word) {
    $sentence .= $word . " ";
}
echo "Sentence: $sentence\\n";

// Array accumulator
$numbers2 = [1, 2, 3, 4, 5, 6, 7, 8];
$squares = [];
foreach ($numbers2 as $num) {
    $squares[] = $num * $num;
}
echo "Squares: " . implode(", ", $squares) . "\\n";
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

<h3>The Filter Pattern</h3>
<p>Keep only items that pass a test:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Filter Pattern</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Filter: keep only what passes a condition

$scores = [85, 42, 91, 67, 73, 58, 95, 36];

// Filter passing scores (>= 60)
$passing = [];
foreach ($scores as $score) {
    if ($score >= 60) {
        $passing[] = $score;
    }
}
echo "Passing scores: " . implode(", ", $passing) . "\\n";

// Filter even numbers
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evens = [];
foreach ($numbers as $num) {
    if ($num % 2 == 0) {
        $evens[] = $num;
    }
}
echo "Even numbers: " . implode(", ", $evens) . "\\n";

// Filter by length
$words = ["hi", "hello", "hey", "greetings", "yo"];
$longWords = [];
foreach ($words as $word) {
    if (strlen($word) > 3) {
        $longWords[] = $word;
    }
}
echo "Long words: " . implode(", ", $longWords) . "\\n";
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

<h2>Building Reusable Solutions</h2>
<p>When you recognize a pattern, you can build a reusable solution. The goal is to write code once and use it many times with different data.</p>

<div class="info-box note">
    <div class="box-title">Abstraction Checklist</div>
    <p class="mb-0">Before abstracting, ask yourself: (1) Is this pattern likely to repeat? (2) Is the underlying logic the same with different data? (3) Would a function make this clearer? If yes to any, abstract it.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Look at this code and identify the pattern: <code>$a = $b * 0.1; $c = $d * 0.1; $e = $f * 0.1;</code> — Write a function to replace it.</li>
        <li>Write a function called <code>transform</code> that takes an array and a operation name ("double", "square", "negate") and returns a new array with the operation applied to each element.</li>
        <li>Find three patterns in code you've already written this week. How could you abstract each one?</li>
    </ol>
</div>

<p><strong>Remember:</strong> Patterns are your friends. The more patterns you recognize, the faster you can solve new problems — because you've already solved similar ones before.</p>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
