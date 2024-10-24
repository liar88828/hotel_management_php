
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
    <style>
        body {
            background-color: #f7f7f7;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="bg-white ">
<div class="container-fluid" id="main-content">
    <div class="row">
        <?php require('views/components/guest/header.php'); ?>

        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-1">Detail Booking</h3>
            <section class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>
                <div class="d-flex gap-2">

                    <!--                    <a href="/admin/room/create" class='btn btn-info'>Create</a>-->
                    <a href="/guest/booking" class='btn btn-secondary'>All</a>
                    <a href="/guest/booking/booking" class='btn btn-success'>Booking</a>
                    <!--                    <a href="/guest/room/empty" class='btn btn-warning'>Pending</a>-->
                    <a href="/guest/booking/cancel" class='btn btn-danger'>Cancel</a>
                    <!--                    <a href="/guest/room/empty" class='btn btn-danger'>Pending</a>-->
                    <!--                    <a href="/admin/room/renovated" class='btn btn-warning'>Renovated</a>-->
                </div>
            </section>
<?php if (empty($booking)): ?>
    <div class="alert alert-info">
        <p> Room Is Not Found</p>
    </div>
<?php else: ?>
<div class="container">
    <div class="">

        <div class=" border rounded p-2 mb-3">
            <h1 class="mb-3">
                <?= htmlspecialchars($booking->name) ?>
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/rooms/<?= htmlspecialchars($booking->image) ?>" class="img-fluid rounded"
                         alt="Room Image">
                </div>
                <div class="col-md-6">
                    <h4>Room Details</h4>
                    <p><strong>Area:</strong> <?= htmlspecialchars($booking->area) ?> m²</p>
                    <p><strong>Price:</strong> Rp. <?= number_format($booking->price, 0, ',', '.') ?>/night</p>

                    <input type="hidden" value="<?=$booking->price?>" id="thisPrice">

                    <p>
                        <strong>Status:</strong>
                        <span class="badge rounded-pill text-bg-<?= $booking->status_room == 1 ? 'success' : 'danger' ?>">
                            <?= htmlspecialchars($booking->status_room == 1 ? 'Available' : 'Unavailable') ?>
                        </span>
                    </p>
                    <p><strong>Description:</strong> <?= htmlspecialchars($booking->description) ?></p>

                    <div class="features">
                        <h5>Features</h5>
                        <p><?= htmlspecialchars($booking->bedrooms) ?>
                            Bedrooms, <?= htmlspecialchars($booking->bathrooms) ?>
                            Bathrooms, <?= htmlspecialchars($booking->wardrobe) ?> Wardrobe</p>
                    </div>

                    <div class="facilities">
                        <h5>Facilities</h5>
                        <ul>
                            <?php if ($booking->wifi): ?>
                                <li>Wi-Fi</li><?php endif; ?>
                            <?php if ($booking->television): ?>
                                <li>Television</li><?php endif; ?>
                            <?php if ($booking->ac): ?>
                                <li>AC</li><?php endif; ?>
                            <?php if ($booking->cctv): ?>
                                <li>CCTV</li><?php endif; ?>
                            <?php if ($booking->dining_room): ?>
                                <li>Dining Room</li><?php endif; ?>
                            <?php if ($booking->parking_area): ?>
                                <li>Parking Area</li><?php endif; ?>
                        </ul>
                    </div>

                    <div class="guests">
                        <h5>Guest Capacity</h5>
                        <p><?= htmlspecialchars($booking->adult) ?>
                            Adults, <?= htmlspecialchars($booking->children) ?>
                            Children</p>
                    </div>
                </div>
            </div>
        </div>
<!--        --><?php //= print_r($booking) ?>

    </div>
    <div class="card">
        <div class="card-header text-center">
            Booking Details for Guest
        </div>
        <div class="card-body">
<!--            <h5 class="card-title text-center mb-4">Room Information</h5>-->

            <!-- Room Details -->
<!--            <div class="row mb-3">-->
<!--                <div class="col-md-6">-->
<!--                    <strong>Room Name:</strong>-->
<!--                    <p id="roomName">-->
<!--                        --><?php //= htmlspecialchars($booking->name) ?>
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="col-md-6">-->
<!--                    <strong>Price per Night:</strong>-->
<!--                    <p id="roomPrice">-->
<!--                        Rp. --><?php //= number_format($booking->total_price, 0, ',', '.') ?><!--/night-->
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Booking Details -->
            <h5 class="card-title text-center mb-4">Booking Information</h5>
            <div class="row">
                <div class="col-md-3">
                    <strong>Check-In Date:</strong>
                    <p id="checkInDate">
                        <?= htmlspecialchars($booking->check_in_date) ?>

                    </p>
                </div>
                <div class="col-md-3">
                    <strong>Check-Out Date:</strong>
                    <p id="checkOutDate">
                        <?= htmlspecialchars($booking->check_out_date) ?>
                    </p>
                </div>


                <!-- Total Price -->
                    <div class="col-md-3 ">
                        <strong>Total Price:</strong>
                            <h3 id="totalPrice">
                                Rp. <?= number_format($booking->total_price, 0, ',', '.') ?>/night
                            </h3>
                    </div>

                <!-- Booking Status -->
                    <div class="col-md-3 ">
                        <strong>Booking Status:</strong>
                        <?php if (isset($booking->status_booking) && $booking->status_booking === 'booking') : ?>
                            <p id="bookingStatus" class="btn w-100 btn-success">Booking</p>
                        <?php elseif (isset($booking->status_booking) && $booking->status_booking === 'cancel') : ?>
                            <p id="bookingStatus" class="btn w-100 btn-danger">Canceled</p>
                        <?php endif; ?>
                    </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-center mt-2">
                <a href="/guest/booking" class=" btn btn-secondary me-2">Back</a>

                <a href="/guest/booking-edit/<?= $booking->id_booking ?>" class="btn btn-primary me-2">Edit Booking</a>
                <a href="/guest/booking/print/<?= $booking->id_booking ?>" class="btn btn-info me-2">Print</a>
<!--                access-->
<!--                --><?php //if (isset($booking->status_booking) && $booking->status_booking === 'booking') : ?>
<!--                    <form action="/guest/booking/update-cancel"-->
<!--                          method="post">-->
<!--                        <input-->
<!--                                type="hidden"-->
<!--                                name="booking_id"-->
<!--                                value="--><?php //= htmlspecialchars($booking->id_booking) ?><!--"-->
<!--                        />-->
<!--                        <button-->
<!--                                type="submit"-->
<!--                                class="btn w-100 btn-danger ">Cancel-->
<!--                        </button>-->
<!--                    </form>-->
<!--                --><?php //elseif (isset($booking->status_booking) && $booking->status_booking === 'cancel') : ?>
<!--                    <form action="/guest/booking/update-booking"-->
<!--                          method="post">-->
<!--                        <input-->
<!--                                type="hidden"-->
<!--                                name="booking_id"-->
<!--                                value="--><?php //= htmlspecialchars($booking->id_booking) ?><!--"-->
<!--                        />-->
<!--                        <button-->
<!--                                type="submit"-->
<!--                                class="btn w-100 btn-success ">Booking-->
<!--                        </button>-->
<!--                    </form>-->
<!--                --><?php //endif; ?>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
