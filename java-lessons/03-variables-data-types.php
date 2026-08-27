<?php $pageTitle = 'Variables & Data Types'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 3; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Variables &amp; Data Types</h1>
    <p class="lesson-desc">Learn how Java stores data in variables, the difference between primitive and reference types, and how to choose the right data type.</p>
</div>

<h2>What Is a Variable?</h2>
<p>A <strong>variable</strong> is a named container that holds a value. In Java, every variable has a <strong>type</strong> that determines what kind of data it can store. Unlike dynamically typed languages, Java requires you to declare the type before using a variable.</p>

<pre><code>int age = 25;          // Declare an int variable named age
double price = 19.99;  // Declare a double variable named price
String name = "Alice"; // Declare a String reference type</code></pre>

<h2>Primitive Data Types</h2>
<p>Java has <strong>8 primitive types</strong>. These are the building blocks. They store actual values, not references to objects.</p>

<table>
    <thead>
        <tr><th>Type</th><th>Size</th><th>Range / Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>byte</strong></td><td>1 byte</td><td>-128 to 127</td><td><code>byte b = 100;</code></td></tr>
        <tr><td><strong>short</strong></td><td>2 bytes</td><td>-32,768 to 32,767</td><td><code>short s = 30000;</code></td></tr>
        <tr><td><strong>int</strong></td><td>4 bytes</td><td>-2.1 billion to 2.1 billion</td><td><code>int i = 42;</code></td></tr>
        <tr><td><strong>long</strong></td><td>8 bytes</td><td>Very large numbers</td><td><code>long l = 100000L;</code></td></tr>
        <tr><td><strong>float</strong></td><td>4 bytes</td><td>Decimal (6-7 decimal digits)</td><td><code>float f = 3.14f;</code></td></tr>
        <tr><td><strong>double</strong></td><td>8 bytes</td><td>Decimal (15 decimal digits)</td><td><code>double d = 3.14159;</code></td></tr>
        <tr><td><strong>char</strong></td><td>2 bytes</td><td>Single Unicode character</td><td><code>char c = 'A';</code></td></tr>
        <tr><td><strong>boolean</strong></td><td>1 bit</td><td>true or false</td><td><code>boolean flag = true;</code></td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">When to Use Each Type</div>
    <p class="mb-0">Use <code>int</code> for whole numbers (most common). Use <code>double</code> for decimals (default). Use <code>long</code> only when numbers exceed 2 billion. Use <code>char</code> for single characters. Use <code>boolean</code> for true/false conditions.</p>
</div>

<h2>Reference Types</h2>
<p>Reference types point to objects in memory rather than storing the value directly. They include:</p>
<ul>
    <li><code>String</code> &mdash; sequences of characters</li>
    <li>Arrays &mdash; collections of values</li>
    <li>Classes and interfaces you create</li>
</ul>

<div class="info-box note">
    <div class="box-title">Primitive vs Reference</div>
    <p class="mb-0">Primitive types store the actual value. Reference types store a <strong>memory address</strong> pointing to the object. This is why <code>String</code> is not a primitive but <code>int</code> is.</p>
</div>

<h2>Naming Rules</h2>
<table>
    <thead>
        <tr><th>Rule</th><th>Valid</th><th>Invalid</th></tr>
    </thead>
    <tbody>
        <tr><td>Must start with letter, $, or _</td><td><code>_name</code>, <code>$value</code></td><td><code>2name</code></td></tr>
        <tr><td>Can contain letters, digits, $, _</td><td><code>student_name</code></td><td><code>student-name</code></td></tr>
        <tr><td>Cannot be a reserved keyword</td><td><code>myClass</code></td><td><code>class</code></td></tr>
        <tr><td>Case-sensitive</td><td><code>count</code> vs <code>Count</code></td><td>They are different variables</td></tr>
    </tbody>
</table>

<h2>The final Keyword</h2>
<p>Declare a constant with <code>final</code>. Once assigned, it cannot change.</p>

<pre><code>final double PI = 3.14159;
final String GREETING = "Hello";
// PI = 3.0;  // This would cause a compile error!</code></pre>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        // Primitive types
        byte smallNum = 127;
        short mediumNum = 32000;
        int bigNum = 2000000000;
        long hugeNum = 9000000000L;

        float decimal1 = 3.14f;
        double decimal2 = 3.14159265;

        char letter = \'J\';
        boolean isJavaFun = true;

        // Reference type
        String language = "Java";

        // Print all values
        System.out.println("byte:    " + smallNum);
        System.out.println("short:   " + mediumNum);
        System.out.println("int:     " + bigNum);
        System.out.println("long:    " + hugeNum);
        System.out.println("float:   " + decimal1);
        System.out.println("double:  " + decimal2);
        System.out.println("char:    " + letter);
        System.out.println("boolean: " + isJavaFun);
        System.out.println("String:  " + language);
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
    <p class="mb-0">What happens if you try to store the value 200 in a <code>byte</code> variable? Since byte maxes out at 127, will Java give you an error or silently wrap around? Try it!</p>
</div>

<h2>Type Casting</h2>
<p>Java sometimes converts types automatically, and sometimes you must do it manually:</p>

<table>
    <thead>
        <tr><th>Cast Type</th><th>Direction</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Widening</strong></td><td>Small &rarr; Large (automatic)</td><td><code>int x = 10; double y = x;</code></td></tr>
        <tr><td><strong>Narrowing</strong></td><td>Large &rarr; Small (manual)</td><td><code>double d = 9.99; int i = (int) d;</code></td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Declare variables for your name, age, height (in meters), and whether you are a student</li>
        <li>Print each variable with a descriptive label using <code>System.out.println()</code></li>
        <li>What is the largest value an <code>int</code> can hold? What about a <code>long</code>?</li>
        <li>Try assigning <code>3.14</code> to an <code>int</code> without casting. What error do you get?</li>
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