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
    <link rel="stylesheet" href="../css/admin-panel.css">
    <title>Admin panel</title>
</head>
<body>
    <?php
    include "./admin_section/nav.php";
    echo '<div class="page">';
    include "./admin_section/leftbar.php";
    ?>
    <div class="main">
        <?php
        require('../backend/connect.php');
        $sql = 'SELECT * FROM orders LEFT JOIN customers ON orders.customer_id = customers.id';
        $query  = mysqli_query($conn,$sql);
        ?>
        <div class="section white-text" style="">
            <div class="admin-header">
                <h3>Orders</h3>
            </div>
            <?php
                if (isset($_SESSION['msg'])) {
                    echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
                    <div class="col s12">
                    <h6>' . $_SESSION['msg'] . '</h6>
                    </div>
                    </div></div>';
                    unset($_SESSION['msg']);
                }
            ?>
            <div>
                <table >
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User Name</th>
                            <th>paid</th>
                            <th>price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($key = mysqli_fetch_assoc($query)){
                            if($key['delivered']==0){
                                echo '
                                    <tr>
                                    <td>'.$key['order_id'].'</td>
                                    <td>'.$key['name'].'</td>
                                ';
                                if ($key['paid']==0){
                                    echo '<td>Unpaid</td>';
                                }
                                else{
                                    echo '<td>Paid</td>';
                                }
                                echo '
                                    <td>'.$key['total_price'].'</td>
                                    </tr>
                                ';}
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
