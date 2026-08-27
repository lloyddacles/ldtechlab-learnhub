<?php
$pageTitle = 'PHP Conditionals';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 9;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Conditionals</h1>
    <p class="lesson-desc">Make your programs make decisions using if, elseif, else, and switch statements.</p>
</div>

<h2>The if Statement</h2>
<p>The <code>if</code> statement executes code only when a condition is true:</p>

<div class="syntax-ref">
    <h4>Syntax: if Statement</h4>
    <code>if (condition) {</code>
    <code>&nbsp;&nbsp;// Code runs only if condition is true</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$age = 20;

// Simple if statement
if ($age >= 18) {
    echo "You are an adult.";
    echo "\n";
}

// Condition is false - nothing happens
if ($age >= 65) {
    echo "This won\'t print because age is 20, not 65+.";
    echo "\n";
}

// You can use any expression that returns a boolean
 $temperature = 30;
if ($temperature > 25) {
    echo "It\'s warm outside!";
    echo "\n";
}

$name = "Alice";
if (strlen($name) > 3) {
    echo "$name has more than 3 characters.";
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

<h2>The if...else Statement</h2>
<p>Use <code>else</code> to run code when the condition is false:</p>

<div class="syntax-ref">
    <h4>Syntax: if...else Statement</h4>
    <code>if (condition) {</code>
    <code>&nbsp;&nbsp;// Runs when true</code>
    <code>} else {</code>
    <code>&nbsp;&nbsp;// Runs when false</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$score = 75;

if ($score >= 60) {
    echo "You passed with a score of $score!";
    echo "\n";
} else {
    echo "You failed with a score of $score.";
    echo "\n";
}

// Ternary vs if/else comparison
$age = 15;

// Using ternary (short)
$status = ($age >= 18) ? "Adult" : "Minor";
echo "Ternary: $status";
echo "\n";

// Using if/else (equivalent)
if ($age >= 18) {
    echo "If/else: Adult";
} else {
    echo "\nIf/else: Minor";
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

<h2>The if...elseif...else Statement</h2>
<p>Check multiple conditions in sequence:</p>

<div class="syntax-ref">
    <h4>Syntax: if...elseif...else</h4>
    <code>if (condition1) {</code>
    <code>&nbsp;&nbsp;// Runs if condition1 is true</code>
    <code>} elseif (condition2) {</code>
    <code>&nbsp;&nbsp;// Runs if condition1 is false AND condition2 is true</code>
    <code>} else {</code>
    <code>&nbsp;&nbsp;// Runs if all conditions are false</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Grade calculator
$score = 85;

if ($score >= 90) {
    $grade = "A";
    $remark = "Excellent!";
} elseif ($score >= 80) {
    $grade = "B";
    $remark = "Great job!";
} elseif ($score >= 70) {
    $grade = "C";
    $remark = "Good work!";
} elseif ($score >= 60) {
    $grade = "D";
    $remark = "You passed.";
} else {
    $grade = "F";
    $remark = "You need to study more.";
}

echo "Score: $score";
echo "\n";
echo "Grade: $grade";
echo "\n";
echo "Remark: $remark";
echo "\n\n";

// Time-based greeting
$hour = 14;  // 2:00 PM (24-hour format)

if ($hour < 12) {
    echo "Good Morning!";
} elseif ($hour < 17) {
    echo "Good Afternoon!";
} elseif ($hour < 21) {
    echo "Good Evening!";
} else {
    echo "Good Night!";
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

<h2>The switch Statement</h2>
<p>Use <code>switch</code> when comparing one value against many possible matches:</p>

<div class="syntax-ref">
    <h4>Syntax: switch Statement</h4>
    <code>switch ($value) {</code>
    <code>&nbsp;&nbsp;case "match1":</code>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;// Code for match1</code>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;break;</code>
    <code>&nbsp;&nbsp;case "match2":</code>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;// Code for match2</code>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;break;</code>
    <code>&nbsp;&nbsp;default:</code>
    <code>&nbsp;&nbsp;&nbsp;&nbsp;// Code if no match</code>
    <code>}</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$day = "Wednesday";

echo "Today is $day\n";

switch ($day) {
    case "Monday":
        echo "Start of the work week!";
        break;
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
        echo "Mid-week workday.";
        break;
    case "Friday":
        echo "Almost the weekend!";
        break;
    case "Saturday":
    case "Sunday":
        echo "Weekend! Time to rest.";
        break;
    default:
        echo "Invalid day?";
}
echo "\n\n";

// Switch with numbers
$month = 7;

switch ($month) {
    case 12: case 1: case 2:
        echo "Winter";
        break;
    case 3: case 4: case 5:
        echo "Spring";
        break;
    case 6: case 7: case 8:
        echo "Summer";
        break;
    case 9: case 10: case 11:
        echo "Fall";
        break;
    default:
        echo "Invalid month";
}
echo " (Month $month)";
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

<div class="info-box warning">
    <div class="box-title">Don't Forget break!</div>
    <p class="mb-0">Without <code>break</code>, PHP will "fall through" and execute the next case's code too. This is sometimes intentional but usually a bug.</p>
</div>

<h2>Nested Conditionals</h2>
<p>You can put if statements inside other if statements, but avoid deep nesting for readability.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$age = 25;
$hasLicense = true;

if ($age >= 18) {
    echo "You are old enough to drive.\n";
    
    if ($hasLicense) {
        echo "You have a license. Drive safely!";
    } else {
        echo "But you need a license first.";
    }
} else {
    echo "You are too young to drive.";
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
        <li>Write a BMI calculator: under 18.5 = "Underweight", 18.5-24.9 = "Normal", 25-29.9 = "Overweight", 30+ = "Obese"</li>
        <li>Create a simple calculator: take two numbers and an operator (+, -, *, /), use switch to perform the operation</li>
        <li>Write a program that checks if a year is a leap year (divisible by 4, but not by 100 unless also by 400)</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug']) ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug']) ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
