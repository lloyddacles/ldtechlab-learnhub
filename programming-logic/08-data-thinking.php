<?php $pageTitle = 'Thinking About Data'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson 8</span>
    <h1>Thinking About Data</h1>
    <p class="lesson-desc">Data is the "stuff" programs work with — learn to choose the right structure and model real-world information.</p>
</div>

<div class="info-box tip">
    <div class="box-title">Core Idea</div>
    <p class="mb-0">Programs are just data in, data out. Before you write a single line of code, ask: <strong>"What data do I have? How is it shaped? What do I need to do with it?"</strong> The answers shape your entire program.</p>
</div>

<h2>Data is the Foundation</h2>
<p>Every program processes data. A calculator processes numbers. A contacts app processes names, emails, and phone numbers. A game processes player positions and scores. The first step is always: <strong>what data am I working with?</strong></p>
<p>Think of data like real-world objects: a student has a name, grades, and an ID. An item in a store has a price, quantity, and category. Your job is to represent these in PHP.</p>

<h2>Choosing Structures</h2>
<p>PHP gives you arrays, and arrays can hold anything. But how you organize them matters:</p>

<table>
    <thead><tr><th>Structure</th><th>Best For</th><th>Example</th></tr></thead>
    <tbody>
        <tr><td>Indexed array</td><td>Simple lists</td><td><code>["red", "green", "blue"]</code></td></tr>
        <tr><td>Associative array</td><td>One item with properties</td><td><code>["name" => "Alice", "age" => 20]</code></td></tr>
        <tr><td>Nested array</td><td>Collections of items</td><td>Array of associative arrays</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">Think About It</div>
    <p>Which structure fits? A single student record → associative array. A list of students → nested array. A list of colors → indexed array.</p>
</div>

<h2>Data Modeling</h2>
<p>Data modeling means deciding <strong>how to represent</strong> real-world things in your code. Start with the real thing, then list its properties:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Modeling a student
$student = [
    "name" => "Alice",
    "id" => "S001",
    "grades" => [85, 92, 78, 95],
    "active" => true
];

