<?php
/**
 * Title: Binary Trees & BST
 */
$pageTitle = 'Binary Trees & BST';
?>
<?php $num = 8; require_once __DIR__ . '/../includes/functions.php'; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">DSA Lesson <?= $num ?></span>
    <h1>Binary Trees & BST</h1>
    <p class="lesson-desc">Explore hierarchical data structures that power file systems, databases, and search algorithms.</p>
</div>

<div class="content-section">
    <h2>What is a Tree?</h2>
    <p>A <strong>tree</strong> is a hierarchical data structure consisting of <strong>nodes</strong> connected by <strong>edges</strong>. Each node has a value and references to its children.</p>
    
    <h3>Binary Tree Terminology</h3>
    <table>
        <thead>
            <tr><th>Term</th><th>Description</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>Root</strong></td><td>The topmost node (no parent)</td></tr>
            <tr><td><strong>Leaf</strong></td><td>A node with no children</td></tr>
            <tr><td><strong>Height</strong></td><td>Longest path from root to leaf</td></tr>
            <tr><td><strong>Depth</strong></td><td>Distance from root to a specific node</td></tr>
            <tr><td><strong>Parent</strong></td><td>A node with children</td></tr>
            <tr><td><strong>Child</strong></td><td>A node connected to a parent</td></tr>
        </tbody>
    </table>
</div>

<div class="content-section">
    <h2>Binary Search Tree (BST)</h2>
    <p>A <strong>Binary Search Tree</strong> is a binary tree where each node follows the BST property:</p>
    <ul>
        <li>All values in the <strong>left subtree</strong> are <strong>less than</strong> the node's value</li>
        <li>All values in the <strong>right subtree</strong> are <strong>greater than</strong> the node's value</li>
        <li>Both left and right subtrees are also BSTs</li>
    </ul>
    
    <div class="info-box tip">
        <div class="box-title">Why BST?</div>
        <p class="mb-0">BSTs enable efficient searching, insertion, and deletion in O(log n) average time, compared to O(n) for arrays.</p>
    </div>
</div>

<div class="content-section">
    <h2>Tree Traversals</h2>
    <p>There are three main ways to traverse a binary tree:</p>
    
    <table>
        <thead>
            <tr><th>Traversal</th><th>Order</th><th>Use Case</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>Inorder</strong></td><td>Left → Root → Right</td><td>Returns sorted order in BST</td></tr>
            <tr><td><strong>Preorder</strong></td><td>Root → Left → Right</td><td>Copy/serialize tree structure</td></tr>
            <tr><td><strong>Postorder</strong></td><td>Left → Right → Root</td><td>Delete tree, evaluate expressions</td></tr>
        </tbody>
    </table>
    
    <pre><code>// Example tree:
//        50
//       /  \
//      30   70
//     / \   / \
//   20  40 60  80

// Inorder: 20, 30, 40, 50, 60, 70, 80 (sorted!)
// Preorder: 50, 30, 20, 40, 70, 60, 80
// Postorder: 20, 40, 30, 60, 80, 70, 50</code></pre>
</div>

<div class="content-section">
    <h2>BST Implementation in PHP</h2>
    <pre><code>&lt;?php
class TreeNode {
    public int $value;
    public ?TreeNode $left = null;
    public ?TreeNode $right = null;
    
    public function __construct(int $value) {
        $this->value = $value;
    }
}

class BinarySearchTree {
    private ?TreeNode $root = null;
    
    public function insert(int $value): void {
        $this->root = $this->insertNode($this->root, $value);
    }
    
    private function insertNode(?TreeNode $node, int $value): TreeNode {
        if ($node === null) {
            return new TreeNode($value);
        }
        
        if ($value &lt; $node->value) {
            $node->left = $this->insertNode($node->left, $value);
        } elseif ($value > $node->value) {
            $node->right = $this->insertNode($node->right, $value);
        }
        
        return $node;
    }
    
    public function search(int $value): bool {
        return $this->searchNode($this->root, $value);
    }
    
    private function searchNode(?TreeNode $node, int $value): bool {
        if ($node === null) return false;
        if ($value === $node->value) return true;
        if ($value &lt; $node->value) {
            return $this->searchNode($node->left, $value);
        }
        return $this->searchNode($node->right, $value);
    }
    
    public function inorder(): array {
        $result = [];
        $this->inorderTraversal($this->root, $result);
        return $result;
    }
    
    private function inorderTraversal(?TreeNode $node, array &$result): void {
        if ($node !== null) {
            $this->inorderTraversal($node->left, $result);
            $result[] = $node->value;
            $this->inorderTraversal($node->right, $result);
        }
    }
}</code></pre>
</div>

