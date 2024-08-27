<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit;
}

include 'db.php'; // Include database connection

$query = "SELECT * FROM complaints ORDER BY date_submitted DESC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="support.css">
    <title>Admin - Complaints Management</title>
</head>
<body>
    <header>
        <h1>Admin Complaints Management</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a> |
            <a href="manage_users.php">Users</a> |
            <a href="manage_orders.php">Orders</a> |
            <a href="manage_complaints.php">Complaints</a>
        </nav>
    </header>
    <main>
        <h2>Tất cả vấn đề</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Vấn đề</th>
                <th>Ngày tạo</th>
              
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['complaint']); ?></td>
                        <td><?php echo $row['date_submitted']; ?></td>
                        <td>
                            <a href="view_complaint.php?id=<?php echo $row['id']; ?>">View</a> |
                            <a href="edit_complaint.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="delete_complaint.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không tìm thấy vấn đề</td>
                </tr>
            <?php endif; ?>
        </table>
    </main>
</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
