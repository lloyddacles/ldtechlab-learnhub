<?php
$pageTitle = 'Updating Data';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 6;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Updating Data</h1>
    <p class="lesson-desc">Modify existing records using UPDATE statements.</p>
</div>

<h2>UPDATE Statement</h2>

<div class="syntax-ref">
    <h4>Syntax: UPDATE</h4>
    <code>UPDATE table_name</code>
    <code>SET column1 = value1, column2 = value2</code>
    <code>WHERE condition;</code>
</div>

<pre><code>-- Update a single row
UPDATE employees
SET salary = 80000
WHERE name = 'Alice Smith';

-- Update multiple columns
UPDATE employees
SET salary = 72000, department = 'Senior Marketing'
WHERE name = 'Bob Jones';

-- Update multiple rows at once
UPDATE employees
SET salary = salary * 1.05
WHERE department = 'Engineering';
-- Gives all Engineering employees a 5% raise</code></pre>

<h2>UPDATE with Conditions</h2>

<pre><code>-- Update only specific rows
UPDATE employees
SET department = 'Lead Engineering'
WHERE department = 'Engineering' AND salary > 85000;

-- Update using IN
UPDATE employees
SET department = 'Senior Staff'
WHERE name IN ('Alice Smith', 'Frank Lee');

-- Update all rows (no WHERE = updates EVERYTHING!)
UPDATE employees
SET is_active = TRUE;
-- Be very careful with this!</code></pre>

<h2>UPDATE with Expressions</h2>

<pre><code>-- Increase salary by percentage
UPDATE employees
SET salary = salary * 1.10
WHERE department = 'Sales';

-- Set a computed value
UPDATE employees
SET salary = CASE
    WHEN department = 'Engineering' THEN salary * 1.08
    WHEN department = 'Marketing' THEN salary * 1.05
    ELSE salary * 1.03
END;

-- Reset a column
UPDATE employees
SET hire_date = CURDATE()
WHERE id = 1;</code></pre>

<h2>Common Mistakes</h2>

<pre><code>-- DANGER: Updating all rows!
UPDATE employees SET salary = 0;
-- This sets ALL salaries to 0!

-- Always use a WHERE clause unless you really mean all rows.

-- To preview what would be updated, use SELECT first:
SELECT * FROM employees WHERE department = 'Engineering';
-- Check the results, then run the UPDATE with the same WHERE.</code></pre>

<div class="info-box warning">
    <div class="box-title">Safety Tip</div>
    <p class="mb-0">Always run a <code>SELECT</code> with your <code>WHERE</code> clause <strong>before</strong> running an <code>UPDATE</code>. This lets you verify which rows will be affected.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Give all employees in the Sales department a 10% raise</li>
        <li>Change the department of all employees hired before 2023 to 'Senior Staff'</li>
        <li>Preview which employees earn less than $60,000, then give them a $5,000 raise</li>
        <li>Set the hire_date of employee with id=1 to today's date</li>
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
