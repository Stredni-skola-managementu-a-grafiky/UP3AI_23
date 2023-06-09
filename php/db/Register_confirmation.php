<?php

require "database_log.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture the input values
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $created = date("Y-m-d H:i:s"); // Replace with your desired value

    // Check if any required field is empty
    if (empty($name) || empty($password) || empty($email) || empty($phone)) {
        header("Location:test.php?message=Please fill in all required fields.");
        exit;
    }

    // Check if email already exists
    $checkSql = "SELECT COUNT(*) FROM User WHERE email = ?";
    $checkStmt = $database_log->prepare($checkSql);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result(); // Store the result set
    $checkStmt->bind_result($emailCount);
    $checkStmt->fetch();
    $checkStmt->close(); // Close the statement

    if ($emailCount > 0) {
        header("Location:test.php?message=Email exists");
        exit;
    }

    if (empty($name) || empty($password) || empty($email) || empty($phone)) {
        header("Location:test.php?message=Please fill in all required fields.");
        
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the INSERT statement
    $insertSql = "INSERT INTO User (name, password, email, phone, created) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = $database_log->prepare($insertSql);
    $insertStmt->bind_param("sssss", $name, $password_hash, $email, $phone, $created);

    if ($insertStmt->execute()) {
        header("Location: success.php");
    } else {
        echo "Error adding the new line: " . $insertStmt->error;
    }
}
?>