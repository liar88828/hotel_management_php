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
<body class="bg-white ">
<div class="container-fluid" id="main-content">
    <div class="row">
      <?php require('views/components/admin/header.php'); ?>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">

            <div class="container mt-5">
                <h1>Create User</h1>

              <?php if (!empty($message)): ?>
                  <div class="alert alert-info">
                    <?= htmlspecialchars($message) ?>
                  </div>
              <?php endif; ?>

                <form method="POST" action="/admin/guess/store" class="mb-4">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First Name"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last Name"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input id="phone" type="tel" class="form-control" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" class="form-control" name="address" placeholder="Address"
                                  required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Guest</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



