<?php $pageTitle = 'What is Programming Logic?'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>

<?php $num = 1; $prevNext = getPrevNextLesson($num, 'programming-logic'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>What is Programming Logic?</h1>
    <p class="lesson-desc">Discover that programming is really just structured thinking — and you already do it every day.</p>
</div>

<h2>What is Programming Logic?</h2>
<p>Programming logic is the ability to break down a problem into clear, ordered steps that a computer can follow. It's not about memorizing code — it's about <strong>thinking in a structured way</strong>.</p>
<p>Think about making a cup of coffee. Without realizing it, you follow a sequence of instructions:</p>
<ol>
    <li>Get a mug</li>
    <li>Add coffee powder</li>
    <li>Boil water</li>
    <li>Pour hot water into the mug</li>
    <li>Stir</li>
</ol>
<p>That's programming logic in action — you just wrote a recipe, which is essentially an algorithm!</p>

<div class="info-box tip">
    <div class="box-title">Key Insight</div>
    <p class="mb-0">Every program you'll ever write is just a list of instructions, like a recipe. The computer follows them step by step. Your job is to write instructions that are clear and complete.</p>
</div>

<h2>Why It Matters</h2>
<p>You can learn every PHP syntax rule and still struggle to build programs if you don't think logically first. Programming logic is the foundation. Syntax is just the language you use to express your logic.</p>

<table>
    <thead>
        <tr><th>Skill</th><th>Analogy</th><th>Importance</th></tr>
    </thead>
    <tbody>
        <tr><td>Programming Logic</td><td>Knowing how to follow a recipe</td><td>Critical — the core skill</td></tr>
        <tr><td>Syntax</td><td>Knowing the language the recipe is written in</td><td>Important but learnable</td></tr>
        <tr><td>Libraries/Tools</td><td>Having fancy kitchen gadgets</td><td>Helpful but not essential</td></tr>
    </tbody>
</table>

<div class="info-box note">
    <div class="box-title">Real-World Analogy</div>
    <p class="mb-0">A chef who understands cooking principles can adapt to any kitchen. A programmer who understands logic can adapt to any programming language. Logic comes first.</p>
</div>

<h2>Programming is Just Thinking</h2>
<p>Here are everyday activities that use the same thinking patterns as programming:</p>

<h3>Getting Dressed</h3>
<p>You put on socks <em>before</em> shoes. You put on a shirt <em>before</em> a jacket. Order matters — that's sequential logic.</p>

<h3>Following Directions</h3>
<p>"Turn left at the traffic light, then go straight for 2 blocks, then turn right." That's an algorithm — a step-by-step procedure to reach a destination.</p>

<h3>Assembling Furniture</h3>
<p>You read the instructions. Step 1: Attach leg A to panel B. Step 2: Repeat for all four legs. Step 3: Flip the table. Each step depends on the previous one being done correctly.</p>

<div class="exercise">
    <h4>Think About It</h4>
    <p>Write down the exact steps to make a sandwich. Be as specific as possible — as if explaining to someone who has never made one. That's programming logic!</p>
</div>

<h2>The Difference Between Syntax and Logic</h2>
<p><strong>Syntax</strong> is the rules of a programming language — the grammar. <strong>Logic</strong> is the strategy behind solving the problem.</p>

<p>Consider this analogy: if you're writing a letter in English, syntax is grammar and spelling. Logic is the argument and structure of your letter. You can have perfect grammar but a nonsensical letter. Similarly, you can write syntactically correct code that doesn't solve the problem.</p>

<table>
    <thead>
        <tr><th>Scenario</th><th>Good Logic + Bad Syntax</th><th>Bad Logic + Good Syntax</th></tr>
    </thead>
    <tbody>
        <tr><td>Result</td><td>Won't run — but the idea is right</td><td>Runs — but produces wrong results</td></tr>
        <tr><td>Fix</td><td>Learn the syntax rules</td><td>Re-think the approach</td></tr>
        <tr><td>Difficulty</td><td>Easy to fix</td><td>Harder — requires rethinking</td></tr>
    </tbody>
</table>

<div class="info-box warning">
    <div class="box-title">Common Mistake</div>
    <p class="mb-0">Beginners often focus on memorizing syntax while neglecting logic. Practice thinking through problems on paper before writing code.</p>
</div>

<h2>Common Myths About Programming Talent</h2>
<p>Many people believe you need to be "naturally gifted" to program. That's not true.</p>
<ul>
    <li><strong>Myth:</strong> You need to be good at math. <strong>Reality:</strong> Most programming uses basic logic, not advanced math.</li>
    <li><strong>Myth:</strong> You need to start young. <strong>Reality:</strong> People learn programming at every age.</li>
    <li><strong>Myth:</strong> Real programmers code in their head. <strong>Reality:</strong> Even experts sketch out ideas on paper first.</li>
    <li><strong>Myth:</strong> If you don't get it immediately, you're not cut out for it. <strong>Reality:</strong> Programming is a skill built through practice, not talent.</li>
</ul>

<h2>Your First Logic Exercise</h2>
<p>Let's see sequential execution in PHP — the computer executes instructions from top to bottom, one at a time. Run the code below and observe the output:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
echo "Step 1: Wake up\n";
echo "Step 2: Brush teeth\n";
echo "Step 3: Make coffee\n";
echo "Step 4: Start coding\n";
echo "\n";
echo "Notice: Each step runs in order, top to bottom.\n";
echo "The computer never skips a step or does them out of order.\n";
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
    <div class="box-title">Practice</div>
    <p class="mb-0">Try changing the order of the echo statements. What happens when Step 3 comes before Step 1? This is why order matters in programming.</p>
</div>

<h2>Summary</h2>
<ul>
    <li>Programming logic is structured thinking — breaking problems into ordered steps</li>
    <li>It's a skill anyone can learn, not a natural talent</li>
    <li>Syntax is important, but logic is the foundation</li>
    <li>You already use programming logic in everyday life</li>
</ul>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'programming-logic') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'programming-logic') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>