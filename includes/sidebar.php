<aside class="bg-light border-right p-3" style="width: 250px; height: 100vh; float: left;">
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
        
        <?php if (isset($_SESSION['admin_id'])): // Check if admin is logged in ?>
            <li class="nav-item"><a class="nav-link" href="add_user.php">Add User</a></li>
        <?php endif; ?>
    </ul>
</aside>
    