# Book Management System

## Project Overview

The Book Management System is a simple web application built using PHP that allows users to collect and manage information about books. Users can add books by providing the title, author, and publication year. The application validates the input data, handles errors, and displays a list of all added books in a structured format.

## Features

- **HTML Form**: Collects book details (title, author, and publication year).
- **Object-Oriented Programming**: Implements a `Book` class with methods to manage book attributes.
- **Input Validation**: Ensures all fields are filled and valid (e.g., title and author lengths, numeric year).
- **Error Handling**: Uses try-catch blocks to display appropriate error messages for invalid input.
- **Display Book List**: Shows all added books in a table format, including a message if no books have been added yet.


## File Structure

BookManagementSystem
── index.php # Main entry point of the application 
── book.php # Contains the Book class definition

## How to Run the Book Management System
Clone the Repository:

Open your terminal or command prompt.
Run:
bash
Copy code
git clone <repository-url>
cd BookManagementSystem

Set Up Your Web Server:

Ensure you have a local web server environment ( XAMPP ) installed.
Place the BookManagementSystem folder in your web server’s document root directory ( htdocs for XAMPP).

Start the Web Server:
Launch your web server (e.g., start Apache in XAMPP).
Access the Application:

Open a web browser.
Navigate to:

http://localhost/BookManagementSystem/index.php

Use the Application:

Fill out the form with the book's title, author, and publication year.
Click "Submit" to add the book.
View the list of added books displayed below the form.
