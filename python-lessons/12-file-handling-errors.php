<?php $pageTitle = 'File Handling & Error Handling'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 12; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 12: File Handling & Error Handling</h1>
    
    <div class="lesson-meta">
        <span>Intermediate</span> | <span>Estimated time: 35 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>File Operations</h2>
        <p>Python makes it easy to read from and write to files. Always use the <code>with</code> statement — it automatically closes files even if errors occur.</p>
        
        <pre><code># Writing to a file (creates or overwrites)
with open("notes.txt", "w") as file:
    file.write("Hello, World!\\n")
    file.write("Second line\\n")

# Appending to a file
with open("notes.txt", "a") as file:
    file.write("Third line\\n")

# Reading entire file
with open("notes.txt", "r") as file:
    content = file.read()
    print(content)

# Reading line by line
with open("notes.txt", "r") as file:
    for line in file:
        print(line.strip())</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> Why is the <code>with</code> statement better than manually calling <code>close()</code>? What happens if an error occurs between <code>open()</code> and <code>close()</code>?
        </div>
    </section>

    <section class="lesson-section">
        <h2>File Modes</h2>
        <table>
            <thead>
                <tr><th>Mode</th><th>Description</th></tr>
            </thead>
            <tbody>
                <tr><td><code>"r"</code></td><td>Read (default) — file must exist</td></tr>
                <tr><td><code>"w"</code></td><td>Write — creates new or truncates existing</td></tr>
                <tr><td><code>"a"</code></td><td>Append — creates new or adds to end</td></tr>
                <tr><td><code>"x"</code></td><td>Exclusive create — fails if file exists</td></tr>
                <tr><td><code>"r+"</code></td><td>Read and write — file must exist</td></tr>
                <tr><td><code>"rb"</code></td><td>Read binary (images, etc.)</td></tr>
                <tr><td><code>"wb"</code></td><td>Write binary</td></tr>
            </tbody>
        </table>
        
        <div class="info-box note">
            <strong>Binary Mode:</strong> Use <code>"rb"</code> and <code>"wb"</code> for non-text files like images, PDFs, or audio files.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Try/Except: Handling Errors</h2>
        <p>Errors happen. Instead of crashing, use <code>try/except</code> to handle them gracefully:</p>
        
        <pre><code># Basic try/except
try:
    result = 10 / 0
except ZeroDivisionError:
    print("Cannot divide by zero!")

# Catching specific exceptions
try:
    numbers = [1, 2, 3]
    print(numbers[10])
except IndexError as e:
    print(f"Index error: {e}")
except Exception as e:
    print(f"Something else went wrong: {e}")

# try/except/finally
try:
    file = open("data.txt", "r")
    content = file.read()
except FileNotFoundError:
    print("File not found!")
finally:
    print("This always runs, even if no error occurred.")</code></pre>
        
        <div class="info-box tip">
            <strong>Rule:</strong> Never use bare <code>except:</code> — it catches everything including <code>KeyboardInterrupt</code>. Always specify the exception type.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Raising Exceptions</h2>
        <p>You can raise your own exceptions to signal errors in your code:</p>
        
        <pre><code>def set_age(age):
    if not isinstance(age, int):
        raise TypeError("Age must be an integer")
    if age < 0 or age > 150:
        raise ValueError("Age must be between 0 and 150")
    return age

try:
    set_age(-5)
except ValueError as e:
    print(e)  # Age must be between 0 and 150

try:
    set_age("thirty")
except TypeError as e:
    print(e)  # Age must be an integer</code></pre>
        
        <div class="info-box note">
            <strong>Built-in Exceptions:</strong> Common ones include <code>ValueError</code>, <code>TypeError</code>, <code>IndexError</code>, <code>KeyError</code>, <code>FileNotFoundError</code>, and <code>AttributeError</code>.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Common Exceptions</h2>
        <table>
            <thead>
                <tr><th>Exception</th><th>Cause</th><th>Example</th></tr>
            </thead>
            <tbody>
                <tr><td><code>ValueError</code></td><td>Wrong value</td><td><code>int("abc")</code></td></tr>
                <tr><td><code>TypeError</code></td><td>Wrong type</td><td><code>"2" + 2</code></td></tr>
                <tr><td><code>IndexError</code></td><td>Index out of range</td><td><code>[1,2][5]</code></td></tr>
                <tr><td><code>KeyError</code></td><td>Dict key not found</td><td><code>{"a":1}["b"]</code></td></tr>
                <tr><td><code>FileNotFoundError</code></td><td>File doesn't exist</td><td><code>open("nope.txt")</code></td></tr>
                <tr><td><code>ZeroDivisionError</code></td><td>Division by zero</td><td><code>10/0</code></td></tr>
                <tr><td><code>AttributeError</code></td><td>Invalid attribute</td><td><code>"hi".push("!")</code></td></tr>
            </tbody>
        </table>
    </section>

    <section class="lesson-section">
        <h2>Practice: Try/Except Exercise</h2>
        <p>Practice handling errors with try/except blocks:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Safe division with error handling\ndef safe_divide(a, b):\n    try:\n        result = a / b\n    except ZeroDivisionError:\n        return \"Error: Cannot divide by zero!\"\n    except TypeError:\n        return \"Error: Both arguments must be numbers!\"\n    return result\n\nprint(f\"10 / 3 = {safe_divide(10, 3):.2f}\")\nprint(f\"10 / 0 = {safe_divide(10, 0)}\")\nprint(f\"10 / \'a\' = {safe_divide(10, \'a\')}\")\n\n# Safe dictionary access\ndef safe_get(d, key, default=\"Not Found\"):\n    try:\n        return d[key]\n    except KeyError:\n        return default\n\nperson = {\"name\": \"Alice\", \"age\": 30}\nprint(f\"\\nName: {safe_get(person, \'name\')}\")\nprint(f\"Email: {safe_get(person, \'email\', \'No email\')}\")\n\n# File reading with error handling\ndef read_file(filename):\n    try:\n        with open(filename, \'r\') as f:\n            return f.read()\n    except FileNotFoundError:\n        return f\"Error: {filename} not found\"\n    except PermissionError:\n        return f\"Error: No permission to read {filename}\"\n\nprint(f\"\\nReading: {read_file(\'test.txt\')}\")\n\n# Raise your own exceptions\ndef validate_age(age):\n    if not isinstance(age, int):\n        raise TypeError(\"Age must be an integer\")\n    if age < 0 or age > 150:\n        raise ValueError(\"Age must be 0-150\")\n    return \"Valid age!\"\n\ntry:\n    print(f\"\\n{validate_age(25)}\")\n    print(validate_age(-5))\nexcept (TypeError, ValueError) as e:\n    print(f\"Validation error: {e}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Practice:</strong> Write a function that safely converts a string to an integer, returning a default value if conversion fails.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Create a program that: (1) reads a file and counts words, handling file not found errors, (2) validates user input using try/except, and (3) writes results to a new file with proper error handling.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>