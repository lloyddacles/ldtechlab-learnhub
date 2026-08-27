<?php $pageTitle = 'Inheritance & Polymorphism'; require_once __DIR__ . '/../includes/functions.php'; require_once __DIR__ . '/../includes/header.php'; ?>
<?php $num = 10; $prevNext = getPrevNextLesson($num, 'java-lessons'); ?>

<div class="lesson-header">
    <span class="lesson-number">Lesson <?= $num ?></span>
    <h1>Inheritance & Polymorphism</h1>
    <p class="lesson-desc">Explore class hierarchies with <code>extends</code>, use <code>super</code>, override methods, and understand polymorphism, abstract classes, and interfaces.</p>
</div>

<h2>Inheritance with <code>extends</code></h2>
<p>Inheritance lets a <strong>child class</strong> reuse fields and methods from a <strong>parent class</strong>. The child class adds or overrides behavior while inheriting everything else.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Basic Inheritance</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static class Animal {
        String name;
        
        Animal(String name) {
            this.name = name;
        }
        
        void speak() {
            System.out.println(name + " makes a sound.");
        }
    }
    
    static class Dog extends Animal {
        Dog(String name) {
            super(name);
        }
        
        @Override
        void speak() {
            System.out.println(name + " barks! Woof!");
        }
    }
    
    static class Cat extends Animal {
        Cat(String name) {
            super(name);
        }
        
        @Override
        void speak() {
            System.out.println(name + " meows! Meow!");
        }
    }
    
    public static void main(String[] args) {
        Animal generic = new Animal("Animal");
        Dog dog = new Dog("Rex");
        Cat cat = new Cat("Whiskers");
        
        generic.speak();
        dog.speak();
        cat.speak();
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>The <code>super</code> Keyword</h2>
<p><code>super</code> accesses the parent class. Use it to call the parent constructor or call an overridden parent method.</p>

<table>
    <thead>
        <tr><th>Usage</th><th>Syntax</th><th>Purpose</th></tr>
    </thead>
    <tbody>
        <tr><td>Call parent constructor</td><td><code>super(args);</code></td><td>Initialize parent fields</td></tr>
        <tr><td>Access parent method</td><td><code>super.method();</code></td><td>Call overridden method</td></tr>
        <tr><td>Access parent field</td><td><code>super.field</code></td><td>Resolve name shadowing</td></tr>
    </tbody>
</table>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Using super</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    static class Vehicle {
        String make;
        int year;
        
        Vehicle(String make, int year) {
            this.make = make;
            this.year = year;
        }
        
        String getInfo() {
            return year + " " + make;
        }
    }
    
    static class Car extends Vehicle {
        int doors;
        
        Car(String make, int year, int doors) {
            super(make, year);
            this.doors = doors;
        }
        
        @Override
        String getInfo() {
            return super.getInfo() + " (" + doors + " doors)";
        }
    }
    
    static class Truck extends Vehicle {
        double payload;
        
        Truck(String make, int year, double payload) {
            super(make, year);
            this.payload = payload;
        }
        
        @Override
        String getInfo() {
            return super.getInfo() + " [payload: " + payload + " tons]";
        }
    }
    
    public static void main(String[] args) {
        Car car = new Car("Toyota", 2024, 4);
        Truck truck = new Truck("Ford", 2023, 2.5);
        
        System.out.println(car.getInfo());
        System.out.println(truck.getInfo());
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Polymorphism</h2>
<p><strong>Polymorphism</strong> means "many forms." A parent reference can point to a child object, and the correct overridden method is called at runtime.</p>

<div class="info-box tip">
    <div class="box-title">Polymorphism in Action</div>
    <p class="mb-0">Write code that works with the <em>parent type</em>. It will automatically use the child's behavior. This makes your code flexible and extensible.</p>
</div>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Polymorphism</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('import java.util.ArrayList;

public class Sandbox {
    
    static abstract class Shape {
        String name;
        
        Shape(String name) { this.name = name; }
        
        abstract double area();
        abstract double perimeter();
        
        void describe() {
            System.out.println(name + " - Area: " + String.format("%.2f", area())
                + ", Perimeter: " + String.format("%.2f", perimeter()));
        }
    }
    
    static class Circle extends Shape {
        double radius;
        
        Circle(double radius) {
            super("Circle");
            this.radius = radius;
        }
        
        double area() { return Math.PI * radius * radius; }
        double perimeter() { return 2 * Math.PI * radius; }
    }
    
    static class Rectangle extends Shape {
        double width, height;
        
        Rectangle(double w, double h) {
            super("Rectangle");
            this.width = w;
            this.height = h;
        }
        
        double area() { return width * height; }
        double perimeter() { return 2 * (width + height); }
    }
    
    public static void main(String[] args) {
        ArrayList<Shape> shapes = new ArrayList<>();
        shapes.add(new Circle(5));
        shapes.add(new Rectangle(4, 6));
        shapes.add(new Circle(3));
        
        for (Shape s : shapes) {
            s.describe();
        }
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<h2>Interfaces</h2>
<p>An <strong>interface</strong> defines a contract that classes must follow. It specifies method signatures without implementation (before Java 8). A class uses <code>implements</code> to adopt an interface.</p>

<div class="sandbox">
    <div class="sandbox-header">
        <span class="label">Try It Yourself &mdash; Interfaces</span>
    </div>
    <textarea class="sandbox-code" data-lang="java" data-example="<?= base64_encode('public class Sandbox {
    
    interface Drawable {
        void draw();
        default String getType() { return "Drawable"; }
    }
    
    interface Resizable {
        void resize(double factor);
    }
    
    static class Circle implements Drawable, Resizable {
        double radius;
        
        Circle(double r) { this.radius = r; }
        
        public void draw() {
            System.out.println("Drawing circle with radius " + radius);
        }
        
        public void resize(double factor) {
            radius *= factor;
            System.out.println("Resized to radius " + radius);
        }
    }
    
    static class Square implements Drawable {
        double side;
        
        Square(double s) { this.side = s; }
        
        public void draw() {
            System.out.println("Drawing square with side " + side);
        }
    }
    
    public static void main(String[] args) {
        Circle c = new Circle(5);
        c.draw();
        c.resize(2);
        c.draw();
        
        Square sq = new Square(4);
        sq.draw();
        
        Drawable d = c;
        System.out.println("Type: " + d.getType());
    }
}'); ?>"></textarea>
    <div class="sandbox-actions">
        <button class="btn btn-success run-btn">Run Code</button>
        <span class="text-muted" style="font-size:0.85em;">Ctrl+Enter to run</span>
    </div>
    <div class="sandbox-result">
        <div class="output-label">Output:</div>
        <div class="output-content"></div>
    </div>
</div>

<div class="info-box note">
    <div class="box-title">Abstract Classes vs Interfaces</div>
    <p class="mb-0">Use <strong>abstract classes</strong> when classes share common state and behavior. Use <strong>interfaces</strong> when defining capabilities that unrelated classes can implement.</p>
</div>

<div class="lesson-nav">
    <?php if ($prevNext['prev']): ?>
        <a href="<?= lessonUrl($prevNext['prev']['num'], $prevNext['prev']['slug'], 'java-lessons') ?>" class="prev-link">&larr; Previous: <?= htmlspecialchars($prevNext['prev']['title']) ?></a>
    <?php endif; ?>
    <?php if ($prevNext['next']): ?>
        <a href="<?= lessonUrl($prevNext['next']['num'], $prevNext['next']['slug'], 'java-lessons') ?>" class="next-link">Next: <?= htmlspecialchars($prevNext['next']['title']) ?> &rarr;</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>