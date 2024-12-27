<?php
session_start();

// Check if the admin is logged in by verifying the session variable
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
<div class="container-fluid">
    <?php include("includes/sidebar.php"); ?>
    <main class="p-4">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Here, you can manage users and perform admin tasks.</p>
    </main>
</div>
</body>
</html>
