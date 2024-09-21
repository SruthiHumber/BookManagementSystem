<?php


// Include the Book class
include 'book.php';

// Start the session
session_start();

// Initialize an empty array 
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

// Variable to hold error messages
$errors = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $year = trim($_POST['year']);

    // try-catch to handle exceptions 
    try {
        // Title validation: non-empty 
        if (empty($title)) {
            throw new Exception("Title is required.");
        } 

        // Author validation: non-empty 
        if (empty($author)) {
            throw new Exception("Author is required.");
        } 

        // Year validation: numeric and between a valid range
        if (empty($year)) {
            throw new Exception("Publication year is required.");
        } elseif (!is_numeric($year)) {
            throw new Exception("Year must be a valid number.");
        } elseif ($year < 1900 || $year > date("Y")) {
            throw new Exception("Year must be between 1900 and the current year.");
        }
        
        // Instantiate a new Book object
        $book = new Book($title, $author, $year);

        // Store the Book object in the session array
        $_SESSION['books'][] = $book;

        // Display success message
        echo "<h3>Book added!!</h3>";
    } catch (Exception $e) {
        // Display error message
        $errors = $e->getMessage();
    }
}

// Retrieve books from session for display
$books = $_SESSION['books'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        color: black; 
        margin: 0;
        padding: 20px;
    }

    h2 {
        color: #000080; 
    }

    form {
        background-color: #e6f7ff; 
        border: 1px solid #000080; 
        padding: 50px;
        width: 300px;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: black; 
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #000080; 
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #000080; 
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #005f99; 
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #000080; 
    }

    th {
        background-color: #87CEEB; 
        color: black;
        padding: 10px;
        text-align: left;
    }

    td {
        background-color: #e6f7ff; 
        padding: 10px;
    }

    p {
        color: black; 
    }

    .error {
        color: red; 
    }
</style>

<body>

<h2>Book Information Form</h2>

<!-- Display error message if any -->
<?php if (!empty($errors)): ?>
    <p style="color:red;"><?php echo htmlspecialchars($errors); ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br><br>
    
    <label for="author">Author:</label><br>
    <input type="text" id="author" name="author"><br><br>
    
    <label for="year">Publication Year:</label><br>
    <input type="text" id="year" name="year"><br><br>
    
    <input type="submit" value="Submit">
</form>

<h2>Books List</h2>

<!-- Display the list of books in a table format -->
<?php if (!empty($books)): ?>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($books as $book) {
                echo $book->displayBook();
            }
            ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No books added.</p>
<?php endif;
 ?>

</body>
</html>
