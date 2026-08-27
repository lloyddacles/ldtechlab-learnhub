<?php
$pageTitle = 'Advanced Normalization';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 6;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Advanced Normalization</h1>
    <p class="lesson-desc">Go beyond 3NF with BCNF and higher normal forms.</p>
</div>

<h2>Boyce-Codd Normal Form (BCNF)</h2>
<p>A stronger version of 3NF. A table is in BCNF if for every functional dependency <strong>X → Y</strong>, X is a <strong>superkey</strong>.</p>

<h3>When BCNF Differs from 3NF</h3>
<p>3NF allows dependencies where the determinant isn't a superkey <em>if</em> the dependent is part of a candidate key. BCNF doesn't allow this.</p>

<pre><code>-- Example: Teacher assigns course
CREATE TABLE teacher_course (
    teacher VARCHAR(50),
    course VARCHAR(50),
    student VARCHAR(50),
    PRIMARY KEY (teacher, course, student)
);

-- Functional dependencies:
-- teacher, course → student  (teacher and course determine which students)
-- student → course           (each student takes one course per enrollment)

-- This violates BCNF because:
-- "student → course" has "student" as determinant,
-- but "student" is NOT a superkey!

-- SOLUTION: Split into two tables
CREATE TABLE course_allocation (
    teacher VARCHAR(50),
    course VARCHAR(50),
    student VARCHAR(50),
    PRIMARY KEY (teacher, course, student)
);

CREATE TABLE student_course (
    student VARCHAR(50) PRIMARY KEY,
    course VARCHAR(50)
);</code></pre>

<h2>Fourth Normal Form (4NF)</h2>
<p><strong>Rule:</strong> Must be in BCNF + no <strong>multi-valued dependencies</strong>.</p>

<pre><code>-- BAD: Violates 4NF (two independent multi-valued facts)
CREATE TABLE employee_skills (
    emp_name VARCHAR(50),
    skill VARCHAR(50),
    language VARCHAR(50)
);

-- Alice knows Java AND Python (skills)
-- Alice speaks English AND Filipino (languages)
-- These are INDEPENDENT facts, but stored together

-- This forces us to store:
-- (Alice, Java, English)
-- (Alice, Java, Filipino)     ← Redundant skill info
-- (Alice, Python, English)    ← Redundant language info
-- (Alice, Python, Filipino)   ← Redundant both!

-- SOLUTION: Split into independent tables
CREATE TABLE employee_skills (
    emp_name VARCHAR(50),
    skill VARCHAR(50),
    PRIMARY KEY (emp_name, skill)
);

CREATE TABLE employee_languages (
    emp_name VARCHAR(50),
    language VARCHAR(50),
    PRIMARY KEY (emp_name, language)
);</code></pre>

<h2>Fifth Normal Form (5NF)</h2>
<p><strong>Rule:</strong> Must be in 4NF + no <strong>join dependencies</strong>. A table can be decomposed into smaller tables and reconstructed without losing data.</p>

<pre><code>-- 5NF deals with cases where a table has a M:N relationship
-- that can be broken into three or more smaller tables
-- and reconstructed via joins.

-- Example: A supplier provides parts to specific projects
-- (supplier, part, project) where:
-- supplier → part (each supplier makes specific parts)
-- part → project (each part goes to specific projects)
-- But supplier and project have a M:N relationship

-- 5NF would split this into three tables to avoid
-- redundant storage of the three-way relationship.</code></pre>

<h2>Normalization Summary</h2>

<table>
    <thead>
        <tr><th>Form</th><th>Rule</th><th>Removes</th><th>Complexity</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>1NF</strong></td><td>Atomic values only</td><td>Multi-valued attributes</td><td>Easy</td></tr>
        <tr><td><strong>2NF</strong></td><td>1NF + no partial dependencies</td><td>Partial dependencies</td><td>Moderate</td></tr>
        <tr><td><strong>3NF</strong></td><td>2NF + no transitive dependencies</td><td>Transitive dependencies</td><td>Moderate</td></tr>
        <tr><td><strong>BCNF</strong></td><td>Every determinant is a superkey</td><td>Anomalous dependencies</td><td>Advanced</td></tr>
        <tr><td><strong>4NF</strong></td><td>BCNF + no multi-valued dependencies</td><td>Multi-valued facts</td><td>Advanced</td></tr>
        <tr><td><strong>5NF</strong></td><td>4NF + no join dependencies</td><td>Join dependencies</td><td>Expert</td></tr>
    </tbody>
</table>

<h2>Denormalization</h2>
<p>Sometimes we <strong>intentionally break normalization</strong> for performance. This is called <strong>denormalization</strong>.</p>

<pre><code>-- Normalized: JOINs needed for every query
-- SELECT e.name, d.name FROM employees e JOIN departments d ON ...

-- Denormalized: Store department name directly in employees
-- Faster reads, but more storage and update overhead

-- Use denormalization when:
-- 1. Read performance is critical (reporting tables)
-- 2. Data rarely changes (historical data)
-- 3. Complex JOINs are too slow</code></pre>

<div class="info-box note">
    <div class="box-title">Practical Advice</div>
    <ul class="mb-0">
        <li><strong>Target 3NF</strong> for most applications</li>
        <li><strong>Consider BCNF</strong> when you have unusual functional dependencies</li>
        <li><strong>4NF/5NF</strong> are rarely needed in practice</li>
        <li><strong>Denormalize</strong> only when performance demands it</li>
    </ul>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>What is the difference between 3NF and BCNF?</li>
        <li>Give an example of a multi-valued dependency</li>
        <li>When is denormalization appropriate?</li>
        <li>Take a 3NF database design and check if it satisfies BCNF</li>
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
