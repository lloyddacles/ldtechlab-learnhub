# LD TechLab Programming Tutorials

An interactive, offline programming tutorial for beginners. Learn PHP, Python, Java, MySQL, DBMS theory, programming logic, and Data Structures & Algorithms through 84 hands-on lessons with live code examples.

Created by **Mr. Lloyd Christopher F. Dacles, MIS**

## Requirements

- **PHP 7.4** or higher (auto-installed by setup script if missing)
- A modern web browser (Chrome, Firefox, Edge, Safari)
- No internet connection needed (after setup)

## Quick Start

### First Time Setup (installs PHP if missing)
```bash
./setup.sh        # macOS / Linux
setup.bat          # Windows (double-click)
```

### Start Server
```bash
./start-server.sh  # macOS / Linux
start-server.bat   # Windows (double-click)
```

Then open **http://localhost:8000** in your browser.

### What the setup does
- Checks for PHP, Python 3, and Java JDK
- Downloads and bundles PHP if not found
- Reports which sandboxes are available
- Start script auto-opens your browser

## Features

- **12 Programming Logic Lessons** — how to think like a programmer, problem-solving, debugging
- **12 Python Lessons** — interactive Python with live code execution
- **12 Java Lessons** — interactive Java with live code execution
- **12 DSA Lessons** — data structures & algorithms with PHP implementations
- **10 DBMS Theory Lessons** — database design, normalization, ER diagrams, transactions, security
- **10 MySQL Lessons** — SQL from basics to PHP integration
- **16 Interactive PHP Lessons** with a live "Try It Yourself" code editor
- **Syntax Highlighting** — PHP, Python, and Java code examples are color-coded
- **Fully Offline** — no internet connection required
- **Portable** — copy the folder to any computer, run setup + start script
- **Bundled PHP** — PHP binary included, no pre-installation needed
- **Smart Setup** — auto-downloads dependencies, checks system status
- **System Status Page** — check which sandboxes are available at `/status`

## Programming Logic Lessons

| # | Topic |
|---|-------|
| 1 | What is Programming Logic? |
| 2 | Computational Thinking |
| 3 | Flowcharts & Pseudocode |
| 4 | Sequential Thinking |
| 5 | Conditional Logic |
| 6 | Loop Thinking |
| 7 | Functions & Modularity |
| 8 | Thinking About Data |
| 9 | Debugging Thinking |
| 10 | Algorithmic Thinking |
| 11 | Pattern Recognition & Abstraction |
| 12 | A Problem-Solving Framework |

## Python Lessons

| # | Topic |
|---|-------|
| 1 | Introduction to Python |
| 2 | Python Syntax Basics |
| 3 | Variables & Data Types |
| 4 | Python Operators |
| 5 | Conditional Statements |
| 6 | Loop Statements |
| 7 | Lists & Tuples |
| 8 | Dictionaries & Sets |
| 9 | String Mastery |
| 10 | Functions |
| 11 | Object-Oriented Programming |
| 12 | File Handling & Error Handling |

## Java Lessons

| # | Topic |
|---|-------|
| 1 | Introduction to Java |
| 2 | Java Syntax Basics |
| 3 | Variables & Data Types |
| 4 | Java Operators |
| 5 | Conditional Statements |
| 6 | Loop Statements |
| 7 | Arrays & Strings |
| 8 | Methods |
| 9 | Object-Oriented Programming |
| 10 | Inheritance & Polymorphism |
| 11 | Collections & Generics |
| 12 | File Handling & Exception Handling |

## Data Structures & Algorithms Lessons

| # | Topic |
|---|-------|
| 1 | Introduction to Data Structures & Algorithms |
| 2 | Big O Notation |
| 3 | Arrays & Strings |
| 4 | Linked Lists |
| 5 | Stacks |
| 6 | Queues |
| 7 | Hash Tables |
| 8 | Binary Trees & BST |
| 9 | Graphs |
| 10 | Sorting Algorithms |
| 11 | Searching Algorithms |
| 12 | Dynamic Programming |

## DBMS Theory Lessons

| # | Topic |
|---|-------|
| 1 | Introduction to DBMS |
| 2 | Database Models |
| 3 | Entity-Relationship Diagrams |
| 4 | Relational Database Concepts |
| 5 | Normalization |
| 6 | Advanced Normalization |
| 7 | SQL Data Definition Language |
| 8 | Transaction Management |
| 9 | Database Security |
| 10 | Database Design Project |

## MySQL Lessons

| # | Topic |
|---|-------|
| 1 | Introduction to MySQL |
| 2 | Databases and Tables |
| 3 | Inserting Data |
| 4 | Selecting Data |
| 5 | SQL Functions |
| 6 | Updating Data |
| 7 | Deleting Data |
| 8 | MySQL JOINs |
| 9 | Indexes and Performance |
| 10 | PHP & MySQL Integration |

## PHP Lessons

| # | Topic |
|---|-------|
| 1 | Introduction to PHP |
| 2 | PHP Syntax Basics |
| 3 | PHP Comments |
| 4 | PHP Variables |
| 5 | PHP Data Types |
| 6 | PHP Strings |
| 7 | PHP Numbers |
| 8 | PHP Operators |
| 9 | PHP Conditionals |
| 10 | PHP Loops |
| 11 | PHP Arrays |
| 12 | PHP Functions |
| 13 | PHP Superglobals |
| 14 | PHP Forms |
| 15 | PHP Sessions & Cookies |
| 16 | PHP File Handling |

## Transferring to Another Computer

1. Copy the entire folder to the new computer (or download from GitHub)
2. Run `./setup.sh` (Mac/Linux) or `setup.bat` (Windows) — installs PHP if missing
3. Run `./start-server.sh` (Mac/Linux) or `start-server.bat` (Windows)
4. Open `http://localhost:8000`

## Sandboxes

Each language sandbox requires its runtime to be installed:

| Language | Requirement | Install Command |
|----------|-------------|-----------------|
| PHP | Bundled (no install needed) | — |
| Python 3 | `python3` in PATH | `brew install python3` |
| Java | JDK 17+ | `brew install openjdk@17` |

Check status at **http://localhost:8000/status**

## Troubleshooting

- **"php: command not found"** — Run `./setup.sh` to auto-install PHP
- **Python sandbox not working** — Install Python: `brew install python3`
- **Java sandbox not working** — Install JDK: `brew install openjdk@17`
- **Port 8000 already in use** — change the port in `start-server.sh` / `start-server.bat`
- **Blank page** — check that PHP is working: `./bin/php -v`
