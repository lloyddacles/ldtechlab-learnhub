<?php $pageTitle = 'Introduction to Java'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 1; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Introduction to Java</h1>
    <p class="lesson-desc">Discover what Java is, why it dominates the programming world, and how to write your very first program.</p>
</div>

<h2>What Is Java?</h2>
<p>Java is a <strong>high-level, object-oriented, class-based programming language</strong> designed to have as few implementation dependencies as possible. It was created by <strong>James Gosling</strong> at Sun Microsystems and released in <strong>1995</strong>. Today, Java is owned by Oracle and runs on billions of devices worldwide.</p>

<div class="info-box tip">
    <div class="box-title">Why Learn Java?</div>
    <ul>
        <li><strong>Versatility:</strong> Android apps, enterprise systems, web backends, IoT devices</li>
        <li><strong>Job Market:</strong> One of the most in-demand languages for software engineers</li>
        <li><strong>Community:</strong> Massive ecosystem with libraries, frameworks, and support</li>
        <li><strong>Foundation:</strong> Teaches OOP concepts that transfer to C#, C++, and more</li>
    </ul>
</div>

<h2>Write Once, Run Anywhere</h2>
<p>Java's famous motto is <strong>"Write Once, Run Anywhere" (WORA)</strong>. Unlike languages that compile to machine code for a specific platform, Java compiles to <strong>bytecode</strong>, which runs on the <strong>Java Virtual Machine (JVM)</strong>. This means the same Java program can run on Windows, macOS, Linux, or any device with a JVM.</p>

<table>
    <thead>
        <tr><th>Component</th><th>Role</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Source Code (.java)</strong></td><td>Your human-readable Java code</td></tr>
        <tr><td><strong>Compiler (javac)</strong></td><td>Converts .java to .class bytecode</td></tr>
        <tr><td><strong>Bytecode (.class)</strong></td><td>Platform-independent intermediate code</td></tr>
        <tr><td><strong>JVM</strong></td><td>Executes bytecode on any operating system</td></tr>
    </tbody>
</table>

<h2>JDK vs JRE vs JVM</h2>
<p>These three acronyms confuse many beginners. Here is the breakdown:</p>

<table>
    <thead>
        <tr><th>Acronym</th><th>Full Name</th><th>What It Does</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>JVM</strong></td><td>Java Virtual Machine</td><td>Runs Java bytecode</td></tr>
        <tr><td><strong>JRE</strong></td><td>Java Runtime Environment</td><td>JVM + libraries needed to run Java programs</td></tr>
        <tr><td><strong>JDK</strong></td><td>Java Development Kit</td><td>JRE + compiler (javac) + tools for developing</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">Key Insight</div>
    <p class="mb-0">To <strong>run</strong> Java programs you only need the JRE. To <strong>develop</strong> Java programs you need the JDK. Always install the JDK when learning to code.</p>
</div>

<h2>A Brief History of Java</h2>
<ul>
    <li><strong>1991:</strong> James Gosling starts "Oak" project at Sun Microsystems</li>
    <li><strong>1995:</strong> Java 1.0 released with the WORA promise</li>
    <li><strong>2004:</strong> Java 5 introduces generics, enums, autoboxing</li>
    <li><strong>2011:</strong> Oracle acquires Sun Microsystems</li>
    <li><strong>2014:</strong> Java 8 brings lambdas and streams</li>
    <li><strong>2021:</strong> Java 17 LTS (Long Term Support) release</li>
    <li><strong>2023:</strong> Java 21 LTS with virtual threads and pattern matching</li>
</ul>

<h2>The Java Ecosystem</h2>
<p>Java is more than a language. It is an entire ecosystem of tools and frameworks:</p>
<ul>
    <li><strong>Spring Boot</strong> &mdash; Enterprise web applications</li>
    <li><strong>Android SDK</strong> &mdash; Mobile app development</li>
    <li><strong>Hibernate</strong> &mdash; Database ORM framework</li>
    <li><strong>Maven / Gradle</strong> &mdash; Build and dependency management</li>
    <li><strong>JUnit</strong> &mdash; Testing framework</li>
</ul>

<h2>Your First Java Program</h2>
<p>Let us write the classic <strong>Hello World</strong> program. Every Java program needs a class and a <code>main</code> method as the entry point.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        System.out.println("Hello, World!");
        System.out.println("Welcome to Java programming!");
        System.out.println("Your first program is running!");
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
    <p class="mb-0">Why does every Java program need a <code>main</code> method? What would happen if you removed the <code>public</code> keyword from the class declaration?</p>
</div>

<h2>How Java Compiles and Runs</h2>
<p>The process from source code to output follows these steps:</p>
<ol>
    <li>Write code in a <code>.java</code> file (e.g., <code>Hello.java</code>)</li>
    <li>Compile with <code>javac Hello.java</code> to produce <code>Hello.class</code></li>
    <li>Run with <code>java Hello</code> which invokes the JVM</li>
    <li>The JVM reads the bytecode and executes your program</li>
</ol>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Modify the sandbox to print your name, age, and favorite hobby on separate lines</li>
        <li>What happens if you forget the semicolon at the end of a line?</li>
        <li>Try changing the class name to something else. Does it still compile?</li>
        <li>Research: What is the difference between <code>System.out.println()</code> and <code>System.out.print()</code>?</li>
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