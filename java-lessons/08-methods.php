<?php $pageTitle = 'Methods'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 8; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Methods</h1>
    <p class="lesson-desc">Learn to declare methods, use parameters and return types, understand scope, and explore recursion in Java.</p>
</div>

<h2>Method Declaration</h2>
<p>Methods are blocks of code that perform a specific task. Every Java method follows this structure:</p>

<div class="syntax-ref">
    <h4>Syntax: Method Declaration</h4>
    <code>accessModifier returnType methodName(parameters) { body }</code>
</div>

<table>
    <thead>
        <tr><th>Component</th><th>Options</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td>Access Modifier</td><td><code>public</code>, <code>private</code>, <code>protected</code>, default</td><td><code>public</code></td></tr>
        <tr><td>Return Type</td><td><code>void</code>, <code>int</code>, <code>String</code>, etc.</td><td><code>int</code></td></tr>
        <tr><td>Parameters</td><td>Zero or more type-name pairs</td><td><code>int a, int b</code></td></tr>
        <tr><td>Return Statement</td><td>Required if non-void</td><td><code>return a + b;</code></td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Basic Methods</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static int add(int a, int b) {
        return a + b;
    }
    
    static void greet(String name) {
        System.out.println("Hello, " + name + "!");
    }
    
    static double calculateArea(double length, double width) {
        return length * width;
    }
    
    public static void main(String[] args) {
        int sum = add(15, 25);
        System.out.println("15 + 25 = " + sum);
        
        greet("Java Student");
        greet("World");
        
        double area = calculateArea(5.0, 3.5);
        System.out.println("Area: " + area);
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

<h2>Method Overloading</h2>
<p>Method overloading means having multiple methods with the <strong>same name</strong> but <strong>different parameter lists</strong>. Java decides which method to call based on the arguments.</p>

<div class="info-box tip">
    <div class="box-title">Overloading Rules</div>
    <p class="mb-0">Parameters must differ in number, type, or order. Return type alone does <strong>not</strong> determine overloading.</p>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Method Overloading</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static int max(int a, int b) {
        return (a > b) ? a : b;
    }
    
    static double max(double a, double b) {
        return (a > b) ? a : b;
    }
    
    static int max(int a, int b, int c) {
        return max(max(a, b), c);
    }
    
    static String repeat(String text, int times) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < times; i++) {
            sb.append(text);
        }
        return sb.toString();
    }
    
    static String repeat(char ch, int times) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < times; i++) {
            sb.append(ch);
        }
        return sb.toString();
    }
    
    public static void main(String[] args) {
        System.out.println("max(10, 20): " + max(10, 20));
        System.out.println("max(3.5, 2.1): " + max(3.5, 2.1));
        System.out.println("max(5, 15, 8): " + max(5, 15, 8));
        
        System.out.println("repeat(\\"ha\\", 3): " + repeat("ha", 3));
        System.out.println("repeat(\'-\', 20): " + repeat('-', 20));
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

<h2>Static vs Instance Methods</h2>
<p><strong>Static methods</strong> belong to the class and can be called without creating an object. <strong>Instance methods</strong> belong to an object and can access instance variables.</p>

<table>
    <thead>
        <tr><th>Feature</th><th>Static Method</th><th>Instance Method</th></tr>
    </thead>
    <tbody>
        <tr><td>Keyword</td><td><code>static</code></td><td>No keyword</td></tr>
        <tr><td>Called on</td><td>Class name</td><td>Object instance</td></tr>
        <tr><td>Access to</td><td>Static variables only</td><td>Instance + static variables</td></tr>
        <tr><td>Example</td><td><code>Math.sqrt(4)</code></td><td><code>str.length()</code></td></tr>
    </tbody>
</table>

<h2>Recursion</h2>
<p>A method that calls itself is <strong>recursive</strong>. Every recursion needs a <strong>base case</strong> to stop, and a <strong>recursive case</strong> that moves toward it.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Recursion</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static int factorial(int n) {
        if (n <= 1) return 1;
        return n * factorial(n - 1);
    }
    
    static int fibonacci(int n) {
        if (n <= 0) return 0;
        if (n == 1) return 1;
        return fibonacci(n - 1) + fibonacci(n - 2);
    }
    
    static void printStars(int n) {
        if (n <= 0) return;
        System.out.print("* ");
        printStars(n - 1);
    }
    
    public static void main(String[] args) {
        System.out.println("factorial(5): " + factorial(5));
        System.out.println("factorial(10): " + factorial(10));
        
        System.out.print("Fibonacci(10): ");
        for (int i = 0; i <= 10; i++) {
            System.out.print(fibonacci(i) + " ");
        }
        System.out.println();
        
        System.out.print("5 stars: ");
        printStars(5);
        System.out.println();
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
    <p class="mb-0">What happens if you call <code>factorial(-1)</code>? Without a proper base case check, recursion can cause a <code>StackOverflowError</code>. Always ensure your base case handles edge inputs.</p>
</div>

<h2>Practice: Build Utility Methods</h2>
<p>Create a small utility class with methods for common tasks:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Utility Methods</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static boolean isEven(int n) {
        return n % 2 == 0;
    }
    
    static int clamp(int value, int min, int max) {
        if (value < min) return min;
        if (value > max) return max;
        return value;
    }
    
    static String padLeft(String text, int length, char pad) {
        StringBuilder sb = new StringBuilder();
        while (sb.length() + text.length() < length) {
            sb.append(pad);
        }
        sb.append(text);
        return sb.toString();
    }
    
    static double average(int[] numbers) {
        int sum = 0;
        for (int n : numbers) {
            sum += n;
        }
        return (double) sum / numbers.length;
    }
    
    public static void main(String[] args) {
        System.out.println("isEven(4): " + isEven(4));
        System.out.println("isEven(7): " + isEven(7));
        
        System.out.println("clamp(15, 0, 10): " + clamp(15, 0, 10));
        System.out.println("clamp(-5, 0, 10): " + clamp(-5, 0, 10));
        System.out.println("clamp(5, 0, 10): " + clamp(5, 0, 10));
        
        System.out.println("padLeft(\\"42\\", 6, \'0\'): " + padLeft("42", 6, \'0\'));
        
        int[] scores = {85, 92, 78, 95, 88};
        System.out.println("Average: " + average(scores));
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

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'java-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'java-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>