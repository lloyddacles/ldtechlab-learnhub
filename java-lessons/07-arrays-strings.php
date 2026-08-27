<?php $pageTitle = 'Arrays & Strings'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 7; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Arrays & Strings</h1>
    <p class="lesson-desc">Master Java arrays, explore the Arrays utility class, and learn essential String manipulation techniques.</p>
</div>

<h2>Array Declaration & Initialization</h2>
<p>Java arrays are fixed-size containers that hold elements of the same type. Once created, their length cannot change.</p>

<table>
    <thead>
        <tr><th>Method</th><th>Syntax</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td>Declare & allocate</td><td><code>int[] arr = new int[5];</code></td><td>Creates array of size 5 with default values</td></tr>
        <tr><td>Literal initialization</td><td><code>int[] arr = {1, 2, 3};</code></td><td>Creates and fills array in one step</td></tr>
        <tr><td>Dynamic initialization</td><td><code>int[] arr = new int[]{1, 2};</code></td><td>Allocate and initialize together</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Array Basics</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        int[] numbers = {10, 20, 30, 40, 50};
        
        System.out.println("Array length: " + numbers.length);
        System.out.println("First element: " + numbers[0]);
        System.out.println("Last element: " + numbers[numbers.length - 1]);
        
        System.out.print("All elements: ");
        for (int i = 0; i < numbers.length; i++) {
            System.out.print(numbers[i] + " ");
        }
        System.out.println();
        
        // Enhanced for loop
        System.out.print("Enhanced loop: ");
        for (int num : numbers) {
            System.out.print(num + " ");
        }
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

<div class="info-box tip">
    <div class="box-title">Think About It</div>
    <p class="mb-0">What happens if you try to access <code>numbers[5]</code> in the example above? Java arrays are <strong>zero-indexed</strong>, so valid indices are 0 to length-1.</p>
</div>

<h2>The Arrays Utility Class</h2>
<p>Java provides <code>java.util.Arrays</code> with static methods for common array operations:</p>

<table>
    <thead>
        <tr><th>Method</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><code>sort()</code></td><td>Sorts array in ascending order</td><td><code>Arrays.sort(arr);</code></td></tr>
        <tr><td><code>toString()</code></td><td>Returns string representation</td><td><code>Arrays.toString(arr);</code></td></tr>
        <tr><td><code>fill()</code></td><td>Fills all elements with a value</td><td><code>Arrays.fill(arr, 0);</code></td></tr>
        <tr><td><code>binarySearch()</code></td><td>Searches sorted array</td><td><code>Arrays.binarySearch(arr, 5);</code></td></tr>
        <tr><td><code>copyOf()</code></td><td>Copies array to new length</td><td><code>Arrays.copyOf(arr, 10);</code></td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Arrays Utility</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.util.Arrays;

public class Sandbox {
    public static void main(String[] args) {
        int[] arr = {5, 2, 8, 1, 9, 3};
        
        System.out.println("Original: " + Arrays.toString(arr));
        
        Arrays.sort(arr);
        System.out.println("Sorted: " + Arrays.toString(arr));
        
        int index = Arrays.binarySearch(arr, 8);
        System.out.println("Index of 8: " + index);
        
        int[] filled = new int[5];
        Arrays.fill(filled, 42);
        System.out.println("Filled: " + Arrays.toString(filled));
        
        int[] copied = Arrays.copyOf(arr, 8);
        System.out.println("Copied (extended): " + Arrays.toString(copied));
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

<h2>String Methods</h2>
<p>Strings in Java are <strong>immutable</strong> &mdash; every method returns a new String. Master these essential methods:</p>

<table>
    <thead>
        <tr><th>Method</th><th>Returns</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td><code>length()</code></td><td><code>int</code></td><td>Number of characters</td></tr>
        <tr><td><code>charAt(i)</code></td><td><code>char</code></td><td>Character at index i</td></tr>
        <tr><td><code>substring(start, end)</code></td><td><code>String</code></td><td>Portion of string</td></tr>
        <tr><td><code>indexOf(str)</code></td><td><code>int</code></td><td>First occurrence position (-1 if not found)</td></tr>
        <tr><td><code>equals(other)</code></td><td><code>boolean</code></td><td>Content comparison (not reference)</td></tr>
        <tr><td><code>toLowerCase()</code></td><td><code>String</code></td><td>Converts to lowercase</td></tr>
        <tr><td><code>trim()</code></td><td><code>String</code></td><td>Removes leading/trailing whitespace</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; String Manipulation</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        String text = "  Hello, Java World!  ";
        
        System.out.println("Original: \\"" + text + "\\"");
        System.out.println("Length: " + text.length());
        System.out.println("Trimmed: \\"" + text.trim() + "\\"");
        System.out.println("Uppercase: \\"" + text.trim().toUpperCase() + "\\"");
        
        String clean = text.trim();
        System.out.println("charAt(0): " + clean.charAt(0));
        System.out.println("charAt(7): " + clean.charAt(7));
        
        System.out.println("indexOf(\\"Java\\"): " + clean.indexOf("Java"));
        System.out.println("substring(7, 11): " + clean.substring(7, 11));
        System.out.println("substring(7): " + clean.substring(7));
        
        System.out.println("equals(\\"Hello, Java World!\\"): " + clean.equals("Hello, Java World!"));
        System.out.println("contains(\\"Java\\"): " + clean.contains("Java"));
        System.out.println("startsWith(\\"Hello\\"): " + clean.startsWith("Hello"));
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
    <div class="box-title">String Immutability</div>
    <p class="mb-0">When you call <code>text.trim()</code>, it doesn't modify <code>text</code>. It returns a <em>new</em> string. Always assign the result: <code>String clean = text.trim();</code></p>
</div>

<h2>StringBuilder</h2>
<p>For frequent string modifications, use <code>StringBuilder</code>. It's mutable and much faster than concatenating Strings in loops.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; StringBuilder</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        StringBuilder sb = new StringBuilder("Hello");
        
        sb.append(" World");
        sb.append("!");
        System.out.println("After append: " + sb.toString());
        
        sb.insert(5, ",");
        System.out.println("After insert: " + sb.toString());
        
        sb.delete(5, 6);
        System.out.println("After delete: " + sb.toString());
        
        sb.replace(6, 11, "Java");
        System.out.println("After replace: " + sb.toString());
        
        System.out.println("Reverse: " + sb.reverse().toString());
        sb.reverse();
        
        System.out.println("Length: " + sb.length());
        System.out.println("charAt(6): " + sb.charAt(6));
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

<div class="info-box tip">
    <div class="box-title">When to Use StringBuilder</div>
    <p class="mb-0">Use <code>StringBuilder</code> when building strings in loops or when you need to modify a string many times. For simple concatenation, the <code>+</code> operator is fine.</p>
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