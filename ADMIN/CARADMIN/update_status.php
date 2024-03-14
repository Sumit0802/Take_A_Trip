<?php
// Assuming you have a connection to the database in your connection.php file
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input to prevent SQL injection
    $tripId = mysqli_real_escape_string($con, $_POST["tripId"]);
    $newStatus = mysqli_real_escape_string($con, $_POST["newStatus"]);

    // Update the status in the west_india table
    $updateSql = "UPDATE cars SET car_availability = '$newStatus' WHERE car_id = '$tripId'";
    $updateResult = mysqli_query($con, $updateSql);

    // Check if the update was successful
    if ($updateResult) {
        header("Location: http://localhost/tt/admin/caradmin/caradminshow.php"); // Redirect back to the original page
        exit();
    } else {
        echo "Failed to update status. Please try again.";
    }
} else {
    // If the request method is not POST, handle accordingly (e.g., redirect or display an error message)
    echo "Invalid request method.";
}

// Close the database connection
?>