<?php $pageTitle = 'Python Operators'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 4; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 4: Python Operators</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 30 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Arithmetic Operators</h2>
        <table>
            <thead>
                <tr><th>Operator</th><th>Name</th><th>Example</th><th>Result</th></tr>
            </thead>
            <tbody>
                <tr><td><code>+</code></td><td>Addition</td><td><code>5 + 3</code></td><td>8</td></tr>
                <tr><td><code>-</code></td><td>Subtraction</td><td><code>5 - 3</code></td><td>2</td></tr>
                <tr><td><code>*</code></td><td>Multiplication</td><td><code>5 * 3</code></td><td>15</td></tr>
                <tr><td><code>/</code></td><td>Division</td><td><code>5 / 2</code></td><td>2.5</td></tr>
                <tr><td><code>//</code></td><td>Floor Division</td><td><code>5 // 2</code></td><td>2</td></tr>
                <tr><td><code>%</code></td><td>Modulus</td><td><code>5 % 2</code></td><td>1</td></tr>
                <tr><td><code>**</code></td><td>Exponent</td><td><code>2 ** 3</code></td><td>8</td></tr>
            </tbody>
        </table>
        
        <div class="info-box note">
            <strong>Note:</strong> Python's division <code>/</code> always returns a float. Use <code>//</code> for integer division!
        </div>
    </section>

    <section class="lesson-section">
        <h2>Comparison Operators</h2>
        <p>Return <code>True</code> or <code>False</code>:</p>
        <pre><code>5 == 5      # True (equal to)
5 != 3      # True (not equal to)
5 > 3       # True (greater than)
5 < 3       # False (less than)
5 >= 5      # True (greater or equal)
5 <= 4      # False (less or equal)</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Logical Operators</h2>
        <table>
            <thead>
                <tr><th>Operator</th><th>Description</th><th>Example</th></tr>
            </thead>
            <tbody>
                <tr><td><code>and</code></td><td>True if both true</td><td><code>True and False</code> → False</td></tr>
                <tr><td><code>or</code></td><td>True if at least one true</td><td><code>True or False</code> → True</td></tr>
                <tr><td><code>not</code></td><td>Reverses boolean</td><td><code>not True</code> → False</td></tr>
            </tbody>
        </table>
    </section>

    <section class="lesson-section">
        <h2>Identity and Membership Operators</h2>
        <pre><code># Identity: checks if same object in memory
a = [1, 2, 3]
b = [1, 2, 3]
c = a

print(a is b)      # False (different objects)
print(a is c)      # True (same object)
print(a == b)      # True (same value)

# Membership: checks if value exists in sequence
fruits = ["apple", "banana", "cherry"]
print("apple" in fruits)     # True
print("grape" not in fruits) # True</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: Operator Demos</h2>
        <p>Try the sandbox to see operators in action:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Arithmetic operators\nprint("Arithmetic:")\nprint(f"10 + 3 = {10 + 3}")\nprint(f"10 - 3 = {10 - 3}")\nprint(f"10 * 3 = {10 * 3}")\nprint(f"10 // 3 = {10 // 3}")\nprint(f"10 %% 3 = {10 %% 3}")\nprint(f"10 ** 3 = {10 ** 3}")\n\n# Comparison\nprint("\nComparison:")\nprint(f"5 == 5: {5 == 5}")\nprint(f"5 != 5: {5 != 5}")\nprint(f"5 > 3: {5 > 3}")') ?>" ></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
    </section>

    <section class="lesson-section">
        <h2>Operator Precedence</h2>
        <p>From highest to lowest:</p>
        <ol>
            <li><code>**</code> (Exponent)</li>
            <li><code>~</code>, <code>+</code>, <code>-</code> (Unary)</li>
            <li><code>*</code>, <code>/</code>, <code>%</code>, <code>//</code></li>
            <li><code>+</code>, <code>-</code></li>
            <li>Comparison operators</li>
            <li><code>not</code></li>
            <li><code>and</code></li>
            <li><code>or</code></li>
        </ol>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> What's the result of <code>2 + 3 * 4</code> vs <code>(2 + 3) * 4</code>? Why does this matter?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Create a truth table for <code>(True and False) or not False</code>. Can you predict the result before running it?</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
