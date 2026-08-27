<?php
$pageTitle = 'All DSA Lessons';
require_once __DIR__ . '/../includes/functions.php';
$lessons = getLessons('dsa-lessons');
require_once __DIR__ . '/../includes/header.php';
?>

<div class="lesson-header">
    <h1>Data Structures &amp; Algorithms Lessons</h1>
    <p class="lesson-desc">Master fundamental data structures and algorithms with hands-on PHP implementations.</p>
</div>

<div class="info-box note">
    <div class="box-title">About These Lessons</div>
    <p class="mb-0">These lessons cover essential data structures and algorithms implemented in PHP. Each lesson includes interactive code examples you can run directly in the browser. Pair these with the PHP Lessons to strengthen your programming fundamentals.</p>
</div>

<?php if (empty($lessons)): ?>
    <div class="info-box note">
        <div class="box-title">No Lessons Found</div>
        <p class="mb-0">Make sure the <code>dsa-lessons/</code> folder contains lesson files.</p>
    </div>
<?php else: ?>
    <div class="card-grid">
        <?php foreach ($lessons as $lesson): ?>
            <a href="<?= lessonUrl($lesson['num'], $lesson['slug'], 'dsa-lessons') ?>" class="card" style="text-decoration:none; color:inherit;">
                <span class="lesson-num"><?= $lesson['num'] ?></span>
                <h3><?= htmlspecialchars($lesson['title']) ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
