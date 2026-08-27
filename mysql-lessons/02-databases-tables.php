<?php
$pageTitle = 'Databases and Tables';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 2;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Databases and Tables</h1>
    <p class="lesson-desc">Create databases and design tables with the right data types.</p>
</div>

<h2>Creating a Database</h2>

<pre><code>-- Create a new database
CREATE DATABASE school;

-- Check if it exists before creating
CREATE DATABASE IF NOT EXISTS school;

-- See all databases
SHOW DATABASES;

-- Select a database to use
USE school;

-- Delete a database (careful!)
DROP DATABASE school;</code></pre>

<h2>Creating Tables</h2>

<div class="syntax-ref">
    <h4>Syntax: CREATE TABLE</h4>
    <code>CREATE TABLE table_name (</code>
    <code>&nbsp;&nbsp;column_name data_type constraints,</code>
    <code>&nbsp;&nbsp;column_name data_type constraints,</code>
    <code>&nbsp;&nbsp;PRIMARY KEY (column_name)</code>
    <code>);</code>
</div>

<pre><code>-- Create a students table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    age INT,
    enrollment_date DATE DEFAULT (CURRENT_DATE),
    is_active BOOLEAN DEFAULT TRUE
);

-- View the table structure
DESCRIBE students;
-- or
SHOW COLUMNS FROM students;</code></pre>

<h2>Data Types</h2>

<table>
    <thead>
        <tr><th>Type</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><code>INT</code></td><td>Whole numbers</td><td><code>42</code>, <code>-7</code></td></tr>
        <tr><td><code>BIGINT</code></td><td>Large whole numbers</td><td><code>9999999999</code></td></tr>
        <tr><td><code>FLOAT</code></td><td>Floating-point (approximate)</td><td><code>3.14</code></td></tr>
        <tr><td><code>DECIMAL(10,2)</code></td><td>Exact decimal (for money)</td><td><code>19.99</code></td></tr>
        <tr><td><code>VARCHAR(n)</code></td><td>Variable-length string (max n chars)</td><td><code>"Alice"</code></td></tr>
        <tr><td><code>TEXT</code></td><td>Long text</td><td>Articles, descriptions</td></tr>
        <tr><td><code>DATE</code></td><td>Date (YYYY-MM-DD)</td><td><code>"2024-01-15"</code></td></tr>
        <tr><td><code>DATETIME</code></td><td>Date and time</td><td><code>"2024-01-15 14:30:00"</code></td></tr>
        <tr><td><code>BOOLEAN</code></td><td>True/False (stored as 0/1)</td><td><code>TRUE</code>, <code>FALSE</code></td></tr>
        <tr><td><code>AUTO_INCREMENT</code></td><td>Auto-increments number</td><td>1, 2, 3...</td></tr>
    </tbody>
</table>

<h2>Table Constraints</h2>

<pre><code>-- A table with various constraints
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10) UNIQUE NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    credits INT NOT NULL CHECK (credits > 0),
    max_students INT DEFAULT 30,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);</code></pre>

<table>
    <thead>
        <tr><th>Constraint</th><th>Purpose</th></tr>
    </thead>
    <tbody>
        <tr><td><code>PRIMARY KEY</code></td><td>Unique identifier for each row</td></tr>
        <tr><td><code>NOT NULL</code></td><td>Column cannot be empty</td></tr>
        <tr><td><code>UNIQUE</code></td><td>All values in column must be different</td></tr>
        <tr><td><code>DEFAULT value</code></td><td>Sets a default if no value provided</td></tr>
        <tr><td><code>CHECK (condition)</code></td><td>Validates data meets a condition</td></tr>
        <tr><td><code>AUTO_INCREMENT</code></td><td>Automatically generates sequential numbers</td></tr>
    </tbody>
</table>

<h2>Modifying Tables</h2>

<pre><code>-- Add a new column
ALTER TABLE students ADD phone VARCHAR(20);

-- Modify a column type
ALTER TABLE students MODIFY phone VARCHAR(30);

-- Drop a column
ALTER TABLE students DROP phone;

-- Rename a table
ALTER TABLE students RENAME TO learners;

-- Delete a table (careful!)
DROP TABLE learners;

-- Delete table only if it exists
DROP TABLE IF EXISTS learners;</code></pre>

<div class="info-box warning">
    <div class="box-title">Warning</div>
    <p class="mb-0"><code>DROP TABLE</code> permanently deletes the table and all its data. Always back up your data before running destructive commands.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a database called <code>practice</code> and select it</li>
        <li>Create a <code>books</code> table with columns: id, title, author, isbn (unique), price, published_date</li>
        <li>Add a <code>genre</code> column to your books table</li>
        <li>View the table structure using <code>DESCRIBE books</code></li>
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
