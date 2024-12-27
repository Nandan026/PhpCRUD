<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and get form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Query the admin table instead of users table
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the password using password_verify
        if (password_verify($password, $row['password'])) {
            // Start a session and store admin's user ID
            session_start();
            $_SESSION['admin_id'] = $row['id'];
            header("Location: dashboard.php"); // Redirect to the dashboard
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Admin not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
<div class="container mt-5">
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post" action="index.php">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>
</body>
</html>
