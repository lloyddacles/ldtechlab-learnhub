<?php $pageTitle = 'Computational Thinking'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<?php $num = 2; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Computational Thinking</h1>
    <p class="lesson-desc">Master the 4 pillars of computational thinking that every programmer uses to solve problems.</p>
</div>

<h2>The 4 Pillars</h2>
<p>Computational thinking is a problem-solving approach used by programmers. It has four core pillars:</p>

<table>
    <thead>
        <tr><th>Pillar</th><th>What It Means</th><th>Everyday Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Decomposition</strong></td><td>Break big problems into small parts</td><td>Planning a party: food, venue, invitations</td></tr>
        <tr><td><strong>Pattern Recognition</strong></td><td>Find similarities and trends</td><td>Noticing you study better in the morning</td></tr>
        <tr><td><strong>Abstraction</strong></td><td>Ignore unnecessary details</td><td>Using a TV remote without knowing电路</td></tr>
        <tr><td><strong>Algorithmic Thinking</strong></td><td>Create step-by-step solutions</td><td>Following a recipe exactly</td></tr>
    </tbody>
</table>

<h2>Decomposition</h2>
<p>Decomposition means breaking a complex problem into smaller, manageable sub-problems. Each sub-problem is easier to solve individually.</p>

<h3>Example: Planning a Trip</h3>
<p>A "trip" is a huge task. But decomposed:</p>
<ol>
    <li><strong>Choose destination</strong> — research places, pick one</li>
    <li><strong>Book transportation</strong> — compare flights/trains, book tickets</li>
    <li><strong>Find accommodation</strong> — search hotels, make reservation</li>
    <li><strong>Pack</strong> — make a list, gather items</li>
    <li><strong>Create itinerary</strong> — plan daily activities</li>
</ol>

<div class="info-box tip">
    <div class="box-title">Tip</div>
    <p class="mb-0">When facing a programming problem that feels overwhelming, ask yourself: "Can I break this into 3-5 smaller problems?" Almost always, the answer is yes.</p>
</div>

<h2>Pattern Recognition</h2>
<p>Pattern recognition means finding similarities, trends, or recurring elements in problems. When you spot a pattern, you can reuse solutions instead of starting from scratch.</p>

<h3>Example: Grocery Shopping</h3>
<p>You notice that every week you buy milk, eggs, and bread. That's a pattern. Instead of thinking about each trip individually, you create a standard grocery list and check what's needed.</p>

<h3>Example: Student Grades</h3>
<p>A teacher notices that students who submit homework on time consistently score higher. That's a pattern — and it can inform a policy.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Pattern Recognition: Finding the sum of numbers 1 to N
// Instead of adding one by one, use the formula: n * (n + 1) / 2

$n = 100;

// Slow way: loop and add
$sum = 0;
for ($i = 1; $i <= $n; $i++) {
    $sum += $i;
}
echo "Loop method: $sum\n";

// Fast way: use the pattern/formula
$formulaSum = $n * ($n + 1) / 2;
echo "Formula method: $formulaSum\n";
echo "\nBoth give the same result!\n";
echo "The pattern saved us from doing 100 additions.\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Abstraction</h2>
<p>Abstraction means filtering out unnecessary details and focusing on what matters for the task at hand.</p>

<h3>Example: Driving a Car</h3>
<p>When you drive, you don't think about how the engine combustion works, how the transmission shifts gears, or how the brakes create friction. You abstract those details away and focus on: steering, gas, brakes. That's abstraction.</p>

<h3>Example: Using a Smartphone</h3>
<p>You tap an icon to open an app. You don't need to know how the operating system manages memory or how the network transmits data. You abstract those details away.</p>

<div class="info-box note">
    <div class="box-title">In Programming</div>
    <p class="mb-0">When you use a function like <code>echo</code> in PHP, you don't need to know how it internally sends data to the output buffer. That's abstraction — you use it without understanding every detail.</p>
</div>

<h2>Algorithmic Thinking</h2>
<p>Algorithmic thinking is the ability to create a clear, step-by-step set of instructions to solve a problem. It's the culmination of the other three pillars.</p>

<h3>Example: Making a Perfect Omelette</h3>
<ol>
    <li>Crack 3 eggs into a bowl</li>
    <li>Add a pinch of salt and pepper</li>
    <li>Whisk until well mixed</li>
    <li>Heat a non-stick pan on medium heat</li>
    <li>Add a tablespoon of butter</li>
    <li>Pour in the egg mixture</li>
    <li>Wait until edges set (about 2 minutes)</li>
    <li>Fold in half and slide onto a plate</li>
</ol>
<p>That's an algorithm — specific, ordered, and produces a consistent result.</p>

<div class="info-box warning">
    <div class="box-title">Key Difference</div>
    <p class="mb-0">An algorithm must be <strong>precise</strong> and <strong>unambiguous</strong>. "Cook until done" is vague. "Cook for 3 minutes on medium heat" is algorithmic.</p>
</div>

<h2>Putting It All Together</h2>
<p>Here's how all four pillars work together in solving a real problem: "Build a website that lists students and their grades."</p>

<table>
    <thead>
        <tr><th>Pillar</th><th>Application</th></tr>
    </thead>
    <tbody>
        <tr><td>Decomposition</td><td>Break into: database, display, input form, calculations</td></tr>
        <tr><td>Pattern Recognition</td><td>Each student has the same structure: name, ID, grades array</td></tr>
        <tr><td>Abstraction</td><td>Don't worry about how PHP connects to MySQL — use a function for it</td></tr>
        <tr><td>Algorithmic Thinking</td><td>Steps: connect → query → loop results → display</td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercise</h4>
    <p>Apply the 4 pillars to this problem: "Organize a small library at home."</p>
    <ol>
        <li><strong>Decomposition:</strong> What are the sub-tasks?</li>
        <li><strong>Pattern Recognition:</strong> What categories repeat? (fiction, non-fiction, etc.)</li>
        <li><strong>Abstraction:</strong> What details can you ignore for now?</li>
        <li><strong>Algorithmic Thinking:</strong> Write the step-by-step process</li>
    </ol>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Decomposition: Breaking a problem into parts
// Problem: Find the average of exam scores

// Step 1: Define the scores
$scores = [85, 92, 78, 95, 88];

// Step 2: Calculate the sum
$sum = 0;
foreach ($scores as $score) {
    $sum += $score;
}

// Step 3: Count the scores
$count = count($scores);

// Step 4: Calculate the average
$average = $sum / $count;

// Step 5: Display results
echo "Scores: " . implode(", ", $scores) . "\n";
echo "Sum: $sum\n";
echo "Count: $count\n";
echo "Average: $average\n";
echo "\nNotice how we broke one problem into 4 simple steps.\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Summary</h2>
<ul>
    <li><strong>Decomposition:</strong> Break big problems into smaller pieces</li>
    <li><strong>Pattern Recognition:</strong> Find similarities to reuse solutions</li>
    <li><strong>Abstraction:</strong> Focus on what matters, ignore the rest</li>
    <li><strong>Algorithmic Thinking:</strong> Create clear, step-by-step instructions</li>
</ul>

<div class="info-box tip">
    <div class="box-title">Remember</div>
    <p class="mb-0">These four skills aren't just for coding — they help you solve problems in everyday life. Practice them deliberately and you'll think more clearly about everything.</p>
</div>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>