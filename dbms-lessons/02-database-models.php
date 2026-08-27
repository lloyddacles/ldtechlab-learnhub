<?php
$pageTitle = 'Database Models';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 2;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Database Models</h1>
    <p class="lesson-desc">Understand the different ways data can be organized and structured.</p>
</div>

<h2>What is a Data Model?</h2>
<p>A <strong>data model</strong> defines how data is stored, organized, and accessed in a database. It's the blueprint for the database structure.</p>

<h2>1. Hierarchical Model</h2>
<p>Data is organized in a <strong>tree structure</strong> with parent-child relationships. Each parent can have many children, but each child has only one parent.</p>

<pre><code>                ┌──────────┐
                │ Company  │
                └────┬─────┘
           ┌─────────┴─────────┐
      ┌────┴────┐         ┌────┴────┐
      │  Sales  │         │   IT    │
      └────┬────┘         └────┬────┘
      ┌────┴────┐         ┌────┴────┐
      │ Alice   │         │ Bob     │
      └─────────┘         └─────────┘</code></pre>

<table>
    <thead>
        <tr><th>Advantages</th><th>Disadvantages</th></tr>
    </thead>
    <tbody>
        <tr><td>Fast data retrieval (follow the tree path)</td><td>Rigid structure — hard to reorganize</td></tr>
        <tr><td>Good for hierarchical data (org charts)</td><td>No many-to-many relationships</td></tr>
        <tr><td>Efficient for 1:N relationships</td><td>Data redundancy for complex relationships</td></tr>
    </tbody>
</table>
<p><strong>Examples:</strong> IBM's IMS, Windows Registry, XML, JSON files</p>

<h2>2. Network Model</h2>
<p>An improvement over hierarchical — allows <strong>many-to-many relationships</strong> using a graph structure.</p>

<pre><code>      ┌─────────┐         ┌─────────┐
      │ Student │────────▶│ Course  │
      └────┬────┘         └────┬────┘
           │                   │
           ▼                   ▼
      ┌─────────┐         ┌─────────┐
      │  Grade  │◀────────│ Teacher │
      └─────────┘         └─────────┘</code></pre>

<table>
    <thead>
        <tr><th>Advantages</th><th>Disadvantages</th></tr>
    </thead>
    <tbody>
        <tr><td>Supports many-to-many relationships</td><td>Complex to design and maintain</td></tr>
        <tr><td>More flexible than hierarchical</td><td>Requires navigation pointers</td></tr>
        <tr><td>Better performance for some queries</td><td>Lack of structural independence</td></tr>
    </tbody>
</table>
<p><strong>Examples:</strong> IDMS, Integrated Data Store (IDS)</p>

<h2>3. Relational Model (Most Important)</h2>
<p>Data is organized in <strong>tables</strong> (relations). Tables relate to each other through <strong>keys</strong>. This is the most widely used model.</p>

<pre><code>  ┌──────────────────────┐       ┌──────────────────────┐
  │      Students        │       │      Courses         │
  ├──────────────────────┤       ├──────────────────────┤
  │ id (PK) │ name       │       │ id (PK) │ title      │
  │ 1       │ Alice      │       │ 101     │ Math       │
  │ 2       │ Bob        │       │ 102     │ Science    │
  └──────────────────────┘       └──────────────────────┘
            │                            │
            └────────┬───────────────────┘
                     ▼
          ┌──────────────────────┐
          │    Enrollments       │
          ├──────────────────────┤
          │ student_id (FK)      │
          │ course_id  (FK)      │
          │ enrollment_date      │
          └──────────────────────┘</code></pre>

<table>
    <thead>
        <tr><th>Advantages</th><th>Disadvantages</th></tr>
    </thead>
    <tbody>
        <tr><td>Simple, logical structure</td><td>Can be slow for very large datasets</td></tr>
        <tr><td>Flexible queries with SQL</td><td>Complex relationships need many tables</td></tr>
        <tr><td>Data integrity with constraints</td><td>Object-relational impedance mismatch</td></tr>
        <tr><td>Standardized language (SQL)</td><td></td></tr>
    </tbody>
</table>
<p><strong>Examples:</strong> MySQL, PostgreSQL, Oracle, SQL Server, SQLite</p>

<h2>4. Object-Oriented Model</h2>
<p>Data is stored as <strong>objects</strong> (like in Java or PHP classes). Combines OOP concepts with database storage.</p>

<pre><code>// Object example
class Student {
    string $name;
    int $age;
    Address $address;  // Nested object
    array $courses;    // Array of objects
}

// Stored directly in the database</code></pre>

<p><strong>Best for:</strong> Complex data types, multimedia, CAD systems</p>

<h2>5. Entity-Relationship (ER) Model</h2>
<p>A <strong>conceptual model</strong> used to design databases. Uses diagrams to show entities, attributes, and relationships. Covered in detail in the next lesson.</p>

<h2>Comparison Summary</h2>

<table>
    <thead>
        <tr><th>Model</th><th>Structure</th><th>Relationships</th><th>Use Case</th></tr>
    </thead>
    <tbody>
        <tr><td>Hierarchical</td><td>Tree</td><td>1:N</td><td>Org charts, file systems</td></tr>
        <tr><td>Network</td><td>Graph</td><td>M:N</td><td>Complex data networks</td></tr>
        <tr><td>Relational</td><td>Tables</td><td>1:1, 1:N, M:N</td><td>Most applications</td></tr>
        <tr><td>Object-Oriented</td><td>Objects</td><td>All types</td><td>Complex data, multimedia</td></tr>
    </tbody>
</table>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Draw a hierarchical model for a company with departments and employees</li>
        <li>Why is the relational model the most popular? List 3 reasons</li>
        <li>Which model would you use for a social media app? Why?</li>
        <li>What is the difference between the hierarchical and network models?</li>
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
