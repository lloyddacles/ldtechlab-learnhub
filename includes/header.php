<?php require_once __DIR__ . '/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'LD TechLab', ENT_QUOTES, 'UTF-8') ?> - LD TechLab Programming Tutorials</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="/" class="nav-brand">LD TechLab</a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/lessons">PHP Lessons</a></li>
                <li><a href="/mysql">MySQL Lessons</a></li>
                <li><a href="/dbms">DBMS Lessons</a></li>
                <li><a href="/dsa">DSA Lessons</a></li>
            </ul>
        </div>
    </nav>
    <main class="container">
