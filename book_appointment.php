<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "omos_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$patientId = $_POST['patientName'];
$doctorId = $_POST['doctor'];
$testId = $_POST['test'];
$appointmentDate = $_POST['appointmentDate'];
$s = "pending";
$stmt = $conn->prepare("INSERT INTO appointment_user (appointment_id, patient_id, paitent_name, doctor_id, test_id, appointment_date, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
$stmt->bind_param("iisiss", $appointmentId, $patientId, $_POST['patientName'], $doctorId, $testId, $appointmentDate);


// Set parameters and execute the statement

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Danger Bootstrap Button</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                /* Optional: Add custom styles here */
            </style>
            </head>
            <body>

            <h1></h1>Appointment Booked Successfully</h1>


            <a type="button" href="index_pay.html" class="btn btn-danger">Pay Now</a>

            <!-- Bootstrap JS (Optional, only if you need JavaScript features) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            </body>
            </html>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
