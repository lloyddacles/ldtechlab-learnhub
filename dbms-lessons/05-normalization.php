<?php
$pageTitle = 'Database Normalization';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 5;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Database Normalization</h1>
    <p class="lesson-desc">Eliminate data redundancy and improve data integrity through normalization.</p>
</div>

<h2>What is Normalization?</h2>
<p>Normalization is the process of <strong>organizing data</strong> to reduce redundancy and improve data integrity. It involves breaking large tables into smaller, well-structured tables and defining relationships between them.</p>

<h2>Why Normalize?</h2>
<ul>
    <li><strong>Reduce redundancy</strong> — Don't store the same data in multiple places</li>
    <li><strong>Prevent anomalies</strong> — Avoid insertion, update, and deletion problems</li>
    <li><strong>Improve consistency</strong> — Data changes only need to be made in one place</li>
</ul>

<h2>The Anomalies</h2>

<h3>Insertion Anomaly</h3>
<p>You can't add certain data without other unrelated data.</p>

<pre><code>-- BAD: All in one table
CREATE TABLE student_courses (
    student_name VARCHAR(100),
    student_email VARCHAR(100),
    course_name VARCHAR(100),
    course_credits INT,
    teacher_name VARCHAR(100)
);

-- PROBLEM: Can't add a new course without a student!
INSERT INTO student_courses (course_name, course_credits, teacher_name)
VALUES ('Physics', 4, 'Dr. Newton');
-- ERROR: student_name and student_email are NOT NULL</code></pre>

<h3>Update Anomaly</h3>
<p>Updating one piece of data requires updating multiple rows.</p>

<pre><code>-- PROBLEM: If Dr. Newton changes name, we must update ALL rows
-- where teacher_name = 'Dr. Newton'
-- Missing even one row creates inconsistent data!</code></pre>

<h3>Deletion Anomaly</h3>
<p>Deleting one record unintentionally deletes other data.</p>

<pre><code>-- PROBLEM: If we delete the last student in a course,
-- we also lose all information about that course!</code></pre>

<h2>First Normal Form (1NF)</h2>
<p><strong>Rule:</strong> Each cell must contain a single (atomic) value. No repeating groups.</p>

<pre><code>-- BAD: Violates 1NF (multiple values in one cell)
CREATE TABLE students_bad (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    courses TEXT  -- "Math, Science, English" ← NOT atomic!
);

-- GOOD: Satisfies 1NF
CREATE TABLE students_good (
    id INT PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE enrollments (
    student_id INT,
    course_name VARCHAR(100),  -- One value per row
    PRIMARY KEY (student_id, course_name)
);</code></pre>

<table>
    <thead>
        <tr><th colspan="3">1NF Checklist</th></tr>
    </thead>
    <tbody>
        <tr><td>Each column contains only atomic values</td><td>Each row is unique</td><td>No repeating groups</td></tr>
    </tbody>
</table>

<h2>Second Normal Form (2NF)</h2>
<p><strong>Rule:</strong> Must be in 1NF + every non-key column must depend on the <strong>entire</strong> primary key (not just part of it).</p>

<pre><code>-- BAD: Violates 2NF (course_name depends only on course_id, not student_id)
CREATE TABLE enrollments_bad (
    student_id INT,
    course_id INT,
    course_name VARCHAR(100),  -- Depends on course_id ONLY
    grade VARCHAR(2),          -- Depends on BOTH student_id AND course_id
    PRIMARY KEY (student_id, course_id)
);

-- GOOD: Satisfies 2NF (split into two tables)
CREATE TABLE courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(100)
);

CREATE TABLE enrollments_good (
    student_id INT,
    course_id INT,
    grade VARCHAR(2),
    PRIMARY KEY (student_id, course_id)
);</code></pre>

<h2>Third Normal Form (3NF)</h2>
<p><strong>Rule:</strong> Must be in 2NF + no <strong>transitive dependencies</strong> (non-key columns shouldn't depend on other non-key columns).</p>

<pre><code>-- BAD: Violates 3NF (department_name depends on department_id, not directly on id)
CREATE TABLE employees_bad (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    department_id INT,
    department_name VARCHAR(100)  -- Transitive: id → department_id → department_name
);

-- GOOD: Satisfies 3NF (separate department table)
CREATE TABLE departments (
    id INT PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE employees_good (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);</code></pre>

<h2>Normalization Summary</h2>

<table>
    <thead>
        <tr><th>Normal Form</th><th>Rule</th><th>Eliminates</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>1NF</strong></td><td>Atomic values, no repeating groups</td><td>Multi-valued attributes</td></tr>
        <tr><td><strong>2NF</strong></td><td>1NF + full functional dependency</td><td>Partial dependencies</td></tr>
        <tr><td><strong>3NF</strong></td><td>2NF + no transitive dependencies</td><td>Transitive dependencies</td></tr>
    </tbody>
</table>

<h2>Practical Example: Normalizing a Student Table</h2>

<pre><code>-- UNNORMALIZED: One big flat table
CREATE TABLE student_data (
    student_name VARCHAR(100),
    student_email VARCHAR(100),
    course1 VARCHAR(50),
    course2 VARCHAR(50),
    course3 VARCHAR(50),
    teacher1 VARCHAR(50),
    teacher2 VARCHAR(50),
    teacher3 VARCHAR(50)
);

-- After 1NF: Remove repeating groups
-- → Students table + Enrollments table

-- After 2NF: Remove partial dependencies
-- → Students + Courses + Enrollments

-- After 3NF: Remove transitive dependencies
-- → Students + Courses + Teachers + Enrollments</code></pre>

<div class="info-box tip">
    <div class="box-title">Tip</div>
    <p class="mb-0">For most applications, <strong>3NF is the target</strong>. Higher normal forms (BCNF, 4NF, 5NF) exist but are rarely needed in practice.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>What problems does normalization solve?</li>
        <li>Given a flat table of order data, normalize it to 3NF</li>
        <li>What is the difference between 2NF and 3NF?</li>
        <li>Create an unnormalized table for a hospital, then normalize it step by step</li>
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
