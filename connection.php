<?php
// Database configuration
$servername = "localhost";   // Host (use "127.0.0.1" if "localhost" has issues)
$username   = "xperutxk_car_rent";	
// Default XAMPP/WAMP username
$password   = "Almarsaa@112233";            // Default password is empty
$database   = "xperutxk_car_rental"; // Replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    // echo "✅ Connected successfully to MySQL Database";
}
?>
