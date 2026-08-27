<?php $pageTitle = 'Introduction to Python'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 1; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 1: Introduction to Python</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 25 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>What is Python?</h2>
        <p>Python is a high-level, interpreted, general-purpose programming language created by <strong>Guido van Rossum</strong> and first released in <strong>1991</strong>. It emphasizes code readability with its notable use of significant whitespace.</p>
        
        <div class="info-box tip">
            <strong>Why Learn Python?</strong>
            <ul>
                <li>Consistently ranked #1 in popularity indices</li>
                <li>Used by companies like Google, Netflix, Instagram, and NASA</li>
                <li>Versatile: web development, data science, AI/ML, automation, game development</li>
                <li>Beginner-friendly with gentle learning curve</li>
            </ul>
        </div>
    </section>

    <section class="lesson-section">
        <h2>Python vs Other Languages</h2>
        <table>
            <thead>
                <tr><th>Feature</th><th>Python</th><th>JavaScript</th><th>Java</th></tr>
            </thead>
            <tbody>
                <tr><td>Typing</td><td>Dynamic</td><td>Dynamic</td><td>Static</td></tr>
                <tr><td>Compilation</td><td>Interpreted</td><td>Interpreted</td><td>Compiled</td></tr>
                <tr><td>Learning Curve</td><td>Easy</td><td>Moderate</td><td>Steep</td></tr>
                <tr><td>Indentation</td><td>Required</td><td>Optional</td><td>Optional</td></tr>
            </tbody>
        </table>
    </section>

    <section class="lesson-section">
        <h2>The Zen of Python</h2>
        <p>Type <code>import this</code> in Python to discover guiding principles:</p>
        <pre><code>import this</code></pre>
        <div class="info-box note">
            <strong>Key Philosophy:</strong> "Beautiful is better than ugly. Explicit is better than implicit. Simple is better than complex."
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice: Hello World</h2>
        <p>Try running your first Python code in the sandbox below:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Your first Python program\nprint("Hello, World!")\nprint("Welcome to Python!")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> How does Python's <code>print()</code> function differ from other languages you've used?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Running Python Code</h2>
        <p>You can run Python in multiple ways:</p>
        <ul>
            <li><strong>REPL (Interactive Mode):</strong> Type <code>python</code> in terminal</li>
            <li><strong>Script Mode:</strong> Save code in <code>.py</code> files and run with <code>python filename.py</code></li>
            <li><strong>Online Sandboxes:</strong> Use this interactive environment!</li>
        </ul>
        
        <pre><code># Example script: hello.py
print("Hello from a script!")
print("Python is fun!")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Modify the sandbox to print your name and favorite programming language on separate lines.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
