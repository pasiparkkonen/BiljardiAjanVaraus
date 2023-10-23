<?php
// Include the database connection file (config.php)
include('config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $email = $_POST['email'];

    // Connect to the database
    $conn = new mysqli($host, $usernameadmin, $passwordadmin, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create a SQL query to insert user information into the 'reginfo' table
    $query = "INSERT INTO reginfo (username, password, email) VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Bind parameters and execute the query
        $stmt->bind_param("sss", $username, $password, $email);
        $stmt->execute();

        // Close the prepared statement
        $stmt->close();

        // Send a registration success email using Mailtrap
        $to = $email;
        $subject = 'Registration Successful';
        $message = 'Thank you for registering!';

        // Use the appropriate Mailtrap SMTP settings here
        $headers = 'From: server_test@gmail.com' . "\r\n" .
            'Reply-To: no-reply@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo 'Email sent successfully.';
            // Redirect to a success page or other appropriate page
            header('Location: ajanvaraus.php');
        } else {
            echo 'Email sending failed.';
        }
        exit;
    } else {
        // Handle the case where the statement couldn't be prepared
        echo "Registration failed. Please try again later.";
    }

    // Close the database connection
    $conn->close();
}
?>