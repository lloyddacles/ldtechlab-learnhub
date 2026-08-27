<?php
$pageTitle = 'SQL Functions';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 5;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>SQL Functions</h1>
    <p class="lesson-desc">Aggregate and string functions to analyze and transform data.</p>
</div>

<h2>Aggregate Functions</h2>
<p>Functions that operate on a set of rows and return a single value:</p>

<pre><code>-- Using the employees table

-- COUNT: number of rows
SELECT COUNT(*) AS total_employees FROM employees;
SELECT COUNT(*) AS engineering_count FROM employees WHERE department = 'Engineering';

-- SUM: total of a numeric column
SELECT SUM(salary) AS total_salaries FROM employees;

-- AVG: average value
SELECT AVG(salary) AS average_salary FROM employees;

-- MIN / MAX: smallest and largest values
SELECT MIN(salary) AS lowest_salary FROM employees;
SELECT MAX(salary) AS highest_salary FROM employees;</code></pre>

<h2>GROUP BY</h2>
<p>Groups rows that share values so aggregate functions work per group:</p>

<pre><code>-- Average salary by department
SELECT
    department,
    COUNT(*) AS employee_count,
    AVG(salary) AS avg_salary,
    MIN(salary) AS min_salary,
    MAX(salary) AS max_salary
FROM employees
GROUP BY department;</code></pre>

<pre><code>-- Output:
-- +-------------+----------------+-------------+-------------+-------------+
-- | department  | employee_count | avg_salary  | min_salary  | max_salary  |
-- +-------------+----------------+-------------+-------------+-------------+
-- | Engineering |              3 | 82333.33    | 75000.00    | 90000.00    |
-- | Marketing   |              2 | 68000.00    | 65000.00    | 71000.00    |
-- | Sales       |              2 | 56500.00    | 55000.00    | 58000.00    |
-- | NULL        |              1 | 48000.00    | 48000.00    | 48000.00    |
-- +-------------+----------------+-------------+-------------+-------------+</code></pre>

<h2>HAVING Clause</h2>
<p>Filters groups (like WHERE, but for grouped data):</p>

<pre><code>-- Departments with more than 2 employees
SELECT department, COUNT(*) AS count
FROM employees
GROUP BY department
HAVING count > 2;

-- Departments with average salary above 70000
SELECT department, AVG(salary) AS avg_salary
FROM employees
GROUP BY department
HAVING avg_salary > 70000;</code></pre>

<div class="info-box note">
    <div class="box-title">WHERE vs HAVING</div>
    <p><strong>WHERE</strong> filters rows <em>before</em> grouping</p>
    <p class="mb-0"><strong>HAVING</strong> filters groups <em>after</em> grouping</p>
</div>

<h2>String Functions</h2>

<pre><code>-- CONCAT: join strings
SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM students;

-- LENGTH: character count
SELECT name, LENGTH(name) AS name_length FROM employees;

-- UPPER / LOWER: change case
SELECT UPPER(name) AS uppercase_name FROM employees;
SELECT LOWER(name) AS lowercase_name FROM employees;

-- TRIM: remove whitespace
SELECT TRIM('  Hello  ') AS trimmed;

-- SUBSTRING: extract part of a string
SELECT SUBSTRING('Hello World', 1, 5) AS extracted;  -- 'Hello'

-- REPLACE: find and replace
SELECT REPLACE('Hello World', 'World', 'MySQL') AS replaced;

-- LEFT / RIGHT: first/last n characters
SELECT LEFT('Hello World', 5) AS first_five;   -- 'Hello'
SELECT RIGHT('Hello World', 5) AS last_five;   -- 'World'</code></pre>

<h2>Date Functions</h2>

<pre><code>-- Current date and time
SELECT NOW() AS current_datetime;
SELECT CURDATE() AS today;
SELECT CURTIME() AS current_time;

-- Extract parts of a date
SELECT YEAR(hire_date) AS hire_year FROM employees;
SELECT MONTH(hire_date) AS hire_month FROM employees;
SELECT DAYNAME(hire_date) AS day_of_week FROM employees;

-- Date arithmetic
SELECT
    name,
    hire_date,
    DATEDIFF(CURDATE(), hire_date) AS days_employed
FROM employees;

-- Format dates
SELECT DATE_FORMAT(NOW(), '%M %d, %Y') AS formatted_date;
-- Output: "August 26, 2026"</code></pre>

<h2>Alias with AS</h2>

<pre><code>-- Rename columns in output
SELECT
    name AS Employee,
    salary AS "Annual Salary",
    salary / 12 AS "Monthly Salary"
FROM employees;

-- Rename tables (useful for joins)
SELECT e.name, e.salary
FROM employees AS e
WHERE e.department = 'Engineering';</code></pre>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Find the total, average, minimum, and maximum salary across all employees</li>
        <li>Count how many employees were hired each year</li>
        <li>Find departments where the average salary is above $70,000</li>
        <li>List all employees with their name in uppercase and salary formatted with commas</li>
        <li>Calculate how many days each employee has been working at the company</li>
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
