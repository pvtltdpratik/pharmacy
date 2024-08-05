<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which button was clicked
    if (isset($_POST['accept'])) {
        updateStatus($_POST['appointment_id'], 'Accepted');
    } elseif (isset($_POST['reject'])) {
        updateStatus($_POST['appointment_id'], 'Rejected');
    }
}

// Function to update status in the database
function updateStatus($appointmentId, $status) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "omos_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute statement to update status
    $stmt = $conn->prepare("UPDATE appointment_user SET status = ? WHERE appointment_id = ?");
    $stmt->bind_param("si", $status, $appointmentId);
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    // Redirect back to appointments page
    header("Location: appointments.php");
    exit();
}
?>
