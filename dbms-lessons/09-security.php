<?php
$pageTitle = 'Database Security';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 9;
$nav = getPrevNextLesson($lessonNum, 'dbms-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">DBMS Lesson <?= $lessonNum ?></span>
    <h1>Database Security</h1>
    <p class="lesson-desc">Protect your data with access control, authentication, and security best practices.</p>
</div>

<h2>Why Database Security?</h2>
<p>Databases store sensitive data: passwords, personal information, financial records. A breach can cause:</p>
<ul>
    <li>Data theft and privacy violations</li>
    <li>Financial loss</li>
    <li>Legal liability</li>
    <li>Reputation damage</li>
</ul>

<h2>SQL Injection (Most Common Attack)</h2>

<pre><code>-- VULNERABLE: User input goes directly into SQL
&lt;?php
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $pdo->query($query);
?&gt;

-- Attack: User enters this as username:
-- ' OR '1'='1' --

-- Query becomes:
-- SELECT * FROM users WHERE username = '' OR '1'='1' --' AND password = ''
-- This returns ALL users! Attacker gets full access.</code></pre>

<h3>Prevention: Prepared Statements</h3>

<pre><code>&lt;?php
// SAFE: Prepared statements separate data from SQL
$stmt = $pdo->prepare(
    "SELECT * FROM users WHERE username = :username AND password = :password"
);

$stmt->execute([
    ':username' => $_POST['username'],
    ':password' => $_POST['password']
]);

$user = $stmt->fetch();
// Even malicious input is treated as literal data, not SQL code
?&gt;</code></pre>

<h2>Authentication &amp; Passwords</h2>

<pre><code>&lt;?php
// NEVER store plain text passwords!

// Hash a password (when creating user)
$hash = password_hash('user_password', PASSWORD_DEFAULT);
// Stored: $2y$10$N9qo8uLOickgx2ZMRZoMye... (one-way hash)

// Verify a password (when logging in)
if (password_verify($input_password, $stored_hash)) {
    echo "Password correct!";
} else {
    echo "Wrong password.";
}

// ALWAYS use password_hash() and password_verify()
// They use bcrypt by default (secure, salted, slow to brute force)
?&gt;</code></pre>

<div class="info-box important">
    <div class="box-title">Password Rules</div>
    <ul class="mb-0">
        <li><strong>NEVER</strong> store plain-text passwords</li>
        <li><strong>NEVER</strong> use MD5 or SHA1 for passwords (too fast to crack)</li>
        <li><strong>ALWAYS</strong> use <code>password_hash()</code> and <code>password_verify()</code></li>
        <li><strong>ALWAYS</strong> use HTTPS for login forms (prevents password interception)</li>
    </ul>
</div>

<h2>Access Control</h2>

<pre><code>-- Create a user with limited privileges
CREATE USER 'app_user'@'localhost' IDENTIFIED BY 'secure_password';

-- Grant specific permissions only
GRANT SELECT, INSERT, UPDATE ON school.* TO 'app_user'@'localhost';

-- Revoke dangerous permissions
REVOKE DELETE, DROP, ALTER ON school.* FROM 'app_user'@'localhost';

-- View grants
SHOW GRANTS FOR 'app_user'@'localhost';

-- Drop a user
DROP USER 'app_user'@'localhost';</code></pre>

<h2>Principle of Least Privilege</h2>

<table>
    <thead>
        <tr><th>User Type</th><th>Permissions Needed</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Web Application</strong></td><td>SELECT, INSERT, UPDATE (on specific tables only)</td></tr>
        <tr><td><strong>Admin</strong></td><td>Full access (SELECT, INSERT, UPDATE, DELETE, CREATE, DROP)</td></tr>
        <tr><td><strong>Read-Only Analyst</strong></td><td>SELECT only</td></tr>
        <tr><strong>Backup Service</strong></td><td>SELECT (to read data for backup)</td></tr>
    </tbody>
</table>

<pre><code>-- Give minimum required permissions
-- BAD: Giving all privileges to web app
GRANT ALL PRIVILEGES ON *.* TO 'app_user'@'localhost';

-- GOOD: Give only what's needed
GRANT SELECT, INSERT, UPDATE ON school.students TO 'app_user'@'localhost';
GRANT SELECT ON school.courses TO 'app_user'@'localhost';</code></pre>

<h2>Data Encryption</h2>

<pre><code>-- Encrypt sensitive data in the database
-- Column-level encryption (application level)
INSERT INTO users (name, ssn_encrypted)
VALUES ('Alice', AES_ENCRYPT('123-45-6789', 'secret_key'));

-- Decrypt when reading
SELECT name, AES_DECRYPT(ssn_encrypted, 'secret_key') AS ssn
FROM users;

-- Note: Key management is critical — never hardcode keys!</code></pre>

<h2>Database Security Best Practices</h2>

<table>
    <thead>
        <tr><th>Practice</th><th>Why</th></tr>
    </thead>
    <tbody>
        <tr><td>Use prepared statements</td><td>Prevents SQL injection</td></tr>
        <tr><td>Hash passwords with bcrypt</td><td>Passwords can't be recovered if stolen</td></tr>
        <tr><td>Apply least privilege</td><td>Limits damage if an account is compromised</td></tr>
        <tr><td>Keep software updated</td><td>Patches known vulnerabilities</td></tr>
        <tr><td>Use HTTPS</td><td>Encrypts data in transit</td></tr>
        <tr><td>Regular backups</td><td>Recovery from attacks or failures</td></tr>
        <tr><td>Don't expose errors to users</td><td>Errors reveal database structure</td></tr>
        <tr><td>Audit logging</td><td>Track who accessed what and when</td></tr>
    </tbody>
</table>

<h2>Error Handling (Don't Leak Info)</h2>

<pre><code>&lt;?php
// BAD: Show raw database errors to users
try {
    $pdo->query("SELECT * FROM nonexistent");
} catch (PDOException $e) {
    echo $e->getMessage();
    // Exposes: "Table 'school.nonexistent' doesn't exist"
}

// GOOD: Log errors, show generic message
try {
    $pdo->query("SELECT * FROM nonexistent");
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo "An error occurred. Please try again later.";
    // User sees nothing useful to an attacker
}
?&gt;</code></pre>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Explain how SQL injection works and how prepared statements prevent it</li>
        <li>Why is MD5 not suitable for password hashing?</li>
        <li>Create a MySQL user that can only read data from the students table</li>
        <li>List 5 security best practices for a PHP + MySQL application</li>
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
