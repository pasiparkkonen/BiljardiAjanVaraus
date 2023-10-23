<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user-selected date, time, location, and username from the form
    $selected_date = $_POST['selected_date'];
    $selected_time = $_POST['selected_time'];
    $selected_location = $_POST['selected_location'];
    $username = $_POST['username'];

    // Validate and process the data, and insert it into the database
    // You should replace the database connection code with your own
    include('config.php');

    // Create a database connection
    $conn = new mysqli($host, $usernameadmin, $passwordadmin, $database);

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL insert query
    $query = "INSERT INTO user_selections (selected_date, selected_time, selected_location, username) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ssss", $selected_date, $selected_time, $selected_location, $username);
        $stmt->execute();
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Redirect the user to a confirmation page or do other processing as needed
        header("Location: ajanvaraus.php");
        exit;
    } else {
        echo "Insertion failed.";
    }
}
?>