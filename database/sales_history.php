<?php
// sales_history.php
include('db.php');

// Fetch sales history from the database
$sql = "SELECT orderacc.orderid, orderacc.username, orderacc.credit, orderacc.id_account, accounts.taikhoan, accounts.rank, accounts.gia 
        FROM orderacc 
        LEFT JOIN accounts ON orderacc.id_account = accounts.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales History</title>
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
    <h1>lịch sử bán</h1>

    <table>
        <tr>
            <th>ID người mua</th>
            <th>Tài khoản</th>
            <th>Số tiền</th>
            <th>ID tài khoản</th>
            <th>tên tài khoản</th>
            <th>Rank</th>
            <th>Giá (VND)</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['orderid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['credit'] . "</td>";
                echo "<td>" . $row['id_account'] . "</td>";
                echo "<td>" . $row['taikhoan'] . "</td>";
                echo "<td>" . $row['rank'] . "</td>";
                echo "<td>" . $row['gia'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không tìm thấy hồ sơ bán hàng</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
