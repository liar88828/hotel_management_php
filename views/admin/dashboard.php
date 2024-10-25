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
        <div class="col-lg-10 ms-auto p-4 overflow-hidden  ">
            <section class=" border p-3 mb-2">
                <h2>User Management</h2>
                <div class="row gap-5 p-2">
                    <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">User All</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_guest->count_guest ?? 0) ?>


                            </h5>
                        </div>
                    </div>
                    <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">User Booking</div>
                        <div class="card-body text-center">

                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_guest_booking->count_guest_booking ?? 0) ?>
                            </h5>
                        </div>
                    </div>
                    <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">User Checkout</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                ????
                            </h5>
                        </div>
                    </div>
                </div>

            </section>

            <section class=" border p-3 mb-2">
                <h2>Room Management</h2>
                <div class="row gap-5 p-2">
                    <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">All Room</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_room->count_room ?? 0) ?>
                            </h5>
                        </div>
                    </div>
                    <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">Room Active</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_room_active->count_room_active ?? 0) ?>
                            </h5>
                        </div>
                    </div>
                    <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">Room Empty</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_room_empty->count_room_empty ?? 0) ?>

                            </h5>
                        </div>
                    </div>
                </div>
            </section>

            <section class=" border p-3">
                <h2>Booking Management</h2>
                <div class="row gap-5 p-2">
                    <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">All Booking</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_booking->count_booking ?? 0) ?>
                            </h5>
                        </div>
                    </div>

                    <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">Room Booking</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_room_booking->count_room_booking ?? 0) ?>

                            </h5>
                        </div>
                    </div>

                    <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
                        <div class="card-header fw-bold">Guest Booking</div>
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2">
                                <?= htmlspecialchars($count_booking_guest->count_booking_guest ?? 0) ?>
                            </h5>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



