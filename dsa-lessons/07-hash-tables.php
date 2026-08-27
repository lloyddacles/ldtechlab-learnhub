<?php
/**
 * Title: Hash Tables
 */
$pageTitle = 'Hash Tables';
?>
<?php $num = 7; require_once __DIR__ . '/../includes/functions.php'; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">DSA Lesson <?= $num ?></span>
    <h1>Hash Tables</h1>
    <p class="lesson-desc">Discover hash maps — the O(1) average lookup structure that powers PHP arrays, caching, and databases.</p>
</div>

<div class="content-section">
    <h2>What is a Hash Table?</h2>
    <p>A <strong>hash table</strong> (or hash map) is a data structure that maps keys to values using a <strong>hash function</strong>. It provides near-constant time O(1) average complexity for insertions, deletions, and lookups.</p>
    
    <div class="info-box tip">
        <div class="box-title">PHP Arrays are Hash Tables!</div>
        <p class="mb-0">PHP's <code>array()</code> with string keys is actually a hash table under the hood. When you use <code>$arr['key'] = 'value'</code>, PHP is performing a hash table operation.</p>
    </div>
</div>

<div class="content-section">
    <h2>How Hashing Works</h2>
    <ol>
        <li><strong>Hash Function:</strong> Converts a key into an array index</li>
        <li><strong>Index Calculation:</strong> <code>index = hash(key) % table_size</code></li>
        <li><strong>Storage:</strong> Value stored at the calculated index</li>
        <li><strong>Retrieval:</strong> Rehash the key to find the same index</li>
    </ol>
    
    <pre><code>// Simple hash function example
function simpleHash(string $key, int $size): int {
    $hash = 0;
    for ($i = 0; $i &lt; strlen($key); $i++) {
        $hash += ord($key[$i]);
    }
    return $hash % $size;
}

echo simpleHash("hello", 10);  // Returns an index 0-9</code></pre>
</div>

<div class="content-section">
    <h2>Collision Handling</h2>
    <p>When two different keys hash to the same index, a <strong>collision</strong> occurs. Two common solutions:</p>
    
    <h3>1. Chaining (Separate Chaining)</h3>
    <p>Each bucket contains a linked list of entries that hash to the same index.</p>
    <pre><code>// Chaining: each slot holds a list
$ buckets = [
    0 => [['key1', 'val1'], ['key5', 'val5']],
    1 => [['key2', 'val2']],
    2 => [],
    3 => [['key3', 'val3'], ['key4', 'val4']],
];</code></pre>
    
    <h3>2. Open Addressing</h3>
    <p>If a collision occurs, probe for the next empty slot using linear probing, quadratic probing, or double hashing.</p>
</div>

<div class="content-section">
    <h2>Time Complexity</h2>
    <table>
        <thead>
            <tr><th>Operation</th><th>Average</th><th>Worst Case</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>Insert</strong></td><td>O(1)</td><td>O(n)</td></tr>
            <tr><td><strong>Lookup</strong></td><td>O(1)</td><td>O(n)</td></tr>
            <tr><td><strong>Delete</strong></td><td>O(1)</td><td>O(n)</td></tr>
        </tbody>
    </table>
    
    <div class="info-box warning">
        <div class="box-title">Worst Case</div>
        <p class="mb-0">Worst case O(n) occurs when all keys hash to the same index (many collisions). A good hash function distributes keys evenly to maintain O(1) average.</p>
    </div>
</div>

<div class="content-section">
    <h2>Hash Table Implementation in PHP</h2>
    <pre><code>&lt;?php
class HashTable {
    private array $buckets;
    private int $size;
    
    public function __construct(int $size = 10) {
        $this->size = $size;
        $this->buckets = array_fill(0, $size, []);
    }
    
    private function hash(string $key): int {
        $hash = 0;
        for ($i = 0; $i &lt; strlen($key); $i++) {
            $hash += ord($key[$i]);
        }
        return $hash % $this->size;
    }
    
