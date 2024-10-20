<?php
   require('views/assets/php/essentials.php');
   adminLogin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./views/assets/php/admin/links.php') ?>
</head>
<body class="bg-white">
<?php require('views/components/admin/header.php'); ?>

    <div class="container-fluid" id="main-content">
       <div class="row">
         <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem
         </div>
       </div>
    </div>


    <?php require('views/assets/php/scripts.php') ?>
</body>
</html>



