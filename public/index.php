<?php
require_once __DIR__ . '/../includes/functions.php';
$lessons = getLessons();
$pageTitle = 'Home';
require_once __DIR__ . '/../includes/header.php';
?>

<section class="hero">
    <div class="container">
        <h1>LD TechLab Programming Tutorials</h1>
        <p>Interactive PHP, Python, Java, MySQL &amp; DBMS lessons with live code execution. Learn by doing.</p>
        <div class="hero-buttons">
            <a href="/programming-logic/" class="btn btn-outline-light">Programming Logic</a>
            <a href="/python-lessons/" class="btn btn-outline-light">Python</a>
            <a href="/java-lessons/" class="btn btn-outline-light">Java</a>
            <a href="/dbms-lessons/" class="btn btn-outline-light">DBMS Theory</a>
            <a href="/dsa-lessons/" class="btn btn-outline-light">DSA</a>
            <a href="/mysql-lessons/" class="btn btn-outline-light">MySQL</a>
            <a href="/lessons/" class="btn btn-primary">PHP Lessons</a>
        </div>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>Programming Logic</h2>
        <p>Learn how to think like a programmer — master the logic, patterns, and problem-solving skills</p>
    </div>
    <div class="lessons-grid">
        <?php foreach (getLessons('programming-logic') as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'programming-logic') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/programming-logic/" class="btn btn-primary">View All Logic Lessons</a>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>Database Management Systems (DBMS) Theory</h2>
        <p>Master the fundamentals of database design, normalization, and security</p>
    </div>
    <div class="lessons-grid">
        <?php foreach (getLessons('dbms-lessons') as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'dbms-lessons') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/dbms-lessons/" class="btn btn-primary">View All DBMS Lessons</a>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>Data Structures &amp; Algorithms</h2>
        <p>Master fundamental data structures and algorithms with hands-on PHP implementations</p>
    </div>
    <div class="lessons-grid">
        <?php foreach (getLessons('dsa-lessons') as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'dsa-lessons') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/dsa-lessons/" class="btn btn-primary">View All DSA Lessons</a>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>MySQL Tutorials</h2>
        <p>Master SQL queries and database operations</p>
    </div>
    <div class="lessons-grid">
        <?php foreach (getLessons('mysql-lessons') as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'mysql-lessons') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/mysql-lessons/" class="btn btn-primary">View All MySQL Lessons</a>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>Python Tutorials</h2>
        <p>Interactive Python lessons with live code execution - edit and run code in your browser!</p>
    </div>
    <div class="lessons-grid">
        <?php foreach (getLessons('python-lessons') as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'python-lessons') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/python-lessons/" class="btn btn-primary">View All Python Lessons</a>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>Java Tutorials</h2>
        <p>Interactive Java lessons with live code execution - edit and run code in your browser!</p>
    </div>
    <div class="lessons-grid">
        <?php foreach (getLessons('java-lessons') as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'java-lessons') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/java-lessons/" class="btn btn-primary">View All Java Lessons</a>
    </div>
</section>

<section class="container">
    <div class="section-title">
        <h2>PHP Tutorials</h2>
        <p>Interactive lessons with live code execution - edit the code and see results instantly!</p>
    </div>
    <div class="lessons-grid">
        <?php foreach ($lessons as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'lessons') ?>" class="lesson-card">
                <span class="lesson-card-number">Lesson <?= $lesson['num'] ?></span>
                <h3 class="lesson-card-title"><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="/lessons/" class="btn btn-primary">View All PHP Lessons</a>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
