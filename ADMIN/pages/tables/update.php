<?php
// Include your database connection file here
include("dbconnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['orderID']) && isset($_POST['newStatus'])) {
    $orderID = $_POST['orderID'];
    $newStatus = $_POST['newStatus'];

    // Update the order status in the database
    $sql = "UPDATE order_booking SET status = '$newStatus' WHERE id = $orderID";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location:ordered.php");
    } else {
        echo "Error updating order status: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>