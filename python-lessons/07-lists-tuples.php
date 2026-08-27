<?php $pageTitle = 'Lists & Tuples'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 7; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 7: Lists & Tuples</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 30 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Introduction to Lists</h2>
        <p>Lists are Python's most versatile data structure. They are <strong>ordered</strong>, <strong>mutable</strong> collections that can hold any data type. Think of them as dynamic arrays.</p>
        
        <pre><code># Creating lists
fruits = ["apple", "banana", "cherry"]
numbers = [1, 2, 3, 4, 5]
mixed = [1, "hello", 3.14, True]

# Accessing elements (0-indexed)
print(fruits[0])    # apple
print(fruits[-1])   # cherry (last element)</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> Why might you choose a list over separate variables? How does mutability help?
        </div>
    </section>

    <section class="lesson-section">
        <h2>List Methods</h2>
        <table>
            <thead>
                <tr><th>Method</th><th>Description</th><th>Example</th></tr>
            </thead>
            <tbody>
                <tr><td><code>append(x)</code></td><td>Add x to end</td><td><code>fruits.append("date")</code></td></tr>
                <tr><td><code>insert(i, x)</code></td><td>Insert x at index i</td><td><code>fruits.insert(1, "blueberry")</code></td></tr>
                <tr><td><code>remove(x)</code></td><td>Remove first occurrence of x</td><td><code>fruits.remove("banana")</code></td></tr>
                <tr><td><code>pop(i)</code></td><td>Remove & return item at i</td><td><code>last = fruits.pop()</code></td></tr>
                <tr><td><code>sort()</code></td><td>Sort list in place</td><td><code>numbers.sort()</code></td></tr>
                <tr><td><code>reverse()</code></td><td>Reverse in place</td><td><code>fruits.reverse()</code></td></tr>
                <tr><td><code>len()</code></td><td>Get list length</td><td><code>print(len(fruits))</code></td></tr>
            </tbody>
        </table>
    </section>

    <section class="lesson-section">
        <h2>List Slicing</h2>
        <p>Slicing lets you extract portions of a list using the syntax <code>list[start:stop:step]</code>:</p>
        
        <pre><code>numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]

print(numbers[2:5])     # [2, 3, 4]
print(numbers[:4])      # [0, 1, 2, 3]
print(numbers[6:])      # [6, 7, 8, 9]
print(numbers[::2])     # [0, 2, 4, 6, 8] (every 2nd)
print(numbers[::-1])    # [9, 8, 7, ..., 0] (reversed)</code></pre>

        <div class="info-box note">
            <strong>Note:</strong> Slicing creates a new list — the original remains unchanged. This is called <em>non-destructive</em> operations.
        </div>
    </section>

    <section class="lesson-section">
        <h2>List Comprehension</h2>
        <p>List comprehensions provide a concise way to create lists. They're faster and more Pythonic than traditional loops.</p>
        
        <pre><code># Traditional loop
squares = []
for x in range(10):
    squares.append(x ** 2)

# List comprehension (same result)
squares = [x ** 2 for x in range(10)]

# With condition
evens = [x for x in range(20) if x % 2 == 0]

# With expression
words = ["hello", "world"]
upper = [word.upper() for word in words]</code></pre>

        <div class="info-box tip">
            <strong>Rule of Thumb:</strong> If a list comprehension exceeds one line, use a regular loop for readability.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Introduction to Tuples</h2>
        <p>Tuples are like lists but <strong>immutable</strong> — once created, they cannot be changed. They're faster and use less memory.</p>
        
        <pre><code># Creating tuples
colors = ("red", "green", "blue")
point = (3, 4)
single = (42,)  # Note the trailing comma for single-element tuples

# Unpacking
x, y = point
print(x)  # 3
print(y)  # 4

# Swapping values (tuple magic!)
a, b = 1, 2
a, b = b, a  # Now a=2, b=1</code></pre>

        <div class="info-box note">
            <strong>When to Use Tuples:</strong> Use tuples for fixed data (coordinates, RGB values), dictionary keys, and function return values that shouldn't change.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice: List Operations</h2>
        <p>Try creating lists, using slicing, and building list comprehensions:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Create a list of numbers\nnumbers = [10, 20, 30, 40, 50]\nprint("Original:", numbers)\n\n# Slice the list\nprint("First 3:", numbers[:3])\nprint("Last 2:", numbers[-2:])\n\n# List comprehension: square each number\nsquares = [x ** 2 for x in numbers]\nprint("Squares:", squares)\n\n# Filter: keep only numbers > 25\nfiltered = [x for x in numbers if x > 25]\nprint("Above 25:", filtered)\n\n# Tuple unpacking\na, b, *rest = numbers\nprint(f"a={a}, b={b}, rest={rest}")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Practice:</strong> Create a list of your 5 favorite movies. Use <code>append()</code> to add one more, then use <code>sort()</code> to alphabetize them.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Given the list <code>data = [5, 2, 8, 1, 9, 3, 7]</code>, write list comprehensions to: (1) sort the numbers, (2) filter only odd numbers, and (3) create a list of each number doubled.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>