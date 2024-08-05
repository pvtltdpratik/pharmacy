<?php
// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "omos_db"; // Your database name
require "back.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching form data
$first_name = $_POST['c_fname'];
$last_name = $_POST['c_lname'];
$email = $_POST['c_email'];
$subject = $_POST['c_subject'];
$message = $_POST['c_message'];

// Inserting data into the database
$sql = "INSERT INTO feedback (first_name, last_name, email, subject, message)
        VALUES ('$first_name', '$last_name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "message sent successfully <br>";
    generateBackButton();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
