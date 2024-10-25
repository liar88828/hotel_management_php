<?php
require('views/assets/php/getMessage.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./views/assets/php/admin/links.php') ?>
</head>
<body>

<div>
    <?php require('views/components/guest/header.php'); ?>
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <?php showMessage() ?>
            <?php if (empty($guest)): ?>
                <div class="alert alert-info">
                    <p> Guest Is Not Found</p>
                </div>
            <?php else: ?>

                <div class="container mt-sm-5">
                    <h3 class="mb-1">Profile</h3>
                    <div class="card profile-card">
                        <!-- Profile Header -->
                        <div class="profile-header">
                            <img src="/images/person/<?php echo htmlspecialchars($guest->image ? $guest->image : 'default-avatar.png'); ?>"
                                 alt="Profile Image">
                            <h1><?php echo htmlspecialchars($guest->name); ?></h1>
                        </div>

                        <!-- Profile Info -->
                        <div class="profile-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Contact Information</h5>
                                    <ul class="list-unstyled">
                                        <li><strong>Email: </strong><?php echo htmlspecialchars($guest->email); ?></li>
                                        <li>
                                            <strong>Phone: </strong><?php echo htmlspecialchars($guest->phone ?: 'Not provided'); ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Personal Details</h5>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>Address: </strong><?php echo htmlspecialchars($guest->address ?: 'Not provided'); ?>
                                        </li>
                                        <li><strong>Pin
                                                Code: </strong><?php echo htmlspecialchars($guest->pin_code ?: 'Not provided'); ?>
                                        </li>
                                        <li><strong>Date of
                                                Birth: </strong><?php echo htmlspecialchars($guest->date_of_birth ?: 'Not provided'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 ">
                        <!--                    <a href="/guest/profile" class="btn btn-secondary mr-2">Back to Rooms</a>-->
                        <a href="/guest/profile-update" class="btn btn-primary">Update Guest</a>
                    </div>
                </div>

            <?php endif; ?>
        </div>

    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



