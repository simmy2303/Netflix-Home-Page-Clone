<?php
// Connect to MySQL database
$servername = '127.0.0.1';  // Update with your MySQL server host
$username = "root";         // Update with your MySQL username
$password = "";             // Update with your MySQL password
$dbname = "netflix_emails";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the form
    $email = $_POST["email"];

    // Insert the email into the 'subscribers' table
    $sqlSubscribers = "INSERT INTO subscribers (email) VALUES ('$email')";
    if ($conn->query($sqlSubscribers) === TRUE) {
        echo "Email submitted successfully to 'subscribers' table!<br>";
    } else {
        echo "Error: " . $sqlSubscribers . "<br>" . $conn->error;
    }

    // Insert the email into the 'emails' table
    $sqlEmails = "INSERT INTO emails (email) VALUES ('$email')";
    if ($conn->query($sqlEmails) === TRUE) {
        echo "Email stored successfully in 'emails' table!";
    } else {
        echo "Error: " . $sqlEmails . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

