<?php
$pageTitle = 'Transaction Management';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 8;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Transaction Management</h1>
    <p class="lesson-desc">Keep your data consistent and reliable with transactions and ACID properties.</p>
</div>

<h2>What is a Transaction?</h2>
<p>A <strong>transaction</strong> is a sequence of operations performed as a single logical unit of work. Either <strong>all operations succeed</strong>, or <strong>none of them do</strong>.</p>

<h3>Real-World Example: Bank Transfer</h3>
<pre><code>-- Transferring $500 from Alice to Bob
-- This is ONE transaction with TWO operations:

BEGIN;

UPDATE accounts SET balance = balance - 500 WHERE name = 'Alice';
UPDATE accounts SET balance = balance + 500 WHERE name = 'Bob';

COMMIT;</code></pre>
<p>If the system crashes after deducting but before adding, Alice loses money without Bob receiving it. <strong>Transactions prevent this.</strong></p>

<h2>Transaction Commands</h2>

<table>
    <thead>
        <tr><th>Command</th><th>Purpose</th></tr>
    </thead>
    <tbody>
        <tr><td><code>BEGIN</code> / <code>START TRANSACTION</code></td><td>Start a new transaction</td></tr>
        <tr><td><code>COMMIT</code></td><td>Save all changes permanently</td></tr>
        <tr><td><code>ROLLBACK</code></td><td>Undo all changes since BEGIN</td></tr>
        <tr><td><code>SAVEPOINT</code></td><td>Create a rollback point within a transaction</td></tr>
        <tr><td><code>ROLLBACK TO</code></td><td>Roll back to a specific savepoint</td></tr>
    </tbody>
</table>

<h2>Transaction Example</h2>

<pre><code>-- Start a transaction
BEGIN;

-- Transfer money
UPDATE accounts SET balance = balance - 500 WHERE id = 1;
UPDATE accounts SET balance = balance + 500 WHERE id = 2;

-- Check if everything looks right
SELECT * FROM accounts WHERE id IN (1, 2);

-- If OK, save changes
COMMIT;

-- If something went wrong, undo everything
-- ROLLBACK;</code></pre>

<h2>ACID Properties</h2>
<p>Transactions must satisfy four properties, known as <strong>ACID</strong>:</p>

<table>
    <thead>
        <tr><th>Property</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>A</strong>tomicity</td><td>All or nothing — either all operations complete or none do</td><td>Bank transfer: both deductions and additions happen, or neither</td></tr>
        <tr><td><strong>C</strong>onsistency</td><td>Data moves from one valid state to another</td><td>Total money before = total money after transfer</td></tr>
        <tr><td><strong>I</strong>solation</td><td>Concurrent transactions don't interfere with each other</td><td>Two transfers at the same time don't corrupt data</td></tr>
        <tr><td><strong>D</strong>urability</td><td>Once committed, changes are permanent (survive crashes)</td><td>Power failure after COMMIT doesn't lose data</td></tr>
    </tbody>
</table>

<h2>Concurrency Problems</h2>
<p>Without proper transaction management, concurrent transactions can cause problems:</p>

<h3>1. Dirty Read</h3>
<p>Transaction B reads data that Transaction A hasn't committed yet. If A rolls back, B has invalid data.</p>

<h3>2. Non-Repeatable Read</h3>
<p>Transaction B reads the same row twice and gets different values because Transaction A modified it in between.</p>

<h3>3. Phantom Read</h3>
<p>Transaction B runs a query twice and gets different rows because Transaction A inserted or deleted rows.</p>

<h2>Isolation Levels</h2>

<table>
    <thead>
        <tr><th>Level</th><th>Dirty Read</th><th>Non-Repeatable</th><th>Phantom</th></tr>
    </thead>
    <tbody>
        <tr><td><code>READ UNCOMMITTED</code></td><td>Yes</td><td>Yes</td><td>Yes</td></tr>
        <tr><td><code>READ COMMITTED</code></td><td>No</td><td>Yes</td><td>Yes</td></tr>
        <tr><td><code>REPEATABLE READ</code></td><td>No</td><td>No</td><td>Yes</td></tr>
        <tr><td><code>SERIALIZABLE</code></td><td>No</td><td>No</td><td>No</td></tr>
    </tbody>
</table>

<pre><code>-- Set isolation level
SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED;

-- Higher isolation = more safety but slower performance
-- Lower isolation = faster but riskier</code></pre>

<h2>Locking</h2>
<p>Databases use <strong>locks</strong> to prevent concurrent transactions from conflicting:</p>

<pre><code>-- Read lock (shared lock) - multiple transactions can read
SELECT * FROM accounts WHERE id = 1 LOCK IN SHARE MODE;

-- Write lock (exclusive lock) - only one transaction can modify
SELECT * FROM accounts WHERE id = 1 FOR UPDATE;</code></pre>

<div class="info-box note">
    <div class="box-title">Lock Types</div>
    <ul class="mb-0">
        <li><strong>Read Lock (Shared)</strong> — Multiple transactions can read, but nobody can write</li>
        <li><strong>Write Lock (Exclusive)</strong> — Only one transaction can read and write</li>
        <li><strong>Deadlock</strong> — Two transactions waiting for each other's locks (both stuck)</li>
    </ul>
</div>

<h2>Transactions in PHP (PDO)</h2>

<pre><code>&lt;?php
$pdo->beginTransaction();

try {
    $pdo->exec("UPDATE accounts SET balance = balance - 500 WHERE id = 1");
    $pdo->exec("UPDATE accounts SET balance = balance + 500 WHERE id = 2");
    $pdo->commit();
    echo "Transfer successful!";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Transfer failed: " . $e->getMessage();
}
?&gt;</code></pre>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Explain each ACID property using a library checkout example</li>
        <li>What is a dirty read? How do isolation levels prevent it?</li>
        <li>Write a PHP transaction that transfers inventory between two warehouses</li>
        <li>When would you use READ UNCOMMITTED vs SERIALIZABLE?</li>
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
