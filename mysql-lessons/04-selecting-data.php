<?php
$pageTitle = 'Selecting Data';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 4;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Selecting Data</h1>
    <p class="lesson-desc">Retrieve data from tables using SELECT statements.</p>
</div>

<h2>SELECT Statement</h2>

<div class="syntax-ref">
    <h4>Syntax: SELECT</h4>
    <code>SELECT column1, column2 FROM table_name;</code>
    <code>SELECT * FROM table_name;  -- All columns</code>
</div>

<pre><code>-- Using the employees table from Lesson 3

-- Select all columns
SELECT * FROM employees;

-- Select specific columns
SELECT name, salary FROM employees;

-- Select with alias (rename columns in output)
SELECT name AS Employee, salary AS Annual_Salary
FROM employees;</code></pre>

<h2>SELECT with Expressions</h2>

<pre><code>-- Calculate new values
SELECT
    name,
    salary,
    salary / 12 AS monthly_salary,
    salary * 1.1 AS with_raise
FROM employees;

-- Concatenate columns
SELECT
    CONCAT(first_name, ' ', last_name) AS full_name
FROM students;</code></pre>

<h2>SELECT DISTINCT</h2>
<p>Get unique values (no duplicates):</p>

<pre><code>-- See unique departments
SELECT DISTINCT department FROM employees;

-- Count unique departments
SELECT COUNT(DISTINCT department) AS dept_count FROM employees;</code></pre>

<pre><code>-- Output:
-- +-------------+
-- | department  |
-- +-------------+
-- | Engineering |
-- | Marketing   |
-- | Sales       |
-- +-------------+</code></pre>

<h2>WHERE Clause</h2>
<p>Filter rows based on conditions:</p>

<div class="syntax-ref">
    <h4>Syntax: WHERE</h4>
    <code>SELECT * FROM table_name WHERE condition;</code>
</div>

<pre><code>-- Equal to
SELECT * FROM employees WHERE department = 'Engineering';

-- Not equal to
SELECT * FROM employees WHERE department != 'Marketing';

-- Greater than / Less than
SELECT * FROM employees WHERE salary > 70000;
SELECT * FROM employees WHERE salary <= 60000;

-- Combined conditions
SELECT * FROM employees
WHERE department = 'Engineering' AND salary > 80000;

SELECT * FROM employees
WHERE department = 'Marketing' OR department = 'Sales';

-- NOT
SELECT * FROM employees
WHERE NOT department = 'Engineering';</code></pre>

<h2>ORDER BY</h2>
<p>Sort the results:</p>

<pre><code>-- Sort ascending (lowest first) - default
SELECT * FROM employees ORDER BY salary ASC;

-- Sort descending (highest first)
SELECT * FROM employees ORDER BY salary DESC;

-- Sort by multiple columns
SELECT * FROM employees
ORDER BY department ASC, salary DESC;</code></pre>

<h2>LIMIT</h2>
<p>Limit the number of rows returned:</p>

<pre><code>-- Get top 3 highest salaries
SELECT name, salary
FROM employees
ORDER BY salary DESC
LIMIT 3;

-- Get 2 employees starting from row 2 (pagination)
SELECT * FROM employees
ORDER BY id
LIMIT 2 OFFSET 2;
-- or equivalently:
SELECT * FROM employees
ORDER BY id
LIMIT 2, 2;</code></pre>

<h2>NULL Values</h2>

<pre><code>-- Find rows with NULL values
SELECT * FROM employees WHERE hire_date IS NULL;

-- Find rows without NULL values
SELECT * FROM employees WHERE hire_date IS NOT NULL;

-- NOTE: You cannot use = or != with NULL!
-- This won't work:
-- SELECT * FROM employees WHERE hire_date = NULL;  -- WRONG!

-- Always use IS NULL / IS NOT NULL</code></pre>

<h2>LIKE Pattern Matching</h2>

<pre><code>-- Names starting with 'A'
SELECT * FROM employees WHERE name LIKE 'A%';

-- Names ending with 'son'
SELECT * FROM employees WHERE name LIKE '%son';

-- Names containing 'li'
SELECT * FROM employees WHERE name LIKE '%li%';

-- Single character wildcard
SELECT * FROM employees WHERE name LIKE 'A_ _ _ _ _';
-- Matches names starting with 'A' followed by exactly 5 characters</code></pre>

<h2>BETWEEN</h2>

<pre><code>-- Salary between 60000 and 80000 (inclusive)
SELECT * FROM employees
WHERE salary BETWEEN 60000 AND 80000;

-- Dates between
SELECT * FROM employees
WHERE hire_date BETWEEN '2023-01-01' AND '2024-01-01';</code></pre>

<h2>IN</h2>

<pre><code>-- Match against a list of values
SELECT * FROM employees
WHERE department IN ('Engineering', 'Sales');

-- Equivalent to multiple OR conditions:
-- WHERE department = 'Engineering' OR department = 'Sales'

-- NOT IN
SELECT * FROM employees
WHERE department NOT IN ('Marketing');</code></pre>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Select all employees earning more than $70,000, sorted by salary descending</li>
        <li>Find all employees in the Engineering department whose name starts with 'A'</li>
        <li>List unique departments and how many employees are in each</li>
        <li>Get the 2nd and 3rd highest paid employees</li>
        <li>Find all employees hired in 2024</li>
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
