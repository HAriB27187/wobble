<?php
// Start session
session_start();

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Redirect if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        // Check for remember me cookie
        if (isset($_COOKIE['remember_user']) && isset($_COOKIE['remember_token'])) {
            // Implement your remember me logic here
            // This would validate the token from a database
            // For simplicity, we're just redirecting to login
            
            header("Location: login.html");
            exit;
        } else {
            header("Location: login.html");
            exit;
        }
    }
    return true;
}

// Get current user ID
function getCurrentUserId() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

// Get current user name
function getCurrentUserName() {
    return isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
}

// Get current user email
function getCurrentUserEmail() {
    return isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;
}
?>