<?php

require "database_log.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture the input values
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if any required field is empty
    if (empty($username) || empty($password)) {
        header("Location: index.php?login_message=Login failed");
        exit;
    }

    // Retrieve user from database
    $getUserSql = "SELECT password FROM User WHERE name = ?";
    $getUserStmt = $database_log->prepare($getUserSql);
    $getUserStmt->bind_param("s", $username);
    $getUserStmt->execute();
    $getUserStmt->bind_result($storedPassword);
    $getUserStmt->fetch();
    $getUserStmt->close();

    // Verify username and password
    if ($storedPassword !== null && password_verify($password, $storedPassword)) {
        // Username and password are correct, redirect to success page
        header("Location: success.php");
        exit;
    } else {
        // Username or password is incorrect, redirect back to index page with error message
        header("Location: test.php?login_message=Invalid credentials");
        exit;
    }
} else {
    // Redirect back to the index page if accessed directly
    header("Location: index.php");
    exit;
}
?>