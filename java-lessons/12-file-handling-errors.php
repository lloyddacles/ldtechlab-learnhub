<?php $pageTitle = 'File Handling & Exception Handling'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 12; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>File Handling & Exception Handling</h1>
    <p class="lesson-desc">Learn to work with files using the <code>File</code> class and readers/writers, and master exception handling with <code>try-catch-finally</code>.</p>
</div>

<h2>The File Class</h2>
<p>Java's <code>File</code> class represents file and directory paths. It can check existence, create files, and list directory contents.</p>

<table>
    <thead>
        <tr><th>Method</th><th>Returns</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td><code>exists()</code></td><td><code>boolean</code></td><td>File or directory exists</td></tr>
        <tr><td><code>isFile()</code></td><td><code>boolean</code></td><td>Is it a regular file?</td></tr>
        <tr><td><code>isDirectory()</code></td><td><code>boolean</code></td><td>Is it a directory?</td></tr>
        <tr><td><code>getName()</code></td><td><code>String</code></td><td>File name without path</td></tr>
        <tr><td><code>length()</code></td><td><code>long</code></td><td>File size in bytes</td></tr>
        <tr><td><code>delete()</code></td><td><code>boolean</code></td><td>Deletes the file</td></tr>
        <tr><td><code>mkdir()</code></td><td><code>boolean</code></td><td>Creates directory</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">File I/O Requires Exception Handling</div>
    <p class="mb-0">File operations can fail (file not found, permission denied, disk full). Java forces you to handle these with <strong>try-catch</strong> blocks.</p>
</div>

<h2>Writing to Files</h2>
<p>Use <code>FileWriter</code> or <code>BufferedWriter</code> to write text to files. Always close your writers or use try-with-resources.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; File Writing</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.io.FileWriter;
import java.io.BufferedWriter;
import java.io.IOException;

public class Sandbox {
    public static void main(String[] args) {
        String filename = "sandbox_test.txt";
        
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(filename))) {
            writer.write("Line 1: Hello from Java!");
            writer.newLine();
            writer.write("Line 2: File handling is useful.");
            writer.newLine();
            writer.write("Line 3: " + System.currentTimeMillis());
            System.out.println("Successfully wrote to " + filename);
        } catch (IOException e) {
            System.out.println("Error writing file: " + e.getMessage());
        }
        
        java.io.File file = new java.io.File(filename);
        System.out.println("File exists: " + file.exists());
        System.out.println("File size: " + file.length() + " bytes");
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

