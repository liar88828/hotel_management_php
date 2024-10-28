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

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #6610f2);
            color: white;
            font-size: 1.75rem;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .card-body {
            padding: 40px;
            background-color: white;
        }

        .row {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #6610f2;
            border: none;
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #520dbf;
        }

        .btn-danger {
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 25px;
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .form-control {
            border-radius: 10px;
        }

        .price-tag {
            font-size: 1.5rem;
            color: #28a745;
            font-weight: bold;
        }

        .status-confirmed {
            color: #28a745;
        }

        .status-pending {
            color: #ffc107;
        }

        .status-cancelled {
            color: #dc3545;
        }
    </style>
</head>
<body>
<?php require('views/components/guest/header.php'); ?>
<div>
    <div class="row">

        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <?php showMessage() ?>

            <?php if (empty($room)): ?>
                <div class="alert alert-info">
                    <p> Room Is Not Found</p>
                </div>
            <?php else: ?>
                <div class="container mt-2">

                    <div class=" border rounded p-2 mb-3">
                        <h1 class="mb-3">
                            <?= htmlspecialchars($room->name) ?></h1>
                        <div class="row">
                            <!--                            room_image-->
                            <div class="col-md-6 ">
                                <div class="swiper swiper-container mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="/images/rooms/<?= htmlspecialchars($room->image) ?>"
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

                            <!--                            <div class="col-md-6">-->
                            <!--                                <img src="/images/rooms/-->
                            <?php //= htmlspecialchars($room->image) ?><!--" class="img-fluid rounded"-->
                            <!--                                     alt="Room Image">-->
                            <!--                            </div>-->


                            <div class="col-md-6">
                                <h4>Room Details</h4>
                                <p><strong>Area:</strong> <?= htmlspecialchars($room->area) ?> m²</p>
                                <p><strong>Price:</strong> Rp. <?= number_format($room->price, 0, ',', '.') ?>/night</p>

                                <input type="hidden" value="<?= $room->price ?>" id="thisPrice">

                                <p><strong>Status:</strong> <span
                                            class="badge rounded-pill text-bg-<?= $room->status == 1 ? 'success' : 'danger' ?>"><?= htmlspecialchars($room->status == 1 ? 'Available' : 'Unavailable') ?></span>
                                </p>
                                <p><strong>Description:</strong> <?= htmlspecialchars($room->description) ?></p>

                                <div class="features">
                                    <h5>Features</h5>
                                    <p><?= htmlspecialchars($room->bedrooms) ?>
                                        Bedrooms, <?= htmlspecialchars($room->bathrooms) ?>
                                        Bathrooms, <?= htmlspecialchars($room->wardrobe) ?> Wardrobe</p>
                                </div>

                                <div class="facilities">
                                    <h5>Facilities</h5>
                                    <ul>
                                        <?php if ($room->wifi): ?>
                                            <li>Wi-Fi</li><?php endif; ?>
                                        <?php if ($room->television): ?>
                                            <li>Television</li><?php endif; ?>
                                        <?php if ($room->ac): ?>
                                            <li>AC</li><?php endif; ?>
                                        <?php if ($room->cctv): ?>
                                            <li>CCTV</li><?php endif; ?>
                                        <?php if ($room->dining_room): ?>
                                            <li>Dining Room</li><?php endif; ?>
                                        <?php if ($room->parking_area): ?>
                                            <li>Parking Area</li><?php endif; ?>
                                    </ul>
                                </div>

                                <div class="guests">
                                    <h5>Guest Capacity</h5>
                                    <p><?= htmlspecialchars($room->adult) ?>
                                        Adults, <?= htmlspecialchars($room->children) ?>
                                        Children</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body  border rounded p-2">
                        <!-- Booking Form -->
                        <form action="/guest/booking-create" method="POST">
                            <!-- Guest Name -->
                            <input type="hidden" name="id_room" value="<?= $room->id ?>">

                            <!-- Check-in and Check-out Dates -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="checkInDate" class="form-label"><i class="fas fa-calendar-alt"></i>
                                        Check-In Date</label>
                                    <!--                                    --><?php //print_r(getForm()) ?>
                                    <input type="date" class="form-control" id="checkInDate" name="check_in_date"
                                           value="<?php print_r(getForm()['check_in_date']) ?>"
                                           required onchange="calculateTotal()">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="checkOutDate" class="form-label"><i class="fas fa-calendar-alt"></i>
                                        Check-Out Date</label>
                                    <input type="date" class="form-control" id="checkOutDate" name="check_out_date"
                                           value="<?php print_r(getForm()['check_out_date']) ?>"
                                           required onchange="calculateTotal()">
                                </div>
                            </div>


                            <!-- Total Price (calculated based on room selection and dates) -->
                            <div class="mb-3">
                                <label for="totalPrice" class="form-label">
                                    <i class="fas fa-dollar-sign"></i> Total Price</label>
                                <input type="number" class="form-control" id="totalPrice" name="total_price"
                                       placeholder="Calculated Total" readonly min="1"
                                       value="<?php print_r(getForm()['total_price']) ?>"
                                >
                                <?= getForm(); ?>
                                <p class="text-danger fs-6"><?= empty(getForm()) ? '' : htmlspecialchars(getForm()['total_price'] == '0' ? 'please correct the date IN DATE must be less than OUT DATE' : '') ?></p>
                            </div>

                            <!-- Booking Status -->
                            <div class="mb-3">
                                <label for="statusSelect" class="form-label"><i class="fas fa-info-circle"></i> Booking
                                    Status</label>
                                <select class="form-select" id="statusSelect" name="status">
                                    <option value="booked">Booked</option>
                                    <!--                                    <option value="pending">Pending</option>-->
                                    <!--                                    <option value="cancelled">Cancelled</option>-->
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit Booking
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-4">
                        <a href="/guest/room" class="btn btn-secondary">Back to Rooms</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
<!-- Bootstrap JS and Popper.js -->
<?php require('views/assets/php/swiper.php') ?>


</body>
</html>



