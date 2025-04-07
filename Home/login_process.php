<?php
// Start session
session_start();

// Include database connection
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']) ? true : false;
    
    // Validation
    $errors = [];
    
    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    
    // If no errors, proceed with login
    if (empty($errors)) {
        // Get user from database
        $sql = "SELECT id, first_name, last_name, email, password FROM users WHERE email = '$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a new session
                session_regenerate_id();
                
                // Store user data in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                
                // Handle "Remember Me" functionality
                if ($remember) {
                    // Generate a secure token
                    $token = bin2hex(random_bytes(32));
                    
                    // Store token in database (implementation depends on your preference)
                    // This is a simplified version
                    $user_id = $user['id'];
                    $expires = date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60)); // 30 days
                    
                    // Here you would store the token in a separate table
                    // For simplicity, we'll just set cookies
                    
                    // Set cookies
                    setcookie('remember_user', $user['email'], time() + (30 * 24 * 60 * 60), '/');
                    setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/');
                }
                
                // Login successful
                $response = [
                    'status' => 'success',
                    'message' => 'Login successful! Redirecting...'
                ];
            } else {
                // Invalid password
                $response = [
                    'status' => 'error',
                    'message' => 'Invalid email or password'
                ];
            }
        } else {
            // User not found
            $response = [
                'status' => 'error',
                'message' => 'Invalid email or password'
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

// If not POST request, redirect to login page
header("Location: login.html");
exit;
?>