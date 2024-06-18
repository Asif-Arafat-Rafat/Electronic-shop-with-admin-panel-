
    <div class="headerbox">
        <div class="logohead">Electronic-Shop</div>
        <div class="headmenu">
            <ul>
                <li><div class="icon-header"><a href="./index.php"><img src="icons/home.png" alt=""></a></div></li>
                <li><div class="icon-header"><a href="./cart.php"><img src="./icons/cart.svg" alt=""></a></div></li>
                <?php
                    if(isset($_SESSION['name'])){
                        echo '<li><div class="icon-header"><a href="./profile.php"><img src="icons/person.svg" alt=""></a></div></li>';
                        echo '<li><div class="icon-header login-btn"><a href="./logout.php"><img src="icons/logout.png" alt=""></a></div></li>';
                    }
                    else{
                        echo '<li><div class="icon-header login-btn"><img src="icons/register.png" alt=""></div></li>';
                    }
                ?>
                <li><div class="icon-header theme-switcher"><img src="./icons/moon.svg" alt=""></div></li>
            </ul>
        </div>
    </div>