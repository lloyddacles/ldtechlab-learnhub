<?php
$pageTitle = 'SQL Data Definition Language';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 7;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>SQL Data Definition Language (DDL)</h1>
    <p class="lesson-desc">Define and manage database structure using DDL commands.</p>
</div>

<h2>What is DDL?</h2>
<p><strong>DDL (Data Definition Language)</strong> commands are used to define, modify, and delete database structures (tables, indexes, views). They don't manipulate data — they define the <strong>schema</strong>.</p>

<h2>DDL Commands</h2>

<table>
    <thead>
        <tr><th>Command</th><th>Purpose</th></tr>
    </thead>
    <tbody>
        <tr><td><code>CREATE</code></td><td>Create new database objects</td></tr>
        <tr><td><code>ALTER</code></td><td>Modify existing database objects</td></tr>
        <tr><td><code>DROP</code></td><td>Delete database objects</td></tr>
        <tr><td><code>TRUNCATE</code></td><td>Remove all data from a table (keep structure)</td></tr>
        <tr><td><code>RENAME</code></td><td>Rename database objects</td></tr>
    </tbody>
</table>

<h2>CREATE DATABASE</h2>

<pre><code>-- Create a new database
CREATE DATABASE university;

-- Create only if it doesn't exist
CREATE DATABASE IF NOT EXISTS university;

-- Specify character set and collation
CREATE DATABASE university
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

-- Select a database to use
USE university;

-- Show all databases
SHOW DATABASES;</code></pre>

<h2>CREATE TABLE (Full Syntax)</h2>

<pre><code>CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    date_of_birth DATE,
    enrollment_date DATE DEFAULT (CURRENT_DATE),
    gpa DECIMAL(3,2) CHECK (gpa >= 0 AND gpa <= 4.00),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);</code></pre>

<h2>ALTER TABLE</h2>

<pre><code>-- Add a column
ALTER TABLE students ADD phone VARCHAR(20);

-- Add multiple columns
ALTER TABLE students
    ADD address VARCHAR(200),
    ADD city VARCHAR(50);

-- Modify column type
ALTER TABLE students MODIFY phone VARCHAR(30);

-- Rename a column
ALTER TABLE students CHANGE phone phone_number VARCHAR(30);

-- Drop a column
ALTER TABLE students DROP phone_number;

-- Add a constraint
ALTER TABLE students ADD CONSTRAINT unique_email UNIQUE (email);

-- Drop a constraint
ALTER TABLE students DROP CONSTRAINT unique_email;

-- Add a foreign key
ALTER TABLE students ADD department_id INT;
ALTER TABLE students
    ADD CONSTRAINT fk_department
    FOREIGN KEY (department_id) REFERENCES departments(id);

-- Rename a table
ALTER TABLE students RENAME TO learners;</code></pre>

<h2>DROP TABLE</h2>

<pre><code>-- Delete a table permanently
DROP TABLE students;

-- Delete only if it exists
DROP TABLE IF EXISTS students;

-- Drop multiple tables
DROP TABLE IF EXISTS students, courses, enrollments;

-- WARNING: This cannot be undone!</code></pre>

<h2>TRUNCATE TABLE</h2>

<pre><code>-- Remove ALL rows, reset auto_increment
TRUNCATE TABLE students;

-- Equivalent to DELETE FROM students; but faster
-- and resets the auto_increment counter

-- Cannot be rolled back (in most databases)</code></pre>

<h2>Views</h2>
<p>A view is a <strong>stored query</strong> that appears as a virtual table:</p>

<pre><code>-- Create a view
CREATE VIEW active_students AS
SELECT id, first_name, last_name, email, gpa
FROM students
WHERE is_active = TRUE;

-- Use the view like a table
SELECT * FROM active_students WHERE gpa > 3.5;

-- Modify a view
CREATE OR REPLACE VIEW active_students AS
SELECT id, first_name, last_name, email, gpa, enrollment_date
FROM students
WHERE is_active = TRUE;

-- Delete a view
DROP VIEW IF EXISTS active_students;</code></pre>

<h2>Indexes (DDL)</h2>

<pre><code>-- Create an index
CREATE INDEX idx_name ON students(last_name);

-- Create a unique index
CREATE UNIQUE INDEX idx_email ON students(email);

-- Create a composite index
CREATE INDEX idx_name_gpa ON students(last_name, gpa);

-- Drop an index
DROP INDEX idx_name ON students;

-- Show indexes
SHOW INDEX FROM students;</code></pre>

<h2>DDL vs DML</h2>

<table>
    <thead>
        <tr><th>DDL</th><th>DML</th></tr>
    </thead>
    <tbody>
        <tr><td>Defines structure (schema)</td><td>Manipulates data</td></tr>
        <tr><td>CREATE, ALTER, DROP</td><td>SELECT, INSERT, UPDATE, DELETE</td></tr>
        <tr><td>Affects tables, views, indexes</td><td>Affects rows in tables</td></tr>
        <tr><td>Implicitly commits</td><td>Can be rolled back (in transactions)</td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a database called <code>library</code> with tables: books, members, loans</li>
        <li>Add a <code>phone</code> column to the members table, then rename it to <code>phone_number</code></li>
        <li>Create a view that shows all overdue loans</li>
        <li>What's the difference between DROP TABLE and TRUNCATE TABLE?</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug'], 'dbms-lessons') ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug'], 'dbms-lessons') ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
