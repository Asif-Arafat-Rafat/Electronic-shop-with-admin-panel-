<?php
require "./backend/connect.php";

?>
<div class="login-form">
    <div class="bun">
        <button class="log-btn">login</button>
        <button class="reg-btn">register</button>
    </div>
    <div class="loginform">
        <form action="./backend/login.php" method="post">
            <div class="login2">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
                <label for="password">Password:</label>
                <input type="password" name="password" id='password'>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    <div class="registerform">
        <form action="./backend/register.php" method="post" enctype="multipart/form-data">
            <div class="login2">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address">
                <label for="password">Password:</label>
                <input type="password" name="password" id='password'>
                <label for="password">Confirm Password:</label>
                <input type="password" name="con_password" id='password'>
                <label for="phone">Phone:</label>
                <input type="text" name="phone_number" id='phone'>
                <input type="file" name="photo" id='photo'>
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
    <div></div>
</div>