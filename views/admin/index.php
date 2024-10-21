<?php
require('views/assets/php/essentials.php');
require('config/db_config.php');

if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']) {
  redirect('dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
  <?php require('./views/assets/php/admin/links.php') ?>
</head>
<body class="bg-light ">

<div class="login-form text-center rounded bg-white shadow overflow-none ">
    <form method="POST" action="/auth/login">
        <h4 class="bg-dark text-white py-3">Admin Login Panel</h4>
        <div class="p-4 ">
            <div class="">
                <label class="mb-3">
                    <span>Name Admin</span>
                    <input name="admin_name" required
                           type="text"
                           class="form-control shadow-none text-center"
                           placeholder="Admin Name">
                </label>
            </div>
            <div class="">
                <label class="mb-3">
                    <span>Password</span>
                    <input name="admin_pass"
                           required
                           type="password"
                           class="form-control shadow-none text-center"
                           placeholder="Password">
                </>
            </div>
            <button name="login" type="submit" class="btn btn-info  shadow-none">LOGIN</button>
        </div>
    </form>
</div>


<?php require('views/assets/php/scripts.php') ?>

</body>
</html>