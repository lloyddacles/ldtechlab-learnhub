<?php $pageTitle = 'Linked Lists'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 4; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Linked Lists</h1>
    <p class="lesson-desc">Understand linked list data structures, implement them in PHP, and compare them with arrays.</p>
</div>

<h2>What Is a Linked List?</h2>
<p>A <strong>linked list</strong> is a linear data structure where elements are stored in nodes. Each node contains data and a reference (pointer) to the next node.</p>

<div class="info-box note">
    <div class="box-title">Real-World Analogy</div>
    <p class="mb-0">Think of a treasure hunt. Each clue (node) tells you where to find the next clue. You must follow the chain from the starting point (head) to find each subsequent clue.</p>
</div>

<h2>Types of Linked Lists</h2>

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Description</th>
            <th>Traversal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Singly Linked</strong></td>
            <td>Each node points to the next node</td>
            <td>Forward only</td>
        </tr>
        <tr>
            <td><strong>Doubly Linked</strong></td>
            <td>Each node points to next and previous</td>
            <td>Forward and backward</td>
        </tr>
        <tr>
            <td><strong>Circular</strong></td>
            <td>Last node points back to first</td>
            <td>Circular traversal</td>
        </tr>
    </tbody>
</table>

<h2>Implementation in PHP</h2>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Singly Linked List</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Node class
class Node {
    public $data;
    public $next;
    
    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Linked List class
class LinkedList {
    public $head;
    
    public function __construct() {
        $this->head = null;
    }
    
    // Insert at end
    public function append($data) {
        $newNode = new Node($data);
        if (!$this->head) {
            $this->head = $newNode;
            return;
        }
        $current = $this->head;
        while ($current->next) {
            $current = $current->next;
        }
        $current->next = $newNode;
    }
    
    // Insert at beginning
    public function prepend($data) {
        $newNode = new Node($data);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }
    
    // Delete by value
    public function delete($data) {
        if (!$this->head) return;
        
        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return;
        }
        
        $current = $this->head;
        while ($current->next) {
            if ($current->next->data === $data) {
                $current->next = $current->next->next;
                return;
            }
            $current = $current->next;
        }
    }
    
    // Search
    public function search($data) {
        $current = $this->head;
        $index = 0;
        while ($current) {
            if ($current->data === $data) {
                return $index;
            }
            $current = $current->next;
            $index++;
        }
        return -1;
    }
    
    // Display
    public function display() {
        $elements = [];
        $current = $this->head;
        while ($current) {
            $elements[] = $current->data;
            $current = $current->next;
        }
        return implode(" -> ", $elements) . " -> NULL";
    }
}

// Usage
$list = new LinkedList();
$list->append(10);
$list->append(20);
$list->append(30);
$list->prepend(5);

echo "List: " . $list->display() . "\n";
echo "Search 20: Index " . $list->search(20) . "\n";

$list->delete(20);
echo "After deleting 20: " . $list->display() . "\n";
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

<h2>Operations and Complexity</h2>

<table>
    <thead>
        <tr>
            <th>Operation</th>
            <th>Linked List</th>
            <th>Array</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Access by index</td>
            <td>O(n)</td>
            <td>O(1)</td>
        </tr>
        <tr>
            <td>Search</td>
            <td>O(n)</td>
            <td>O(n)</td>
        </tr>
        <tr>
            <td>Insert at beginning</td>
            <td>O(1)</td>
            <td>O(n)</td>
        </tr>
        <tr>
            <td>Insert at end</td>
            <td>O(1)*</td>
            <td>O(1)</td>
        </tr>
        <tr>
            <td>Delete at beginning</td>
            <td>O(1)</td>
            <td>O(n)</td>
        </tr>
        <tr>
            <td>Delete at end</td>
            <td>O(n)</td>
            <td>O(1)</td>
        </tr>
    </tbody>
</table>

<p><em>*With a tail pointer, end insertion is O(1).</em></p>

<h2>When to Use Linked Lists</h2>

<div class="info-box tip">
    <div class="box-title">Use Linked Lists When:</div>
    <ul>
        <li>You need frequent insertions/deletions at the beginning</li>
        <li>You don't need random access by index</li>
        <li>You don't know the size in advance</li>
        <li>You're implementing stacks or queues</li>
    </ul>
</div>

<div class="info-box warning">
    <div class="box-title">Avoid Linked Lists When:</div>
    <ul>
        <li>You need fast random access (use arrays)</li>
        <li>Memory is a concern (each node has overhead for pointers)</li>
        <li>You need cache efficiency (arrays have better locality)</li>
    </ul>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Linked List vs Array</span>
    </div>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
// Performance comparison: Insert at beginning

$n = 10000;

// Array insert at beginning
$start = microtime(true);
$arr = [];
for ($i = 0; $i < $n; $i++) {
    array_unshift($arr, $i);
}
$end = microtime(true);
$arrayTime = ($end - $start) * 1000;

// Linked list insert at beginning
class Node2 {
    public $data;
    public $next;
    public function __construct($d) { $this->data = $d; $this->next = null; }
}

$start = microtime(true);
$head = null;
for ($i = 0; $i < $n; $i++) {
    $node = new Node2($i);
    $node->next = $head;
    $head = $node;
}
$end = microtime(true);
$linkedListTime = ($end - $start) * 1000;

echo "Insert $n elements at beginning:\n";
echo "Array (array_unshift): " . round($arrayTime, 2) . " ms\n";
echo "Linked List: " . round($linkedListTime, 2) . " ms\n";
echo "\nLinked lists are faster for beginning insertions!\n";
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

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'dsa-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'dsa-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>