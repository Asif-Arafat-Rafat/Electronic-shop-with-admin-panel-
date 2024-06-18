<div class="comsec">
        <h1 style="margin-left:30px">Component Section</h1>
        <div class="totItem" style="">
        <?php
                    include "./backend/connect.php";
                    $sql="SELECT * FROM product_section where type='component'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        $val=1;
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['quantity']>0)echo '<div class="sellsec">';
                            else echo '<div class="sellsec" style="opacity:50%;">';
                            echo '
                                <img class="" src="images/component/'.$row['image'].'" alt="issue">
                                <div class="itemact">
                                <a href="./backend/cart.php?id='.$row['id'].'"><img src="icons/cart-plus.svg" alt=""></a>
                                </div>
                                <div class="infobg"></div>                            
                                <div class="infoitem">
                                <p>'.$row['label1'].':'.$row['info1'].'</p>
                                <p>'.$row['label2'].': '.$row['info2'].'</p>
                                <p>'.$row['label3'].': '.$row['info3'].'</p>
                                <p>'.$row['label4'].': '.$row['info4'].'</p>
                                <p>'.$row['label5'].': '.$row['info5'].'</p>
                                </div>
                                </div>
                            ';
                        }
                    }
                ?>
        </div>
    </div>