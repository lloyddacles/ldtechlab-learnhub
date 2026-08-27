<?php $pageTitle = 'Java Syntax Basics'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 2; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Java Syntax Basics</h1>
    <p class="lesson-desc">Master the fundamental building blocks of Java: classes, methods, statements, and how to output text to the console.</p>
</div>

<h2>Program Structure</h2>
<p>Every Java program follows a predictable structure. At the top level, everything lives inside a <strong>class</strong>. Inside the class, the program starts at the <code>main</code> method.</p>

<pre><code>public class MyClass {
    public static void main(String[] args) {
        // Your code goes here
    }
}</code></pre>

<table>
    <thead>
        <tr><th>Keyword</th><th>Meaning</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>public</strong></td><td>Accessible from anywhere</td></tr>
        <tr><td><strong>class</strong></td><td>Defines a class (blueprint for objects)</td></tr>
        <tr><td><strong>static</strong></td><td>Belongs to the class, not an instance</td></tr>
        <tr><td><strong>void</strong></td><td>Method returns nothing</td></tr>
        <tr><td><strong>main</strong></td><td>Entry point of the program</td></tr>
        <tr><td><strong>String[] args</strong></td><td>Command-line arguments</td></tr>
    </tbody>
</table>

<h2>Statements and Semicolons</h2>
<p>In Java, every <strong>statement</strong> must end with a <strong>semicolon</strong> <code>;</code>. This tells the compiler where one instruction ends and the next begins. Missing a semicolon is the most common beginner error.</p>

<div class="info-box note">
    <div class="box-title">Analogy</div>
    <p class="mb-0">Think of semicolons like periods at the end of sentences. Without them, the reader (compiler) cannot tell where one thought ends.</p>
</div>

<h2>Code Blocks</h2>
<p>Code blocks are groups of statements enclosed in <strong>curly braces</strong> <code>{ }</code>. They define scope&mdash;where variables and instructions live.</p>

<pre><code>public class Example {
    public static void main(String[] args) {  // outer block starts
        int x = 10;
        if (x > 5) {  // inner block starts
            System.out.println("x is greater than 5");
        }  // inner block ends
    }  // outer block ends
}</code></pre>

<h2>Comments</h2>
<p>Comments are ignored by the compiler. Use them to explain your code to other developers (or your future self).</p>

<table>
    <thead>
        <tr><th>Type</th><th>Syntax</th><th>Use Case</th></tr>
    </thead>
    <tbody>
        <tr><td>Single-line</td><td><code>// This is a comment</code></td><td>Quick notes on one line</td></tr>
        <tr><td>Multi-line</td><td><code>/* ... */</code></td><td>Explanations spanning several lines</td></tr>
        <tr><td>Javadoc</td><td><code>/** ... */</code></td><td>API documentation for classes and methods</td></tr>
    </tbody>
</table>

<h2>Printing to the Console</h2>
<p>Java provides the <code>System.out</code> object for output. There are two main methods:</p>

<table>
    <thead>
        <tr><th>Method</th><th>Behavior</th></tr>
    </thead>
    <tbody>
        <tr><td><code>System.out.println()</code></td><td>Prints text and moves to the next line</td></tr>
        <tr><td><code>System.out.print()</code></td><td>Prints text without a newline</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        System.out.println("=== Java Syntax Basics ===");
        System.out.println();
        System.out.println("Line 1: Variables store data.");
        System.out.println("Line 2: Statements perform actions.");
        System.out.print("Line 3: ");
        System.out.println("print keeps you on the same line.");
        System.out.println();
        System.out.println("=== End of Program ===");
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
    <p class="mb-0">What happens if you call <code>System.out.print()</code> multiple times in a row? Where does the cursor end up? Try it in the sandbox above.</p>
</div>

<h2>Naming Conventions</h2>
<p>Java has strict naming rules and strong community conventions:</p>

<table>
    <thead>
        <tr><th>Element</th><th>Convention</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td>Class names</td><td>PascalCase</td><td><code>MyClass</code>, <code>StudentRecord</code></td></tr>
        <tr><td>Method names</td><td>camelCase</td><td><code>calculateTotal</code>, <code>getName</code></td></tr>
        <tr><td>Variable names</td><td>camelCase</td><td><code>studentName</code>, <code>totalScore</code></td></tr>
        <tr><td>Constants</td><td>UPPER_SNAKE_CASE</td><td><code>MAX_SIZE</code>, <code>PI</code></td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">Rule vs Convention</div>
    <p class="mb-0">Rules like "no spaces in names" are <strong>enforced by the compiler</strong>. Conventions like PascalCase are <strong>not enforced</strong> but following them makes your code readable to other Java developers.</p>
</div>

<h2>Putting It All Together</h2>
<p>Here is a more complete program that uses comments, variables, and multiple print statements:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        // This program demonstrates basic Java syntax
        String courseName = "Java Fundamentals";
        int lessonCount = 10;

        /* Display course information
           This is a multi-line comment */
        System.out.println("Course: " + courseName);
        System.out.println("Lessons: " + lessonCount);
        System.out.println("Status: In Progress");
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
        <li>Write a program that prints a box pattern using <code>System.out.println()</code> with asterisks</li>
        <li>Use <code>System.out.print()</code> to display your name, age, and city on a single line</li>
        <li>Add single-line and multi-line comments to explain what your code does</li>
        <li>What error do you get if you forget the closing brace <code>}</code>?</li>
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