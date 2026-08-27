<?php
$pageTitle = 'Inserting Data';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 3;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Inserting Data</h1>
    <p class="lesson-desc">Add data to your tables using INSERT statements.</p>
</div>

<h2>INSERT INTO Statement</h2>

<div class="syntax-ref">
    <h4>Syntax: INSERT</h4>
    <code>INSERT INTO table_name (column1, column2, ...)</code>
    <code>VALUES (value1, value2, ...);</code>
</div>

<pre><code>-- Create a table to work with
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50),
    salary DECIMAL(10,2),
    hire_date DATE
);

-- Insert a single row (specify columns)
INSERT INTO employees (name, department, salary, hire_date)
VALUES ('Alice Smith', 'Engineering', 75000.00, '2024-01-15');

-- Insert without specifying columns (must provide ALL values in order)
INSERT INTO employees
VALUES (NULL, 'Bob Jones', 'Marketing', 65000.00, '2024-02-20');

-- Insert multiple rows at once
INSERT INTO employees (name, department, salary, hire_date) VALUES
('Carol White', 'Engineering', 82000.00, '2023-06-10'),
('David Brown', 'Sales', 58000.00, '2024-03-01'),
('Eva Green', 'Marketing', 71000.00, '2023-11-22'),
('Frank Lee', 'Engineering', 90000.00, '2022-09-15');</code></pre>

<h2>INSERT with Default Values</h2>

<pre><code>-- Using DEFAULT for columns
INSERT INTO employees (name, department, salary)
VALUES ('Grace Kim', 'Sales', 55000.00);
-- hire_date will use the default (if set) or NULL

-- Using NULL explicitly
INSERT INTO employees (name, department, salary, hire_date)
VALUES ('Henry Wu', NULL, 48000.00, NULL);</code></pre>

<h2>Verify Your Inserts</h2>

<pre><code>-- See all data in the table
SELECT * FROM employees;

-- Count how many rows
SELECT COUNT(*) FROM employees;</code></pre>

<pre><code>-- Expected output:
-- +----+--------------+-------------+----------+------------+
-- | id | name         | department  | salary   | hire_date  |
-- +----+--------------+-------------+----------+------------+
-- |  1 | Alice Smith  | Engineering | 75000.00 | 2024-01-15 |
-- |  2 | Bob Jones    | Marketing   | 65000.00 | 2024-02-20 |
-- |  3 | Carol White  | Engineering | 82000.00 | 2023-06-10 |
-- |  4 | David Brown  | Sales       | 58000.00 | 2024-03-01 |
-- |  5 | Eva Green    | Marketing   | 71000.00 | 2023-11-22 |
-- |  6 | Frank Lee    | Engineering | 90000.00 | 2022-09-15 |
-- |  7 | Grace Kim    | Sales       | 55000.00 | NULL       |
-- |  8 | Henry Wu     | NULL        | 48000.00 | NULL       |
-- +----+--------------+-------------+----------+------------+</code></pre>

<h2>Common Errors</h2>

<pre><code>-- ERROR: Column count doesn't match value count
INSERT INTO employees (name, salary)
VALUES ('Error Example', 50000, 'Extra Value');
-- Wrong! 2 columns but 3 values

-- ERROR: Duplicate entry for unique column
INSERT INTO employees (name, department, salary, hire_date)
VALUES ('Alice Smith', 'HR', 60000.00, '2024-04-01');
-- Error if 'name' had a UNIQUE constraint

-- ERROR: NOT NULL violation
INSERT INTO employees (department, salary)
VALUES ('HR', 60000.00);
-- Error! 'name' is NOT NULL but wasn't provided</code></pre>

<div class="info-box tip">
    <div class="box-title">Best Practice</div>
    <p class="mb-0">Always specify column names in your INSERT statements. It makes your code clearer and won't break if the table structure changes later.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a <code>products</code> table with: id, name, price, category, stock_quantity</li>
        <li>Insert at least 5 products with different categories</li>
        <li>Insert 3 products in a single INSERT statement</li>
        <li>Try inserting a row with missing required fields and read the error message</li>
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
