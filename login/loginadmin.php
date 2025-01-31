<?php
// login.php

// Database connection details
$servername = "localhost";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "user_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prepare SQL query to check if the username exists
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, now check the password
        $user = $result->fetch_assoc();
        
        // For simplicity, we compare passwords in plain text (use password_hash() for real apps)
        if ($user['password'] === $inputPassword) {
            // Start the session and store the username
            session_start();
            $_SESSION['username'] = $user['username'];

            // Redirect to dashboard
            header("Location: dashboardadmin.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
?>
