<?php
$pageTitle = 'PHP Arrays';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 11;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Arrays</h1>
    <p class="lesson-desc">Store collections of data using indexed, associative, and multidimensional arrays.</p>
</div>

<h2>What Are Arrays?</h2>
<p>An array is a <strong>collection of values</strong> stored in a single variable. Instead of creating separate variables for each item, you can store them all in an array.</p>

<h2>Indexed Arrays</h2>
<p>Arrays with numeric indexes (starting from 0):</p>

<div class="syntax-ref">
    <h4>Syntax: Creating Indexed Arrays</h4>
    <code>$fruits = ["Apple", "Banana", "Cherry"];     // Short syntax (PHP 5.4+)</code>
    <code>$fruits = array("Apple", "Banana", "Cherry"); // array() function</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Create an indexed array
$fruits = ["Apple", "Banana", "Cherry", "Date"];

// Access by index (0-based)
echo "First: " . $fruits[0];    // Apple
echo "\n";
echo "Second: " . $fruits[1];   // Banana
echo "\n";
echo "Third: " . $fruits[2];    // Cherry
echo "\n\n";

// Array length
echo "Total fruits: " . count($fruits);
echo "\n\n";

// Modify an element
$fruits[1] = "Blueberry";
echo "Modified second: " . $fruits[1];
echo "\n\n";

// Add new elements
$fruits[] = "Elderberry";  // Add to end
$fruits[] = "Fig";

echo "All fruits:\n";
for ($i = 0; $i < count($fruits); $i++) {
    echo "$i: " . $fruits[$i] . "\n";
}
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

<h2>Associative Arrays</h2>
<p>Arrays with named keys (like a dictionary):</p>

<div class="syntax-ref">
    <h4>Syntax: Associative Arrays</h4>
    <code>$person = ["name" => "Alice", "age" => 25];</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Create an associative array
$person = [
    "name" => "Alice Smith",
    "age" => 25,
    "email" => "alice@example.com",
    "major" => "Computer Science"
];

// Access by key
echo "Name: " . $person["name"];
echo "\n";
echo "Age: " . $person["age"];
echo "\n\n";

// Loop through with foreach
echo "All information:\n";
foreach ($person as $key => $value) {
    echo "  " . ucfirst($key) . ": $value\n";
}
echo "\n";

// Add a new key-value pair
$person["gpa"] = 3.85;
$person["year"] = "Senior";

echo "Updated person:\n";
foreach ($person as $key => $value) {
    echo "  $key => $value\n";
}
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

<h2>Multidimensional Arrays</h2>
<p>Arrays containing other arrays:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Array of students (each student is an array)
$students = [
    ["name" => "Alice", "grade" => 95, "subject" => "Math"],
    ["name" => "Bob", "grade" => 87, "subject" => "Science"],
    ["name" => "Carol", "grade" => 92, "subject" => "English"],
];

// Loop through the 2D array
echo "=== Student Grades ===\n";
foreach ($students as $student) {
    echo $student["name"] . " - " . $student["subject"] . ": " . $student["grade"] . "%\n";
}
echo "\n";

// Calculate average grade
$total = 0;
foreach ($students as $student) {
    $total += $student["grade"];
}
$average = $total / count($students);
echo "Class Average: " . round($average, 1) . "%";
echo "\n\n";

// Simple 2D grid (matrix)
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

echo "=== 3x3 Matrix ===\n";
foreach ($matrix as $row) {
    foreach ($row as $cell) {
        echo str_pad($cell, 4);
    }
    echo "\n";
}
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

<h2>Useful Array Functions</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$numbers = [3, 1, 4, 1, 5, 9, 2, 6];

echo "Original: " . implode(", ", $numbers);
echo "\n";

// Sort (modifies original array)
sort($numbers);
echo "Sorted: " . implode(", ", $numbers);
echo "\n";

// Reverse
$rnumbers = array_reverse($numbers);
echo "Reversed: " . implode(", ", $rnumbers);
echo "\n";

// Add/remove elements
$colors = ["Red", "Green"];
array_push($colors, "Blue", "Yellow");   // Add to end
echo "After push: " . implode(", ", $colors);
echo "\n";

$popped = array_pop($colors);            // Remove from end
echo "Popped: $popped | Remaining: " . implode(", ", $colors);
echo "\n\n";

// Searching
$search = in_array("Green", $colors);    // Check if value exists
echo "Contains Green: " . var_export($search, true);
echo "\n";

$key = array_search("Blue", $colors);    // Find index of value
echo "Blue is at index: $key";
echo "\n\n";

// Merging
$a = [1, 2, 3];
$b = [4, 5, 6];
$merged = array_merge($a, $b);
echo "Merged: " . implode(", ", $merged);
echo "\n";

// Unique values
$dups = [1, 2, 2, 3, 3, 3, 4];
$unique = array_unique($dups);
echo "Unique: " . implode(", ", $unique);
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

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create an array of your 5 favorite movies. Loop through and print each one with its number.</li>
        <li>Create an associative array representing a book (title, author, year, pages) and display all info.</li>
        <li>Write a program that takes an array of numbers and finds the largest and smallest values.</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug']) ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug']) ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
