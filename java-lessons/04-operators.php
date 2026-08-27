<?php $pageTitle = 'Java Operators'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 4; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Java Operators</h1>
    <p class="lesson-desc">Explore the full range of Java operators: arithmetic, comparison, logical, bitwise, and the ternary operator.</p>
</div>

<h2>Arithmetic Operators</h2>
<p>These operators perform mathematical calculations on numeric values.</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Name</th><th>Example</th><th>Result</th></tr>
    </thead>
    <tbody>
        <tr><td><code>+</code></td><td>Addition</td><td><code>7 + 3</code></td><td>10</td></tr>
        <tr><td><code>-</code></td><td>Subtraction</td><td><code>7 - 3</code></td><td>4</td></tr>
        <tr><td><code>*</code></td><td>Multiplication</td><td><code>7 * 3</code></td><td>21</td></tr>
        <tr><td><code>/</code></td><td>Division</td><td><code>7 / 2</code></td><td>3 (integer division)</td></tr>
        <tr><td><code>%</code></td><td>Modulus (remainder)</td><td><code>7 % 2</code></td><td>1</td></tr>
        <tr><td><code>++</code></td><td>Increment</td><td><code>i++</code></td><td>Adds 1 to i</td></tr>
        <tr><td><code>--</code></td><td>Decrement</td><td><code>i--</code></td><td>Subtracts 1 from i</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">Integer Division Warning</div>
    <p class="mb-0">When both operands are integers, Java performs <strong>integer division</strong>. <code>7 / 2</code> gives <code>3</code>, not <code>3.5</code>. To get decimal results, use <code>7.0 / 2</code> or cast: <code>(double) 7 / 2</code>.</p>
</div>

<h2>Comparison Operators</h2>
<p>These operators compare two values and return a <code>boolean</code> result.</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Meaning</th><th>Example</th><th>Result</th></tr>
    </thead>
    <tbody>
        <tr><td><code>==</code></td><td>Equal to</td><td><code>5 == 5</code></td><td>true</td></tr>
        <tr><td><code>!=</code></td><td>Not equal to</td><td><code>5 != 3</code></td><td>true</td></tr>
        <tr><td><code>&gt;</code></td><td>Greater than</td><td><code>7 &gt; 3</code></td><td>true</td></tr>
        <tr><td><code>&lt;</code></td><td>Less than</td><td><code>7 &lt; 3</code></td><td>false</td></tr>
        <tr><td><code>&gt;=</code></td><td>Greater or equal</td><td><code>7 &gt;= 7</code></td><td>true</td></tr>
        <tr><td><code>&lt;=</code></td><td>Less or equal</td><td><code>7 &lt;= 3</code></td><td>false</td></tr>
    </tbody>
</table>

<h2>Logical Operators</h2>
<p>Used to combine boolean expressions.</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Meaning</th><th>Example</th><th>Result</th></tr>
    </thead>
    <tbody>
        <tr><td><code>&amp;&amp;</code></td><td>Logical AND</td><td><code>true &amp;&amp; false</code></td><td>false</td></tr>
        <tr><td><code>||</code></td><td>Logical OR</td><td><code>true || false</code></td><td>true</td></tr>
        <tr><td><code>!</code></td><td>Logical NOT</td><td><code>!true</code></td><td>false</td></tr>
    </tbody>
</table>

<h3>Truth Table for AND and OR</h3>
<table>
    <thead>
        <tr><th>A</th><th>B</th><th>A &amp;&amp; B</th><th>A || B</th></tr>
    </thead>
    <tbody>
        <tr><td>true</td><td>true</td><td>true</td><td>true</td></tr>
        <tr><td>true</td><td>false</td><td>false</td><td>true</td></tr>
        <tr><td>false</td><td>true</td><td>false</td><td>true</td></tr>
        <tr><td>false</td><td>false</td><td>false</td><td>false</td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">Short-Circuit Evaluation</div>
    <p class="mb-0"><code>&amp;&amp;</code> and <code>||</code> use <strong>short-circuit</strong> logic. If the first operand determines the result, the second is never evaluated. For example, in <code>false &amp;&amp; anything</code>, the result is always false, so <code>anything</code> is skipped.</p>
