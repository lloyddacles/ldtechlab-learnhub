<?php $pageTitle = 'Variables & Data Types'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 3; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 3: Variables & Data Types</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 35 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Variables: No Declaration Needed</h2>
        <p>In Python, you don't declare variable types. Simply assign a value and Python infers the type automatically:</p>
        
        <pre><code># Python - just assign!
name = "Alice"      # string
age = 25            # integer
height = 5.6        # float
is_student = True   # boolean

# vs JavaScript (needs let/const/var)
# let name = "Alice";

# vs Java (needs type declaration)
# String name = "Alice";</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Naming Rules</h2>
        <table>
            <thead>
                <tr><th>Rule</th><th>Valid</th><th>Invalid</th></tr>
            </thead>
            <tbody>
                <tr><td>Start with letter or _</td><td><code>name</code>, <code>_private</code></td><td><code>2name</code>, <code>-var</code></td></tr>
                <tr><td>Letters, numbers, _ only</td><td><code>user_name</code>, <code>count2</code></td><td><code>user-name</code>, <code>user name</code></td></tr>
                <tr><td>Case-sensitive</td><td><code>name</code>, <code>Name</code></td><td>-</td></tr>
                <tr><td>No reserved words</td><td><code>my_name</code></td><td><code>if</code>, <code>for</code>, <code>class</code></td></tr>
            </tbody>
        </table>
    </section>

    <section class="lesson-section">
        <h2>Core Data Types</h2>
        <ul>
            <li><code>int</code> - Integers: <code>42</code>, <code>-7</code>, <code>0</code></li>
            <li><code>float</code> - Decimals: <code>3.14</code>, <code>-2.5</code></li>
            <li><code>str</code> - Strings: <code>"hello"</code>, <code>'world'</code></li>
            <li><code>bool</code> - Booleans: <code>True</code>, <code>False</code></li>
            <li><code>None</code> - Null value: <code>None</code></li>
        </ul>
        
        <div class="info-box note">
            <strong>Note:</strong> Python uses <code>True</code>/<code>False</code> (capitalized), not <code>true</code>/<code>false</code> like JavaScript!
        </div>
    </section>

    <section class="lesson-section">
        <h2>Dynamic Typing</h2>
        <p>Variables can change types freely:</p>
        <pre><code>x = 10       # x is int
x = "hello"  # x is now str
x = 3.14     # x is now float</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: Variables & Type Checking</h2>
        <p>Try the sandbox to explore variables and the <code>type()</code> function:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Variable assignment and type checking\nname = \"Python\"\nversion = 3.11\nis_awesome = True\nnothing = None\n\nprint(f\"Variable: {name}\")\nprint(f\"Type: {type(name)}\")\nprint()\nprint(f\"Variable: {version}\")\nprint(f\"Type: {type(version)}\")\nprint()\nprint(f\"Variable: {is_awesome}\")\nprint(f\"Type: {type(is_awesome)}\")\nprint()\nprint(f\"Variable: {nothing}\")\nprint(f\"Type: {type(nothing)}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
    </section>

    <section class="lesson-section">
        <h2>Type Conversion</h2>
        <p>Convert between types using built-in functions:</p>
        <pre><code># String to int
age = int("25")

# Int to string
count = str(42)

# Int to float
pi = float(3)

# Float to int (truncates)
truncate = int(3.7)  # Result: 3</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> What happens if you try <code>int("hello")</code>? Why might Python raise an error?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Create variables of each type and convert them. Try converting <code>"3.14"</code> to float, then to int. What happens?</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
