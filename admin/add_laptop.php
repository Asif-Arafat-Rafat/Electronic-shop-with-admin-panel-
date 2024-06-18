<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/styleheader.css">
    <title>Laptop Add</title>
</head>
<body>
    <div class="inputform">
    <form action="../backend/add_laptop.php" method="post" enctype="multipart/form-data">
        <div class="login">
        <div class="sec">
            
        <label for="label1">Label1:</label>
        <input class="" type="text" name="label1" >
        <label for="info1">Info1:</label>
        <input class="" type="text" name="info1" >
        </div>
        <div class="sec">
            
        <label for="label2">Label2:</label>
        <input class="" type="text" name="label2" >
        <label for="info2">Info2:</label>
        <input class="" type="text" name="info2" >
        </div>
        <div class="sec">
            
        <label for="label3">Label3:</label>
        <input class="" type="text" name="label3" >
        <label for="info3">Info3:</label>
        <input class="" type="text" name="info3" >
        </div>
        <div class="sec">
            
        <label for="label4">Label4:</label>
        <input class="" type="text" name="label4" >
        <label for="info4">Info4:</label>
        <input class="" type="text" name="info4" >
        </div>
        <div class="sec">
            
        <label for="label5">Label5:</label>
        <input class="" type="text" name="label5" >
        <label for="info5">Info5:</label>
        <input class="" type="text" name="info5" >
        </div>

        <label for="quantity">Quantity</label>
        <input class="" type="int" name="quantity" required>
        <label for="price">Price</label>
        <input class="" type="int" name="price" required>
        <label for="image">Image</label>
        <input class="" type="file" name="image"  required>
        <input type="submit" value="Add to Laptop">
        </div>
    </form>
</div>    
</body>
    <script src="js/header.js">

    </script>
</html>