<h2>Reading from Files</h2>
<p>Use <code>BufferedReader</code> to read files line by line. It's efficient and easy to use.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; File Reading</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class Sandbox {
    public static void main(String[] args) {
        String filename = "sandbox_test.txt";
        
        java.io.File file = new java.io.File(filename);
        if (!file.exists()) {
            System.out.println("File not found. Run the writing example first.");
            return;
        }
        
        try (BufferedReader reader = new BufferedReader(new FileReader(filename))) {
            String line;
            int lineNum = 1;
            while ((line = reader.readLine()) != null) {
                System.out.println(lineNum + ": " + line);
                lineNum++;
            }
        } catch (IOException e) {
            System.out.println("Error reading file: " + e.getMessage());
        }
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

<h2>try-catch-finally</h2>
<p>Exception handling protects your program from crashing. The <code>try-catch-finally</code> structure handles errors gracefully.</p>

<table>
    <thead>
        <tr><th>Block</th><th>Purpose</th><th>Required?</th></tr>
    </thead>
    <tbody>
        <tr><td><code>try</code></td><td>Code that might throw an exception</td><td>Yes</td></tr>
        <tr><td><code>catch</code></td><td>Handle the exception</td><td>At least one catch or finally</td></tr>
        <tr><td><code>finally</code></td><td>Cleanup code (always runs)</td><td>Optional</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Exception Handling</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static int divide(int a, int b) {
        if (b == 0) {
            throw new ArithmeticException("Cannot divide by zero");
        }
        return a / b;
    }
    
    static int getElement(int[] arr, int index) {
        if (index < 0 || index >= arr.length) {
            throw new ArrayIndexOutOfBoundsException("Index " + index + " out of bounds");
        }
        return arr[index];
    }
    
    public static void main(String[] args) {
        System.out.println("--- Division ---");
        try {
            int result = divide(10, 3);
            System.out.println("10 / 3 = " + result);
        } catch (ArithmeticException e) {
            System.out.println("Error: " + e.getMessage());
        }
        
        try {
            int result = divide(10, 0);
            System.out.println("10 / 0 = " + result);
        } catch (ArithmeticException e) {
            System.out.println("Error: " + e.getMessage());
        }
        
        System.out.println("\\n--- Array Access ---");
        int[] numbers = {10, 20, 30};
        
        try {
            System.out.println("Element at 1: " + getElement(numbers, 1));
            System.out.println("Element at 5: " + getElement(numbers, 5));
        } catch (ArrayIndexOutOfBoundsException e) {
            System.out.println("Error: " + e.getMessage());
        }
        
        System.out.println("\\n--- Finally Block ---");
        try {
            System.out.println("Trying risky operation...");
            int x = Integer.parseInt("abc");
            System.out.println("Parsed: " + x);
        } catch (NumberFormatException e) {
            System.out.println("Caught: " + e.getMessage());
        } finally {
            System.out.println("Finally block always runs!");
        }
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

<h2>Common Exceptions</h2>

<table>
    <thead>
        <tr><th>Exception</th><th>Cause</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><code>NullPointerException</code></td><td>Using null reference</td><td><code>String s = null; s.length();</code></td></tr>
        <tr><td><code>ArrayIndexOutOfBoundsException</code></td><td>Invalid array index</td><td><code>int[] a = {1}; a[5];</code></td></tr>
        <tr><td><code>NumberFormatException</code></td><td>Invalid string-to-number</td><td><code>Integer.parseInt("abc");</code></td></tr>
        <tr><td><code>FileNotFoundException</code></td><td>File doesn't exist</td><td><code>new FileReader("missing.txt");</code></td></tr>
        <tr><td><code>ArithmeticException</code></td><td>Math error</td><td><code>5 / 0;</code></td></tr>
    </tbody>
</table>

<div class="info-box tip">
    <div class="box-title">Try-With-Resources</div>
    <p class="mb-0">Always use <code>try (resource) { }</code> syntax for files, connections, and streams. It automatically closes resources even if an exception occurs.</p>
</div>

<h2>Custom Exceptions</h2>
<p>Create your own exceptions by extending <code>Exception</code>. This lets you throw meaningful, domain-specific errors.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Custom Exceptions</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static class InsufficientFundsException extends Exception {
        private double deficit;
        
        InsufficientFundsException(double deficit) {
            super("Insufficient funds. Deficit: $" + String.format("%.2f", deficit));
            this.deficit = deficit;
        }
        
        double getDeficit() { return deficit; }
    }
    
    static class Wallet {
        private double balance;
        
        Wallet(double balance) { this.balance = balance; }
        
        void withdraw(double amount) throws InsufficientFundsException {
            if (amount > balance) {
                throw new InsufficientFundsException(amount - balance);
            }
            balance -= amount;
            System.out.println("Withdrew $" + amount + ". Remaining: $" + balance);
        }
        
        double getBalance() { return balance; }
    }
    
    public static void main(String[] args) {
        Wallet wallet = new Wallet(100);
        
        try {
            wallet.withdraw(30);
            wallet.withdraw(50);
            wallet.withdraw(30);
        } catch (InsufficientFundsException e) {
            System.out.println("Error: " + e.getMessage());
            System.out.println("You need $" + String.format("%.2f", e.getDeficit()) + " more.");
        }
        
        System.out.println("Final balance: $" + wallet.getBalance());
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
    <p class="mb-0">When should you create a custom exception vs using a built-in one? Use custom exceptions when you need to carry additional information (like <code>deficit</code>) or when the error represents a specific business rule violation.</p>
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