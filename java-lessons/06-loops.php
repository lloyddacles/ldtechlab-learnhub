<?php $pageTitle = 'Loop Statements'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 6; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Loop Statements</h1>
    <p class="lesson-desc">Master repetition in Java: for loops, while loops, do-while loops, break/continue, and nested loops.</p>
</div>

<h2>The for Loop</h2>
<p>The <code>for</code> loop is ideal when you know how many times to repeat something. It has three parts: initialization, condition, and update.</p>

<pre><code>for (int i = 0; i < 5; i++) {
    System.out.println("Iteration: " + i);
}
// Prints 0, 1, 2, 3, 4</code></pre>

<table>
    <thead>
        <tr><th>Part</th><th>Purpose</th><th>Executes</th></tr>
    </thead>
    <tbody>
        <tr><td><code>int i = 0</code></td><td>Initialization</td><td>Once, before the loop starts</td></tr>
        <tr><td><code>i < 5</code></td><td>Condition</td><td>Before each iteration</td></tr>
        <tr><td><code>i++</code></td><td>Update</td><td>After each iteration</td></tr>
    </tbody>
</table>

<h2>The while Loop</h2>
<p>The <code>while</code> loop repeats as long as its condition is <code>true</code>. Use it when you do not know the exact number of iterations.</p>

<pre><code>int count = 0;
while (count < 5) {
    System.out.println("Count: " + count);
    count++;
}</code></pre>

<div class="info-box note">
    <div class="box-title">Warning: Infinite Loops</div>
    <p class="mb-0">If the condition never becomes <code>false</code>, the loop runs forever. Always make sure the loop variable changes inside the loop body. An infinite loop will freeze your program.</p>
</div>

<h2>The do-while Loop</h2>
<p>The <code>do-while</code> loop executes the body <strong>at least once</strong> before checking the condition. It guarantees one execution.</p>

<pre><code>int num = 10;
do {
    System.out.println("Number: " + num);
    num++;
} while (num < 5);
// Prints "Number: 10" even though 10 < 5 is false</code></pre>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        System.out.println("=== For Loop ===");
        for (int i = 1; i <= 5; i++) {
            System.out.println("for: " + i);
        }

        System.out.println("\\n=== While Loop ===");
        int w = 1;
        while (w <= 5) {
            System.out.println("while: " + w);
            w++;
        }

        System.out.println("\\n=== Do-While Loop ===");
        int d = 1;
        do {
            System.out.println("do-while: " + d);
            d++;
        } while (d <= 5);
    }
}') ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>break and continue</h2>
<p>Control loop flow with two powerful keywords:</p>

<table>
    <thead>
        <tr><th>Keyword</th><th>Effect</th></tr>
    </thead>
    <tbody>
        <tr><td><code>break</code></td><td>Exits the loop entirely</td></tr>
        <tr><td><code>continue</code></td><td>Skips the current iteration and moves to the next</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        System.out.println("=== break: Stop at 5 ===");
        for (int i = 1; i <= 10; i++) {
            if (i == 6) {
                System.out.println("Found 6! Breaking...");
                break;
            }
            System.out.println("i = " + i);
        }

        System.out.println("\\n=== continue: Skip even ===");
        for (int i = 1; i <= 10; i++) {
            if (i % 2 == 0) {
                continue;
            }
            System.out.println("odd: " + i);
        }
    }
}') ?>"></textarea>
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
    <p class="mb-0">In the break example, the loop checks <code>i == 6</code> after printing. What if you moved the print statement after the if-block? Would anything change?</p>
</div>

<h2>Enhanced for-each Loop</h2>
<p>When iterating over an array or collection, the <code>for-each</code> loop is cleaner and less error-prone.</p>

<pre><code>int[] numbers = {10, 20, 30, 40, 50};
for (int num : numbers) {
    System.out.println(num);
}</code></pre>

<div class="info-box note">
    <div class="box-title">for vs for-each</div>
    <p class="mb-0">Use the regular <code>for</code> loop when you need the index. Use <code>for-each</code> when you only need the values. The for-each loop is safer because there are no index variables to get wrong.</p>
</div>

<h2>Nested Loops</h2>
<p>Put a loop inside another loop to process 2D patterns, matrices, or combinations.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    public static void main(String[] args) {
        // Multiplication table (1 to 5)
        System.out.println("=== Multiplication Table ===");
        System.out.print("    ");
        for (int i = 1; i <= 5; i++) {
            System.out.printf("%4d", i);
        }
        System.out.println();

        for (int i = 1; i <= 5; i++) {
            System.out.printf("%2d |", i);
            for (int j = 1; j <= 5; j++) {
                System.out.printf("%4d", i * j);
            }
            System.out.println();
        }

        // Star pattern
        System.out.println("\\n=== Star Pattern ===");
        for (int row = 1; row <= 5; row++) {
            for (int col = 1; col <= row; col++) {
                System.out.print("* ");
            }
            System.out.println();
        }
    }
}') ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Loop Comparison</h2>
<table>
    <thead>
        <tr><th>Loop Type</th><th>Best For</th><th>Guaranteed Execution</th></tr>
    </thead>
    <tbody>
        <tr><td><code>for</code></td><td>Known number of iterations</td><td>Zero or more</td></tr>
        <tr><td><code>while</code></td><td>Unknown iterations, condition-first</td><td>Zero or more</td></tr>
        <tr><td><code>do-while</code></td><td>Must execute at least once</td><td>One or more</td></tr>
        <tr><td><code>for-each</code></td><td>Iterating arrays/collections</td><td>Zero or more</td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a for loop that prints all even numbers from 1 to 50</li>
        <li>Use a while loop to calculate the sum of numbers from 1 to 100</li>
        <li>Print a right-aligned triangle of stars using nested for loops</li>
        <li>Use break to find the first number divisible by 7 between 50 and 100</li>
        <li>Use continue to print all numbers from 1 to 30 that are not divisible by 3</li>
    </ol>
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