<?php
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

// Fetch appointments from the database
$query = "SELECT * FROM appointment_user";
$result = $conn->query($query);

// Check if there are any appointments
if ($result->num_rows > 0) {
    // Appointments found, fetch them
    $appointments = array();
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
} else {
    // No appointments found
    $appointments = array();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Appointments</h1>
    <hr>

    <!-- Display appointment details in a table -->
    <table class="table">
        <thead>
            <tr>
                <th>Appointment ID</th>
                <th>Patient Name</th>
                <th>Doctor ID</th>
                <th>Test ID</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?php echo $appointment['appointment_id']; ?></td>
                <td><?php echo $appointment['paitent_name']; ?></td>
                <td><?php echo $appointment['doctor_id']; ?></td>
                <td><?php echo $appointment['test_id']; ?></td>
                <td><?php echo $appointment['appointment_date']; ?></td>
                <td><?php echo $appointment['status']; ?></td>
                <td>
                    <form action="update_status.php" method="post">
                        <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                        <button type="submit" class="btn btn-success" name="accept">Accept</button>
                        <button type="submit" class="btn btn-danger" name="reject">Reject</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php ?>
        </tbody>
    </table>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
