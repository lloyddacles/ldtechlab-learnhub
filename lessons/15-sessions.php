<?php
$pageTitle = 'PHP Sessions';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 15;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Sessions &amp; Cookies</h1>
    <p class="lesson-desc">Maintain user state across pages using sessions and cookies.</p>
</div>

<h2>The Problem: HTTP is Stateless</h2>
<p>Every time a user visits a new page, the server forgets everything about them. HTTP is <strong>stateless</strong> &mdash; each request is independent.</p>
<p>Sessions and cookies solve this by <strong>remembering</strong> user data between requests.</p>

<h2>Cookies</h2>
<p>Cookies are small pieces of data stored <strong>in the user's browser</strong>. They are sent with every request to your server.</p>

<div class="syntax-ref">
    <h4>Syntax: Cookies</h4>
    <code>setcookie("name", "value", time() + seconds);  // Set a cookie</code>
    <code>$_COOKIE["name"]                               // Read a cookie</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Cookies ===\n\n";

echo "How cookies work:\n";
echo "1. Server sends a cookie with setcookie()\n";
echo "2. Browser stores the cookie\n";
echo "3. Browser sends cookie back with every request\n";
echo "4. Server reads it via \$_COOKIE\n\n";

echo "Setting a cookie example:\n";
echo "setcookie(\"username\", \"Alice\", time() + 86400 * 30);\n";
echo "  - Name: \"username\"\n";
echo "  - Value: \"Alice\"\n";
echo "  - Expires: 30 days from now\n\n";

echo "Reading cookies:\n";
echo "\$username = \$_COOKIE[\"username\"] ?? \"Guest\";\n\n";

// Simulate reading a cookie (in real usage, setcookie() would set it)
echo "Current cookies: " . (empty($_COOKIE) ? "None set yet" : json_encode($_COOKIE)) . "\n\n";

// Cookie with array of options
echo "Cookie options:\n";
echo "setcookie(\"user\", json_encode([\"name\"=>\"Alice\", \"role\"=>\"admin\"]), [\n";
echo "    \'expires\' => time() + 86400,\n";
echo "    \'path\' => \"/\",\n";
echo "    \'httponly\' => true,\n";
echo "    \'secure\' => false,\n";
echo "]);\n";
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
    <div class="box-title">Cookie Security</div>
    <ul class="mb-0">
        <li><code>httponly</code> &mdash; Prevents JavaScript from accessing the cookie (prevents XSS)</li>
        <li><code>secure</code> &mdash; Only sends cookie over HTTPS</li>
        <li><code>SameSite</code> &mdash; Controls cross-site cookie behavior</li>
        <li>Never store sensitive data in cookies (use sessions instead)</li>
    </ul>
</div>

<h2>Sessions</h2>
<p>Sessions store data <strong>on the server</strong>, identified by a session ID stored in a cookie. More secure than cookies because the data never leaves the server.</p>

<div class="syntax-ref">
    <h4>Syntax: Sessions</h4>
    <code>session_start();                              // Start a session (must be first!)</code>
    <code>$_SESSION["key"] = "value";                   // Store data</code>
    <code>$value = $_SESSION["key"];                     // Read data</code>
    <code>unset($_SESSION["key"]);                      // Delete a session variable</code>
    <code>session_destroy();                            // Destroy the entire session</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== How Sessions Work ===\n\n";

echo "1. Start session:    session_start()\n";
echo "2. Store data:       \$_SESSION[\"key\"] = \"value\"\n";
echo "3. Read data:        \$_SESSION[\"key\"]\n";
echo "4. Session ID:       Stored in cookie (PHPSESSID)\n";
echo "5. Server maps ID → data\n\n";

// Simulate session behavior (can\'t actually use sessions in sandbox)
echo "=== Session Example Code ===\n\n";

echo "// --- login.php ---\n";
echo "session_start();\n";
echo "\$_SESSION[\"logged_in\"] = true;\n";
echo "\$_SESSION[\"username\"] = \"Alice\";\n";
echo "\$_SESSION[\"role\"] = \"admin\";\n";
echo "header(\"Location: dashboard.php\");\n\n";

echo "// --- dashboard.php ---\n";
echo "session_start();\n";
echo "if (!(\$_SESSION[\"logged_in\"] ?? false)) {\n";
echo "    header(\"Location: login.php\");\n";
echo "    exit;\n";
echo "}\n";
echo "echo \"Welcome, \" . \$_SESSION[\"username\"];\n\n";

echo "// --- logout.php ---\n";
echo "session_start();\n";
echo "session_destroy();\n";
echo "header(\"Location: login.php\");\n\n";

echo "=== Session vs Cookie ===\n";
echo "Cookie: stored in browser (client-side)\n";
echo "Session: stored on server (server-side)\n";
echo "Cookie: less secure, visible to user\n";
echo "Session: more secure, not visible to user\n";
echo "Cookie: limited to ~4KB\n";
echo "Session: limited by server memory\n";
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

<h2>Practical Example: Shopping Cart</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Shopping Cart Concept ===\n\n";

echo "// --- add_to_cart.php ---\n";
echo "session_start();\n\n";

echo "// Initialize cart if it doesn\'t exist\n";
echo "if (!isset(\$_SESSION[\"cart\"])) {\n";
echo "    \$_SESSION[\"cart\"] = [];\n";
echo "}\n\n";

echo "// Add item to cart\n";
echo "\$_SESSION[\"cart\"][] = [\n";
echo "    \"name\" => \"PHP Textbook\",\n";
echo "    \"price\" => 29.99,\n";
echo "    \"qty\" => 1\n";
echo "];\n\n";

echo "// --- cart.php ---\n";
echo "session_start();\n";
echo "\$cart = \$_SESSION[\"cart\"] ?? [];\n";
echo "\$total = 0;\n\n";

echo "foreach (\$cart as \$item) {\n";
echo "    echo \$item[\"name\"] . \" - \$\" . \$item[\"price\"];\n";
echo "    \$total += \$item[\"price\"];\n";
echo "}\n";
echo "echo \"Total: \$\" . \$total;\n\n";

echo "=== Realistic Output ===\n";

// Simulated cart
$cart = [
    ["name" => "PHP Textbook", "price" => 29.99, "qty" => 1],
    ["name" => "Notebook", "price" => 4.99, "qty" => 2],
    ["name" => "Pen Set", "price" => 7.50, "qty" => 1],
];

$total = 0;
foreach ($cart as $item) {
    $subtotal = $item["price"] * $item["qty"];
    echo str_pad($item["name"], 20) . " x" . $item["qty"] . "  $" . number_format($subtotal, 2) . "\n";
    $total += $subtotal;
}
echo str_repeat("-", 32) . "\n";
echo str_pad("Total:", 20) . "  $" . number_format($total, 2);
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
    <div class="box-title">Session Best Practices</div>
    <ul class="mb-0">
        <li>Always call <code>session_start()</code> at the top of any page that uses sessions</li>
        <li>Never store passwords in sessions</li>
        <li>Regenerate the session ID after login to prevent session fixation</li>
        <li>Destroy sessions on logout: <code>session_destroy()</code></li>
    </ul>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a simple login system: store username in session on login, check session on protected page, destroy on logout</li>
        <li>Build a page visit counter using sessions (track how many pages the user visited)</li>
        <li>What is the key difference between sessions and cookies? When would you use each?</li>
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
