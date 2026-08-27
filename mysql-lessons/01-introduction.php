<?php
$pageTitle = 'Introduction to MySQL';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 1;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>Introduction to MySQL</h1>
    <p class="lesson-desc">Learn what MySQL is, why it matters, and how to get started.</p>
</div>

<h2>What is MySQL?</h2>
<p>MySQL is the world's most popular <strong>open-source relational database management system</strong> (RDBMS). It stores and organizes data in tables and uses <strong>SQL</strong> (Structured Query Language) to manage that data.</p>

<h2>Why Learn MySQL?</h2>
<ul>
    <li>Powers millions of websites: WordPress, Facebook, Twitter, YouTube</li>
    <li>Essential for backend web development with PHP</li>
    <li>Fast, reliable, and scalable</li>
    <li>Free and open-source</li>
    <li>SQL skills transfer to PostgreSQL, SQLite, and other databases</li>
</ul>

<h2>Key Concepts</h2>

<table>
    <thead>
        <tr><th>Term</th><th>Meaning</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Database</strong></td><td>A collection of related tables (like a spreadsheet workbook)</td></tr>
        <tr><td><strong>Table</strong></td><td>A structured set of rows and columns (like a single spreadsheet)</td></tr>
        <tr><td><strong>Row</strong></td><td>A single record in a table (like one row in a spreadsheet)</td></tr>
        <tr><td><strong>Column</strong></td><td>A field/attribute in a table (like one column header)</td></tr>
        <tr><td><strong>SQL</strong></td><td>Structured Query Language &mdash; the language used to talk to databases</td></tr>
        <tr><td><strong>Primary Key</strong></td><td>A unique identifier for each row in a table</td></tr>
    </tbody>
</table>

<h2>How MySQL Works</h2>
<ol>
    <li>You write <strong>SQL statements</strong> (commands)</li>
    <li>Send them to the <strong>MySQL server</strong></li>
    <li>The server processes them and returns <strong>results</strong></li>
</ol>

<pre><code>-- This is a SQL comment (same as // in PHP)

-- Create a database
CREATE DATABASE my_website;

-- Select it for use
USE my_website;

-- Create a table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data
INSERT INTO users (name, email) VALUES ('Alice', 'alice@example.com');

-- Query data
SELECT * FROM users;</code></pre>

<h2>Setting Up MySQL</h2>

<h3>Option 1: MySQL Community Server (Recommended)</h3>
<ol>
    <li>Download from <a href="https://dev.mysql.com/downloads/mysql/" target="_blank">dev.mysql.com</a></li>
    <li>Install with default settings</li>
    <li>Remember your root password!</li>
</ol>

<h3>Option 2: XAMPP (Includes MySQL + PHP)</h3>
<ol>
    <li>Download from <a href="https://www.apachefriends.org/" target="_blank">apachefriends.org</a></li>
    <li>Start MySQL from the XAMPP control panel</li>
    <li>Access via phpMyAdmin at <code>http://localhost/phpmyadmin</code></li>
</ol>

<h3>Option 3: MAMP (Mac)</h3>
<ol>
    <li>Download from <a href="https://www.mamp.info/" target="_blank">mamp.info</a></li>
    <li>Start MySQL from MAMP</li>
</ol>

<h2>Connecting via Command Line</h2>

<pre><code>-- Connect to MySQL (you'll be prompted for password)
mysql -u root -p

-- Once connected, you'll see:
mysql></code></pre>

<div class="info-box tip">
    <div class="box-title">Tip</div>
    <p class="mb-0">SQL commands are <strong>case-insensitive</strong> for keywords (<code>SELECT</code> = <code>select</code>), but table and column names may be case-sensitive depending on your operating system.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Install MySQL on your computer (or use XAMPP/MAMP)</li>
        <li>Connect to MySQL using the command line: <code>mysql -u root -p</code></li>
        <li>Run <code>SHOW DATABASES;</code> to see the existing databases</li>
        <li>Run <code>SELECT VERSION();</code> to check your MySQL version</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug'], 'mysql-lessons') ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php else: ?>
        <span></span>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug'], 'mysql-lessons') ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
