<?php
require('views/assets/php/getMessage.php');
//require('views/assets/php/admin_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <?php require('./views/assets/php/admin/links.php') ?>
</head>
<body class="bg-white ">
<?php require('views/components/guest/header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-1">Booking</h3>
            <section class="mb-3">
                <form
                        action="/guest/booking" method="post"
                        class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's Room"
                           aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>

                    </button>
                </form>
                <div class="d-flex gap-2">
                    <a href="/guest/booking" class='btn btn-secondary'>All</a>
                    <a href="/guest/booking-booking" class='btn btn-warning'>Booking</a>
                    <a href="/guest/booking-cancel" class='btn btn-danger'>Cancel</a>
                    <a href="/guest/booking-confirm" class='btn btn-success'>Confirm</a>
                    <a href="/guest/booking-finish" class='btn btn-info'>Finish</a>
                </div>
            </section>
            <section>
                <?php if (empty($bookings)): ?>
                    <p>No Booking is available.</p>
                <?php else: ?>
                    <?php foreach ($bookings as $booking): ?>
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="/images/rooms/<?= htmlspecialchars($booking->image) ?>"
                                         class="img-fluid rounded "
                                         height="200"
                                         width="200"
                                         alt="<?= htmlspecialchars($booking->name) ?>"
                                    >
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class=""><?= htmlspecialchars($booking->name) ?>
                                        <span class="badge rounded-pill text-bg-<?= $booking->status_booking == 1 ? 'success' : 'danger' ?> ">
                                        <?= htmlspecialchars($booking->status_booking == 1 ? 'Available' : 'Unavailable') ?>
                                      </span>
                                    </h5>
                                    <div class="d-flex gap-3">
                                        <p class="badge rounded-pill text-bg-info ">In
                                            : <?= htmlspecialchars($booking->check_in_date) ?></p>
                                        <p class="badge rounded-pill text-bg-info">Out
                                            : <?= htmlspecialchars($booking->check_out_date) ?></p>
                                    </div>

                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        <span class="badge rounded-pill text-bg-light text-wrap"><?= htmlspecialchars($booking->bedrooms) ?> Bedrooms</span>
                                        <span class="badge rounded-pill text-bg-light text-wrap"><?= htmlspecialchars($booking->bathrooms) ?> Bathrooms</span>
                                        <span class="badge rounded-pill text-bg-light text-wrap"><?= htmlspecialchars($booking->wardrobe) ?> Wardrobe</span>
                                    </div>
                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                        <?php if ($booking->wifi): ?>
                                            <span class="badge rounded-pill text-bg-light text-wrap">Wi-Fi</span>
                                        <?php endif; ?>
                                        <?php if ($booking->television): ?>
                                            <span class="badge rounded-pill text-bg-light text-wrap">Television</span>
                                        <?php endif; ?>
                                        <?php if ($booking->ac): ?>
                                            <span class="badge rounded-pill text-bg-light text-wrap">AC</span>
                                        <?php endif; ?>
                                        <?php if ($booking->cctv): ?>
                                            <span class="badge rounded-pill text-bg-light text-wrap">CCTV</span>
                                        <?php endif; ?>
                                        <?php if ($booking->dining_room): ?>
                                            <span class="badge rounded-pill text-bg-light text-wrap">Dining Room</span>
                                        <?php endif; ?>
                                        <?php if ($booking->parking_area): ?>
                                            <span class="badge rounded-pill text-bg-light text-wrap">Parking Area</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="guests">
                                        <h6 class="mb-1">Guests</h6>
                                        <?php if ($booking->adult > 0) {
                                            echo "<span class='badge rounded-pill text-bg-light text-wrap'> $booking->adult Adults </span>";
                                        } ?>
                                        <?php if ($booking->children > 0) {
                                            echo "<span class='badge rounded-pill text-bg-light text-wrap'> $booking->adult Children </span>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <h6 class="mb-1">
                                        <?php
                                        setlocale(LC_MONETARY, "id_ID");
                                        echo "Rp. " . number_format((int)$booking->price, 0, ',', '.');
                                        ?>/night
                                    </h6>


                                    <a href="/guest/booking/<?= $booking->id_booking ?>"
                                       class="btn w-100 btn-outline-dark mb-2">
                                        More Details
                                    </a>

                                    <?php if ($booking->finish == 1) : ?>
                                        <div class="btn w-100 btn-info ">Finish</div>
                                    <?php elseif ($booking->confirm == 1) : ?>
                                        <div class="btn w-100 btn-success ">Confirm</div>
                                    <?php elseif ($booking->status_booking == 1) : ?>
                                        <div class="btn w-100 btn-warning ">Booking</div>
                                    <?php else : ?>
                                        <div class="btn w-100 btn-danger ">Cancel</div>
                                    <?php endif; ?>

                                    <?php if ($booking->confirm): ?>
                                        <div class="mt-2">
                                            <a href="/guest/booking/print/<?= $booking->id_booking ?>"
                                               class="btn btn-success w-100">
                                                print
                                            </a>
                                        </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