    public function set(string $key, mixed $value): void {
        $index = $this->hash($key);
        
        // Check if key already exists
        foreach ($this->buckets[$index] as &$pair) {
            if ($pair[0] === $key) {
                $pair[1] = $value;
                return;
            }
        }
        
        // Add new pair
        $this->buckets[$index][] = [$key, $value];
    }
    
    public function get(string $key): mixed {
        $index = $this->hash($key);
        
        foreach ($this->buckets[$index] as $pair) {
            if ($pair[0] === $key) {
                return $pair[1];
            }
        }
        
        return null;
    }
    
    public function remove(string $key): bool {
        $index = $this->hash($key);
        
        foreach ($this->buckets[$index] as $i => $pair) {
            if ($pair[0] === $key) {
                unset($this->buckets[$index][$i]);
                return true;
            }
        }
        
        return false;
    }
}</code></pre>
</div>

<div class="content-section">
    <h2>Applications of Hash Tables</h2>
    <ul>
        <li><strong>Caching:</strong> Storing computed results for quick retrieval</li>
        <li><strong>Counting:</strong> Frequency counting of elements</li>
        <li><strong>Grouping:</strong> Grouping items by a common property</li>
        <li><strong>Databases:</strong> Indexing for fast data retrieval</li>
        <li><strong>Symbol Tables:</strong> Compilers use hash tables for variable lookup</li>
        <li><strong>Unique Items:</strong> Detecting duplicates in data streams</li>
    </ul>
</div>

<div class="sandbox">
    <h3>Try It Yourself: Hash Table</h3>
    <p>Implement a hash table class with set, get, and remove methods:</p>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
class HashTable {
    private array $buckets;
    private int $size;
    
    public function __construct(int $size = 10) {
        $this->size = $size;
        $this->buckets = array_fill(0, $size, []);
    }
    
    private function hash(string $key): int {
        $hash = 0;
        for ($i = 0; $i < strlen($key); $i++) {
            $hash += ord($key[$i]);
        }
        return $hash % $this->size;
    }
    
    public function set(string $key, mixed $value): void {
        $index = $this->hash($key);
        foreach ($this->buckets[$index] as &$pair) {
            if ($pair[0] === $key) {
                $pair[1] = $value;
                echo "Updated: $key => $value (index: $index)\n";
                return;
            }
        }
        $this->buckets[$index][] = [$key, $value];
        echo "Inserted: $key => $value (index: $index)\n";
    }
    
    public function get(string $key): mixed {
        $index = $this->hash($key);
        foreach ($this->buckets[$index] as $pair) {
            if ($pair[0] === $key) {
                echo "Found: $key => {$pair[1]} (index: $index)\n";
                return $pair[1];
            }
        }
        echo "Not found: $key\n";
        return null;
    }
    
    public function remove(string $key): bool {
        $index = $this->hash($key);
        foreach ($this->buckets[$index] as $i => $pair) {
            if ($pair[0] === $key) {
                unset($this->buckets[$index][$i]);
                echo "Removed: $key (index: $index)\n";
                return true;
            }
        }
        echo "Cannot remove: $key not found\n";
        return false;
    }
    
    public function display(): void {
        echo "\nHash Table Contents:\n";
        for ($i = 0; $i < $this->size; $i++) {
            if (!empty($this->buckets[$i])) {
                $items = [];
                foreach ($this->buckets[$i] as $pair) {
                    $items[] = "{$pair[0]}:{$pair[1]}";
                }
                echo "  [$i]: " . implode(" -> ", $items) . "\n";
            }
        }
    }
}

// Test the hash table
$ht = new HashTable(8);

echo "=== Setting values ===\n";
$ht->set("name", "Alice");
$ht->set("age", 25);
$ht->set("city", "Manila");
$ht->set("job", "Developer");

echo "\n=== Getting values ===\n";
$ht->get("name");
$ht->get("age");
$ht->get("unknown");

echo "\n=== Updating ===\n";
$ht->set("age", 26);

echo "\n=== Removing ===\n";
$ht->remove("city");

echo "\n=== Final state ===\n";
$ht->display();
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