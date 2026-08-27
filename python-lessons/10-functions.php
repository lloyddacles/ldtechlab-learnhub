<?php $pageTitle = 'Functions'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 10; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 10: Functions</h1>
    
    <div class="lesson-meta">
        <span>Beginner</span> | <span>Estimated time: 35 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Defining Functions</h2>
        <p>Functions are reusable blocks of code that perform specific tasks. Use the <code>def</code> keyword to define them:</p>
        
        <pre><code># Basic function
def greet(name):
    """Greet a person by name."""  # Docstring
    print(f"Hello, {name}!")

# Calling the function
greet("Alice")  # Hello, Alice!

# Function with return value
def add(a, b):
    return a + b

result = add(3, 5)
print(result)  # 8</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> When should you use a function versus writing inline code? What are the benefits of functions?
        </div>
    </section>

    <section class="lesson-section">
        <h2>Parameters & Arguments</h2>
        <table>
            <thead>
                <tr><th>Type</th><th>Syntax</th><th>Example</th></tr>
            </thead>
            <tbody>
                <tr><td>Positional</td><td><code>def func(a, b)</code></td><td><code>func(1, 2)</code></td></tr>
                <tr><td>Default</td><td><code>def func(a=10)</code></td><td><code>func()</code> → uses 10</td></tr>
                <tr><td>Keyword</td><td><code>func(b=2, a=1)</code></td><td>Order doesn't matter</td></tr>
                <tr><td>*args</td><td><code>def func(*args)</code></td><td>Variable positional args</td></tr>
                <tr><td>**kwargs</td><td><code>def func(**kwargs)</code></td><td>Variable keyword args</td></tr>
            </tbody>
        </table>
        
        <pre><code># Default arguments
def power(base, exponent=2):
    return base ** exponent

print(power(3))      # 9 (uses default exponent=2)
print(power(3, 3))   # 27

# *args - variable number of positional arguments
def total(*numbers):
    return sum(numbers)

print(total(1, 2, 3, 4))  # 10

# **kwargs - variable keyword arguments
def build_profile(**info):
    for key, value in info.items():
        print(f"{key}: {value}")

build_profile(name="Alice", age=30, city="NYC")</code></pre>
        
        <div class="info-box note">
            <strong>Order Rule:</strong> Parameters must be in order: regular → *args → keyword-only → **kwargs.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Scope</h2>
        <p>Variables have different scopes — where they can be accessed:</p>
        
        <pre><code># Global scope
x = "global"

def my_function():
    # Local scope
    x = "local"
    print(f"Inside: {x}")   # local

my_function()
print(f"Outside: {x}")      # global

# Accessing global inside function
def count():
    global counter
    counter += 1

counter = 0
count()
print(counter)  # 1</code></pre>
        
        <div class="info-box tip">
            <strong>Best Practice:</strong> Avoid <code>global</code> when possible. Pass values as parameters and return results instead.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Lambda Functions</h2>
        <p>Lambdas are small anonymous functions defined with <code>lambda</code>. They're perfect for short, one-time operations:</p>
        
        <pre><code># Regular function
def square(x):
    return x ** 2

# Lambda equivalent
square = lambda x: x ** 2

# Lambdas are great with higher-order functions
numbers = [1, 2, 3, 4, 5]
squared = list(map(lambda x: x**2, numbers))
# [1, 4, 9, 16, 25]

evens = list(filter(lambda x: x % 2 == 0, numbers))
# [2, 4]

# Sorting with lambda
students = [("Alice", 90), ("Bob", 85), ("Charlie", 95)]
students.sort(key=lambda s: s[1], reverse=True)</code></pre>
        
        <div class="info-box note">
            <strong>When to Use Lambda:</strong> Use for short callbacks in <code>map()</code>, <code>filter()</code>, <code>sorted()</code>. For complex logic, use regular functions.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Recursion</h2>
        <p>A function that calls itself. Must have a <strong>base case</strong> to stop:</p>
        
        <pre><code># Factorial: n! = n * (n-1)!
def factorial(n):
    if n <= 1:  # Base case
        return 1
    return n * factorial(n - 1)  # Recursive case

print(factorial(5))  # 120

# Fibonacci sequence
def fibonacci(n):
    if n <= 1:
        return n
    return fibonacci(n-1) + fibonacci(n-2)

for i in range(8):
    print(fibonacci(i), end=" ")  # 0 1 1 2 3 5 8 13</code></pre>
        
        <div class="info-box tip">
            <strong>Warning:</strong> Deep recursion can cause stack overflow. Python has a recursion limit (usually 1000). Use iteration for large inputs.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice: Build Utility Functions</h2>
        <p>Try creating functions with different parameter types and lambda expressions:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Function with default args\ndef calculate_tax(price, tax_rate=0.1):\n    \"\"\"Calculate price with tax.\"\"\"\n    return price * (1 + tax_rate)\n\nprint(f\"Tax on $100: ${calculate_tax(100):.2f}\")\nprint(f\"Tax on $100 at 20%: ${calculate_tax(100, 0.2):.2f}\")\n\n# *args function\ndef find_max(*numbers):\n    \"\"\"Find the maximum of any numbers.\"\"\"\n    return max(numbers)\n\nprint(f\"\\nMax of 3, 7, 2: {find_max(3, 7, 2)}\")\nprint(f\"Max of 10, 5, 8, 1: {find_max(10, 5, 8, 1)}\")\n\n# Lambda with map and filter\nnums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]\ndoubled = list(map(lambda x: x * 2, nums))\nprint(f\"\\nDoubled: {doubled}\")\n\nevens = list(filter(lambda x: x % 2 == 0, nums))\nprint(f\"Evens: {evens}\")\n\n# Sorting with lambda\nwords = [\"banana\", \"apple\", \"cherry\", \"date\"]\nby_length = sorted(words, key=lambda w: len(w))\nprint(f\"\\nBy length: {by_length}\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Practice:</strong> Write a function that takes a list and returns a dictionary with each element as key and its count as value.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Create: (1) a recursive function to calculate power, (2) a lambda that sorts a list of dictionaries by a given key, (3) a function using *args and **kwargs together.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>