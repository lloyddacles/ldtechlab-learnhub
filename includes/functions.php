<?php
/**
 * Helper functions for the Tutorial Website
 */

/**
 * Get all lessons from a directory sorted by order number
 */
function getLessons(string $dir = 'lessons'): array {
    $lessons = [];
    $basePath = __DIR__ . '/..';
    $files = glob($basePath . '/' . $dir . '/[0-9]*.php');

    foreach ($files as $file) {
        $basename = basename($file, '.php');
        if (preg_match('/^(\d+)-(.+)$/', $basename, $matches)) {
            $num = (int)$matches[1];
            $slug = $matches[2];
            $title = getLessonTitle($file);
            $lessons[$num] = [
                'num'   => $num,
                'slug'  => $slug,
                'title' => $title,
                'file'  => $file,
                'dir'   => $dir,
            ];
        }
    }

    ksort($lessons);
    return array_values($lessons);
}

/**
 * Extract the lesson title from a lesson file
 */
function getLessonTitle(string $filepath): string {
    $content = file_get_contents($filepath);
    if (preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
        return trim($matches[1]);
    }
    return basename($filepath, '.php');
}

/**
 * Get previous and next lesson info for a given section
 */
function getPrevNextLesson(int $currentNum, string $dir = 'lessons'): array {
    $lessons = getLessons($dir);
    $prev = null;
    $next = null;

    foreach ($lessons as $lesson) {
        if ($lesson['num'] < $currentNum) {
            $prev = $lesson;
        }
        if ($lesson['num'] > $currentNum && $next === null) {
            $next = $lesson;
        }
    }

    return ['prev' => $prev, 'next' => $next];
}

/**
 * Generate a lesson URL based on section
 */
function lessonUrl(int $num, string $slug, string $dir = 'lessons'): string {
    if ($dir === 'mysql-lessons') {
        return "/mysql/$num-$slug";
    }
    if ($dir === 'dbms-lessons') {
        return "/dbms/$num-$slug";
    }
    if ($dir === 'dsa-lessons') {
        return "/dsa/$num-$slug";
    }
    if ($dir === 'programming-logic') {
        return "/logic/$num-$slug";
    }
    if ($dir === 'python-lessons') {
        return "/python/$num-$slug";
    }
    if ($dir === 'java-lessons') {
        return "/java/$num-$slug";
    }
    return "/lesson/$num-$slug";
}

/**
 * Check if we're running on the built-in server
 */
function isDevServer(): bool {
    return php_sapi_name() === 'cli-server';
}
