<?php
$pageTitle = 'PHP Superglobals';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 13;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Superglobals</h1>
    <p class="lesson-desc">Access predefined variables that are always available in PHP.</p>
</div>

<h2>What Are Superglobals?</h2>
<p>Superglobals are <strong>built-in variables</strong> that are always accessible, regardless of scope. They provide information about the server, the request, and the environment.</p>

<h2>Common Superglobals</h2>

<table>
    <thead>
        <tr><th>Superglobal</th><th>Purpose</th></tr>
    </thead>
    <tbody>
        <tr><td><code>$_GET</code></td><td>Data sent via URL parameters (query string)</td></tr>
        <tr><td><code>$_POST</code></td><td>Data sent via HTTP POST method (forms)</td></tr>
        <tr><td><code>$_REQUEST</code></td><td>Combined GET, POST, and COOKIE data</td></tr>
        <tr><td><code>$_SERVER</code></td><td>Server and request information</td></tr>
        <tr><td><code>$_GLOBALS</code></td><td>Access to all global variables</td></tr>
        <tr><td><code>$_FILES</code></td><td>File upload information</td></tr>
        <tr><td><code>$_COOKIE</code></td><td>Cookies sent by the browser</td></tr>
        <tr><td><code>$_SESSION</code></td><td>Session variables (covered in next lesson)</td></tr>
    </tbody>
</table>

<h2>$_SERVER</h2>
<p>Contains information about the server environment and the current request:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Server Information ===\n";

// Server software
echo "Software: " . $_SERVER["SERVER_SOFTWARE"] . "\n";

// PHP version
echo "PHP Version: " . phpversion() . "\n";

// Request method (GET, POST, etc.)
echo "Request Method: " . $_SERVER["REQUEST_METHOD"] . "\n";

// Script name
echo "Script: " . $_SERVER["SCRIPT_NAME"] . "\n";

// Client IP
echo "Your IP: " . $_SERVER["REMOTE_ADDR"] . "\n";

// User agent (browser info)
echo "Browser: " . $_SERVER["HTTP_USER_AGENT"] . "\n";

// Server protocol
echo "Protocol: " . $_SERVER["SERVER_PROTOCOL"] . "\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>$_GET Parameters</h2>
<p>Data passed in the URL after the <code>?</code> symbol. Used for non-sensitive data that should be bookmarkable.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// In a real scenario, you would visit:
// page.php?name=Alice&age=20
//
// Then $_GET would contain:
// $_GET["name"] = "Alice"
// $_GET["age"] = "20"
//
// Since we cannot pass URL params in the sandbox,
// here is how you would use them:

echo "=== How $_GET Works ===\n";
echo "Visit: page.php?name=Alice&age=20\n\n";

// Safe way to access GET parameters
$name = $_GET["name"] ?? "Guest";  // Use null coalescing for safety
$age = isset($_GET["age"]) ? (int)$_GET["age"] : 0;

echo "Name: $name\n";
echo "Age: $age\n\n";

// Show the URL that would be generated
$params = http_build_query(["name" => "Alice", "age" => 20]);
echo "Generated URL: ?$params\n";
echo "\n";

// Common uses of $_GET:
echo "=== Common $_GET Uses ===\n";
echo "- Search queries: ?q=php+tutorial\n";
echo "- Pagination: ?page=2\n";
echo "- Filtering: ?category=books&sort=price\n";
echo "- Language selection: ?lang=en\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>$_POST Data</h2>
<p>Data sent via HTTP POST. Used for sensitive data (passwords, form submissions) since it's not visible in the URL.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// $_POST data comes from HTML forms with method="post"
// Example form:
// <form method="post" action="process.php">
//   <input type="text" name="username">
//   <input type="password" name="password">
//   <button type="submit">Login</button>
// </form>

echo "=== How $_POST Works ===\n";
echo "Data comes from HTML forms with method=\"post\"\n\n";

// Safe way to access POST parameters
$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

echo "Username: " . ($username ?: "(not submitted)") . "\n";
echo "Password: " . ($password ? str_repeat("*", strlen($password)) : "(not submitted)") . "\n\n";

// $_POST is also used by:
echo "=== $_POST is used for ===\n";
echo "- Login forms (username/password)\n";
echo "- Registration forms\n";
echo "- Contact forms\n";
echo "- Any sensitive data\n";
echo "- Large data that exceeds URL limits\n";
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box warning">
    <div class="box-title">Security Warning</div>
    <p class="mb-0"><strong>Never trust user input!</strong> Always validate and sanitize data from <code>$_GET</code> and <code>$_POST</code> before using it. Never output user input without escaping it first (use <code>htmlspecialchars()</code>).</p>
</div>

<h2>$_GLOBALS</h2>
<p>Access all global variables through this array:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$siteName = "My PHP Tutorial";
$maxUsers = 100;

// Access globals directly
echo "Site: $siteName\n";

// Access via $_GLOBALS
echo "Site via _GLOBALS: " . $_GLOBALS["siteName"] . "\n";
echo "Max Users: " . $_GLOBALS["maxUsers"] . "\n\n";

// Modify via $_GLOBALS (useful inside functions)
function updateSiteName() {
    $_GLOBALS["siteName"] = "Updated PHP Tutorial";
}

updateSiteName();
echo "After update: $siteName\n";

// List all superglobals
echo "\n=== Available Superglobals ===\n";
$superglobals = ["_GET", "_POST", "_REQUEST", "_SERVER", "_FILES", "_COOKIE", "_SESSION", "_GLOBALS"];
foreach ($superglobals as $sg) {
    echo "$sg - Type: " . gettype($$sg) . "\n";
}
'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box tip">
    <div class="box-title">GET vs POST</div>
    <p><strong>GET:</strong> Data visible in URL, bookmarkable, limited to ~2000 characters, use for non-sensitive data.</p>
    <p class="mb-0"><strong>POST:</strong> Data hidden from URL, not bookmarkable, no size limit, use for sensitive or large data.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a PHP script that reads a "name" parameter from the URL and displays "Hello, [name]!"</li>
        <li>Write a script that displays all <code>$_SERVER</code> information in a formatted table</li>
        <li>What is the difference between <code>$_GET</code> and <code>$_POST</code>? When would you use each?</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug']) ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug']) ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
