<h1>Detail Booking</h1>

<?php if (empty($booking)): ?>
    <div class="alert alert-info">
        <p> Room Is Not Found</p>
    </div>
<?php else: ?>

    <div class="container">
        <div class="bg-white">
            <div class=" border rounded p-2 mb-3">
                <h2 class="mb-3">
                    <?= htmlspecialchars($booking->name) ?>
                </h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="/images/rooms/<?= htmlspecialchars($booking->image) ?>"
                             class="img-fluid rounded"
                             alt="Room Image">
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
                        <?php if (isset($booking->status_booking) && $booking->status_booking === 'booking') : ?>
                            <p id="bookingStatus" class="btn w-100 btn-success">Booking</p>
                        <?php elseif (isset($booking->status_booking) && $booking->status_booking === 'cancel') : ?>
                            <p id="bookingStatus" class="btn w-100 btn-danger">Canceled</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-center mt-2">
                    <a href="/admin/booking" class=" btn btn-secondary me-2">Back</a>
                    <a href="/admin/booking-update/<?= $booking->id_booking ?>" class="btn btn-primary me-2">Edit
                        Booking</a>
                    <a href="/admin/booking-print/<?= $booking->id_booking ?>" class="btn btn-info me-2">Print</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
