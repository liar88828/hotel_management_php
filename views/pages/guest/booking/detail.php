<h3>Detail Booking</h3>

<?php
/** @var BookingBase $booking */
if (empty($booking)): ?>
    <div class="alert alert-info">
        <p> Room Is Not Found</p>
    </div>
<?php else: ?>

    <section class=" card">
        <div class="card-body">
            <h1 class="card-title">
                <?= /** @var RoomBase $room */
                htmlspecialchars($room->name) ?>
            </h1>
            <div class="row">
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

    <section class="card mt-2">
        <div class="card-body">
            <h1 class="card-text text-center">Booking Details for Guest
            </h1>
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
                    <h5 id="totalPrice">
                        <?= toRupiah($booking->total_price) ?>/night
                    </h5>
                </div>
                <!-- Booking Status -->
                <div class="col-md-3 ">
                    <strong>Booking Status:</strong>
                    <?php if ($booking->finish == 1) : ?>
                        <p id="bookingStatus" class="btn w-100 btn-success">Finish</p>
                    <?php elseif ($booking->confirm == 1) : ?>
                        <p id="bookingStatus" class="btn w-100 btn-primary">Confirm</p>
                    <?php elseif ($booking->status_booking == 1) : ?>
                        <p id="bookingStatus" class="btn w-100 btn-warning">Booking</p>
                    <?php else : ?>
                        <p id="bookingStatus" class="btn w-100 btn-danger">Canceled</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-center mt-2">
                <a href="/guest/booking" class=" btn btn-secondary me-2">Back</a>
                <?php
                if ($booking->confirm == 1 && $booking->finish == 0): ?>
                    <form action="/guest/booking-finish/<?= $booking->id_booking ?>" method="POST">
                        <button class="btn btn-info me-2" type="submit">
                            Check Out / Finish
                        </button>
                    </form>
                <?php endif; ?>


                <?php if ($booking->confirm == 0 && $booking->finish == 0) : ?>
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

            </div>
        </div>
    </section>

<?php endif; ?>



