<?php
session_start();
include('connection.php');

// Check if the form is submitted
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "User ID received: " . $userId;
    // Get form data
    $userId = $_POST['userId'];
    $totalPayment = $_POST['total'];
    $timestamp = date('Y-m-d H:i:s'); // Current timestamp

    // Include your database connection file


    // Insert data into your database (assuming 'payments' table)
    $stmt = $conn->prepare("INSERT INTO payments (user_id, total_payment, payment_date) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $userId, $totalPayment, $timestamp);

    if ($stmt->execute()) {
        echo "Payment processed successfully";
    } else {
        echo "Error processing payment: " . $conn->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle if the form wasn't submitted properly
    echo "Form submission error";
}
?>