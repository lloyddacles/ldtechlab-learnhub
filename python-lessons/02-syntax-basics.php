<?php $pageTitle = 'Python Syntax Basics'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 2; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 2: Python Syntax Basics</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 30 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Indentation: Python's Defining Feature</h2>
        <p>Unlike most languages that use braces <code>{}</code>, Python uses <strong>indentation</strong> to define code blocks. This is not just style—it's mandatory!</p>
        
        <pre><code># Correct indentation
if True:
    print("This runs")
    print("This too")

# Wrong - IndentationError!
if True:
print("This fails!")</code></pre>
        
        <div class="info-box tip">
            <strong>Best Practice:</strong> Use <strong>4 spaces</strong> per indentation level (Python community standard). Never mix tabs and spaces!
        </div>
    </section>

    <section class="lesson-section">
        <h2>Statements and Colons</h2>
        <p>Compound statements end with a <strong>colon</strong> (<code>:</code>) before the indented block:</p>
        <ul>
            <li><code>if condition:</code></li>
            <li><code>for item in list:</code></li>
            <li><code>while condition:</code></li>
            <li><code>def function_name():</code></li>
        </ul>
    </section>

    <section class="lesson-section">
        <h2>Case Sensitivity</h2>
        <p>Python is <strong>case-sensitive</strong>. <code>Variable</code>, <code>variable</code>, and <code>VARIABLE</code> are three different names!</p>
        
        <pre><code>name = "Alice"
Name = "Bob"
NAME = "Charlie"
print(name, Name, NAME)  # Alice Bob Charlie</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Line Continuation</h2>
        <p>Long statements can span multiple lines using:</p>
        <ul>
            <li><strong>Backslash:</strong> <code>total = 1 + 2 + 3 + 4 + 5</code></li>
            <li><strong>Parentheses:</strong> <code>total = (1 + 2 + 3 + 4 + 5)</code></li>
        </ul>
        
        <pre><code># Line continuation examples
total = (1 + 2 + 3 +
         4 + 5 + 6)

message = ("This is a very long "
           "string that spans "
           "multiple lines")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: Indentation Blocks</h2>
        <p>Try the code below and experiment with indentation levels:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Indentation example\nfor i in range(3):\n    print(f\"Level 1: iteration {i}\")\n    for j in range(2):\n        print(f\"  Level 2: inner {j}\")\n    print(\"Back to Level 1\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box note">
            <strong>Note:</strong> Python's indentation style enforces clean, readable code. It may feel restrictive at first, but developers grow to love it!
        </div>
    </section>

    <section class="lesson-section">
        <h2>Comments</h2>
        <p>Comments start with <code>#</code> and extend to end of line:</p>
        <pre><code># This is a comment
x = 5  # This is an inline comment

"""
Triple-quoted strings can be
multi-line comments/docstrings
"""</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Think About It</h2>
        <p>Why do you think Python enforces indentation instead of using braces like C or JavaScript? What benefits might this provide?</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
