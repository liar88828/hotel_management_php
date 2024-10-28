<?php
require('views/assets/php/getMessage.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
<body>
<?php require('views/components/guest/header.php'); ?>
<div>
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3>Detail Booking</h3>

            <?php if (empty($booking)): ?>
                <div class="alert alert-info">
                    <p> Room Is Not Found</p>
                </div>
            <?php else: ?>
                <!--                --><?php // print_r($room_images) ?>
                <div class="container">
                    <div class="bg-white">
                        <div class=" border rounded p-2 mb-3">
                            <h1 class="mb-3">
                                <?= htmlspecialchars($booking->name) ?>
                            </h1>
                            <div class="row">
                                <!--                                <div class="col-md-6">-->
                                <!--                                    <img src="/images/rooms/-->
                                <?php //= htmlspecialchars($booking->image) ?><!--"-->
                                <!--                                         class="img-fluid rounded"-->
                                <!--                                         alt="Room Image">-->
                                <!--                                </div>-->
                                <!--                                -->

                                <div class="col-md-6 ">
                                    <div class="swiper swiper-container mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="/images/rooms/<?= htmlspecialchars($booking->image) ?>"
                                                     class="w-100  d-block  "
                                                     alt="image1"
                                                     style="object-fit:cover;
                                                        object-position:center;
                                                        /*width: 200px;*/
                                                        height: 400px;"
                                                >
                                            </div>
                                            <?php if (!empty($room_images)): ?>
                                                <?php /** @var RoomImageBase $room_image */
                                                foreach ($room_images as $room_image) : ?>

                                                    <div class="swiper-slide">
                                                        <img
                                                                src="/images/rooms/<?= htmlspecialchars($room_image->image) ?>"
                                                                class="w-100  d-block  "
                                                                alt="image1"
                                                                style="object-fit:cover;
                                object-position:center;
                                /*width: 200px;*/
                                height: 400px;"
                                                        >
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <h4>Room Details</h4>
                                    <p><strong>Area:</strong> <?= htmlspecialchars($booking->area) ?> m²</p>
                                    <p><strong>Price:</strong> Rp. <?= number_format($booking->price, 0, ',', '.') ?>
                                        /night</p>

                                    <input type="hidden" value="<?= $booking->price ?>" id="thisPrice">

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
                            <!--                        Rp. -->
                            <?php //= number_format($booking->total_price, 0, ',', '.') ?><!--/night-->
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
                                    <?php if ($booking->status_booking == 1) : ?>
                                        <p id="bookingStatus" class="btn w-100 btn-success">Booking</p>
                                    <?php else : ?>
                                        <p id="bookingStatus" class="btn w-100 btn-danger">Canceled</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-center mt-2">
                                <a href="/guest/booking" class=" btn btn-secondary me-2">Back</a>
                                <?php if ($booking->confirm == 1): ?>
                                    <form action="/guest/booking-finish/<?= $booking->id_booking ?>" method="POST">
                                        <button class="btn btn-info me-2" type="submit">
                                            Check Out / Finish
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <a href="/guest/booking-edit/<?= $booking->id_booking ?>"
                                       class="btn btn-primary me-2">
                                        Edit Booking
                                    </a>
                                <?php endif; ?>


                                <?php if ($booking->confirm == 1) : ?>
                                    <a href="/guest/booking/print/<?= $booking->id_booking ?>"
                                       class="btn btn-info me-2">
                                        Print
                                    </a>
                                <?php endif; ?>

                                <!--                access-->
                                <!--                --><?php //if (isset($booking->status_booking) && $booking->status_booking === 'booking') : ?>
                                <!--                    <form action="/guest/booking/update-cancel"-->
                                <!--                          method="post">-->
                                <!--                        <input-->
                                <!--                                type="hidden"-->
                                <!--                                name="booking_id"-->
                                <!--                                value="-->
                                <?php //= htmlspecialchars($booking->id_booking) ?><!--"-->
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
                                <!--                                value="-->
                                <?php //= htmlspecialchars($booking->id_booking) ?><!--"-->
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
                <!--                --><?php //= print_r($booking) ?>

            <?php endif; ?>

            <!-- Bootstrap JS and Popper.js -->
            <?php require('views/assets/php/swiper.php') ?>


</body>
</html>
