<?php
$pageTitle = 'PHP Forms';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 14;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Forms</h1>
    <p class="lesson-desc">Process HTML form data with PHP, handle submissions, and validate input.</p>
</div>

<h2>How PHP Forms Work</h2>
<ol>
    <li>Create an HTML form with input fields</li>
    <li>User fills in the form and clicks Submit</li>
    <li>PHP receives the data via <code>$_GET</code> or <code>$_POST</code></li>
    <li>PHP processes and validates the data</li>
    <li>PHP sends a response back to the user</li>
</ol>

<h2>A Simple Form Example</h2>
<p>Here is how you would create and process a form in real PHP files:</p>

<div class="syntax-ref">
    <h4>Syntax: HTML Form</h4>
    <code>&lt;form method="POST" action="process.php"&gt;</code>
    <code>&nbsp;&nbsp;&lt;input type="text" name="username"&gt;</code>
    <code>&nbsp;&nbsp;&lt;input type="email" name="email"&gt;</code>
    <code>&nbsp;&nbsp;&lt;button type="submit"&gt;Submit&lt;/button&gt;</code>
    <code>&lt;/form&gt;</code>
</div>

<div class="syntax-ref">
    <h4>Syntax: Processing Form Data (process.php)</h4>
    <code>&lt;?php</code>
    <code>$username = $_POST["username"] ?? "";</code>
    <code>$email = $_POST["email"] ?? "";</code>
    <code>echo "Hello, $username!";</code>
</div>

<h2>GET vs POST for Forms</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== GET Form ===\n";
echo "<form method=\"GET\" action=\"\">\n";
echo "  Search: <input type=\"text\" name=\"q\" placeholder=\"Search...\">\n";
echo "  <button type=\"submit\">Search</button>\n";
echo "</form>\n\n";

// Check if form was submitted
if (isset($_GET["q"]) && $_GET["q"] !== "") {
    $query = htmlspecialchars($_GET["q"]);
    echo "You searched for: $query\n";
    echo "URL would show: ?q=" . urlencode($_GET["q"]) . "\n";
}

echo "\n=== POST Form ===\n";
echo "<form method=\"POST\" action=\"\">\n";
echo "  Name: <input type=\"text\" name=\"name\" placeholder=\"Your name\">\n";
echo "  <button type=\"submit\">Submit</button>\n";
echo "</form>\n\n";

if (isset($_POST["name"]) && $_POST["name"] !== "") {
    $name = htmlspecialchars($_POST["name"]);
    echo "Hello, $name! (data came via POST, not in URL)";
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

<h2>Form Validation</h2>
<p>Always validate user input before processing it:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Simulate form processing with validation
// In real code, this would be in a separate process.php file

$errors = [];
$data = [];

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and trim input
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = trim($_POST["age"] ?? "");
    
    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters.";
    } else {
        $data["name"] = $name;
    }
    
    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } else {
        $data["email"] = $email;
    }
    
    // Validate age
    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric($age) || $age < 1 || $age > 150) {
        $errors[] = "Age must be between 1 and 150.";
    } else {
        $data["age"] = (int)$age;
    }
}

echo "=== Registration Form ===\n";
echo "<form method=\"POST\" action=\"\">\n";
echo "  Name: <input type=\"text\" name=\"name\" value=\"" . htmlspecialchars($data["name"] ?? "") . "\"><br>\n";
echo "  Email: <input type=\"email\" name=\"email\" value=\"" . htmlspecialchars($data["email"] ?? "") . "\"><br>\n";
echo "  Age: <input type=\"number\" name=\"age\" value=\"" . htmlspecialchars((string)($data["age"] ?? "")) . "\"><br>\n";
echo "  <button type=\"submit\">Register</button>\n";
echo "</form>\n";

// Display errors or success
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($errors)) {
        echo "\nErrors:\n";
        foreach ($errors as $error) {
            echo "  - $error\n";
        }
    } else {
        echo "\nSuccess! Registration complete.\n";
        echo "Name: " . htmlspecialchars($data["name"]) . "\n";
        echo "Email: " . htmlspecialchars($data["email"]) . "\n";
        echo "Age: " . $data["age"] . "\n";
    }
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

<h2>Sanitization Functions</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
echo "=== Input Sanitization ===\n\n";

$rawInput = "  <script>alert(\"XSS Attack!\")</script>  ";

echo "Raw input: $rawInput\n\n";

// htmlspecialchars: convert special chars to HTML entities
$safe = htmlspecialchars($rawInput);
echo "After htmlspecialchars():\n$safe\n\n";

// strip_tags: remove HTML tags
$clean = strip_tags($rawInput);
echo "After strip_tags(): $clean\n\n";

// trim: remove whitespace
$padded = "   Hello World   ";
echo "Before trim: [" . $padded . "]\n";
echo "After trim: [" . trim($padded) . "]\n\n";

// filter_var: validate and sanitize
$email = "user@example.com";
echo "Valid email: " . var_export(filter_var($email, FILTER_VALIDATE_EMAIL), true) . "\n";
echo "Invalid email: " . var_export(filter_var("not-an-email", FILTER_VALIDATE_EMAIL), true) . "\n\n";

// Validate URL
$url = "https://www.example.com";
echo "Valid URL: " . var_export(filter_var($url, FILTER_VALIDATE_URL), true) . "\n";

// Sanitize string
$dirty = "Hello <b>World</b>";
$clean = htmlspecialchars($dirty);
echo "Sanitized: $clean\n";
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

<div class="info-box important">
    <div class="box-title">Critical Security Rules</div>
    <ul class="mb-0">
        <li>Always use <code>htmlspecialchars()</code> when outputting user input to prevent XSS attacks</li>
        <li>Never trust user input &mdash; always validate it on the server side</li>
        <li>Use prepared statements when working with databases (covered later)</li>
        <li>Use <code>password_hash()</code> for passwords &mdash; never store plain text</li>
    </ul>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Create a contact form with fields for name, email, and message. Process it and display the submitted data.</li>
        <li>Add validation to the contact form: check that all fields are filled, the email is valid, and the message is at least 10 characters.</li>
        <li>Create a simple calculator form that takes two numbers and an operation, then displays the result.</li>
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
