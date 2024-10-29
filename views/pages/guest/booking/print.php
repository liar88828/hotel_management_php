<div id="content">
    <!---->
    <?php if (empty($guest)): ?>
        <div class="alert alert-info">
            <p> Guest Is Not Found</p>
        </div>
    <?php else: ?>

        <section class=" card rounded-5 mt-2 ">
            <div class="card-body">
                <div class="row justify-content-between">

                    <div class="col-4 ">
                        <img src="/images/person/<?= htmlspecialchars($guest->image) ?>"
                             class=" border rounded-5 "
                             alt="image1"
                             style="object-fit:cover;
                                    width: 15rem;
                                    height: 15rem;"
                        >
                    </div>

                    <div class="col-7">
                        <h3 class="card-title">
                            <?php echo htmlspecialchars($guest->name); ?>
                        </h3>
                        <div class="">
                            <h5>Contact Information</h5>
                            <ul class="row row-cols-2">
                                <li>
                                    <strong>Email: </strong><?php echo htmlspecialchars($guest->email); ?></li>
                                <li>
                                    <strong>Phone: </strong><?php echo htmlspecialchars($guest->phone ?: 'Not provided'); ?>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h5>Personal Details</h5>
                            <ul class="row row-cols-2">
                                <li>
                                    <strong>Address: </strong><?php echo htmlspecialchars($guest->address ?: 'Not provided'); ?>
                                </li>
                                <li>
                                    <strong>Pin
                                        Code: </strong><?php echo htmlspecialchars($guest->pin_code ?: 'Not provided'); ?>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
        </section>
    <?php endif; ?>

    <!---->
    <?php if (empty($room)): ?>
        <div class="alert alert-info">
            <p> Room Is Not Found</p>
        </div>
    <?php else: ?>

        <section class=" card rounded-5 mt-2 ">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-4 ">
                        <img src="/images/rooms/<?= htmlspecialchars($room->image) ?>"
                             class=" border rounded-5 "
                             alt="image1"
                             style="object-fit:cover;
                                    width: 15rem;
                                    height: 15rem;"
                        >
                    </div>

                    <div class="col-7">
                        <h3 class="card-title">
                            <?= htmlspecialchars($room->name) ?>
                        </h3>
                        <div class="features">
                            <h5>Features</h5>
                            <ul class="row row-cols-2">

                                <li>Bedrooms : <?= htmlspecialchars($room->bedrooms) ?></li>
                                <li>Bathrooms : <?= htmlspecialchars($room->bathrooms) ?></li>
                                <li>Wardrobe : <?= htmlspecialchars($room->wardrobe) ?></li>
                            </ul>
                        </div>

                        <div class="facilities">
                            <h5>Facilities</h5>
                            <ul class="row row-cols-2">
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
                            <ul class="row row-cols-2">
                                <li>Adults : <?= htmlspecialchars($room->adult) ?></li>
                                <li>Children : <?= htmlspecialchars($room->children) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!---->
    <?php if (empty($booking)): ?>
        <div class="alert alert-info">
            <p> Room Is Not Found</p>
        </div>
    <?php else: ?>
        <section class="card rounded-5 mt-2">
            <div class="card-body">
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
                        <h6 id="totalPrice">
                            Rp.<?= number_format($booking->total_price, 0, ',', '.') ?>
                            /night
                        </h6>
                    </div>

                    <!-- Booking Status -->
                    <div class="col-md-3 ">
                        <strong>Booking Status:</strong>
                        <?php if ($booking->confirm == 1) : ?>
                            <p id="bookingStatus" class="btn w-100 btn-success">Confirm</p>
                        <?php elseif ($booking->finish == 1) : ?>
                            <p id="bookingStatus" class="btn w-100 btn-info">Finish</p>
                        <?php elseif ($booking->status_booking == 1) : ?>
                            <p id="bookingStatus" class="btn w-100 btn-warning">Booking</p>
                        <?php elseif ($booking->status_booking == 0) : ?>
                            <p id="bookingStatus" class="btn w-100 btn-danger">Canceled</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Action Buttons -->

            </div>
        </section>
    <?php endif; ?>
</div>
<div class="d-flex justify-content-center gap-2 mt-4">
    <a
            class="btn btn-secondary mr-2"
            href="/guest/booking">Back</a>
    <button
            class="btn btn-info"
            onclick="printPDF()">Download PDF
    </button>

</div>
