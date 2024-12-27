<?php
include("db.php");

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user data from the 'users' table
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // User data fetched successfully
        $name = $row['name'];
        $email = $row['email'];
    } else {
        // If no user is found, redirect back to user list
        header("Location: users.php");
        exit();
    }
} else {
    // Redirect if 'id' is not set
    header("Location: users.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated form data
    $updated_name = mysqli_real_escape_string($conn, $_POST['name']);
    $updated_email = mysqli_real_escape_string($conn, $_POST['email']);

    // Update user data in the database
    $query = "UPDATE users SET name = '$updated_name', email = '$updated_email' WHERE id = '$user_id'";

    if (mysqli_query($conn, $query)) {
        // Redirect to users page if update is successful
        header("Location: users.php");
        exit();
    } else {
        // Show error if update fails
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
<div class="container-fluid">
    <?php include("includes/sidebar.php"); ?>
    <main class="p-4" style="margin-left: 260px; padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit User</h2>  
                <form method="post" action="edit_user.php?id=<?= $user_id ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name)?>" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email)?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update User</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>
