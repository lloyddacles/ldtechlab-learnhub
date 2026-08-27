<?php $pageTitle = 'Conditional Statements'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 5; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 5: Conditional Statements</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 30 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>The if Statement</h2>
        <p>Conditionals let your code make decisions. Python uses <code>if</code>, <code>elif</code>, and <code>else</code>:</p>
        
        <pre><code>temperature = 75

if temperature > 85:
    print("It's hot outside!")
elif temperature > 65:
    print("It's nice outside!")
elif temperature > 40:
    print("It's cool outside!")
else:
    print("It's cold outside!")</code></pre>
        
        <div class="info-box note">
            <strong>Note:</strong> Remember: each conditional block ends with a colon and uses indentation!
        </div>
    </section>

    <section class="lesson-section">
        <h2>Indentation Blocks</h2>
        <p>The code under each condition is indented. You can have multiple lines:</p>
        <pre><code>score = 85

if score >= 90:
    grade = "A"
    print("Excellent!")
    print("You passed with flying colors!")
elif score >= 80:
    grade = "B"
    print("Great job!")
else:
    grade = "C"
    print("Keep trying!")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Ternary Expression</h2>
        <p>Python's one-line conditional (conditional expression):</p>
        <pre><code>x = 10
result = "positive" if x > 0 else "non-positive"
print(result)  # positive

# Equivalent to:
if x > 0:
    result = "positive"
else:
    result = "non-positive"</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Truthiness in Python</h2>
        <p>Many values evaluate to <code>True</code> or <code>False</code>:</p>
        <table>
            <thead>
                <tr><th>Falsy Values</th><th>Truthy Values</th></tr>
            </thead>
            <tbody>
                <tr><td><code>False</code>, <code>None</code></td><td><code>True</code></td></tr>
                <tr><td><code>0</code>, <code>0.0</code></td><td>Non-zero numbers</td></tr>
                <tr><td><code>""</code>, <code>[]</code>, <code>{}</code></td><td>Non-empty sequences</td></tr>
            </tbody>
        </table>
        
        <pre><code># These work as conditions!
name = ""
if name:
    print("Name exists")
else:
    print("No name")  # This runs

items = [1, 2, 3]
if items:
    print(f"List has {len(items)} items")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: Grade Calculator</h2>
        <p>Try the sandbox to build a grade calculator:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Grade calculator with if/elif/else\nscore = 85\n\nif score >= 90:\n    grade = \"A\"\n    message = \"Excellent!\"\nelif score >= 80:\n    grade = \"B\"\n    message = \"Great job!\"\nelif score >= 70:\n    grade = \"C\"\n    message = \"Good work!\"\nelif score >= 60:\n    grade = \"D\"\n    message = \"Needs improvement\"\nelse:\n    grade = \"F\"\n    message = \"Please see instructor\"\n\nprint(f\"Score: {score}\")\nprint(f\"Grade: {grade}\")\nprint(f\"Message: {message}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
    </section>

    <section class="lesson-section">
        <h2>match-case (Python 3.10+)</h2>
        <p>Python's pattern matching (like switch/case):</p>
        <pre><code>command = "start"

match command:
    case "start":
        print("Starting...")
    case "stop":
        print("Stopping...")
    case "pause":
        print("Pausing...")
    case _:
        print("Unknown command")</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> When would you use <code>match-case</code> instead of multiple <code>if-elif</code> statements?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Modify the grade calculator to include extra credit (+5 points) for scores above 95. Use logical operators!</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
