<?php $pageTitle = 'Dictionaries & Sets'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 8; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 8: Dictionaries & Sets</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 30 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Introduction to Dictionaries</h2>
        <p>Dictionaries store <strong>key-value pairs</strong>. They're like real dictionaries — you look up a word (key) to find its definition (value). Dictionaries are <strong>unordered</strong> (before Python 3.7) and <strong>mutable</strong>.</p>
        
        <pre><code># Creating dictionaries
person = {
    "name": "Alice",
    "age": 30,
    "city": "New York"
}

# Accessing values
print(person["name"])        # Alice
print(person.get("age"))     # 30
print(person.get("email", "N/A"))  # N/A (default if key missing)

# Modifying
person["age"] = 31
person["email"] = "alice@example.com"</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> Why use dictionaries instead of lists with paired elements? What are the performance implications?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Dictionary Methods</h2>
        <table>
            <thead>
                <tr><th>Method</th><th>Returns</th><th>Description</th></tr>
            </thead>
            <tbody>
                <tr><td><code>keys()</code></td><td>dict_keys</td><td>All keys in the dictionary</td></tr>
                <tr><td><code>values()</code></td><td>dict_values</td><td>All values in the dictionary</td></tr>
                <tr><td><code>items()</code></td><td>dict_items</td><td>All key-value pairs as tuples</td></tr>
                <tr><td><code>get(key, default)</code></td><td>value</td><td>Safe access with default fallback</td></tr>
                <tr><td><code>pop(key)</code></td><td>value</td><td>Remove and return value for key</td></tr>
                <tr><td><code>update(other)</code></td><td>None</td><td>Merge another dict into this one</td></tr>
                <tr><td><code>clear()</code></td><td>None</td><td>Remove all items</td></tr>
            </tbody>
        </table>
        
        <pre><code># Iterating over dictionaries
for key in person:
    print(f"{key}: {person[key]}")

for key, value in person.items():
    print(f"{key} -> {value}")</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Dictionary Comprehension</h2>
        <p>Like list comprehensions, you can create dictionaries concisely:</p>
        
        <pre><code># Squares dictionary
squares = {x: x**2 for x in range(1, 6)}
# {1: 1, 2: 4, 3: 9, 4: 16, 5: 25}

# Filter dictionary
prices = {"apple": 1.5, "banana": 0.5, "steak": 15.0}
expensive = {k: v for k, v in prices.items() if v > 2.0}
# {'steak': 15.0}</code></pre>
        
        <div class="info-box note">
            <strong>Real-World Use:</strong> Dictionaries are everywhere — JSON data, configuration files, caching, and counting patterns.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Introduction to Sets</h2>
        <p>Sets are <strong>unordered collections of unique elements</strong>. They're perfect for removing duplicates and testing membership.</p>
        
        <pre><code># Creating sets
fruits = {"apple", "banana", "cherry"}
numbers = set([1, 2, 2, 3, 3, 3])  # {1, 2, 3}

# Adding & removing
fruits.add("date")
fruits.remove("banana")

# Membership testing (very fast!)
print("apple" in fruits)  # True

# Duplicates are automatically removed
nums = [1, 1, 2, 3, 3, 4]
unique = set(nums)  # {1, 2, 3, 4}</code></pre>
        
        <div class="info-box tip">
            <strong>Performance Tip:</strong> Set membership checks are O(1) — much faster than list checks which are O(n).
        </div>
    </section>

    <section class="lesson-section">
        <h2>Set Operations</h2>
        <p>Sets support mathematical operations like union, intersection, and difference:</p>
        
        <pre><code>set_a = {1, 2, 3, 4}
set_b = {3, 4, 5, 6}

# Union (all elements from both)
print(set_a | set_b)        # {1, 2, 3, 4, 5, 6}

# Intersection (common elements)
print(set_a & set_b)        # {3, 4}

# Difference (elements in A but not B)
print(set_a - set_b)        # {1, 2}

# Symmetric difference (not in both)
print(set_a ^ set_b)        # {1, 2, 5, 6}</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Practice: Word Counter & Sets</h2>
        <p>Try using dictionaries for counting and sets for unique elements:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Word counter using a dictionary\ntext = \"the cat sat on the mat the cat\"\nwords = text.split()\n\nword_count = {}\nfor word in words:\n    word_count[word] = word_count.get(word, 0) + 1\n\nprint(\"Word counts:\")\nfor word, count in word_count.items():\n    print(f\"  {word}: {count}\")\n\n# Set operations\nset_a = {1, 2, 3, 4, 5}\nset_b = {4, 5, 6, 7, 8}\n\nprint(f\"\\nA = {set_a}\")\nprint(f\"B = {set_b}\")\nprint(f\"Union: {set_a | set_b}\")\nprint(f\"Intersection: {set_a & set_b}\")\nprint(f\"A - B: {set_a - set_b}\")\n\n# Remove duplicates from a list\nnumbers = [1, 2, 2, 3, 3, 3, 4, 4, 4, 4]\nprint(f\"\\nOriginal: {numbers}\")\nprint(f\"Unique: {sorted(set(numbers))}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Practice:</strong> Create a dictionary of 5 students with their grades. Use dict comprehension to filter students with grades above 90.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Given two lists of student IDs, use sets to find: (1) students in both classes, (2) students only in the first class, and (3) all unique students.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>