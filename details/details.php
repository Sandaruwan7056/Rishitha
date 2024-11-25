<?php
// Include the connection file to your database
include('../includes/connection.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and assign POST data
    $name = htmlspecialchars($_POST['name']);
    $attending = htmlspecialchars($_POST['attending']);
    $guests = (int)$_POST['guests'];  // Convert to integer
    $message = htmlspecialchars($_POST['message']);

    // SQL query to insert the data into the database
    $query = "INSERT INTO rsvp (name, attending, guests, message) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssis", $name, $attending, $guests, $message);
        $stmt->execute();
        $stmt->close();
        echo "RSVP submitted successfully!";
    } else {
        echo "Error submitting RSVP: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
