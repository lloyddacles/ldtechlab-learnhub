<?php
$pageTitle = 'Introduction to DBMS';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 1;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Introduction to DBMS</h1>
    <p class="lesson-desc">What is a Database Management System and why do we need one?</p>
</div>

<h2>What is a DBMS?</h2>
<p>A <strong>Database Management System (DBMS)</strong> is software that allows you to create, manage, and interact with databases. It acts as an intermediary between users and the database, ensuring data is stored efficiently and securely.</p>

<h2>Why Do We Need a DBMS?</h2>
<p>Before DBMS, data was stored in flat files (text files, spreadsheets). This caused many problems:</p>

<table>
    <thead>
        <tr><th>Problem</th><th>Without DBMS</th><th>With DBMS</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Data Redundancy</strong></td><td>Same data duplicated in multiple files</td><td>Data stored once, shared efficiently</td></tr>
        <tr><td><strong>Data Inconsistency</strong></td><td>Same data differs across files</td><td>Single source of truth</td></tr>
        <tr><td><strong>Data Isolation</strong></td><td>Data scattered in different formats</td><td>Unified data storage</td></tr>
        <tr><td><strong>Security</strong></td><td>Little or no access control</td><td>Granular access permissions</td></tr>
        <tr><td><strong>Integrity</strong></td><td>No validation rules</td><td>Constraints enforce data quality</td></tr>
    </tbody>
</table>

<h2>Types of Databases</h2>

<h3>1. Relational Database (RDBMS)</h3>
<p>Data is organized into <strong>tables</strong> (rows and columns) with relationships between them.</p>
<ul>
    <li>MySQL, PostgreSQL, Oracle, SQL Server</li>
    <li>Uses SQL (Structured Query Language)</li>
    <li>Best for structured, predictable data</li>
</ul>

<h3>2. NoSQL Database</h3>
<p>Stores data in non-tabular formats (documents, key-value pairs, graphs).</p>
<ul>
    <li>MongoDB (document), Redis (key-value), Neo4j (graph)</li>
    <li>Flexible schema, horizontal scaling</li>
    <li>Best for unstructured or rapidly changing data</li>
</ul>

<h3>3. Object-Oriented Database</h3>
<p>Stores data as objects (like in OOP programming).</p>
<ul>
    <li>db4o, ObjectDB</li>
    <li>Used in applications with complex data structures</li>
</ul>

<h2>Key DBMS Concepts</h2>

<table>
    <thead>
        <tr><th>Concept</th><th>Description</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Data</strong></td><td>Raw facts and figures</td></tr>
        <tr><td><strong>Database (DB)</strong></td><td>Organized collection of related data</td></tr>
        <tr><td><strong>DBMS</strong></td><td>Software to manage the database</td></tr>
        <tr><td><strong>Schema</strong></td><td>The structure/design of the database</td></tr>
        <tr><td><strong>Query</strong></td><td>A request to retrieve or manipulate data</td></tr>
        <tr><td><strong>Table (Relation)</strong></td><td>A collection of rows and columns</td></tr>
        <tr><td><strong>Record (Tuple)</strong></td><td>A single row in a table</td></tr>
        <tr><td><strong>Field (Attribute)</strong></td><td>A single column in a table</td></tr>
    </tbody>
</table>

<h2>DBMS Architecture</h2>

<pre><code>┌─────────────────────────────────────────┐
│              Users / Applications        │
├─────────────────────────────────────────┤
│              DBMS Software              │
│  ┌───────────┬───────────┬───────────┐  │
│  │ Query     │ Storage   │ Security  │  │
│  │ Processor │ Manager   │ Manager   │  │
│  └───────────┴───────────┴───────────┘  │
├─────────────────────────────────────────┤
│              Database Files             │
└─────────────────────────────────────────┘</code></pre>

<h2>Real-World Examples</h2>
<ul>
    <li><strong>Banking</strong> &mdash; Customer accounts, transactions, loans</li>
    <li><strong>Hospital</strong> &mdash; Patient records, appointments, prescriptions</li>
    <li><strong>University</strong> &mdash; Student records, courses, grades</li>
    <li><strong>E-commerce</strong> &mdash; Products, orders, customers</li>
    <li><strong>Social Media</strong> &mdash; Users, posts, comments, connections</li>
</ul>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>List 3 real-world systems that use databases and explain what data they store</li>
        <li>What is the difference between data and information?</li>
        <li>Why is data redundancy a problem? Give an example</li>
        <li>What type of database (relational, NoSQL, or object-oriented) would you choose for an online store? Why?</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug'], 'dbms-lessons') ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php else: ?>
        <span></span>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug'], 'dbms-lessons') ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
