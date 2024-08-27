<?php
// manage_orders.php
include('db.php');

// Handle adding a new order
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_order'])) {
    $username = $_POST['username'];
    $credit = $_POST['credit'];
    $id_account = $_POST['id_account'];

    $sql = "INSERT INTO orderacc (username, credit, id_account) VALUES ('$username', '$credit', '$id_account')";
    if ($conn->query($sql) === TRUE) {
        echo "New order added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle deleting an order
if (isset($_GET['delete'])) {
    $orderid = $_GET['delete'];
    $sql = "DELETE FROM orderacc WHERE orderid = $orderid";
    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully!";
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}

// Fetch orders from the database
$sql = "SELECT * FROM orderacc";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Quản lý đơn đặt hàng</h1>

    <h2>Thêm đơn đặt hàng mới</h2>
    <form method="POST" action="manage_orders.php">
        <label for="username">Tài khoản:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="credit">Số tiền:</label>
        <input type="number" id="credit" name="credit" required>
        <br>
        <label for="id_account">ID tài khoản:</label>
        <input type="number" id="id_account" name="id_account" required>
        <br>
        <button type="submit" name="add_order">Thêm đơn hàng</button>
    </form>

    <h2>Danh sách đơn hàng</h2>
    <table>
        <tr>
            <th>ID đơn hàng</th>
            <th>Tài khoản</th>
            <th>Số tiền</th>
            <th>ID tài khoản</th>
            <th>Hành động</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['orderid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['credit'] . "</td>";
                echo "<td>" . $row['id_account'] . "</td>";
                echo "<td><a href='manage_orders.php?delete=" . $row['orderid'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không tìm thấy đơn hàng nào</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
