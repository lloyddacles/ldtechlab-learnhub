<?php
$pageTitle = 'MySQL JOINs';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 8;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>MySQL JOINs</h1>
    <p class="lesson-desc">Combine data from multiple tables using different types of joins.</p>
</div>

<h2>Why JOINs?</h2>
<p>Relational databases split data into multiple tables to avoid duplication. JOINs let you <strong>combine related tables</strong> back together.</p>

<pre><code>-- Sample tables for this lesson

CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    building VARCHAR(50)
);

INSERT INTO departments (name, building) VALUES
('Engineering', 'Building A'),
('Marketing', 'Building B'),
('Sales', 'Building C'),
('HR', 'Building D');

-- employees table from previous lessons
-- (id, name, department, salary, hire_date)

-- Let's add a department_id column
ALTER TABLE employees ADD department_id INT;

-- Link employees to departments
UPDATE employees SET department_id = 1 WHERE department = 'Engineering';
UPDATE employees SET department_id = 2 WHERE department = 'Marketing';
UPDATE employees SET department_id = 3 WHERE department = 'Sales';</code></pre>

<h2>INNER JOIN</h2>
<p>Returns only rows that have <strong>matching values in both tables</strong>:</p>

<pre><code>-- Get employees with their department building
SELECT
    e.name,
    e.salary,
    d.name AS department,
    d.building
FROM employees e
INNER JOIN departments d ON e.department_id = d.id;</code></pre>

<pre><code>-- Output (only employees with a matching department):
-- +--------------+----------+-------------+------------+
-- | name         | salary   | department  | building   |
-- +--------------+----------+-------------+------------+
-- | Alice Smith  | 75000.00 | Engineering | Building A |
-- | Bob Jones    | 65000.00 | Marketing   | Building B |
-- | Carol White  | 82000.00 | Engineering | Building A |
-- | David Brown  | 58000.00 | Sales       | Building C |
-- | Eva Green    | 71000.00 | Marketing   | Building B |
-- | Frank Lee    | 90000.00 | Engineering | Building A |
-- | Grace Kim    | 55000.00 | Sales       | Building C |
-- +--------------+----------+-------------+------------+
-- Note: Henry Wu (department_id = NULL) is NOT included</code></pre>

<h2>LEFT JOIN</h2>
<p>Returns <strong>all rows from the left table</strong>, and matching rows from the right. NULL if no match:</p>

<pre><code>-- Get ALL employees, even those without a department
SELECT
    e.name,
    e.salary,
    d.name AS department,
    d.building
FROM employees e
LEFT JOIN departments d ON e.department_id = d.id;</code></pre>

<pre><code>-- Output (includes Henry Wu with NULL department):
-- +--------------+----------+-------------+------------+
-- | name         | salary   | department  | building   |
-- +--------------+----------+-------------+------------+
-- | Alice Smith  | 75000.00 | Engineering | Building A |
-- | Bob Jones    | 65000.00 | Marketing   | Building B |
-- | Carol White  | 82000.00 | Engineering | Building A |
-- | David Brown  | 58000.00 | Sales       | Building C |
-- | Eva Green    | 71000.00 | Marketing   | Building B |
-- | Frank Lee    | 90000.00 | Engineering | Building A |
-- | Grace Kim    | 55000.00 | Sales       | Building C |
-- | Henry Wu     | 48000.00 | NULL        | NULL       |
-- +--------------+----------+-------------+------------+</code></pre>

<h2>RIGHT JOIN</h2>
<p>Returns <strong>all rows from the right table</strong>, and matching rows from the left:</p>

<pre><code>-- Get all departments, even if no employees are in them
SELECT
    d.name AS department,
    e.name AS employee
FROM employees e
RIGHT JOIN departments d ON e.department_id = d.id;</code></pre>

<pre><code>-- Output (includes HR with no employees):
-- +-------------+--------------+
-- | department  | employee     |
-- +-------------+--------------+
-- | Engineering | Alice Smith  |
-- | Engineering | Carol White  |
-- | Engineering | Frank Lee    |
-- | Marketing   | Bob Jones    |
-- | Marketing   | Eva Green    |
-- | Sales       | David Brown  |
-- | Sales       | Grace Kim    |
-- | HR          | NULL         |
-- +-------------+--------------+</code></pre>

<h2>JOIN Types Summary</h2>

<table>
    <thead>
        <tr><th>JOIN Type</th><th>Returns</th></tr>
    </thead>
    <tbody>
        <tr><td><code>INNER JOIN</code></td><td>Only matching rows from both tables</td></tr>
        <tr><td><code>LEFT JOIN</code></td><td>All left rows + matching right rows (NULL if no match)</td></tr>
        <tr><td><code>RIGHT JOIN</code></td><td>All right rows + matching left rows (NULL if no match)</td></tr>
        <tr><td><code>CROSS JOIN</code></td><td>All combinations of both tables (cartesian product)</td></tr>
    </tbody>
</table>

<h2>Multiple JOINs</h2>

<pre><code>-- Join more than 2 tables
SELECT
    e.name,
    d.name AS department,
    d.building
FROM employees e
INNER JOIN departments d ON e.department_id = d.id
ORDER BY d.name, e.name;</code></pre>

<h2>Self JOIN</h2>

<pre><code>-- Join a table with itself
-- Example: find employees in the same department
SELECT
    a.name AS employee1,
    b.name AS employee2,
    a.department
FROM employees a
INNER JOIN employees b
    ON a.department = b.department
    AND a.id < b.id;</code></pre>

<div class="info-box tip">
    <div class="box-title">Tip: Table Aliases</div>
    <p class="mb-0">Use short aliases (<code>e</code> for employees, <code>d</code> for departments) to make JOIN queries shorter and more readable.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a <code>grades</code> table (id, student_id, subject, grade) and JOIN it with the students table</li>
        <li>Find all employees who don't have a department using LEFT JOIN + WHERE NULL</li>
        <li>List all departments and count employees in each using JOIN + GROUP BY</li>
        <li>What's the difference between INNER JOIN and LEFT JOIN?</li>
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
