<?php
$pageTitle = 'Introduction to PHP';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 1;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>Introduction to PHP</h1>
    <p class="lesson-desc">Learn what PHP is, how it works, and write your first PHP script.</p>
</div>

<h2>What is PHP?</h2>
<p>PHP (PHP: Hypertext Preprocessor) is a server-side scripting language designed for web development. When a user visits a PHP page:</p>
<ol>
    <li>The web server reads the PHP file</li>
    <li>PHP processes the code and generates HTML</li>
    <li>The server sends the resulting HTML to the user's browser</li>
    <li>The browser displays the page &mdash; the user never sees the PHP code</li>
</ol>

<div class="info-box note">
    <div class="box-title">Server-Side vs Client-Side</div>
    <p><strong>Client-side</strong> (HTML, CSS, JavaScript) runs in the user's browser.</p>
    <p class="mb-0"><strong>Server-side</strong> (PHP) runs on the web server before sending output to the browser.</p>
</div>

<h2>Why Learn PHP?</h2>
<ul>
    <li>Over 77% of websites with known server-side languages use PHP</li>
    <li>Powers WordPress, Facebook, Wikipedia, and millions of sites</li>
    <li>Easy to learn for beginners</li>
    <li>Works with virtually every web hosting service</li>
    <li>Large community and extensive documentation</li>
</ul>

<h2>Your First PHP Script</h2>
<p>A PHP file ends with the <code>.php</code> extension and contains PHP code between <code>&lt;?php</code> and <code>?&gt;</code> tags.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// This is my first PHP program!
echo "Hello, World!";
echo "\n";
echo "Welcome to PHP!";
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

<h2>How to Run PHP</h2>

<h3>1. PHP Built-in Server (Recommended for Learning)</h3>
<p>PHP comes with a built-in development server. Navigate to this project's folder and run:</p>
<pre><code>php -S localhost:8000</code></pre>
<p>Then open <code>http://localhost:8000</code> in your browser.</p>

<h3>2. Web Hosting</h3>
<p>Upload your <code>.php</code> files to a web server with PHP support. The server processes the files and returns HTML.</p>

<h3>3. Command Line</h3>
<p>You can also run PHP scripts from the terminal:</p>
<pre><code>php script.php</code></pre>

<h2>PHP Tag Structure</h2>

<div class="syntax-ref">
    <h4>Syntax: PHP Tags</h4>
    <code>&lt;?php ... ?&gt;    // Standard PHP opening and closing tags</code>
    <code>&lt;?= expression ?&gt;  // Shorthand for echo (output)</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// PHP can be mixed with HTML
// The echo statement outputs text

echo "PHP can generate HTML output!";
echo "\n";
echo "You can mix PHP with any text.";
echo "\n";

// Simple math
echo "2 + 3 = " . (2 + 3);
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
    <div class="box-title">Tip</div>
    <p class="mb-0">The <code>echo</code> statement is the most common way to output text in PHP. It can output strings, numbers, and variables.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a PHP script that outputs your name</li>
        <li>Write a script that outputs your favorite song title and artist on separate lines</li>
        <li>Try outputting a simple math equation as text (e.g., "5 * 10 = 50")</li>
    </ol>
</div>

<div class="lesson-nav">
    <?php if ($nav['prev']): ?>
        <a href="<?= lessonUrl($nav['prev']['num'], $nav['prev']['slug']) ?>">&larr; <?= htmlspecialchars($nav['prev']['title']) ?></a>
    <?php else: ?>
        <span></span>
    <?php endif; ?>
    <?php if ($nav['next']): ?>
        <a href="<?= lessonUrl($nav['next']['num'], $nav['next']['slug']) ?>"><?= htmlspecialchars($nav['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
