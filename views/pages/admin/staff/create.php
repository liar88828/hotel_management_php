<?php
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

                <form method="POST" action="/admin/staff/store" class="mb-4"
                      enctype="multipart/form-data">
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control shadow-none" id="name" name="name" required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control shadow-none" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="number" class="form-control shadow-none" id="phone" name="phone" required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" id="image">Profile Image</label>
                        <input type="file" class="form-control shadow-none" id="image" name="image" required>
                    </div>
                    <div class="col-md-12 ps-0 mb-3">
                        <label class="form-label" for="address">Address</label>
                        <textarea class="form-control shadow-none" rows="1" id="address" name="address"
                                  required></textarea>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="pin_code">Pin Code</label>
                        <input type="number" class="form-control shadow-none" id="pin_code" name="pin_code"
                               required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="date_of_birth">Date of birth</label>
                        <input type="date" class="form-control shadow-none" id="date_of_birth"
                               name="date_of_birth" required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control shadow-none" id="password" name="password"
                               required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label" for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control shadow-none" id="confirm_password"
                               name="confirm_password" required>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="guest" value="guest"
                               checked/>
                        <label class="form-check-label" for="guest">Guest</label>
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



