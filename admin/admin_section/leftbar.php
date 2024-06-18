<div class="leftbar">
        <div class="lblist">
            <h3>Total user:</h3><p><?php
                echo mysqli_num_rows($con_customer);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total admin</h3><p><?php
                echo mysqli_num_rows($con_admin);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Customers:</h3><p><?php
                echo mysqli_num_rows($con_customer);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Laptop:</h3><p><?php
                echo mysqli_num_rows($con_lsec);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Phone:</h3><p><?php
                echo mysqli_num_rows($con_psec);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Component:</h3><p><?php
                echo mysqli_num_rows($con_csec);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Arduino:</h3><p><?php
                echo mysqli_num_rows($con_ausec);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Accessory:</h3><p><?php
                echo mysqli_num_rows($con_acsec);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Orders:</h3><p><?php
                echo mysqli_num_rows($con_orsec);
            ?></p>
        </div>
        <div class="lblist">
        <h3>Total Active Orders:</h3><p><?php
                echo mysqli_num_rows($con_uorsec);
            ?></p>
        </div>
    </div>