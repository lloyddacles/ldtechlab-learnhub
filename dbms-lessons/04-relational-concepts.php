<?php
$pageTitle = 'Relational Database Concepts';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 4;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Relational Database Concepts</h1>
    <p class="lesson-desc">Understand keys, constraints, and the fundamental principles of relational databases.</p>
</div>

<h2>The Relational Model</h2>
<p>Invented by Edgar F. Codd in 1970, the relational model organizes data into <strong>tables</strong> (relations) with rows (tuples) and columns (attributes). Tables relate to each other through <strong>common columns</strong>.</p>

<h2>Keys</h2>
<p>Keys are special columns used to <strong>identify</strong> and <strong>link</strong> records across tables.</p>

<table>
    <thead>
        <tr><th>Key Type</th><th>Purpose</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Primary Key (PK)</strong></td><td>Uniquely identifies each row</td><td><code>student_id</code></td></tr>
        <tr><td><strong>Foreign Key (FK)</strong></td><td>Links to a primary key in another table</td><td><code>department_id</code> in employees</td></tr>
        <tr><td><strong>Composite Key</strong></td><td>Primary key made of multiple columns</td><td>(<code>student_id</code>, <code>course_id</code>)</td></tr>
        <tr><td><strong>Super Key</strong></td><td>Any set of columns that uniquely identifies a row</td><td>(<code>id</code>), (<code>email</code>), (<code>id</code>, <code>name</code>)</td></tr>
        <tr><td><strong>Candidate Key</strong></td><td>Minimal super key (no extra columns)</td><td><code>id</code>, <code>email</code></td></tr>
        <tr><td><strong>Alternate Key</strong></td><td>Candidate key not chosen as primary key</td><td><code>email</code> (if <code>id</code> is PK)</td></tr>
    </tbody>
</table>

<h3>Primary Key Rules</h3>
<ul>
    <li>Must be <strong>unique</strong> — no two rows can have the same PK value</li>
    <li>Must <strong>never be NULL</strong></li>
    <li>Each table can have only <strong>one</strong> primary key</li>
    <li>Should be <strong>immutable</strong> — avoid changing PK values</li>
</ul>

<pre><code>CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,   -- Primary Key
    email VARCHAR(100) UNIQUE NOT NULL,  -- Candidate Key
    name VARCHAR(100) NOT NULL
);</code></pre>

<h3>Foreign Keys</h3>
<p>A foreign key creates a <strong>link between two tables</strong>. It references the primary key of another table.</p>

<pre><code>CREATE TABLE enrollments (
    student_id INT,
    course_id INT,
    grade VARCHAR(2),
    PRIMARY KEY (student_id, course_id),  -- Composite PK
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);</code></pre>

<h2>Entity Integrity</h2>
<p>The primary key must be unique and not null. This ensures every row can be uniquely identified.</p>

<pre><code>-- VIOLATES entity integrity
INSERT INTO students (id, name) VALUES (1, 'Alice');
INSERT INTO students (id, name) VALUES (1, 'Bob');  -- ERROR: duplicate PK

-- VIOLATES entity integrity
INSERT INTO students (id, name) VALUES (NULL, 'Charlie');  -- ERROR: NULL PK</code></pre>

<h2>Referential Integrity</h2>
<p>Foreign keys must reference valid primary keys, or be NULL. This prevents "orphaned" records.</p>

<pre><code>-- If students(id=5) exists:
INSERT INTO enrollments (student_id, course_id, grade)
VALUES (5, 101, 'A');  -- OK: student 5 exists

-- If students(id=99) does NOT exist:
INSERT INTO enrollments (student_id, course_id, grade)
VALUES (99, 101, 'B');  -- ERROR: foreign key violation</code></pre>

<h3>Referential Actions</h3>

<pre><code>FOREIGN KEY (student_id) REFERENCES students(id)
    ON DELETE CASCADE     -- Delete enrollment if student is deleted
    ON UPDATE CASCADE     -- Update student_id if student's id changes

-- Other options:
-- ON DELETE SET NULL     -- Set FK to NULL if parent is deleted
-- ON DELETE RESTRICT     -- Prevent deletion of parent
-- ON DELETE NO ACTION    -- Same as RESTRICT (default)</code></pre>

<h2>Domain Constraints</h2>
<p>Each column has a defined <strong>domain</strong> (set of allowed values):</p>

<pre><code>CREATE TABLE employees (
    id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,           -- Must be a string, max 100 chars
    salary DECIMAL(10,2) CHECK (salary >= 0),  -- Must be non-negative
    email VARCHAR(100) UNIQUE NOT NULL,   -- Must be unique
    hire_date DATE NOT NULL,              -- Must be a valid date
    department VARCHAR(50) DEFAULT 'Unassigned'  -- Default value
);</code></pre>

<h2>Relational Algebra (Theory)</h2>
<p>The mathematical foundation of SQL operations:</p>

<table>
    <thead>
        <tr><th>Operation</th><th>Symbol</th><th>SQL Equivalent</th></tr>
    </thead>
    <tbody>
        <tr><td>Selection</td><td>σ (sigma)</td><td><code>WHERE</code></td></tr>
        <tr><td>Projection</td><td>π (pi)</td><td><code>SELECT column</code></td></tr>
        <tr><td>Union</td><td>∪</td><td><code>UNION</code></td></tr>
        <tr><td>Intersection</td><td>∩</td><td><code>INTERSECT</code></td></tr>
        <tr><td>Difference</td><td>−</td><td><code>EXCEPT</code></td></tr>
        <tr><td>Cartesian Product</td><td>×</td><td><code>CROSS JOIN</code></td></tr>
        <tr><td>Join</td><td>⋈</td><td><code>JOIN</code></td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>What is the difference between a primary key and a foreign key?</li>
        <li>Why can't a primary key be NULL?</li>
        <li>Create an ERD with Students, Courses, and Enrollments. Identify all keys.</li>
        <li>What is referential integrity? What happens when it's violated?</li>
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