echo "Student: {$student[\"name\"]}\\n";
echo "ID: {$student[\"id\"]}\\n";
echo "Grades: " . implode(", ", $student[\"grades\"]) . "\\n";

// Modeling a collection of students
$students = [
    [
        "name" => "Alice",
        "grades" => [85, 92, 78, 95]
    ],
    [
        "name" => "Bob",
        "grades" => [70, 65, 80, 72]
    ],
    [
        "name" => "Charlie",
        "grades" => [90, 88, 92, 85]
    ]
];

echo "\\n--- All Students ---\\n";
for ($i = 0; $i < count($students); $i++) {
    $avg = array_sum($students[$i]["grades"]) / count($students[$i]["grades"]);
    echo "{$students[$i][\"name\"]}: avg = " . round($avg, 1) . "\\n";
}
'); ?></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Input Validation Thinking</h2>
<p>Never trust data from users. Always validate before processing:</p>

<table>
    <thead><tr><th>Check</th><th>Why</th><th>PHP Function</th></tr></thead>
    <tbody>
        <tr><td>Is it empty?</td><td>Missing data</td><td><code>empty()</code></td></tr>
        <tr><td>Is it the right type?</td><td>Wrong data causes errors</td><td><code>is_numeric()</code>, <code>is_string()</code></td></tr>
        <tr><td>Is it in range?</td><td>Prevent invalid values</td><td>Comparison operators</td></tr>
        <tr><td>Is it safe?</td><td>Prevent injection attacks</td><td><code>htmlspecialchars()</code></td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Model and Query a Dataset</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
$students = [
    ["name" => "Alice", "grade" => 92, "major" => "CS"],
    ["name" => "Bob", "grade" => 78, "major" => "Math"],
    ["name" => "Charlie", "grade" => 85, "major" => "CS"],
    ["name" => "Diana", "grade" => 95, "major" => "English"],
    ["name" => "Eve", "grade" => 88, "major" => "CS"],
    ["name" => "Frank", "grade" => 62, "major" => "Math"]
];

// Find students with grade above 85
echo "=== Grade > 85 ===\\n";
for ($i = 0; $i < count($students); $i++) {
    if ($students[$i]["grade"] > 85) {
        echo "{$students[$i][\"name\"]}: {$students[$i][\"grade\"]}\\n";
    }
}

// Find CS majors
echo "\\n=== CS Majors ===\\n";
for ($i = 0; $i < count($students); $i++) {
    if ($students[$i]["major"] === "CS") {
        echo "{$students[$i][\"name\"]}: {$students[$i][\"grade\"]}\\n";
    }
}

// Calculate average grade
$sum = 0;
for ($i = 0; $i < count($students); $i++) {
    $sum += $students[$i]["grade"];
}
$avg = $sum / count($students);
echo "\\nClass Average: " . round($avg, 1) . "\\n";
'); ?></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Data Flow</h2>
<p>Data flows through your program like water through pipes. Input → Processing → Output. Understanding this flow helps you debug and design:</p>
<ol>
    <li><strong>Input:</strong> Where does the data come from? (user, file, database)</li>
    <li><strong>Processing:</strong> What do you need to do with it? (filter, transform, calculate)</li>
    <li><strong>Output:</strong> Where does the result go? (screen, file, database)</li>
</ol>

<h2>Transformation Pipelines</h2>
<p>A pipeline is a series of steps that transform data. Each step takes input, processes it, and passes the result to the next step:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Sandbox: Data Transformation Pipeline</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Raw data
$rawScores = [85, -5, 92, 105, 78, 60, 0, 88, 73, 150];

// Step 1: Filter invalid scores (0-100 only)
$valid = [];
for ($i = 0; $i < count($rawScores); $i++) {
    if ($rawScores[$i] >= 0 && $rawScores[$i] <= 100) {
        $valid[] = $rawScores[$i];
    }
}
echo "Step 1 - Valid scores: " . implode(", ", $valid) . "\\n";

// Step 2: Sort ascending
sort($valid);
echo "Step 2 - Sorted: " . implode(", ", $valid) . "\\n";

// Step 3: Map to grades
$grades = [];
for ($i = 0; $i < count($valid); $i++) {
    $s = $valid[$i];
    if ($s >= 90) $g = "A";
    elseif ($s >= 80) $g = "B";
    elseif ($s >= 70) $g = "C";
    elseif ($s >= 60) $g = "D";
    else $g = "F";
    $grades[] = "{$s}->{$g}";
}
echo "Step 3 - Mapped: " . implode(", ", $grades) . "\\n";

// Step 4: Aggregate — count each grade
$counts = ["A" => 0, "B" => 0, "C" => 0, "D" => 0, "F" => 0];
for ($i = 0; $i < count($valid); $i++) {
    $s = $valid[$i];
    if ($s >= 90) $counts["A"]++;
    elseif ($s >= 80) $counts["B"]++;
    elseif ($s >= 70) $counts["C"]++;
    elseif ($s >= 60) $counts["D"]++;
    else $counts["F"]++;
}
echo "Step 4 - Counts:\\n";
foreach ($counts as $grade => $count) {
    echo "  {$grade}: {$count}\\n";
}
'); ?></textarea>
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
    <div class="box-title">Pipeline Thinking</div>
    <p class="mb-0">Break complex problems into small, clear steps. Each step does one thing and passes the result forward. This makes code easier to write, test, and debug.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Model an inventory system: items with name, price, quantity, category. Find all items under $10.</li>
        <li>Build a data pipeline: take a string of comma-separated numbers, filter out negatives, calculate the average.</li>
        <li>Model a contact list: name, email, phone. Validate that all emails contain "@".</li>
        <li>Transform a list of temperatures from Celsius to Fahrenheit, then find the hottest day.</li>
    </ol>
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
