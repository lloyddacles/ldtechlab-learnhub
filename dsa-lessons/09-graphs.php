<?php $pageTitle = 'Graphs'; require_once __DIR__ . '/../includes/functions.php'; $num = 9; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Graphs</h1>
    <p class="lesson-desc">Explore graph data structures, traversals, and real-world applications.</p>
</div>

<h2>What Is a Graph?</h2>
<p>A <strong>graph</strong> is a collection of <strong>vertices</strong> (nodes) connected by <strong>edges</strong> (links). Unlike trees, graphs can have cycles and multiple connections between nodes.</p>

<h2>Types of Graphs</h2>

<table class="table">
    <thead>
        <tr><th>Type</th><th>Description</th><th>Example</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Directed</strong></td><td>Edges have direction (one-way)</td><td>Twitter follows</td></tr>
        <tr><td><strong>Undirected</strong></td><td>Edges are bidirectional (two-way)</td><td>Facebook friends</td></tr>
        <tr><td><strong>Weighted</strong></td><td>Edges carry a cost/value</td><td>GPS distances</td></tr>
        <tr><td><strong>Unweighted</strong></td><td>All edges are equal</td><td>Social connections</td></tr>
    </tbody>
</table>

<h2>Graph Representations</h2>
<p>Two common ways to represent graphs in code:</p>

<div class="syntax-ref">
    <h4>Adjacency List</h4>
    <code>$graph = ['A' => ['B', 'C'], 'B' => ['A', 'D'], 'C' => ['A']];</code>
</div>

<div class="syntax-ref">
    <h4>Adjacency Matrix</h4>
    <code>$matrix = [[0,1,1],[1,0,0],[1,0,0]]; // row=from, col=to</code>
</div>

<div class="info-box tip">
    <div class="box-title">Adjacency List vs Matrix</div>
    <p class="mb-0">Adjacency lists are more space-efficient for sparse graphs. Adjacency matrices allow O(1) edge lookup but use more memory.</p>
</div>

<h2>Graph Traversals</h2>
<p><strong>BFS (Breadth-First Search)</strong> explores all neighbors at the current depth before moving deeper. <strong>DFS (Depth-First Search)</strong> explores as far as possible along each branch before backtracking.</p>

<table class="table">
    <thead>
        <tr><th>Traversal</th><th>Data Structure</th><th>Use Case</th></tr>
    </thead>
    <tbody>
        <tr><td>BFS</td><td>Queue</td><td>Shortest path, level-order</td></tr>
        <tr><td>DFS</td><td>Stack / Recursion</td><td>Cycle detection, topological sort</td></tr>
    </tbody>
</table>

<h2>Implement a Graph Class</h2>
<p>Build a graph using an adjacency list with <code>addVertex</code>, <code>addEdge</code>, and <code>bfs</code> methods:</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
class Graph {
    private $adjacencyList = [];

    public function addVertex($vertex) {
        if (!isset($this->adjacencyList[$vertex])) {
            $this->adjacencyList[$vertex] = [];
        }
    }

    public function addEdge($v1, $v2) {
        $this->addVertex($v1);
        $this->addVertex($v2);
        $this->adjacencyList[$v1][] = $v2;
        $this->adjacencyList[$v2][] = $v1; // Undirected
    }

    public function bfs($start) {
        $visited = [];
        $queue = [$start];
        $visited[$start] = true;
        $result = [];

        while (!empty($queue)) {
            $vertex = array_shift($queue);
            $result[] = $vertex;

            foreach ($this->adjacencyList[$vertex] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    $visited[$neighbor] = true;
                    $queue[] = $neighbor;
                }
            }
        }
        return $result;
    }

    public function display() {
        foreach ($this->adjacencyList as $vertex => $edges) {
            echo "$vertex -> " . implode(", ", $edges) . "\n";
        }
    }
}

$g = new Graph();
$g->addEdge("A", "B");
$g->addEdge("A", "C");
$g->addEdge("B", "D");
$g->addEdge("C", "E");
$g->addEdge("D", "E");

echo "Adjacency List:\n";
$g->display();
echo "\nBFS from A: " . implode(" -> ", $g->bfs("A")) . "\n";
'); ?>" ></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Applications of Graphs</h2>
<ul>
    <li><strong>Social Networks</strong> &mdash; Model friendships and find connections</li>
    <li><strong>Maps &amp; Navigation</strong> &mdash; Find shortest routes between locations</li>
    <li><strong>Recommendation Systems</strong> &mdash; Suggest friends or products based on connections</li>
    <li><strong>Web Crawling</strong> &mdash; Navigate links between web pages</li>
    <li><strong>Dependency Resolution</strong> &mdash; Determine build order for projects</li>
</ul>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'dsa-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'dsa-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