</div>

<h2>Assignment Operators</h2>
<table>
    <thead>
        <tr><th>Operator</th><th>Equivalent To</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><code>=</code></td><td><code>x = 5</code></td><td>Assign 5 to x</td></tr>
        <tr><td><code>+=</code></td><td><code>x = x + 3</code></td><td>Add 3 to x</td></tr>
        <tr><td><code>-=</code></td><td><code>x = x - 2</code></td><td>Subtract 2 from x</td></tr>
        <tr><td><code>*=</code></td><td><code>x = x * 4</code></td><td>Multiply x by 4</td></tr>
        <tr><td><code>/=</code></td><td><code>x = x / 2</code></td><td>Divide x by 2</td></tr>
        <tr><td><code>%=</code></td><td><code>x = x % 3</code></td><td>Modulus x by 3</td></tr>
    </tbody>
</table>

<h2>Ternary Operator</h2>
<p>A compact one-line if-else: <code>condition ? valueIfTrue : valueIfFalse</code></p>

<pre><code>int age = 20;
String status = (age >= 18) ? "Adult" : "Minor";
// status is "Adult"</code></pre>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        int a = 10;
        int b = 3;

        System.out.println("=== Arithmetic ===");
        System.out.println("a + b = " + (a + b));
        System.out.println("a - b = " + (a - b));
        System.out.println("a * b = " + (a * b));
        System.out.println("a / b = " + (a / b));
        System.out.println("a % b = " + (a % b));

        System.out.println("\\n=== Comparison ===");
        System.out.println("a == b: " + (a == b));
        System.out.println("a != b: " + (a != b));
        System.out.println("a > b:  " + (a > b));
        System.out.println("a < b:  " + (a < b));

        System.out.println("\\n=== Logical ===");
        boolean x = true;
        boolean y = false;
        System.out.println("x && y: " + (x && y));
        System.out.println("x || y: " + (x || y));
        System.out.println("!x:     " + (!x));

        System.out.println("\\n=== Ternary ===");
        String result = (a > b) ? "a is bigger" : "b is bigger";
        System.out.println(result);
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
    <p class="mb-0">What is the difference between <code>=</code> and <code>==</code>? Why does confusing them cause bugs? Try using <code>=</code> inside an <code>if</code> condition to see what the compiler says.</p>
</div>

<h2>Bitwise Operators</h2>
<p>These operate on individual bits of integer values. They are less common but powerful for low-level programming.</p>

<table>
    <thead>
        <tr><th>Operator</th><th>Name</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td><code>&amp;</code></td><td>Bitwise AND</td><td>Sets bit to 1 if both bits are 1</td></tr>
        <tr><td><code>|</code></td><td>Bitwise OR</td><td>Sets bit to 1 if either bit is 1</td></tr>
        <tr><td><code>^</code></td><td>Bitwise XOR</td><td>Sets bit to 1 if bits are different</td></tr>
        <tr><td><code>~</code></td><td>Bitwise NOT</td><td>Inverts all bits</td></tr>
        <tr><td><code>&lt;&lt;</code></td><td>Left shift</td><td>Shifts bits left (multiplies by 2)</td></tr>
        <tr><td><code>&gt;&gt;</code></td><td>Right shift</td><td>Shifts bits right (divides by 2)</td></tr>
    </tbody>
</table>

<h2>Operator Precedence</h2>
<p>When an expression has multiple operators, Java follows <strong>precedence rules</strong> (like PEMDAS in math). Higher precedence operators are evaluated first.</p>

<div class="info-box note">
    <div class="box-title">When in Doubt, Use Parentheses</div>
    <p class="mb-0">Instead of memorizing precedence tables, use parentheses <code>( )</code> to make your intent explicit. <code>(a + b) * c</code> is always clearer than <code>a + b * c</code>.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>What is the result of <code>10 / 3</code>? What about <code>10.0 / 3</code>? Why are they different?</li>
        <li>Write a ternary expression that checks if a number is even or odd</li>
        <li>Use compound assignment (<code>+=</code>) to double a variable 5 times in a row. What is the final value?</li>
        <li>Construct a truth table for <code>(A || B) &amp;&amp; !C</code> with all possible combinations</li>
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