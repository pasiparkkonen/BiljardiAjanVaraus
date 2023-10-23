<?php
// Database connection parameters
include('config.php');

// Get user input
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli($host, $usernameadmin, $passwordadmin, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database to check if the user exists
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User exists, return success
        echo "success";
        header("Location: ajanvaraus.php");
    } else {
        // User does not exist, return failure
        echo "failure";
        header("Location: registeration.php");
    }

    $conn->close();
} else {
    echo "Missing username or password.";
}
?>
