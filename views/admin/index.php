<?php
require('views/assets/php/essentials.php');
require('config/db_config.php');

session_start();
if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) {
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
<body class="bg-light">

<div class="login-form text-center rounded bg-white shadow overflow-none">
    <form method="POST">
        <h4 class="bg-dark text-white py-3">Admin Login Panel</h4>
        <div class="p-4">
            <div class="mb-3">
                <input name="admin_name" require type="text" class="form-control shadow-none text-center"
                       placeholder="Admin Name">
            </div>
            <div class="mb-3">
                <input name="admin_pass" require type="password" class="form-control shadow-none text-center"
                       placeholder="Password">
            </div>
            <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
        </div>
    </form>
</div>

<?php
//checkout notion PHP Login System with SQL Query Execution and Input Filtering
if (isset($_POST['login'])) {
  $frm_data = filteration($_POST);
  $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
  $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
  // $datatypes = "ss";
  // print_r($_POST);
  $res = select($query, $values, "ss"); //both $res are different in index and db_config
  if ($res->num_rows == 1) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['adminLogin'] = true;
    $_SESSION['adminId'] = $row['sr_no'];
    redirect('dashboard.php');
  } else {
    alert('error', 'Login failed - Invalid Credentials!');
  }
}
?>

<?php require('views/assets/php/scripts.php') ?>

</body>
</html>