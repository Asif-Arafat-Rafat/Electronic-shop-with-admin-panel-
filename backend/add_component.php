<?php
require "./connect.php";

// Check if all form fields are set
    $label1 = $_POST['label1'];
    $label2 = $_POST['label2'];
    $label3 = $_POST['label3'];
    $label4 = $_POST['label4'];
    $label5 = $_POST['label5'];
    $info1 = $_POST['info1'];
    $info2 = $_POST['info2'];
    $info3 = $_POST['info3'];
    $info4 = $_POST['info4'];
    $info5 = $_POST['info5'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Check if file is uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = '../images/component/' . $file;

        // Prepare and execute the SQL query
        $regi = $conn->prepare("INSERT INTO product_section(label1,info1,label2,info2,label3,info3,label4,info4,label5,info5, quantity, price, image,type)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,'component')");
        $regi->bind_param("ssssssssssiis", $label1, $info1, $label2, $info2, $label3, $info3, $label4, $info4, $label5, $info5, $quantity, $price, $file);
        if($regi->execute()) {
            // Move the uploaded file to the destination folder
            if(move_uploaded_file($tempname, $folder)) {

                echo "Laptop added successfully!";
            } else {
                die('3');

                echo "Error moving uploaded file!";
            }
        } else {
            die('4');

            echo "Error executing SQL query: " . $conn->error;
        }

        $regi->close();
    } else {

        die ("No file uploaded or file upload error!");
    }


$conn->close();
header('location: ../admin/add_component.php');
?>
