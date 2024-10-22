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
            <?php showMessage() ?>

            <?php if (empty($guest)): ?>
                <div class="alert alert-info">
                    <p> Guest Is Not Found</p>
                </div>
            <?php else: ?>

            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1><?php echo htmlspecialchars($guest['name']); ?>'s Profile</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Image -->
                            <div class="col-md-3 text-center">
                                <?php if ($guest['image']): ?>
                                    <img src="<?php echo htmlspecialchars($guest['image']); ?>" class="img-fluid rounded-circle" alt="Profile Image">
                                <?php else: ?>
                                    <img src="default-avatar.png" class="img-fluid rounded-circle" alt="Default Profile Image">
                                <?php endif; ?>
                            </div>

                            <!-- Profile Info -->
                            <div class="col-md-9">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Name: </strong><?php echo htmlspecialchars($guest['name']); ?></li>
                                    <li class="list-group-item"><strong>Email: </strong><?php echo htmlspecialchars($guest['email']); ?></li>
                                    <li class="list-group-item"><strong>Phone: </strong><?php echo htmlspecialchars($guest['phone']); ?></li>
                                    <li class="list-group-item"><strong>Address: </strong><?php echo htmlspecialchars($guest['address']); ?></li>
                                    <li class="list-group-item"><strong>Pin Code: </strong><?php echo htmlspecialchars($guest['pin_code']); ?></li>
                                    <li class="list-group-item"><strong>Date of Birth: </strong><?php echo htmlspecialchars($guest['date_of_birth']); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                        <a href="/admin/room" class="btn btn-secondary">Back to Rooms</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



