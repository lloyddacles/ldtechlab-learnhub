<?php
$pageTitle = 'Deleting Data';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 7;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Deleting Data</h1>
    <p class="lesson-desc">Remove records from tables using DELETE and TRUNCATE.</p>
</div>

<h2>DELETE Statement</h2>

<div class="syntax-ref">
    <h4>Syntax: DELETE</h4>
    <code>DELETE FROM table_name WHERE condition;</code>
</div>

<pre><code>-- Delete a specific row
DELETE FROM employees
WHERE name = 'Henry Wu';

-- Delete multiple rows
DELETE FROM employees
WHERE department = 'Sales';

-- Delete with complex conditions
DELETE FROM employees
WHERE salary < 50000 AND hire_date < '2023-01-01';

-- Preview before deleting (ALWAYS do this first!)
SELECT * FROM employees WHERE salary < 50000;</code></pre>

<h2>DELETE vs DROP vs TRUNCATE</h2>

<table>
    <thead>
        <tr><th>Command</th><th>What It Does</th><th>Can Rollback?</th></tr>
    </thead>
    <tbody>
        <tr><td><code>DELETE FROM table WHERE...</code></td><td>Removes specific rows</td><td>Yes (in transactions)</td></tr>
        <tr><td><code>DELETE FROM table</code></td><td>Removes all rows</td><td>Yes (in transactions)</td></tr>
        <tr><td><code>TRUNCATE TABLE table</code></td><td>Removes all rows (faster, resets auto_increment)</td><td>No</td></tr>
        <tr><td><code>DROP TABLE table</code></td><td>Deletes the table structure AND data</td><td>No</td></tr>
    </tbody>
</table>

<pre><code>-- Delete all rows (keeps the table structure)
DELETE FROM employees;

-- TRUNCATE is faster for removing all rows
TRUNCATE TABLE employees;
-- Also resets AUTO_INCREMENT back to 1

-- Drop the table entirely (structure + data)
DROP TABLE IF EXISTS employees;</code></pre>

<h2>Safe Deletion Practices</h2>

<pre><code>-- Step 1: Preview what you're about to delete
SELECT * FROM employees
WHERE department = 'Temp Department';

-- Step 2: Count the rows
SELECT COUNT(*) FROM employees
WHERE department = 'Temp Department';

-- Step 3: Delete with confidence
DELETE FROM employees
WHERE department = 'Temp Department';

-- Step 4: Verify the deletion
SELECT * FROM employees;</code></pre>

<h2>Using Subqueries in DELETE</h2>

<pre><code>-- Delete employees who earn below average
DELETE FROM employees
WHERE salary < (SELECT AVG(salary) FROM employees);

-- Delete employees not in any department
DELETE FROM employees
WHERE department NOT IN (
    SELECT DISTINCT department
    FROM employees
    WHERE department IS NOT NULL
);</code></pre>

<div class="info-box important">
    <div class="box-title">Golden Rule</div>
    <p class="mb-0">Before running any DELETE, always: (1) Run a SELECT with the same WHERE clause, (2) Count the rows, (3) Back up important data.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Delete the employee named 'Henry Wu' and verify the deletion</li>
        <li>Preview all employees earning less than $55,000, then delete them</li>
        <li>Delete all employees hired before 2023</li>
        <li>What's the difference between DELETE and TRUNCATE?</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug'], 'mysql-lessons') ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug'], 'mysql-lessons') ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
