<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'test');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create 'registration' table if not exists
$sql = "CREATE TABLE IF NOT EXISTS registration (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message text(255) NOT NULL,
    number bigint(16) NOT NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table 'registration' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$message = $_POST['message'];
$number = $_POST['number'];

// Prepare and execute the SQL query for data insertion
$stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, email, message, number) VALUES (?, ?, ?, ?, ?)");

// Check if the prepare statement succeeded
if ($stmt) {
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $message, $number);

    if ($stmt->execute()) {
        echo "Registration successfully...";
    } else {
        echo "Error executing the statement: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing the statement: " . $conn->error;
}

// Close the database connection
$conn->close();
?>