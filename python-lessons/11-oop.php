<?php $pageTitle = 'Object-Oriented Programming'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 11; $prevNext = getPrevNextLesson($num, 'python-lessons'); ?>

<div class="lesson-container">
    <h1>Lesson 11: Object-Oriented Programming</h1>
    
    <div class="lesson-meta">
        <span>Intermediate</span> | <span>Estimated time: 40 minutes</span>
    </div>

    <section class="lesson-section">
        <h2>Classes & Objects</h2>
        <p>OOP lets you model real-world things as <strong>objects</strong>. A <strong>class</strong> is a blueprint; an <strong>object</strong> is an instance of that class.</p>
        
        <pre><code># Defining a class
class Dog:
    def __init__(self, name, breed):
        """Initialize a new Dog."""
        self.name = name      # Instance variable
        self.breed = breed
    
    def bark(self):
        """Instance method."""
        return f"{self.name} says Woof!"

# Creating objects (instances)
dog1 = Dog("Rex", "German Shepherd")
dog2 = Dog("Buddy", "Golden Retriever")

print(dog1.bark())  # Rex says Woof!
print(dog2.name)    # Buddy</code></pre>
        
        <div class="info-box tip">
            <strong>Think About It:</strong> What real-world things could you model with classes? What properties and behaviors would they have?
        </div>
    </section>

    <section class="lesson-section">
        <h2>The __init__ Method</h2>
        <p><code>__init__</code> is a special method (constructor) that runs when you create an object. The <code>self</code> parameter refers to the current instance:</p>
        
        <pre><code>class BankAccount:
    def __init__(self, owner, balance=0):
        self.owner = owner
        self.balance = balance
        self.transactions = []
    
    def deposit(self, amount):
        if amount > 0:
            self.balance += amount
            self.transactions.append(f"+{amount}")
    
    def withdraw(self, amount):
        if 0 < amount <= self.balance:
            self.balance -= amount
            self.transactions.append(f"-{amount}")
    
    def __str__(self):
        """String representation."""
        return f"Account({self.owner}: ${self.balance})"

account = BankAccount("Alice", 1000)
account.deposit(500)
account.withdraw(200)
print(account)  # Account(Alice: $1300)</code></pre>
        
        <div class="info-box note">
            <strong>self Explained:</strong> <code>self</code> is always the first parameter in methods, but you don't pass it explicitly — Python does it automatically.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Class Variables vs Instance Variables</h2>
        <table>
            <thead>
                <tr><th>Feature</th><th>Instance Variables</th><th>Class Variables</th></tr>
            </thead>
            <tbody>
                <tr><td>Defined</td><td>In <code>__init__</code> with <code>self.</code></td><td>In class body, outside methods</td></tr>
                <tr><td>Scope</td><td>Belongs to each object</td><td>Shared across all instances</td></tr>
                <tr><td>Example</td><td><code>self.name = "Rex"</code></td><td><code>species = "Canine"</code></td></tr>
            </tbody>
        </table>
        
        <pre><code>class Student:
    school_name = "LD TechLab"  # Class variable
    
    def __init__(self, name, grade):
        self.name = name        # Instance variable
        self.grade = grade
    
    def info(self):
        return f"{self.name} ({self.grade}) at {Student.school_name}"

s1 = Student("Alice", "A")
s2 = Student("Bob", "B")
print(s1.info())  # Alice (A) at LD TechLab
print(s2.info())  # Bob (B) at LD TechLab</code></pre>
    </section>

    <section class="lesson-section">
        <h2>Inheritance</h2>
        <p>Inheritance lets you create new classes that reuse, extend, or modify behavior of existing classes:</p>
        
        <pre><code># Parent class
class Animal:
    def __init__(self, name):
        self.name = name
    
    def speak(self):
        return "..."

# Child class inherits from Animal
class Cat(Animal):
    def speak(self):
        return f"{self.name} says Meow!"
    
    def purr(self):
        return "Purr..."

class Dog(Animal):
    def speak(self):
        return f"{self.name} says Woof!"

# Polymorphism
animals = [Cat("Whiskers"), Dog("Rex"), Cat("Mittens")]
for animal in animals:
    print(animal.speak())
# Whiskers says Meow!
# Rex says Woof!
# Mittens says Meow!</code></pre>
        
        <div class="info-box tip">
            <strong>Polymorphism:</strong> Different classes can implement the same method differently. The correct version is called based on the object's actual type.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Encapsulation</h2>
        <p>Control access to internal details. Python uses naming conventions (not strict access modifiers):</p>
        
        <pre><code>class Person:
    def __init__(self, name, age):
        self.name = name       # Public
        self._age = age        # Protected (convention)
        self.__secret = "data" # Private (name-mangled)
    
    def get_age(self):
        return self._age
    
    def set_age(self, age):
        if age > 0:
            self._age = age

p = Person("Alice", 30)
print(p.name)       # OK
print(p._age)       # Works but discouraged
# print(p.__secret)  # AttributeError!
print(p._Person__secret)  # Access via mangled name</code></pre>
        
        <div class="info-box note">
            <strong>Convention vs Enforcement:</strong> Python trusts developers. Protected/private are conventions, not enforced. Use them to signal intent.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice: Create a Class</h2>
        <p>Try defining classes with methods and inheritance:</p>
        
        <div class="sandbox">
            <textarea class="sandbox-code" data-lang="python" data-example="<?= base64_encode('# Define a Product class\nclass Product:\n    def __init__(self, name, price, quantity):\n        self.name = name\n        self.price = price\n        self.quantity = quantity\n    \n    def total_value(self):\n        return self.price * self.quantity\n    \n    def apply_discount(self, percent):\n        self.price *= (1 - percent / 100)\n    \n    def __str__(self):\n        return f\"{self.name}: ${self.price:.2f} x {self.quantity}\"\n\n# Create products\napple = Product(\"Apple\", 1.50, 10)\nbanana = Product(\"Banana\", 0.75, 20)\n\nprint(apple)\nprint(f\"Total value: ${apple.total_value():.2f}\")\n\napple.apply_discount(20)\nprint(f\"After 20% off: ${apple.price:.2f}\")\n\n# Inheritance example\nclass DiscountedProduct(Product):\n    def __init__(self, name, price, quantity, discount):\n        super().__init__(name, price, quantity)\n        self.discount = discount\n        self.apply_discount(discount)\n\nsale_item = DiscountedProduct(\"Widget\", 10.00, 5, 15)\nprint(f\"\\n{sale_item}\")\nprint(f\"You saved 15%!\")') ?>"></textarea>
            <button class="run-btn">Run Code</button>
            <div class="output-area"></div>
        </div>
        
        <div class="info-box tip">
            <strong>Practice:</strong> Create a <code>BankAccount</code> class with deposit, withdraw, and transfer methods. Add a <code>transfer()</code> method that moves money between two accounts.
        </div>
    </section>

    <section class="lesson-section">
        <h2>Practice Exercise</h2>
        <p>Create a class hierarchy: <code>Vehicle</code> as parent, with <code>Car</code> and <code>Motorcycle</code> as children. Each should have unique methods and override a common method.</p>
    </section>

    <?php require_once __DIR__ . '/../includes/prev-next-nav.php'; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>