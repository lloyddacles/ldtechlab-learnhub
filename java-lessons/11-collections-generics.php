<?php $pageTitle = 'Collections & Generics'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 11; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Collections & Generics</h1>
    <p class="lesson-desc">Master <code>ArrayList</code>, <code>HashMap</code>, <code>HashSet</code>, iteration patterns, and generics for type-safe collections.</p>
</div>

<h2>ArrayList</h2>
<p><code>ArrayList</code> is a resizable array. Unlike regular arrays, it grows and shrinks dynamically. It stores objects, not primitives.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; ArrayList Basics</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.util.ArrayList;

public class Sandbox {
    public static void main(String[] args) {
        ArrayList<String> fruits = new ArrayList<>();
        
        fruits.add("Apple");
        fruits.add("Banana");
        fruits.add("Cherry");
        System.out.println("Fruits: " + fruits);
        
        fruits.add(1, "Orange");
        System.out.println("After insert: " + fruits);
        
        fruits.remove("Banana");
        System.out.println("After remove: " + fruits);
        
        System.out.println("Size: " + fruits.size());
        System.out.println("Get(0): " + fruits.get(0));
        System.out.println("Contains Cherry: " + fruits.contains("Cherry"));
        
        fruits.set(2, "Mango");
        System.out.println("After set: " + fruits);
        
        int index = fruits.indexOf("Mango");
        System.out.println("Index of Mango: " + index);
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

<h2>HashMap</h2>
<p><code>HashMap</code> stores key-value pairs. Keys must be unique. It provides fast O(1) lookups by key.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; HashMap</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.util.HashMap;

public class Sandbox {
    public static void main(String[] args) {
        HashMap<String, Integer> ages = new HashMap<>();
        
        ages.put("Alice", 25);
        ages.put("Bob", 30);
        ages.put("Carol", 22);
        System.out.println("Ages: " + ages);
        
        System.out.println("Alice: " + ages.get("Alice"));
        System.out.println("Contains Bob: " + ages.containsKey("Bob"));
        System.out.println("Contains age 25: " + ages.containsValue(25));
        
        ages.put("Bob", 31);
        System.out.println("Updated Bob: " + ages.get("Bob"));
        
        ages.remove("Carol");
        System.out.println("After remove: " + ages);
        System.out.println("Size: " + ages.size());
        
        System.out.print("Keys: ");
        for (String key : ages.keySet()) {
            System.out.print(key + " ");
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

<h2>HashSet</h2>
<p><code>HashSet</code> stores unique elements with no guaranteed order. Use it for membership testing and removing duplicates.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; HashSet</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.util.HashSet;

public class Sandbox {
    public static void main(String[] args) {
        HashSet<String> colors = new HashSet<>();
        
        colors.add("Red");
        colors.add("Green");
        colors.add("Blue");
        colors.add("Red");
        colors.add("Green");
        System.out.println("Colors (duplicates removed): " + colors);
        
        System.out.println("Contains Red: " + colors.contains("Red"));
        colors.remove("Green");
        System.out.println("After remove Green: " + colors);
        System.out.println("Size: " + colors.size());
        
        HashSet<Integer> nums1 = new HashSet<>();
        nums1.add(1); nums1.add(2); nums1.add(3);
        
        HashSet<Integer> nums2 = new HashSet<>();
        nums2.add(2); nums2.add(3); nums2.add(4);
        
        HashSet<Integer> intersection = new HashSet<>(nums1);
        intersection.retainAll(nums2);
        System.out.println("Intersection: " + intersection);
        
        HashSet<Integer> union = new HashSet<>(nums1);
        union.addAll(nums2);
        System.out.println("Union: " + union);
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

<h2>Iteration Patterns</h2>
<p>Java provides several ways to iterate through collections. Choose the right one for your needs.</p>

<table>
    <thead>
        <tr><th>Pattern</th><th>Syntax</th><th>Best For</th></tr>
    </thead>
    <tbody>
        <tr><td>Enhanced for</td><td><code>for (T item : list)</code></td><td>Simple iteration</td></tr>
        <tr><td>Index-based</td><td><code>for (int i = 0; i &lt; list.size(); i++)</code></td><td>When you need the index</td></tr>
        <tr><td>Iterator</td><td><code>Iterator&lt;T&gt; it = list.iterator();</code></td><td>Safe removal during iteration</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Iteration</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.util.ArrayList;
import java.util.Iterator;

public class Sandbox {
    public static void main(String[] args) {
        ArrayList<Integer> numbers = new ArrayList<>();
        for (int i = 1; i <= 10; i++) {
            numbers.add(i);
        }
        
        System.out.print("Enhanced for: ");
        for (int n : numbers) {
            System.out.print(n + " ");
        }
        System.out.println();
        
        System.out.print("Index-based: ");
        for (int i = 0; i < numbers.size(); i++) {
            System.out.print(numbers.get(i) + " ");
        }
        System.out.println();
        
        Iterator<Integer> it = numbers.iterator();
        while (it.hasNext()) {
            int n = it.next();
            if (n % 2 == 0) {
                it.remove();
            }
        }
        System.out.println("After removing evens: " + numbers);
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

<h2>Generics Basics</h2>
<p>Generics let you write type-safe code. Instead of <code>ArrayList</code>, write <code>ArrayList&lt;String&gt;</code> to ensure only Strings are added.</p>

<div class="info-box tip">
    <div class="box-title">Why Generics?</div>
    <ul class="mb-0">
        <li><strong>Type safety:</strong> Catch errors at compile time, not runtime</li>
        <li><strong>No casting:</strong> No need for <code>(String)</code> casts when retrieving</li>
        <li><strong>Cleaner code:</strong> Intent is clear from the type parameter</li>
    </ul>
</div>

<div class="info-box note">
    <div class="box-title">Which Collection to Use?</div>
    <p class="mb-0"><strong>ArrayList:</strong> Ordered list, fast access by index. <strong>HashMap:</strong> Key-value lookups. <strong>HashSet:</strong> Unique elements, fast membership tests. Choose based on your primary operation.</p>
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