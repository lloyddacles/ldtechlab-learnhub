<?php
$pageTitle = 'Indexes and Performance';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 9;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Indexes and Performance</h1>
    <p class="lesson-desc">Speed up your queries with indexes and learn optimization basics.</p>
</div>

<h2>What Are Indexes?</h2>
<p>An index is like a <strong>book's index</strong> &mdash; it helps MySQL find data quickly without scanning every row. Without an index, MySQL must check every row (full table scan).</p>

<pre><code>-- Without index: MySQL checks ALL rows
SELECT * FROM employees WHERE name = 'Alice Smith';
-- On 1 million rows: checks all 1,000,000 rows

-- With index: MySQL jumps directly to the row
CREATE INDEX idx_name ON employees(name);
SELECT * FROM employees WHERE name = 'Alice Smith';
-- On 1 million rows: checks ~20 rows (binary search)</code></pre>

<h2>Creating Indexes</h2>

<pre><code>-- Create an index on a single column
CREATE INDEX idx_name ON employees(name);

-- Create a UNIQUE index (no duplicate values allowed)
CREATE UNIQUE INDEX idx_email ON employees(email);

-- Create an index on multiple columns (composite index)
CREATE INDEX idx_dept_salary ON employees(department, salary);

-- View all indexes on a table
SHOW INDEX FROM employees;

-- Drop an index
DROP INDEX idx_name ON employees;</code></pre>

<h2>When to Create Indexes</h2>

<table>
    <thead>
        <tr><th>Create Index On</th><th>Why</th></tr>
    </thead>
    <tbody>
        <tr><td>Columns in WHERE clauses</td><td><code>WHERE name = 'Alice'</code></td></tr>
        <tr><td>Columns in JOIN conditions</td><td><code>ON e.dept_id = d.id</code></td></tr>
        <tr><td>Columns in ORDER BY</td><td><code>ORDER BY hire_date</code></td></tr>
        <tr><td>Columns with high cardinality</td><td>Many unique values (email, username)</td></tr>
    </tbody>
</table>

<h2>When NOT to Create Indexes</h2>

<ul>
    <li><strong>Small tables</strong> &mdash; Indexes add overhead; full scan is fast on small data</li>
    <li><strong>Columns with few unique values</strong> &mdash; e.g., a "gender" column with only 2 values</li>
    <li><strong>Columns rarely used in queries</strong> &mdash; No point indexing what you don't search by</li>
    <li><strong>Frequently updated columns</strong> &mdash; Indexes slow down INSERT/UPDATE/DELETE</li>
</ul>

<h2>PRIMARY KEY Index</h2>

<pre><code>-- PRIMARY KEY columns are automatically indexed
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Already indexed!
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE            -- Also automatically indexed!
);

-- The PRIMARY KEY is the fastest index type
-- Always have one!</code></pre>

<h2>EXPLAIN: Analyze Your Queries</h2>

<pre><code>-- See how MySQL executes a query
EXPLAIN SELECT * FROM employees WHERE name = 'Alice Smith';

-- Key columns to look at:
-- type: ref (good) vs ALL (bad - full table scan)
-- rows: how many rows MySQL estimates it will check
-- key: which index MySQL chose to use</code></pre>

<pre><code>-- Example EXPLAIN output:
-- +----+-------------+-----------+------+---------------+------+---------+------+------+-------------+
-- | id | select_type | table     | type | possible_keys | key  | key_len | ref  | rows | Extra       |
-- +----+-------------+-----------+------+---------------+------+---------+------+------+-------------+
-- |  1 | SIMPLE      | employees | ref  | idx_name      | idx  | 102     | const|    1 | Using where |
-- +----+-------------+-----------+------+---------------+------+---------+------+------+-------------+
-- "type: ref" and "rows: 1" = efficient query!</code></pre>

<h2>Query Optimization Tips</h2>

<pre><code>-- BAD: SELECT * retrieves all columns
SELECT * FROM employees WHERE name = 'Alice Smith';

-- GOOD: Select only the columns you need
SELECT name, salary FROM employees WHERE name = 'Alice Smith';

-- BAD: Functions on indexed columns prevent index usage
SELECT * FROM employees WHERE YEAR(hire_date) = 2024;

-- GOOD: Rewrite to use the index
SELECT * FROM employees WHERE hire_date >= '2024-01-01' AND hire_date < '2025-01-01';

-- BAD: Leading wildcard prevents index usage
SELECT * FROM employees WHERE name LIKE '%Smith';

-- GOOD: Trailing wildcard can use index
SELECT * FROM employees WHERE name LIKE 'Smith%';

-- BAD: OR with different columns
SELECT * FROM employees WHERE name = 'Alice' OR salary > 80000;

-- GOOD: Use UNION for different indexed conditions
SELECT * FROM employees WHERE name = 'Alice'
UNION
SELECT * FROM employees WHERE salary > 80000;</code></pre>

<div class="info-box tip">
    <div class="box-title">Rule of Thumb</div>
    <p class="mb-0">If a query is slow, check: (1) Are you selecting <code>*</code>? (2) Is there an index on the WHERE/JOIN columns? (3) Use <code>EXPLAIN</code> to see what MySQL is doing.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create an index on the <code>email</code> column of the employees table</li>
        <li>Use <code>EXPLAIN</code> to compare a query with and without an index</li>
        <li>Why can't a <code>LIKE '%value'</code> query use an index?</li>
        <li>Create a composite index for queries that filter by both department and salary</li>
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
