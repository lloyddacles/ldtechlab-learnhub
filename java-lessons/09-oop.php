<?php $pageTitle = 'Object-Oriented Programming'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 9; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Object-Oriented Programming</h1>
    <p class="lesson-desc">Learn the foundations of OOP in Java: classes, constructors, the <code>this</code> keyword, access modifiers, and getters/setters.</p>
</div>

<h2>Classes & Objects</h2>
<p>A <strong>class</strong> is a blueprint; an <strong>object</strong> is an instance of that class. Classes define what data (fields) and behavior (methods) an object has.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Your First Class</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static class Car {
        String brand;
        String color;
        int year;
        
        void displayInfo() {
            System.out.println(year + " " + color + " " + brand);
        }
    }
    
    public static void main(String[] args) {
        Car car1 = new Car();
        car1.brand = "Toyota";
        car1.color = "Red";
        car1.year = 2023;
        
        Car car2 = new Car();
        car2.brand = "Honda";
        car2.color = "Blue";
        car2.year = 2024;
        
        car1.displayInfo();
        car2.displayInfo();
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Constructors</h2>
<p>A <strong>constructor</strong> initializes an object when it's created. It has the same name as the class and no return type.</p>

<table>
    <thead>
        <tr><th>Type</th><th>Syntax</th><th>When Used</th></tr>
    </thead>
    <tbody>
        <tr><td>No-arg</td><td><code>public Car() { }</code></td><td>Default initialization</td></tr>
        <tr><td>Parameterized</td><td><code>public Car(String brand) { ... }</code></td><td>Initialize with values</td></tr>
        <tr><td>Copy</td><td><code>public Car(Car other) { ... }</code></td><td>Clone an object</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Constructors</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static class Student {
        String name;
        int age;
        double gpa;
        
        Student() {
            name = "Unknown";
            age = 0;
            gpa = 0.0;
        }
        
        Student(String name, int age, double gpa) {
            this.name = name;
            this.age = age;
            this.gpa = gpa;
        }
        
        void display() {
            System.out.println(name + " (age " + age + ", GPA: " + gpa + ")");
        }
    }
    
    public static void main(String[] args) {
        Student s1 = new Student();
        Student s2 = new Student("Alice", 20, 3.8);
        Student s3 = new Student("Bob", 22, 3.5);
        
        s1.display();
        s2.display();
        s3.display();
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>The <code>this</code> Keyword</h2>
<p><code>this</code> refers to the current object. It's essential when parameter names shadow instance variables.</p>

<div class="info-box tip">
    <div class="box-title">When to Use <code>this</code></div>
    <ul class="mb-0">
        <li>Resolve name ambiguity (parameter shadows field)</li>
        <li>Pass current object as a method argument</li>
        <li>Call another constructor: <code>this();</code> or <code>this(args);</code></li>
    </ul>
</div>

<h2>Access Modifiers</h2>
<p>Access modifiers control who can see and use your fields and methods:</p>

<table>
    <thead>
        <tr><th>Modifier</th><th>Same Class</th><th>Same Package</th><th>Subclass</th><th>Everywhere</th></tr>
    </thead>
    <tbody>
        <tr><td><code>public</code></td><td>Yes</td><td>Yes</td><td>Yes</td><td>Yes</td></tr>
        <tr><td><code>protected</code></td><td>Yes</td><td>Yes</td><td>Yes</td><td>No</td></tr>
        <tr><td>default (no keyword)</td><td>Yes</td><td>Yes</td><td>No</td><td>No</td></tr>
        <tr><td><code>private</code></td><td>Yes</td><td>No</td><td>No</td><td>No</td></tr>
    </tbody>
</table>

<h2>Getters & Setters</h2>
<p>Encapsulation means hiding internal data and exposing it through controlled access. Use <strong>private</strong> fields with <strong>public</strong> getters and setters.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Encapsulation</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static class BankAccount {
        private String owner;
        private double balance;
        
        BankAccount(String owner, double initialBalance) {
            this.owner = owner;
            this.balance = (initialBalance > 0) ? initialBalance : 0;
        }
        
        public String getOwner() {
            return owner;
        }
        
        public double getBalance() {
            return balance;
        }
        
        public boolean deposit(double amount) {
            if (amount <= 0) {
                System.out.println("Invalid deposit amount.");
                return false;
            }
            balance += amount;
            System.out.println("Deposited $" + amount + ". Balance: $" + balance);
            return true;
        }
        
        public boolean withdraw(double amount) {
            if (amount <= 0 || amount > balance) {
                System.out.println("Invalid withdrawal.");
                return false;
            }
            balance -= amount;
            System.out.println("Withdrew $" + amount + ". Balance: $" + balance);
            return true;
        }
        
        public String toString() {
            return owner + "\'s account: $" + balance;
        }
    }
    
    public static void main(String[] args) {
        BankAccount account = new BankAccount("Alice", 1000);
        System.out.println(account);
        
        account.deposit(500);
        account.withdraw(200);
        account.withdraw(2000);
        
        System.out.println("Final: " + account);
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box note">
    <div class="box-title">Think About It</div>
    <p class="mb-0">Why make <code>balance</code> private? If it were public, anyone could set it to any value. Getters/setters let you add validation logic&mdash;like rejecting negative deposits.</p>
</div>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'java-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'java-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>