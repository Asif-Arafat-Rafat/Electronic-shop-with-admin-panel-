<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cstyle.css">
    <title>Cart</title>
    <style>
        /* Add custom CSS for buttons */
        .payment-buttons {
            text-align: center;
            margin-top: 20px;
        }
        
        .payment-buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .payment-buttons button:hover {
            background-color: #0056b3;
        }

        .remove-button {
            background-color: #dc3545; /* Red color */
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Start or resume the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Include database connection
include_once "./backend/connect.php";

// Check if the remove button is clicked
if(isset($_POST['remove'])) {
    $remove_id = $_POST['remove'];
    // Remove the product from the cart
    $remove_query = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $remove_stmt = $conn->prepare($remove_query);
    $remove_stmt->bind_param("ii", $_SESSION['id'], $remove_id);
    $remove_stmt->execute();
    $remove_stmt->close();
}

// Retrieve user's cart items from the database with quantity
$user_id = $_SESSION['id'];
$query = "SELECT ps.id, ps.image, ps.info1, ps.price, ps.type, COUNT(c.product_id) AS quantity
          FROM cart c
          JOIN product_section ps ON c.product_id = ps.id
          WHERE c.user_id = ?
          GROUP BY c.product_id";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Initialize total price
$total_price = 0;

?>

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Product Info</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th> <!-- Added column for Remove button -->
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            $total_price += $row['price'] * $row['quantity'];
            ?>
            <tr>
                <td><img src="./images/<?php echo $row['type'] . '/' . $row['image']; ?>" alt="Product Image" class="product-image"></td>
                <td>
                    <p><?php echo $row['info1']; ?></p>
                </td>
                <td>$<?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>
                    <!-- Form with Remove button -->
                    <form method="post">
                        <!-- Hidden input to pass product id to remove -->
                        <input type="hidden" name="remove" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="remove-button">Remove</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<div class="total">
    <p>Total Price: <?php echo $total_price; ?></p>
</div>

<div class="payment-buttons">
    <button onclick="payOnline()">Pay Online</button>
    <button onclick="cashOnDelivery()">Cash on Delivery</button>
</div>

<script>
    function payOnline() {
        // Redirect to payment gateway or handle online payment
        alert('Redirecting to payment gateway..');
        window.location.href = "./confirm.php?p=1&tp=<?php echo $total_price;?>";
    }

    function cashOnDelivery() {
        // Handle cash on delivery option
        alert('Your order will be placed for cash on delivery.');
        window.location.href = "./confirm.php?p=0&tp=<?php echo $total_price;?>";
    }
</script>

</body>
</html>
