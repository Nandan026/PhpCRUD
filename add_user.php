<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}

include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Simple insert query without prepared statements
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    // Execute the query
    if ($result) {
        header("Location: users.php");
        exit();
    } else {
        die("Something went wrong: " . mysqli_error($conn));
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
            <div class="col-md-6">
                <h2>Add User</h2>
                <form method="post" action="add_user.php">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add User</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>
