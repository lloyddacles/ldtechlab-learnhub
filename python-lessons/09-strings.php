<?php $pageTitle = 'String Mastery'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 9; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 9: String Mastery</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 30 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>String Fundamentals</h2>
        <p>Strings in Python are <strong>immutable sequences</strong> of Unicode characters. Once created, they cannot be changed — operations always create new strings.</p>
        
        <pre><code># Creating strings
name = "Alice"
greeting = 'Hello, World!'
multi_line = """This is
a multi-line
string"""

# String length
print(len(name))  # 5

# Indexing (0-based)
print(name[0])    # A
print(name[-1])   # e</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> Why are strings immutable? What advantages does this provide?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Essential String Methods</h2>
        <table>
            <thead>
                <tr><th>Method</th><th>Description</th><th>Example</th></tr>
            </thead>
            <tbody>
                <tr><td><code>upper()</code></td><td>Convert to uppercase</td><td><code>"hello".upper()</code> → <code>"HELLO"</code></td></tr>
                <tr><td><code>lower()</code></td><td>Convert to lowercase</td><td><code>"HELLO".lower()</code> → <code>"hello"</code></td></tr>
                <tr><td><code>strip()</code></td><td>Remove whitespace</td><td><code>" hi ".strip()</code> → <code>"hi"</code></td></tr>
                <tr><td><code>split(sep)</code></td><td>Split into list</td><td><code>"a,b,c".split(",")</code> → <code>["a","b","c"]</code></td></tr>
                <tr><td><code>join(list)</code></td><td>Join list into string</td><td><code>", ".join(["a","b"])</code> → <code>"a, b"</code></td></tr>
                <tr><td><code>replace(old, new)</code></td><td>Replace substring</td><td><code>"hello".replace("l", "r")</code> → <code>"herro"</code></td></tr>
                <tr><td><code>find(sub)</code></td><td>Find substring index</td><td><code>"hello".find("ll")</code> → <code>2</code></td></tr>
                <tr><td><code>startswith()</code></td><td>Check prefix</td><td><code>"hello".startswith("he")</code> → <code>True</code></td></tr>
                <tr><td><code>endswith()</code></td><td>Check suffix</td><td><code>"hello".endswith("lo")</code> → <code>True</code></td></tr>
            </tbody>
        </table>
    </section>

    <section class="lesson-section">
        <h2>f-Strings (Formatted String Literals)</h2>
        <p>f-strings are the modern way to format strings in Python. Place <code>f</code> before the quote and use <code>{}</code> for expressions:</p>
        
        <pre><code>name = "Alice"
age = 30

# Basic formatting
print(f"Hello, {name}!")           # Hello, Alice!

# Expressions inside {}
print(f"Next year you'll be {age + 1}")  # Next year you'll be 31

# Format specifiers
pi = 3.14159
print(f"Pi to 2 decimals: {pi:.2f}")    # Pi to 2 decimals: 3.14
print(f"Percentage: {0.856:.1%}")        # Percentage: 85.6%
print(f"Right-aligned: {42:>10}")        # Right-aligned:         42
print(f"Zero-padded: {42:05d}")          # Zero-padded: 00042</code></pre>
        
        <div class="info-box note">
            <strong>f-String Benefits:</strong> Faster than <code>.format()</code> and <code>%</code> formatting, more readable, and support any valid Python expression.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Escape Characters</h2>
        <p>Special characters are prefixed with a backslash:</p>
        
        <table>
            <thead>
                <tr><th>Escape</th><th>Description</th></tr>
            </thead>
            <tbody>
                <tr><td><code>\n</code></td><td>Newline</td></tr>
                <tr><td><code>\t</code></td><td>Tab</td></tr>
                <tr><td><code>\\</code></td><td>Backslash</td></tr>
                <tr><td><code>\"</code></td><td>Double quote</td></tr>
                <tr><td><code>\'</code></td><td>Single quote</td></tr>
            </tbody>
        </table>
        
        <pre><code># Raw strings ignore escape characters
path = r"C:\new\test"  # No newline or tab
print(path)            # C:\new\test</code></pre>
    </section>

    <section class="lesson-section">
        <h2>String Slicing</h2>
        <p>Slicing works just like lists — extract portions of strings with <code>string[start:stop:step]</code>:</p>
        
        <pre><code>text = "Hello, World!"

print(text[0:5])      # Hello
print(text[7:])       # World!
print(text[::-1])     # !dlroW ,olleH (reversed)
print(text[::2])      # Hlo ol! (every 2nd char)</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: String Manipulation</h2>
        <p>Try working with string methods and f-strings:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# String methods\nmessage = \"  Hello, Python World!  \"\nprint(f\"Original: \'{message}\'\")\nprint(f\"Stripped: \'{message.strip()}\'\")\nprint(f\"Upper: \'{message.strip().upper()}\'\")\nprint(f\"Lower: \'{message.strip().lower()}\'\")\n\n# Splitting and joining\nwords = message.strip().split()\nprint(f\"\\nWords: {words}\")\njoined = \" - \".join(words)\nprint(f\"Joined: {joined}\")\n\n# f-string formatting\ncollege = \"LD TechLab\"\nstudents = 150\ncourse = \"Python\"\nprint(f\"\\nWelcome to {college}!\")\nprint(f\"We have {students} students learning {course}.\")\nprint(f\"Rating: {4.856:.1f}/5.0\")\n\n# String replacement\noriginal = \"I love Java\"\nfixed = original.replace(\"Java\", \"Python\")\nprint(f\"\\n{fixed}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Practice:</strong> Write a program that takes a full name and prints the initials (e.g., "John Michael Doe" → "J.M.D.").
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Create a program that takes a sentence and returns: (1) word count, (2) reversed string, (3) all uppercase words joined with hyphens.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>