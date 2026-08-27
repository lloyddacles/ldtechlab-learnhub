<?php
/**
 * Title: Queues
 */
$pageTitle = 'Queues';
?>
<?php $num = 6; require_once __DIR__ . '/../includes/functions.php'; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">DSA Lesson <?= $num ?></span>
    <h1>Queues</h1>
    <p class="lesson-desc">Learn the FIFO (First-In-First-Out) data structure used in scheduling, BFS, and real-world systems.</p>
</div>

<div class="content-section">
    <h2>What is a Queue?</h2>
    <p>A <strong>queue</strong> is a linear data structure that follows the <strong>FIFO (First-In-First-Out)</strong> principle. The first element added to the queue is the first one to be removed.</p>
    
    <div class="info-box tip">
        <div class="box-title">Real-World Analogies</div>
        <ul class="mb-0">
            <li>People waiting in line — first person served first</li>
            <li>Printer queue — documents printed in order</li>
            <li>Customer service queue — first caller handled first</li>
            <li>Task scheduling in operating systems</li>
        </ul>
    </div>
</div>

<div class="content-section">
    <h2>Queue Operations</h2>
    <table>
        <thead>
            <tr><th>Operation</th><th>Description</th><th>Time Complexity</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>enqueue($item)</strong></td><td>Add an item to the rear</td><td>O(1)</td></tr>
            <tr><td><strong>dequeue()</strong></td><td>Remove and return the front item</td><td>O(1)</td></tr>
            <tr><td><strong>front()</strong></td><td>Return the front item without removing</td><td>O(1)</td></tr>
            <tr><td><strong>isEmpty()</strong></td><td>Check if the queue is empty</td><td>O(1)</td></tr>
            <tr><td><strong>size()</strong></td><td>Return the number of items</td><td>O(1)</td></tr>
        </tbody>
    </table>
</div>

<div class="content-section">
    <h2>Queue Implementation in PHP</h2>
    
    <h3>Using PHP Arrays (Simple)</h3>
    <p>Use <code>array_push()</code> to enqueue and <code>array_shift()</code> to dequeue:</p>
    <pre><code>&lt;?php
$queue = [];
array_push($queue, 'First');
array_push($queue, 'Second');
array_push($queue, 'Third');

$first = array_shift($queue);  // Returns 'First'
// $queue is now ['Second', 'Third']

echo $first;  // First</code></pre>
    
    <h3>Using a Class (OOP Approach)</h3>
    <pre><code>&lt;?php
class Queue {
    private array $items = [];
    private int $front = 0;
    
    public function enqueue(mixed $item): void {
        $this->items[] = $item;
    }
    
    public function dequeue(): mixed {
        if ($this->isEmpty()) {
            throw new RuntimeException('Queue is empty');
        }
        $item = $this->items[$this->front];
        unset($this->items[$this->front]);
        $this->front++;
        return $item;
    }
    
    public function front(): mixed {
        if ($this->isEmpty()) {
            throw new RuntimeException('Queue is empty');
        }
        return $this->items[$this->front];
    }
    
    public function isEmpty(): bool {
        return $this->front >= count($this->items);
    }
    
    public function size(): int {
        return count($this->items) - $this->front;
    }
}</code></pre>
</div>

<div class="content-section">
    <h2>Circular Queue</h2>
    <p>A <strong>circular queue</strong> reuses empty spaces in the array by wrapping around to the beginning when the end is reached. This avoids wasted space in a linear queue implementation.</p>
    
    <div class="info-box note">
        <div class="box-title">Circular Queue Benefits</div>
        <p class="mb-0">In a linear queue, after many dequeues, unused space accumulates at the front. A circular queue wraps around and reuses this space, maintaining O(1) operations without shifting elements.</p>
    </div>
</div>

<div class="content-section">
    <h2>Applications of Queues</h2>
    <ul>
        <li><strong>BFS (Breadth-First Search):</strong> Traversing graphs level by level</li>
        <li><strong>Task Scheduling:</strong> Operating systems use queues for process scheduling</li>
        <li><strong>Print Spooling:</strong> Documents queued for printing</li>
        <li><strong>Buffering:</strong> IO buffers, streaming data</li>
        <li><strong>Message Queues:</strong> Communication between software systems</li>
        <li><strong>Customer Service:</strong> Call center queue management</li>
    </ul>
</div>

<div class="content-section">
    <h2>Queue vs Stack</h2>
    <table>
        <thead>
            <tr><th>Feature</th><th>Stack</th><th>Queue</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>Principle</strong></td><td>LIFO (Last-In-First-Out)</td><td>FIFO (First-In-First-Out)</td></tr>
            <tr><td><strong>Add</strong></td><td>Push (to top)</td><td>Enqueue (to rear)</td></tr>
            <tr><td><strong>Remove</strong></td><td>Pop (from top)</td><td>Dequeue (from front)</td></tr>
            <tr><td><strong>Example</strong></td><td>Undo button</td><td>Print queue</td></tr>
        </tbody>
    </table>
</div>

<div class="sandbox">
    <h3>Try It Yourself: Queue Operations</h3>
    <p>Implement a queue class and test enqueue, dequeue, front operations:</p>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
class Queue {
    private array $items = [];
    private int $front = 0;
    
    public function enqueue(mixed $item): void {
        $this->items[] = $item;
        echo "Enqueued: $item\n";
    }
    
    public function dequeue(): mixed {
        if ($this->isEmpty()) {
            echo "Queue is empty!\n";
            return null;
        }
        $item = $this->items[$this->front];
        unset($this->items[$this->front]);
        $this->front++;
        echo "Dequeued: $item\n";
        return $item;
    }
    
    public function front(): mixed {
        if ($this->isEmpty()) {
            echo "Queue is empty!\n";
            return null;
        }
        $item = $this->items[$this->front];
        echo "Front: $item\n";
        return $item;
    }
    
    public function isEmpty(): bool {
        return $this->front >= count($this->items);
    }
    
    public function size(): int {
        return count($this->items) - $this->front;
    }
    
    public function display(): void {
        if ($this->isEmpty()) {
            echo "Queue is empty\n";
            return;
        }
        $items = array_slice($this->items, $this->front);
        echo "Queue (front to rear): " . implode(", ", $items) . "\n";
    }
}

// Test the queue
$queue = new Queue();

echo "=== Enqueuing items ===\n";
$queue->enqueue("Customer 1");
$queue->enqueue("Customer 2");
$queue->enqueue("Customer 3");

echo "\n=== Queue state ===\n";
$queue->display();
echo "Size: " . $queue->size() . "\n";

echo "\n=== Front and Dequeue ===\n";
$queue->front();
$queue->dequeue();
$queue->display();

echo "\n=== Dequeue remaining ===\n";
$queue->dequeue();
$queue->dequeue();
$queue->dequeue(); // Try dequeuing from empty queue

echo "\n=== Final state ===\n";
echo "Is empty: " . ($queue->isEmpty() ? "Yes" : "No") . "\n";
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