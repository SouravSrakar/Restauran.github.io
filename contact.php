<?php

session_start();
if(empty($_SESSION['ses_user'])){
    header("Location:../login/index.php");
}
else{
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resturent";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get feedback data from the POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query to insert feedback data into the database
    $sql = "INSERT INTO feedback (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
        header("Location:index.php");
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
}
?>
