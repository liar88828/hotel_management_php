<?php

if (isset($_POST['login'])) {
$frm_data = filteration($_POST);
$query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
$values = [$frm_data['admin_name'], $frm_data['admin_pass']];
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
