<?php
$pageTitle = 'Entity-Relationship Diagrams (ERD)';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 3;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Entity-Relationship Diagrams (ERD)</h1>
    <p class="lesson-desc">Design databases visually using ER diagrams — the blueprint of a database.</p>
</div>

<h2>What is an ERD?</h2>
<p>An <strong>Entity-Relationship Diagram (ERD)</strong> is a visual representation of a database. It shows the <strong>entities</strong> (things), their <strong>attributes</strong> (properties), and the <strong>relationships</strong> between them.</p>

<h2>Core Components</h2>

<h3>1. Entity</h3>
<p>An entity is a <strong>thing or object</strong> in the real world that is being represented in the database.</p>

<pre><code>  ┌─────────────┐
  │   STUDENT   │      ← Entity (shown as a rectangle)
  └─────────────┘</code></pre>

<ul>
    <li><strong>Strong Entity:</strong> Can exist independently (Student, Course)</li>
    <li><strong>Weak Entity:</strong> Depends on another entity (Enrollment depends on Student and Course)</li>
</ul>

<h3>2. Attributes</h3>
<p>Attributes are <strong>properties</strong> of an entity (the columns in a table).</p>

<pre><code>         ┌─────────────────────┐
         │      STUDENT        │
         ├─────────────────────┤
         │ * student_id (PK)   │   ← Primary Key (underlined)
         │   first_name        │
         │   last_name         │
         │   email             │
         │   date_of_birth     │
         └─────────────────────┘</code></pre>

<table>
    <thead>
        <tr><th>Attribute Type</th><th>Symbol</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Simple</strong></td><td>Regular</td><td>first_name, age</td></tr>
        <tr><td><strong>Composite</strong></td><td>Branches out</td><td>name → (first_name, last_name)</td></tr>
        <tr><td><strong>Derived</strong></td><td>Dashed oval</td><td>age (derived from date_of_birth)</td></tr>
        <tr><td><strong>Multi-valued</strong></td><td>Double oval</td><td>phone_numbers</td></tr>
    </tbody>
</table>

<h3>3. Relationships</h3>
<p>Relationships describe how entities are <strong>connected</strong> to each other.</p>

<pre><code>  ┌─────────┐                    ┌─────────┐
  │ STUDENT │───── ENROLLS ─────▶│ COURSE  │
  └─────────┘                    └─────────┘</code></pre>

<h2>Relationship Cardinality</h2>
<p>Cardinality defines how many instances of one entity can relate to another:</p>

<table>
    <thead>
        <tr><th>Type</th><th>Notation</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>One-to-One (1:1)</strong></td><td>1 ──── 1</td><td>One instance relates to exactly one other</td><td>Person ↔ Passport</td></tr>
        <tr><td><strong>One-to-Many (1:N)</strong></td><td>1 ──── N</td><td>One instance relates to many others</td><td>Department → Employees</td></tr>
        <tr><td><strong>Many-to-Many (M:N)</strong></td><td>M ──── N</td><td>Many instances relate to many others</td><td>Students ↔ Courses</td></tr>
    </tbody>
</table>

<h3>One-to-Many (1:N) — Most Common</h3>

<pre><code>  ┌────────────┐         ┌────────────────┐
  │ DEPARTMENT │─── 1:N ─┤   EMPLOYEE     │
  ├────────────┤         ├────────────────┤
  │ dept_id    │         │ emp_id         │
  │ name       │         │ name           │
  │ building   │         │ department_id  │ ── FK
  └────────────┘         └────────────────┘

  One department has many employees.
  Each employee belongs to one department.</code></pre>

<h3>Many-to-Many (M:N) — Needs Junction Table</h3>

<pre><code>  ┌─────────┐         ┌────────────────┐         ┌─────────┐
  │ STUDENT │─── M:N ─┤  ENROLLMENT   ├─ M:N ──│ COURSE  │
  ├─────────┤         ├────────────────┤         ├─────────┤
  │ id      │         │ student_id(FK) │         │ id      │
  │ name    │         │ course_id (FK) │         │ title   │
  └─────────┘         │ grade          │         └─────────┘
                      └────────────────┘

  Many students enroll in many courses.
  The ENROLLMENT junction table resolves the M:N relationship.</code></pre>

<h2>ERD Symbols (Crow's Foot Notation)</h2>

<pre><code>  Entity:            ┌────────────┐
                     │  ENTITY    │
                     ├────────────┤
                     │ attributes │
                     └────────────┘

  Relationship:      ──────┤├──────   (One)
                      ──────┤<──────   (Many)
                     ──────┤<──────── (Optional many)
                      ──────||──────   (Mandatory one)</code></pre>

<h2>Example: University ERD</h2>

<pre><code>  ┌────────────┐              ┌────────────┐
  │  STUDENT   │              │  TEACHER   │
  ├────────────┤              ├────────────┤
  │ *id (PK)   │              │ *id (PK)   │
  │ name       │              │ name       │
  │ email      │              │ dept       │
  │ phone      │              │ hire_date  │
  └─────┬──────┘              └─────┬──────┘
        │                           │
        │         ┌────────────┐    │
        ├────────▶│ ENROLLMENT │◀───┤
        │         ├────────────┤    │
        │         │ student_id │    │
        │         │ course_id  │    │
        │         │ grade      │    │
        │         └─────┬──────┘    │
        │               │           │
        │         ┌─────▼──────┐    │
        │         │  COURSE    │────┘
        │         ├────────────┤
        │         │ *id (PK)   │
        │         │ title      │
        │         │ credits    │
        │         │ teacher_id │
        │         └────────────┘</code></pre>

<h2>Steps to Create an ERD</h2>
<ol>
    <li><strong>Identify entities</strong> — What things need to be stored? (Student, Course, Teacher)</li>
    <li><strong>Identify attributes</strong> — What properties does each entity have?</li>
    <li><strong>Identify relationships</strong> — How are entities connected?</li>
    <li><strong>Determine cardinality</strong> — 1:1, 1:N, or M:N?</li>
    <li><strong>Identify keys</strong> — Primary keys and foreign keys</li>
    <li><strong>Draw the diagram</strong> — Use a tool or draw by hand</li>
</ol>

<h2>Tools for Drawing ERDs</h2>
<ul>
    <li><strong>dbdiagram.io</strong> — Free online ERD tool</li>
    <li><strong>draw.io</strong> — Free diagramming tool</li>
    <li><strong>Lucidchart</strong> — Professional diagram tool</li>
    <li><strong>MySQL Workbench</strong> — Built-in ERD for MySQL</li>
    <li><strong>Pen and paper</strong> — Always a great starting point!</li>
</ul>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Draw an ERD for a library system with: Books, Members, and Loans</li>
        <li>Identify the entities, attributes, and relationships for an e-commerce store</li>
        <li>Why do many-to-many relationships need a junction table?</li>
        <li>Draw an ERD for a hospital system: Patients, Doctors, Appointments, Departments</li>
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
