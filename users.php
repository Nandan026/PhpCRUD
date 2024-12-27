<?php
include("db.php");

// Fetch users from the 'users' table
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
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
                <h2>Users</h2>
                
                <!-- Button to link to add_user.php for adding a new user -->
                <a href="add_user.php" class="btn btn-success mb-3">Add User</a>
                
                <!-- Users table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td>
                                <!-- Edit and Delete actions -->
                                <a href="edit_user.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_user.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>
