<?php

// CLASS & OBJECTS

class Teacher {
    // Properties OR attributes
    public $name;
    public $department;
    public $string;
    private $salary;

    // METHODS

    public function changeDept($newDept) {
        $this->department = $newDept;
    }

    // Setter function
    public function setSalary($s) {
        if ($s > 0) {
            $this->salary = $s;
        } else {
            echo "Salary must be positive.";
        }
    }

    // Getter function
    public function getSalary() {
        return $this->salary;
    }
}

// Create object
$teacher1 = new Teacher();
$teacher1->name = "Ashish Rana";
$teacher1->department = "Computer Science";
$teacher1->setSalary(60000); // Using setter to set salary
$teacher1->string = "Hello, I am a teacher";

echo '<pre>';
print_r($teacher1);

// ACCESS MODIFIERS
// private $name;      // accessible only within the class
// public $name;       // accessible from anywhere
// protected $name;    // accessible within the class and its subclasses


// ENCAPSULATION
// Encapsulation is wrapping up of data/properties & member functions in a single unit called class.
// Encapsulation means hiding the internal state (data) of an object and only allowing controlled access through methods (getters/setters).
// It protects data from being directly accessed or modified from outside the class.
// How is encapsulation done in PHP?
// 1️ Declare properties as private or protected
// 2️ Provide public methods (getters/setters) to access or update them

class BankAccount {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    // Getter for accountNumber (read-only)
    public function getAccountNumber() {
        return $this->accountNumber;
    }

    // Getter for balance
    public function getBalance() {
        return $this->balance;
    }

    // Method to deposit money
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    // Method to withdraw money
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }
}

$account = new BankAccount("12345");
$account->deposit(500);
$account->withdraw(200);
echo "Account: " . $account->getAccountNumber() . ", Balance: " . $account->getBalance() . "\n";


// CONSTRUCTOR
// Special function invoked automatically at time of object creation. Used for initialisation.

// DESTRUCTOR
// De-allocate the memory (PHP handles this automatically)


// INHERITANCE
// When properties & member functions of base class are passed on to the derived class

class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

class Student extends Person {
    public $rollNo;

    public function __construct($name, $age, $rollNo) {
        parent::__construct($name, $age); // Call the parent constructor
        $this->rollNo = $rollNo;
    }
}

$student = new Student("John Doe", 20, "12345");
print_r($student);

// TYPES OF INHERITANCE
// 1. Single Inheritance: One class inherits from another class.
// 2. Multiple Inheritance: A class can inherit from multiple classes (not directly supported in PHP, but can be achieved using traits).
// 3. Multilevel Inheritance: A class inherits from another class, which in turn inherits from another class.
// 4. Hierarchical Inheritance: Multiple classes inherit from a single base class.
// 5. Hybrid Inheritance: A combination of two or more types of inheritance.
// 6. Multiple Inheritance using Traits: PHP allows the use of traits to achieve multiple inheritance-like behavior.

class Student2 {
    public $name;
    public $age;
    public $rollNo;
}

trait TeacherTrait {
    public $subject;
    public $salary;
}

class TA extends Student2 {
    use TeacherTrait;

    public $taId;

    public function __construct($name, $age, $rollNo, $subject, $salary, $taId) {
        $this->name = $name;
        $this->age = $age;
        $this->rollNo = $rollNo;
        $this->subject = $subject;
        $this->salary = $salary;
        $this->taId = $taId;
    }
}

$ta = new TA("Ashish", 22, 101, "Math", 50000, "TA001");
echo "TA: $ta->name, $ta->age, $ta->rollNo, $ta->subject, $ta->salary, $ta->taId\n";


// POLYMORPHISM
// Polymorphism is the ability of the object to take on different forms or behave in different ways depending on the context in which they are used.

class Animal {
    public function sound() {
        echo "Animal makes a sound\n";
    }
}

class Dog extends Animal {
    public function sound() {
        echo "Dog barks\n";
    }
}

class Cat extends Animal {
    public function sound() {
        echo "Cat meows\n";
    }
}

function makeSound(Animal $animal) {
    $animal->sound();
}

makeSound(new Dog());
makeSound(new Cat());

// Example using interface
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a Square\n";
    }
}

function render(Shape $shape) {
    $shape->draw();
}

render(new Circle());
render(new Square());


// FUNCTION OVERLOADING (simulated)
// Function overloading means having multiple functions with the same name but different types or numbers of parameters.
// Function overloading is not supported in PHP, but we can achieve similar behavior using type checking within a single method.

class Printer {
    public function show($value) {
        if (is_int($value)) {
            echo "Value: $value\n";
        } elseif (is_string($value)) {
            echo "Character: $value\n";
        } else {
            echo "Unknown type\n";
        }
    }
}

$p = new Printer();
$p->show(10);
$p->show('A');
$p->show(3.14);


// FUNCTION OVERRIDING
// Parent & child both contain the same function with different implementation.
// The parent class function is said to be overridden by the child class function.

class ParentClass {
    public function display() {
        echo "Display from Parent Class\n";
    }
}

class ChildClass extends ParentClass {
    public function display() {
        echo "Display from Child Class\n";
    }
}

$parent = new ParentClass();
$child = new ChildClass();
$parent->display();
$child->display();


// ABSTRACTION
// Abstraction - hiding all unnecessary details & showing only the important part.
// Abstract classes are used to provide a base class from which other classes can be derived.
// Abstract classes are typically used to define an interface for derived classes.

abstract class Shape2 {
    abstract public function area();
}

class Circle2 extends Shape2 {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return 3.14 * $this->radius * $this->radius;
    }
}


// STATIC
// Static variables in a class are created & initialised once for the lifetime of the program, and they are shared among all instances of the class.

class Fun {
    public function fun() {
        static $x = 0;
        echo $x;
        $x++;
    }
}

$fun = new Fun();
$fun->fun(); // 0
$fun->fun(); // 1
$fun->fun(); // 2

?>
