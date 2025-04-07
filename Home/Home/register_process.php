<?php
// Start session
session_start();

// Include database connection
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $firstName = $conn->real_escape_string(trim($_POST['firstName']));
    $lastName = $conn->real_escape_string(trim($_POST['lastName']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $phone = $conn->real_escape_string(trim($_POST['phone']));
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    
    // Validation
    $errors = [];
    
    // Check if email already exists
    $checkEmail = $conn->query("SELECT id FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $errors[] = "Email address already registered";
    }
    
    // Validate first name
    if (empty($firstName)) {
        $errors[] = "First name is required";
    }
    
    // Validate last name
    if (empty($lastName)) {
        $errors[] = "Last name is required";
    }
    
    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    // Validate password
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }
    
    // Check if passwords match
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }
    
    // If no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into database
        $sql = "INSERT INTO users (first_name, last_name, email, phone, password) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$hashedPassword')";
        
        if ($conn->query($sql) === TRUE) {
            // Registration successful
            $response = [
                'status' => 'success',
                'message' => 'Registration successful! Redirecting to login page...'
            ];
        } else {
            // Registration failed
            $response = [
                'status' => 'error',
                'message' => 'Registration failed: ' . $conn->error
            ];
        }
    } else {
        // Return validation errors
        $response = [
            'status' => 'error',
            'message' => implode('<br>', $errors)
        ];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// If not POST request, redirect to registration page
header("Location: register.html");
exit;
?>