<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">User Registration Form</h2>

    <?php
    // Database Connection
    $servername = "127.0.0.1"; // Use 127.0.0.1 if localhost fails
    $username = "root";
    $password = ""; // Keep empty if no password
    $dbname = "user_registration";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
    }
    
    // Handle Form Submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $benefits = isset($_POST['benefits']) ? implode(", ", $_POST['benefits']) : '';

        // File Upload Handling
        $profile_photo = $_FILES['profile_photo']['name'];
        $passport_copy = $_FILES['passport_copy']['name'];

        // Define upload paths
        $target_dir = "uploads/";
        move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_dir . $profile_photo);
        move_uploaded_file($_FILES["passport_copy"]["tmp_name"], $target_dir . $passport_copy);

        // Insert Data into MySQL
        $sql = "INSERT INTO users (first_name, last_name, age, gender, profile_photo, passport_copy, benefits)
                VALUES ('$first_name', '$last_name', '$age', '$gender', '$profile_photo', '$passport_copy', '$benefits')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Registration successful!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
    ?>

    <!-- User Registration Form -->
    <form method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gender</label><br>
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Photo (Image File)</label>
            <input type="file" name="profile_photo" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Passport Copy (PDF File)</label>
            <input type="file" name="passport_copy" class="form-control" accept=".pdf" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Benefits</label><br>
            <input type="checkbox" name="benefits[]" value="Air Ticket"> Air Ticket
            <input type="checkbox" name="benefits[]" value="Leave Salary"> Leave Salary
            <input type="checkbox" name="benefits[]" value="Family Insurance"> Family Insurance
            <input type="checkbox" name="benefits[]" value="Petrol Allowance"> Petrol Allowance
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
