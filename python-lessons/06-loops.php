<?php $pageTitle = 'Loop Statements'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 6; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 6: Loop Statements</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 35 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>The for Loop</h2>
        <p>Python's <code>for</code> loop iterates over sequences (lists, strings, ranges, etc.):</p>
        
        <pre><code># Loop through a list
fruits = ["apple", "banana", "cherry"]
for fruit in fruits:
    print(fruit)

# Loop through a string
for letter in "Python":
    print(letter)</code></pre>
    </section>

    <section class="lesson-section">
        <h2>range() Function</h2>
        <p>Generate number sequences with <code>range()</code>:</p>
        <table>
            <thead>
                <tr><th>Syntax</th><th>Result</th></tr>
            </thead>
            <tbody>
                <tr><td><code>range(5)</code></td><td>0, 1, 2, 3, 4</td></tr>
                <tr><td><code>range(2, 5)</code></td><td>2, 3, 4</td></tr>
                <tr><td><code>range(0, 10, 2)</code></td><td>0, 2, 4, 6, 8</td></tr>
                <tr><td><code>range(10, 0, -1)</code></td><td>10, 9, 8, ..., 1</td></tr>
            </tbody>
        </table>
        
        <pre><code># Count to 5
for i in range(1, 6):
    print(i)

# Count by 2s
for i in range(0, 10, 2):
    print(i)</code></pre>
    </section>

    <section class="lesson-section">
        <h2>The while Loop</h2>
        <p>Repeats while a condition is <code>True</code>:</p>
        <pre><code>count = 0
while count < 5:
    print(f"Count: {count}")
    count += 1  # Don't forget to increment!</code></pre>
        
        <div class="info-box note">
            <strong>Warning:</strong> Always ensure your while loop condition will eventually become False, or you'll create an infinite loop!
        </div>
    </section>

    <section class="lesson-section">
        <h2>break and continue</h2>
        <ul>
            <li><code>break</code> - Exits the loop immediately</li>
            <li><code>continue</code> - Skips to next iteration</li>
        </ul>
        
        <pre><code># break - stop at 3
for i in range(10):
    if i == 3:
        break
    print(i)  # 0, 1, 2

# continue - skip 3
for i in range(5):
    if i == 3:
        continue
    print(i)  # 0, 1, 2, 4</code></pre>
    </section>

    <section class="lesson-section">
        <h2>enumerate() and zip()</h2>
        <p><code>enumerate()</code> gives you index + value:</p>
        <pre><code>fruits = ["apple", "banana", "cherry"]
for index, fruit in enumerate(fruits):
    print(f"{index}: {fruit}")</code></pre>
        
        <p><code>zip()</code> combines multiple sequences:</p>
        <pre><code>names = ["Alice", "Bob"]
scores = [95, 87]
for name, score in zip(names, scores):
    print(f"{name}: {score}")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>for-else Clause</h2>
        <p>Python's unique feature: <code>else</code> runs when loop completes without <code>break</code>:</p>
        <pre><code>for n in range(2, 10):
    for x in range(2, n):
        if n % x == 0:
            print(f"{n} = {x} * {n//x}")
            break
    else:
        print(f"{n} is prime")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: Loop Patterns</h2>
        <p>Try the sandbox to explore loop patterns:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Loop with enumerate\nfruits = [\"apple\", \"banana\", \"cherry\", \"date\"]\nprint(\"Fruits list:\")\nfor i, fruit in enumerate(fruits, 1):\n    print(f\"{i}. {fruit}\")\n\n# Counting pattern\nprint(\"\\nCountdown:\")\nfor i in range(10, 0, -1):\n    print(i, end=\" \")\nprint(\"\\n\\nSum of 1-100:\")\ntotal = 0\nfor i in range(1, 101):\n    total += i\nprint(f\"Sum = {total}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> How would you use a loop to find all even numbers between 1 and 50? Can you do it with <code>range()</code> and without a conditional?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Write a loop that prints the multiplication table for 7 (7x1 through 7x10). Use an f-string for formatting!</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
