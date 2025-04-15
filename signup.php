<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and escape form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $company = $conn->real_escape_string($_POST['company'] ?? '');

    // Check if email already exists
    $check_sql = "SELECT id FROM users WHERE email = '$email'";
    $check_result = $conn->query($check_sql);

    if ($check_result && $check_result->num_rows > 0) {
        $_SESSION['signup_error'] = "Email is already registered.";
        header("Location: index.php");
        exit;
    } else {
        // Insert new user
        $insert_sql = "INSERT INTO users (name, email, password, company) 
                       VALUES ('$name', '$email', '$password', '$company')";

        if ($conn->query($insert_sql)) {
            $user_id = $conn->insert_id;

            // Set session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['company'] = $company;

            header("Location: index.php");
            exit;
        } else {
            $_SESSION['signup_error'] = "Signup failed. Please try again.";
            header("Location: index.php");
            exit;
        }
    }
}
?>
