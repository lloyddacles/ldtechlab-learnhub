<?php
/**
 * Title: Stacks
 */
$pageTitle = 'Stacks';
?>
<?php $num = 5; require_once __DIR__ . '/../includes/functions.php'; $prevNext = getPrevNextLesson($num, 'dsa-lessons'); require_once __DIR__ . '/../includes/header.php'; ?>

<div class="lesson-header">
    <span class="lesson-number">DSA Lesson <?= $num ?></span>
    <h1>Stacks</h1>
    <p class="lesson-desc">Master the LIFO (Last-In-First-Out) data structure that powers undo buttons, function calls, and more.</p>
</div>

<div class="content-section">
    <h2>What is a Stack?</h2>
    <p>A <strong>stack</strong> is a linear data structure that follows the <strong>LIFO (Last-In-First-Out)</strong> principle. The last element added to the stack is the first one to be removed.</p>
    
    <div class="info-box tip">
        <div class="box-title">Real-World Analogies</div>
        <ul class="mb-0">
            <li>Stack of plates — you add and remove from the top</li>
            <li>Browser back button — pages are stacked and popped</li>
            <li>Undo button in editors — operations are reversed in stack order</li>
            <li>Call stack in programming — function calls are pushed and popped</li>
        </ul>
    </div>
</div>

<div class="content-section">
    <h2>Stack Operations</h2>
    <table>
        <thead>
            <tr><th>Operation</th><th>Description</th><th>Time Complexity</th></tr>
        </thead>
        <tbody>
            <tr><td><strong>push($item)</strong></td><td>Add an item to the top of the stack</td><td>O(1)</td></tr>
            <tr><td><strong>pop()</strong></td><td>Remove and return the top item</td><td>O(1)</td></tr>
            <tr><td><strong>peek()</strong></td><td>Return the top item without removing it</td><td>O(1)</td></tr>
            <tr><td><strong>isEmpty()</strong></td><td>Check if the stack is empty</td><td>O(1)</td></tr>
            <tr><td><strong>size()</strong></td><td>Return the number of items</td><td>O(1)</td></tr>
        </tbody>
    </table>
</div>

<div class="content-section">
    <h2>Stack Implementation in PHP</h2>
    
    <h3>Using PHP Arrays (Simple)</h3>
    <p>PHP arrays can function as stacks using <code>array_push()</code> and <code>array_pop()</code>:</p>
    <pre><code>&lt;?php
$stack = [];
array_push($stack, 'A');
array_push($stack, 'B');
array_push($stack, 'C');

$top = array_pop($stack);  // Returns 'C'
// $stack is now ['A', 'B']

echo $top;  // C</code></pre>
    
    <h3>Using a Class (OOP Approach)</h3>
    <pre><code>&lt;?php
class Stack {
    private array $items = [];
    
    public function push(mixed $item): void {
        $this->items[] = $item;
    }
    
    public function pop(): mixed {
        if ($this->isEmpty()) {
            throw new RuntimeException('Stack is empty');
        }
        return array_pop($this->items);
    }
    
    public function peek(): mixed {
        if ($this->isEmpty()) {
            throw new RuntimeException('Stack is empty');
        }
        return $this->items[count($this->items) - 1];
    }
    
    public function isEmpty(): bool {
        return empty($this->items);
    }
    
    public function size(): int {
        return count($this->items);
    }
}</code></pre>
</div>

<div class="content-section">
    <h2>Applications of Stacks</h2>
    <ul>
        <li><strong>Expression Evaluation:</strong> Converting infix to postfix notation</li>
        <li><strong>Bracket Matching:</strong> Validating balanced parentheses in code</li>
        <li><strong>Function Call Stack:</strong> Tracking function calls during execution</li>
        <li><strong>Undo/Redo:</strong> Implementing editor history</li>
        <li><strong>Backtracking:</strong> N-queens, maze solving algorithms</li>
        <li><strong>Depth-First Search:</strong> Graph traversal using explicit stack</li>
    </ul>
</div>

<div class="content-section">
    <h2>Stack Tracing Example</h2>
    <pre><code>&lt;?php
// Bracket matching using a stack
function isBalanced(string $str): bool {
    $stack = new Stack();
    $pairs = ['(' => ')', '[' => ']', '{' => '}'];
    
    for ($i = 0; $i &lt; strlen($str); $i++) {
        $char = $str[$i];
        
        if (array_key_exists($char, $pairs)) {
            $stack->push($char);
        } elseif (in_array($char, $pairs)) {
            if ($stack->isEmpty()) return false;
            $open = $stack->pop();
            if ($pairs[$open] !== $char) return false;
        }
    }
    
    return $stack->isEmpty();
}

echo isBalanced('{[()]}') ? 'Balanced' : 'Not balanced'; // Balanced
echo isBalanced('{[(])}') ? 'Balanced' : 'Not balanced'; // Not balanced</code></pre>
</div>

<div class="info-box warning">
    <div class="box-title">Common Mistake</div>
    <p class="mb-0">Always check if the stack is empty before calling <code>pop()</code> or <code>peek()</code>. Attempting to pop from an empty stack will cause an error.</p>
</div>

<div class="sandbox">
    <h3>Try It Yourself: Stack Operations</h3>
    <p>Implement a stack class and test push, pop, peek operations:</p>
    <textarea class="sandbox-code" data-example="<?= base64_encode('<?php
class Stack {
    private array $items = [];
    
    public function push(mixed $item): void {
        $this->items[] = $item;
        echo "Pushed: $item\n";
    }
    
    public function pop(): mixed {
        if ($this->isEmpty()) {
            echo "Stack is empty!\n";
            return null;
        }
        $item = array_pop($this->items);
        echo "Popped: $item\n";
        return $item;
    }
    
    public function peek(): mixed {
        if ($this->isEmpty()) {
            echo "Stack is empty!\n";
            return null;
        }
        $item = $this->items[count($this->items) - 1];
        echo "Peeked: $item\n";
        return $item;
    }
    
    public function isEmpty(): bool {
        return empty($this->items);
    }
    
    public function size(): int {
        return count($this->items);
    }
    
    public function display(): void {
        echo "Stack (top to bottom): " . implode(", ", array_reverse($this->items)) . "\n";
    }
}

// Test the stack
$stack = new Stack();

echo "=== Pushing items ===\n";
$stack->push("First");
$stack->push("Second");
$stack->push("Third");

echo "\n=== Stack state ===\n";
$stack->display();
echo "Size: " . $stack->size() . "\n";

echo "\n=== Peek and Pop ===\n";
$stack->peek();
$stack->pop();
$stack->display();

echo "\n=== Pop remaining ===\n";
$stack->pop();
$stack->pop();
$stack->pop(); // Try popping from empty stack

echo "\n=== Final state ===\n";
echo "Is empty: " . ($stack->isEmpty() ? "Yes" : "No") . "\n";
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