<div class="content-section">
    <h2>BST Operations Complexity</h2>
    <table>
        <thead>
            <tr><th>Operation</th><th>Average</th><th>Worst (unbalanced)</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>Search</strong></td><td>O(log n)</td><td>O(n)</td></tr>
            <tr><td><strong>Insert</strong></td><td>O(log n)</td><td>O(n)</td></tr>
            <tr><td><strong>Delete</strong></td><td>O(log n)</td><td>O(n)</td></tr>
            <tr><td><strong>Traversal</strong></td><td>O(n)</td><td>O(n)</td></tr>
        </tbody>
    </table>
    
    <div class="info-box warning">
        <div class="box-title">Balance Matters!</div>
        <p class="mb-0">If elements are inserted in sorted order, the BST becomes a linked list with O(n) operations. Use self-balancing trees (AVL, Red-Black) for guaranteed O(log n).</p>
    </div>
</div>

<div class="content-section">
    <h2>Applications of Binary Trees</h2>
    <ul>
        <li><strong>File Systems:</strong> Directory structures are trees</li>
        <li><strong>Databases:</strong> B-trees and B+ trees for indexing</li>
        <li><strong>Decision Trees:</strong> Machine learning and AI</li>
        <li><strong>Expression Parsing:</strong> Arithmetic expression trees</li>
        <li><strong>Heap Data Structure:</strong> Priority queues</li>
        <li><strong>DNS System:</strong> Domain name resolution hierarchy</li>
    </ul>
</div>

<div class="sandbox">
    <h3>Try It Yourself: Binary Search Tree</h3>
    <p>Implement a BST with insert and inorder traversal:</p>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
class TreeNode {
    public int $value;
    public ?TreeNode $left = null;
    public ?TreeNode $right = null;
    
    public function __construct(int $value) {
        $this->value = $value;
    }
}

class BinarySearchTree {
    private ?TreeNode $root = null;
    
    public function insert(int $value): void {
        $this->root = $this->insertNode($this->root, $value);
        echo "Inserted: $value\n";
    }
    
    private function insertNode(?TreeNode $node, int $value): TreeNode {
        if ($node === null) {
            return new TreeNode($value);
        }
        
        if ($value < $node->value) {
            $node->left = $this->insertNode($node->left, $value);
        } elseif ($value > $node->value) {
            $node->right = $this->insertNode($node->right, $value);
        } else {
            echo "Value $value already exists\n";
        }
        
        return $node;
    }
    
    public function search(int $value): bool {
        $found = $this->searchNode($this->root, $value);
        echo $found ? "Found: $value\n" : "Not found: $value\n";
        return $found;
    }
    
    private function searchNode(?TreeNode $node, int $value): bool {
        if ($node === null) return false;
        if ($value === $node->value) return true;
        if ($value < $node->value) {
            return $this->searchNode($node->left, $value);
        }
        return $this->searchNode($node->right, $value);
    }
    
    public function inorder(): array {
        $result = [];
        $this->inorderTraversal($this->root, $result);
        return $result;
    }
    
    private function inorderTraversal(?TreeNode $node, array &$result): void {
        if ($node !== null) {
            $this->inorderTraversal($node->left, $result);
            $result[] = $node->value;
            $this->inorderTraversal($node->right, $result);
        }
    }
    
    public function preorder(): array {
        $result = [];
        $this->preorderTraversal($this->root, $result);
        return $result;
    }
    
    private function preorderTraversal(?TreeNode $node, array &$result): void {
        if ($node !== null) {
            $result[] = $node->value;
            $this->preorderTraversal($node->left, $result);
            $this->preorderTraversal($node->right, $result);
        }
    }
    
    public function postorder(): array {
        $result = [];
        $this->postorderTraversal($this->root, $result);
        return $result;
    }
    
    private function postorderTraversal(?TreeNode $node, array &$result): void {
        if ($node !== null) {
            $this->postorderTraversal($node->left, $result);
            $this->postorderTraversal($node->right, $result);
            $result[] = $node->value;
        }
    }
}

// Test the BST
$bst = new BinarySearchTree();

echo "=== Inserting values ===\n";
$bst->insert(50);
$bst->insert(30);
$bst->insert(70);
$bst->insert(20);
$bst->insert(40);
$bst->insert(60);
$bst->insert(80);

echo "\n=== Searching ===\n";
$bst->search(40);
$bst->search(25);

echo "\n=== Traversals ===\n";
echo "Inorder (sorted): " . implode(", ", $bst->inorder()) . "\n";
echo "Preorder: " . implode(", ", $bst->preorder()) . "\n";
echo "Postorder: " . implode(", ", $bst->postorder()) . "\n";
?>') ?>"></textarea>
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