<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('location:./index.php');
}
include '../backend/admin_dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./prodet.css"> <!-- Assuming you have a CSS file for admin panel styles -->
    <title>Product View</title>
</head>
<body>
    <?php include "./admin_section/nav.php"; ?>
    <div class="page">
        <?php include "./admin_section/leftbar.php"; ?>
        <div class="main">
            <div class="section white-text">
                <div class="admin-header">
                    <h3>Product View</h3>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Info 1</th>
                                <th>Info 2</th>
                                <th>Info 3</th>
                                <th>Info 4</th>
                                <th>Info 5</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require('../backend/connect.php');
                            $query = "SELECT * FROM product_section";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['type'] . "</td>";
                                echo "<td>" . $row['info1'] . "</td>";
                                echo "<td>" . $row['info2'] . "</td>";
                                echo "<td>" . $row['info3'] . "</td>";
                                echo "<td>" . $row['info4'] . "</td>";
                                echo "<td>" . $row['info5'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td><button onclick=\"removeProduct(" . $row['id'] . ")\">Remove</button></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeProduct(productId) {
            if (confirm("Are you sure you want to remove this product?")) {
                window.location.href = "remove_product.php?id=" + productId;
            }
        }
    </script>
</body>
</html>
