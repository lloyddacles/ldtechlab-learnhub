<?php
$pageTitle = 'Database Design Project';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 10;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Database Design Project</h1>
    <p class="lesson-desc">Apply everything you've learned by designing a complete database system.</p>
</div>

<h2>The Challenge</h2>
<p>Design a database for a <strong>School Management System</strong> from scratch. This project covers all DBMS concepts you've learned.</p>

<h2>Requirements</h2>
<ul>
    <li>Students can enroll in courses</li>
    <li>Courses have teachers</li>
    <li>Teachers belong to departments</li>
    <li>Students receive grades</li>
    <li>Track attendance</li>
</ul>

<h2>Step 1: Identify Entities</h2>

<table>
    <thead>
        <tr><th>Entity</th><th>Description</th><th>Key Attributes</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Student</strong></td><td>A person enrolled in the school</td><td>id, name, email, date_of_birth</td></tr>
        <tr><td><strong>Teacher</strong></td><td>A person who teaches courses</td><td>id, name, email, hire_date</td></tr>
        <tr><td><strong>Course</strong></td><td>A subject offered by the school</td><td>id, title, credits, code</td></tr>
        <tr><td><strong>Department</strong></td><td>An organizational unit</td><td>id, name, building</td></tr>
        <tr><td><strong>Enrollment</strong></td><td>Student-Course relationship</td><td>student_id, course_id, semester</td></tr>
        <tr><td><strong>Grade</strong></td><td>Student's grade in a course</td><td>enrollment_id, grade, date</td></tr>
        <tr><td><strong>Attendance</strong></td><td>Student's attendance record</td><td>student_id, date, status</td></tr>
    </tbody>
</table>

<h2>Step 2: Draw the ERD</h2>

<pre><code>  ┌────────────────┐                ┌────────────────┐
  │   DEPARTMENT   │                │    STUDENT     │
  ├────────────────┤                ├────────────────┤
  │ *dept_id  (PK) │                │ *student_id(PK)│
  │  name          │                │  first_name    │
  │  building      │                │  last_name     │
  │  budget        │                │  email         │
  └───────┬────────┘                │  date_of_birth │
          │                         └───────┬────────┘
          │ 1:N                             │
  ┌───────▼────────┐                ┌───────▼────────┐
  │    TEACHER     │                │  ENROLLMENT    │
  ├────────────────┤                ├────────────────┤
  │ *teacher_id(PK)│                │ *student_id(FK)│
  │  first_name    │                │ *course_id(FK) │
  │  last_name     │                │  semester      │
  │  email         │                │  enrollment_dt │
  │  dept_id  (FK) │                └───────┬────────┘
  └───────┬────────┘                        │
          │                                 │
          │ 1:N                             │ M:N
  ┌───────▼────────┐                ┌───────▼────────┐
  │    COURSE      │                │    GRADE       │
  ├────────────────┤                ├────────────────┤
  │ *course_id(PK) │                │ *enrollment_id │
  │  title         │                │  grade         │
  │  code          │                │  graded_date   │
  │  credits       │                │  comments      │
  │  teacher_id(FK)│                └────────────────┘
  └────────────────┘</code></pre>

<h2>Step 3: Create the Tables (DDL)</h2>

<pre><code>CREATE DATABASE school_management;
USE school_management;

CREATE TABLE departments (
    dept_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    building VARCHAR(50),
    budget DECIMAL(12,2) DEFAULT 0
);

CREATE TABLE teachers (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    hire_date DATE NOT NULL,
    dept_id INT,
    FOREIGN KEY (dept_id) REFERENCES departments(dept_id)
        ON DELETE SET NULL
);

CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    date_of_birth DATE,
    enrollment_date DATE DEFAULT (CURRENT_DATE),
    is_active BOOLEAN DEFAULT TRUE
);

CREATE TABLE courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    code VARCHAR(10) UNIQUE NOT NULL,
    credits INT NOT NULL CHECK (credits > 0),
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id)
        ON DELETE SET NULL
);

