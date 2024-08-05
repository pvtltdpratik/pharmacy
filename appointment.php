<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 mb-5">
    <h1>Book Appointment</h1>
    <form action="book_appointment.php" method="POST" onsubmit="return validateForm()">
        <div class="mb-3">
            <label for="patientName" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="patientName" name="patientName" required>
        </div>
        <div class="mb-3">
            <label for="doctor" class="form-label">Doctor</label>
            <select class="form-select" id="doctor" name="doctor" required>
                <option selected disabled>Select Doctor</option>
                <option value="1">Dr. Sunita Khatre</option>
                <option value="2">Dr. Shubham Patil</option>
                <!-- Add other doctors as options -->
            </select>
        </div>
        <div class="mb-3">
            <label for="test" class="form-label">Test</label>
            <select class="form-select" id="test" name="test" required>
                <option selected disabled>Select Test</option>
                <option value="1">Blood Test</option>
                <option value="2">Urin Test</option>
                <!-- Add other tests as options -->
            </select>
        </div>
        <div class="mb-3">
            <label for="appointmentDate" class="form-label">Appointment Date</label>
            <input type="datetime-local" class="form-control" id="appointmentDate" name="appointmentDate" required>
        </div>
        <button type="submit" class="btn btn-danger">Book Appointment</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
function validateForm() {
    var patientName = document.getElementById("patientName").value;
    var test = document.getElementById("test").value;
    var appointmentDate = new Date(document.getElementById("appointmentDate").value);
    var currentDate = new Date();
    
    // Check if patient name is empty
    if (patientName.trim() === "") {
        alert("Please enter patient name.");
        return false;
    }

    // Check if test is selected
    if (test.trim() === "") {
        alert("Please select a test.");
        return false;
    }

    // Check if appointment date is in the past or current date
    if (appointmentDate <= currentDate) {
        alert("Appointment date must be in the future.");
        return false;
    }

    return true;
}
</script>
</body>
</html>
