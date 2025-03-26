<?php
include "db_connected.php"; 

if(isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    
    $query = "INSERT INTO crud (first_name, last_name, email, gender) 
              VALUES ('$first_name', '$last_name', '$email', '$gender')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Inserted Successfully'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