CREATE TABLE enrollments (
    student_id INT,
    course_id INT,
    semester VARCHAR(20) NOT NULL,
    enrollment_date DATE DEFAULT (CURRENT_DATE),
    PRIMARY KEY (student_id, course_id, semester),
    FOREIGN KEY (student_id) REFERENCES students(student_id)
        ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
        ON DELETE CASCADE
);

CREATE TABLE grades (
    grade_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    semester VARCHAR(20) NOT NULL,
    grade VARCHAR(2) CHECK (grade IN ('A','B','C','D','F','I')),
    graded_date DATE DEFAULT (CURRENT_DATE),
    comments TEXT,
    FOREIGN KEY (student_id, course_id, semester) REFERENCES enrollments(student_id, course_id, semester)
        ON DELETE CASCADE
);</code></pre>

<h2>Step 4: Normalization Check</h2>

<table>
    <thead>
        <tr><th>Form</th><th>Check</th><th>Status</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>1NF</strong></td><td>All values atomic? No repeating groups?</td><td>Yes</td></tr>
        <tr><td><strong>2NF</strong></td><td>No partial dependencies?</td><td>Yes — grade depends on both student AND course</td></tr>
        <tr><td><strong>3NF</strong></td><td>No transitive dependencies?</td><td>Yes — teacher dept is in separate table</td></tr>
    </tbody>
</table>

<h2>Step 5: Useful Queries</h2>

<pre><code>-- Student transcript
SELECT
    s.first_name, s.last_name,
    c.title AS course,
    g.grade,
    g.graded_date
FROM grades g
JOIN students s ON g.student_id = s.student_id
JOIN courses c ON g.course_id = c.course_id
WHERE s.student_id = 1
ORDER BY g.graded_date DESC;

-- Department report
SELECT
    d.name AS department,
    COUNT(DISTINCT t.teacher_id) AS teachers,
    COUNT(DISTINCT c.course_id) AS courses,
    COUNT(DISTINCT e.student_id) AS students
FROM departments d
LEFT JOIN teachers t ON d.dept_id = t.dept_id
LEFT JOIN courses c ON t.teacher_id = c.teacher_id
LEFT JOIN enrollments e ON c.course_id = e.course_id
GROUP BY d.dept_id;

-- GPA calculation
SELECT
    s.first_name, s.last_name,
    AVG(CASE g.grade
        WHEN 'A' THEN 4.0
        WHEN 'B' THEN 3.0
        WHEN 'C' THEN 2.0
        WHEN 'D' THEN 1.0
        WHEN 'F' THEN 0.0
    END) AS gpa
FROM students s
JOIN grades g ON s.student_id = g.student_id
GROUP BY s.student_id
ORDER BY gpa DESC;</code></pre>

<h2>What You've Learned</h2>
<div class="card">
    <p>Congratulations on completing the DBMS tutorial! You now understand:</p>
    <ul>
        <li><strong>Database Models</strong> — Hierarchical, Network, Relational, Object-Oriented</li>
        <li><strong>ER Diagrams</strong> — Entities, attributes, relationships, cardinality</li>
        <li><strong>Relational Concepts</strong> — Keys, constraints, integrity</li>
        <li><strong>Normalization</strong> — 1NF through 5NF and denormalization</li>
        <li><strong>SQL DDL</strong> — CREATE, ALTER, DROP, views, indexes</li>
        <li><strong>Transactions</strong> — ACID properties, isolation, locking</li>
        <li><strong>Security</strong> — SQL injection, passwords, access control</li>
    </ul>
    <p><strong>Next Steps:</strong> Combine DBMS theory with PHP & MySQL practice to build complete web applications!</p>
</div>

<div class="exercise">
    <h4>Final Project</h4>
    <ol>
        <li>Design a database for a hospital management system (patients, doctors, appointments, departments, billing)</li>
        <li>Draw the ERD and identify all keys</li>
        <li>Create the tables with proper normalization (at least 3NF)</li>
        <li>Implement transactions for patient billing operations</li>
        <li>Set up proper access control for different user types</li>
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
