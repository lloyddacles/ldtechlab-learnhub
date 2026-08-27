<?php
$pageTitle = 'PHP & MySQL Integration';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 10;
$nav = getPrevNextLesson($lessonNum, 'mysql-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">MySQL Lesson <?= $lessonNum ?></span>
    <h1>PHP &amp; MySQL Integration</h1>
    <p class="lesson-desc">Connect PHP to MySQL and build dynamic database-driven applications.</p>
</div>

<h2>Connecting PHP to MySQL</h2>
<p>PHP has built-in extensions to connect to MySQL. The modern way is using <strong>PDO</strong> (PHP Data Objects):</p>

<pre><code>&lt;?php
// Database configuration
$host = 'localhost';
$dbname = 'school';
$username = 'root';
$password = 'your_password';

try {
    // Create a PDO connection
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?&gt;</code></pre>

<div class="info-box note">
    <div class="box-title">PDO vs MySQLi</div>
    <p><strong>PDO</strong> supports multiple databases (MySQL, PostgreSQL, SQLite). <strong>MySQLi</strong> is MySQL-only. PDO is the recommended choice.</p>
    <p class="mb-0">Both support <strong>prepared statements</strong> which protect against SQL injection.</p>
</div>

<h2>CRUD Operations with PDO</h2>

<h3>CREATE &mdash; Insert Data</h3>
<pre><code>&lt;?php
// INSERT with prepared statement (SAFE from SQL injection)
$stmt = $pdo->prepare(
    "INSERT INTO students (first_name, last_name, email, age)
     VALUES (:first_name, :last_name, :email, :age)"
);

$stmt->execute([
    ':first_name' => 'Alice',
    ':last_name' => 'Smith',
    ':email' => 'alice@example.com',
    ':age' => 20
]);

echo "New student ID: " . $pdo->lastInsertId();
?&gt;</code></pre>

<h3>READ &mdash; Query Data</h3>
<pre><code>&lt;?php
// Fetch all rows
$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();

foreach ($students as $student) {
    echo $student['first_name'] . ' ' . $student['last_name'];
    echo '&lt;br&gt;';
}

// Fetch a single row
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute([':id' => 1]);
$student = $stmt->fetch();

if ($student) {
    echo "Found: " . $student['first_name'];
}
?&gt;</code></pre>

<h3>UPDATE &mdash; Modify Data</h3>
<pre><code>&lt;?php
$stmt = $pdo->prepare(
    "UPDATE students SET email = :email WHERE id = :id"
);

$stmt->execute([
    ':email' => 'newemail@example.com',
    ':id' => 1
]);

echo "Rows updated: " . $stmt->rowCount();
?&gt;</code></pre>

<h3>DELETE &mdash; Remove Data</h3>
<pre><code>&lt;?php
$stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
$stmt->execute([':id' => 1]);

echo "Rows deleted: " . $stmt->rowCount();
?&gt;</code></pre>

<h2>SQL Injection &mdash; The Danger</h2>

<pre><code>&lt;?php
// DANGEROUS! Never do this!
$username = $_POST['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$pdo->query($query);

// If user types: ' OR '1'='1
// Query becomes: SELECT * FROM users WHERE username = '' OR '1'='1'
// This returns ALL rows! Potential data breach.

// SAFE: Use prepared statements
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute([':username' => $_POST['username']]);
// The user input is NEVER part of the SQL string
?&gt;</code></pre>

<div class="info-box important">
    <div class="box-title">SQL Injection Rule</div>
    <p class="mb-0"><strong>NEVER</strong> put user input directly in SQL strings. <strong>ALWAYS</strong> use prepared statements with parameterized queries.</p>
</div>

<h2>Practical Example: Simple Login</h2>

<pre><code>&lt;?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $pdo = new PDO("mysql:host=localhost;dbname=school", "root", "password");

    // Step 1: Find the user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    // Step 2: Verify the password
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?&gt;

&lt;form method="POST"&gt;
    &lt;input type="text" name="username" placeholder="Username" required&gt;
    &lt;input type="password" name="password" placeholder="Password" required&gt;
    &lt;button type="submit"&gt;Login&lt;/button&gt;
&lt;/form&gt;</code></pre>

<h2>Best Practices</h2>

<table>
    <thead>
        <tr><th>Do</th><th>Don't</th></tr>
    </thead>
    <tbody>
        <tr><td>Use prepared statements</td><td>Concatenate user input into SQL</td></tr>
        <tr><td>Use <code>password_hash()</code> for passwords</td><td>Store plain-text passwords</td></tr>
        <tr><td>Close connections when done</td><td>Leave connections open</td></tr>
        <tr><td>Handle errors gracefully</td><td>Display raw SQL errors to users</td></tr>
        <tr><td>Validate input before processing</td><td>Trust user input</td></tr>
    </tbody>
</table>

<h2>What You've Learned</h2>
<div class="card">
    <p>Congratulations! You've completed the MySQL tutorial. Here's what you now know:</p>
    <ul>
        <li><strong>SQL Basics</strong> &mdash; CREATE, INSERT, SELECT, UPDATE, DELETE</li>
        <li><strong>Querying</strong> &mdash; WHERE, ORDER BY, LIMIT, LIKE, BETWEEN, IN</li>
        <li><strong>Functions</strong> &mdash; COUNT, SUM, AVG, GROUP BY, HAVING</li>
        <li><strong>JOINs</strong> &mdash; INNER, LEFT, RIGHT joins</li>
        <li><strong>Performance</strong> &mdash; Indexes, EXPLAIN, optimization</li>
        <li><strong>PHP Integration</strong> &mdash; PDO, prepared statements, CRUD</li>
    </ul>
    <p><strong>Next Steps:</strong> Build a complete PHP + MySQL project, learn about transactions, stored procedures, and database design patterns!</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a complete PHP page that lists all students from a MySQL table</li>
        <li>Build a registration form that stores new users with hashed passwords</li>
        <li>Create a search page that lets users search students by name</li>
        <li>Build a simple CRUD app: Create, Read, Update, Delete students</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug'], 'mysql-lessons') ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug'], 'mysql-lessons') ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
