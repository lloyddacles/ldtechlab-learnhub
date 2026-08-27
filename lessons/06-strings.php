<?php
$pageTitle = 'PHP Strings';
require_once __DIR__ . '/../includes/functions.php';
$lessonNum = 6;
$nav = getPrevNextLesson($lessonNum);
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $lessonNum ?></span>
    <h1>PHP Strings</h1>
    <p class="lesson-desc">Master working with text using PHP's powerful string functions.</p>
</div>

<h2>Creating Strings</h2>
<p>PHP provides several ways to create strings:</p>

<div class="syntax-ref">
    <h4>Syntax: String Creation</h4>
    <code>$str = 'Single quotes';        // Literal - no parsing</code>
    <code>$str = "Double quotes";        // Parses variables and escape sequences</code>
    <code>$str = &lt;&lt;&lt;HEREDOC             // Heredoc - multiline, parses variables</code>
    <code>&nbsp;&nbsp;Hello $name</code>
    <code>HEREDOC;</code>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$name = "Alice";

// Single quotes: literal text only
echo \'Hello $name\';
echo "\n";

// Double quotes: variables are parsed
echo "Hello $name";
echo "\n";

// Escape sequences in double quotes
echo "Newline here\n";
echo "Tab\there\n";
echo "She said \"Hi!\"\n";
echo "Path: C:\\Users\\Alice\n";

// Heredoc: multiline with variable parsing
$lang = "PHP";
$version = "8";
echo <<<TEXT
Learning $lang version $version
This is a heredoc string
Variables work inside!
TEXT;
echo "\n";

// Nowdoc: multiline, no parsing (like single quotes)
echo <<<\'NOWDOC\'
This is a nowdoc string.
Variables like $name are NOT parsed.
NOWDOC;
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

<h2>Common String Functions</h2>

<h3>Length and Case</h3>
<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$text = "Hello, World!";

// String length
echo "Length: " . strlen($text) . " characters";
echo "\n";

// Uppercase and lowercase
echo "Upper: " . strtoupper($text);
echo "\n";
echo "Lower: " . strtolower($text);
echo "\n";

// ucfirst: capitalize first letter
echo "ucfirst: " . ucfirst("hello world");
echo "\n";

// ucwords: capitalize each word
echo "ucwords: " . ucwords("hello beautiful world");
echo "\n";

// str_repeat: repeat a string
echo str_repeat("-=", 20);
echo "\n";
echo str_repeat("Ha", 3);
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

<h3>Finding and Replacing</h3>
<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$sentence = "The quick brown fox jumps over the lazy dog";

// Find text position (0-based)
$pos = strpos($sentence, "fox");
echo "Position of fox: " . $pos;
echo "\n";

// Check if text exists
echo "Contains fox: " . (strpos($sentence, "fox") !== false ? "Yes" : "No");
echo "\n";
echo "Contains cat: " . (strpos($sentence, "cat") !== false ? "Yes" : "No");
echo "\n";

// Replace text
$newSentence = str_replace("fox", "cat", $sentence);
echo "Replaced: " . $newSentence;
echo "\n";

// Extract a substring
// substr(string, start, length)
$word = substr($sentence, 4, 5);
echo "Substring (4,5): " . $word;
echo "\n";

// Reverse a string
echo "Reversed: " . strrev("Hello");
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

<h3>Trimming and Padding</h3>
<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
// Trim: remove whitespace from both ends
$messy = "   Hello World   ";
echo "Original: [" . $messy . "]";
echo "\n";
echo "Trimmed: [" . trim($messy) . "]";
echo "\n";
echo "Left trim: [" . ltrim($messy) . "]";
echo "\n";
echo "Right trim: [" . rtrim($messy) . "]";
echo "\n";

// Str_pad: pad a string to a certain length
echo str_pad("Hi", 20, "-");
echo "\n";
echo str_pad("Center", 20, "-=", STR_PAD_BOTH);
echo "\n";

// Strtoupper with trim (chaining functions)
$name = "  alice  ";
echo "Clean name: " . trim(strtoupper($name));
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

<h2>String Interpolation (Variables in Strings)</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea data-example="<?php echo base64_encode('<?php
$name = "Alice";
$age = 20;

// Method 1: Double quotes with simple variables
echo "Name is $name and age is $age";
echo "\n";

// Method 2: Double quotes with curly braces (complex expressions)
echo "Next year I will be " . ($age + 1) . " years old";
echo "\n";
echo "Name length: " . strlen($name) . " characters";
echo "\n";

// Method 3: Concatenation with single quotes
echo \'Name is \' . $name . \' and age is \' . $age;
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
    <div class="box-title">Tip: Curly Braces</div>
    <p class="mb-0">When accessing array elements or object properties inside a string, always use curly braces: <code>"{$array['key']}"</code> and <code>"{$object->property}"</code>.</p>
</div>

<div class="exercise">
    <h4>Practice Exercises</h4>
    <ol>
        <li>Write a script that takes a full name and outputs the first name, last name, and character count</li>
        <li>Create a string and count how many times the letter "e" appears in it using <code>substr_count()</code></li>
        <li>Write a script that converts a sentence to uppercase, lowercase, and title case</li>
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
