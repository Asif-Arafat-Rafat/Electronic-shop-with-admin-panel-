
<?php
session_start();
    require "./homepage/header.php";
    require "./homepage/nav.php";
    ?>
        
        <form id="photo-update" action="./backend/update.php" method="post" enctype="multipart/form-data">
    <div class="profile_view">
        <div class="profile_image">
            <label for="photo">
                <?php echo '<img class="dp" src="./images/'.$_SESSION['photo'].'">'; ?>
            </label>
            <input type="file" name="photo" id="photo" style="display:none;">
        </div>

        <div class="profile_info">
            <label for="name">
                <h3>Name:     <br><input type="text" name="name" id="name" placeholder="<?php echo $_SESSION['name']; ?>" value="<?php echo $_SESSION['name']; ?>"></h3>
            </label>
            <!-- Ensure email field has a value -->
            <label for="email">
                <h3>Email:     <br><input type="email" name="email" id="email" placeholder="<?php echo $_SESSION['Email']; ?>" value="<?php echo $_SESSION['Email']; ?>"></h3>
            </label>
            <!-- Ensure phone field has a value -->
            <label for="phone">
                <h3>Phone Number:<br><input type="int" name="phone" id="phone" placeholder="<?php echo $_SESSION['phone']; ?>" value="<?php echo $_SESSION['phone']; ?>"></h3>
            </label>
            <label for="password">
                <h3>Change Password:<br><input type="password" name="password" id="password" placeholder="password"></h3>
            </label>
            <label for="con_password">
                <h3>Confirm changed Password:<br><input type="password" name="con_password" id="con_password" placeholder="password"></h3>
            </label>

        </div>

    </div>
    <input type="submit" value="Update" class="submit-btn">

</form>

<?php
    include "./homepage/EndScriptLink.php";
?>