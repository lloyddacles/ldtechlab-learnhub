<?php $pageTitle = 'Conditional Statements'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 5; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Conditional Statements</h1>
    <p class="lesson-desc">Learn how to make your programs decide between different paths using if/else, switch-case, and the ternary operator.</p>
</div>

<h2>The if Statement</h2>
<p>The <code>if</code> statement evaluates a boolean condition and executes a block only when the condition is <code>true</code>.</p>

<pre><code>int temperature = 35;
if (temperature > 30) {
    System.out.println("It is hot outside!");
}</code></pre>

<h2>if-else</h2>
<p>Add an <code>else</code> block to handle the case when the condition is <code>false</code>.</p>

<pre><code>int hour = 14;
if (hour < 12) {
    System.out.println("Good morning!");
} else {
    System.out.println("Good afternoon!");
}</code></pre>

<h2>if-else if-else Chain</h2>
<p>When you have multiple conditions, chain them with <code>else if</code>.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        int score = 85;
        String grade;

        if (score >= 90) {
            grade = "A";
        } else if (score >= 80) {
            grade = "B";
        } else if (score >= 70) {
            grade = "C";
        } else if (score >= 60) {
            grade = "D";
        } else {
            grade = "F";
        }

        System.out.println("Score: " + score);
        System.out.println("Grade: " + grade);
    }
}') ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box tip">
    <div class="box-title">Think About It</div>
    <p class="mb-0">What happens if you change <code>score</code> to exactly 90? Which condition catches it? What about 89? Trace through the logic to predict the output before running the code.</p>
</div>

<h2>Switch-Case Statement</h2>
<p>When comparing one variable against many specific values, <code>switch</code> is cleaner than a long <code>if-else</code> chain.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        int day = 3;
        String dayName;

        switch (day) {
            case 1:
                dayName = "Monday";
                break;
            case 2:
                dayName = "Tuesday";
                break;
            case 3:
                dayName = "Wednesday";
                break;
            case 4:
                dayName = "Thursday";
                break;
            case 5:
                dayName = "Friday";
                break;
            case 6:
                dayName = "Saturday";
                break;
            case 7:
                dayName = "Sunday";
                break;
            default:
                dayName = "Invalid day";
                break;
        }

        System.out.println("Day " + day + " is " + dayName);
    }
}') ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box note">
    <div class="box-title">Don't Forget break!</div>
    <p class="mb-0">Each <code>case</code> must end with <code>break</code>. Without it, Java executes the matching case <strong>and all cases below it</strong> (fall-through). This can be a bug or a feature, depending on your intent.</p>
</div>

<h2>Enhanced Switch (Java 14+)</h2>
<p>Modern Java offers a cleaner switch syntax using <code>-&gt;</code> arrows. No <code>break</code> needed.</p>

<pre><code>int day = 3;
String dayName = switch (day) {
    case 1 -> "Monday";
    case 2 -> "Tuesday";
    case 3 -> "Wednesday";
    case 4 -> "Thursday";
    case 5 -> "Friday";
    case 6 -> "Saturday";
    case 7 -> "Sunday";
    default -> "Invalid day";
};
System.out.println(dayName);</code></pre>

<h2>Ternary Operator</h2>
<p>For simple if-else assignments, the ternary operator <code>condition ? a : b</code> saves lines.</p>

<pre><code>int age = 20;
String type = (age >= 18) ? "Adult" : "Minor";
System.out.println(type);  // prints "Adult"</code></pre>

<h2>Short-Circuit Evaluation</h2>
<p>The <code>&amp;&amp;</code> and <code>||</code> operators short-circuit:</p>
<ul>
    <li><code>&amp;&amp;</code> &mdash; If the left side is <code>false</code>, the right side is <strong>never checked</strong></li>
    <li><code>||</code> &mdash; If the left side is <code>true</code>, the right side is <strong>never checked</strong></li>
</ul>

<pre><code>// Safe null check using short-circuit
if (name != null &amp;&amp; name.length() > 0) {
    System.out.println("Name is: " + name);
}
// If name is null, name.length() is never called (no crash!)</code></pre>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        // Nested conditionals
        int age = 25;
        boolean hasID = true;

        if (age >= 18) {
            if (hasID) {
                System.out.println("Entry allowed.");
            } else {
                System.out.println("Please show your ID.");
            }
        } else {
            System.out.println("Sorry, you must be 18+.");
        }

        // Combining conditions
        String role = "admin";
        int years = 5;

        if (role.equals("admin") || years > 3) {
            System.out.println("Full access granted.");
        }
    }
}') ?>"></textarea>
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
        <li>Write a program that takes an integer (1-12) and prints the corresponding month name using switch</li>
        <li>Create a grade calculator: input a score (0-100), output letter grade (A/B/C/D/F)</li>
        <li>Use a ternary operator to find the maximum of two numbers without if-else</li>
        <li>Write a nested if that checks if a year is a leap year (divisible by 4, except centuries unless divisible by 400)</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'java-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'java-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>