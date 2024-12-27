<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Insert data into the admin table
    $query = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if (mysqli_query($conn, $query)) {
        // Redirect to login page after successful signup
        header("Location: index.php");
    } else {
        echo "something is wrong!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
<div class="container mt-5">
    <h2>Signup</h2>
    <form method="post" action="signup.php">
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
        <button type="submit" class="btn btn-primary mt-3">Signup</button>
    </form>
</div>
</body>
</html>
