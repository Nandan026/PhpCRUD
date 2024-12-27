<?php
include("db.php");

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete user from the database
    $query = "DELETE FROM users WHERE id = '$user_id'";

    if (mysqli_query($conn, $query)) {
        // Redirect to users page if delete is successful
        header("Location: users.php");
        exit();
    } else {
        // Show error if delete fails
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect back to users list if 'id' is not set
    header("Location: users.php");
    exit();
}

