<?php
require('views/assets/php/essentials.php');
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Settings</title>
  <?php require('./views/assets/php/links.php') ?>
</head>
<body class="bg-light">


<div class="container-fluid" id="main-content">
    <div class="row">
      <?php require('views/components/admin/header.php') ?>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">

            <h3 class="mb-4">SETTINGS</h3>
          <?php require('views/admin/settings/form-general.php'); ?>
            <!-- Shutdown Settings -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Shutdown Settings</h5>
                        <div class="form-check form-switch">
                            <form>
                                <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox"
                                       id="shutdown-toogle">
                            </form>
                        </div>

                    </div>
                    <p class="card-text">
                        NO CUSTOMERS WILL BE ALLOWED TO BOOK ROOM, WHEN SHUTDOWN IS TURNED ON.
                    </p>
                </div>
            </div>

          <?php require('views/admin/settings/form-management.php'); ?>
          <?php require('views/admin/settings/form-contract.php'); ?>

        </div>
    </div>
</div>


<?php
require('views/assets/php/scripts.php');
//require('views/assets/php/admin/setting.php')
?>

</body>
</html>