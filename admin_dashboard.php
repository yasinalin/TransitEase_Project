<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Manage System</h2>
            <div>
                <button onclick="window.location.href='add_bus_routes.php'">Add Bus Routes</button>
                <button onclick="window.location.href='add_employees.php'">Add Employees</button>
                <button onclick="window.location.href='add_metro_routes.php'">Add Metro Routes</button>
                <button onclick="window.location.href='view_bus_income.php'">View Bus Income</button>
                <button onclick="window.location.href='view_metro_income.php'">View Metro Income</button>
                <button onclick="window.location.href='view_employee_info.php'">View Employee Info</button>
            </div>
        </section>
    </main>
    <footer>
        <p>© 2025 Dhaka City Transit System</p>
    </footer>
</body>
</html>
