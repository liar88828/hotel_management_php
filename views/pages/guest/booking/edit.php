<h3 class="mb-1">Edit Booking</h3>
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
                            <ul class="row row-cols-2">
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
                            <ul class="row row-cols-2">
                                <li>Adults : <?= htmlspecialchars($booking->adult) ?></li>
                                <li>Children : <?= htmlspecialchars($booking->children) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--        --><?php //= print_r($booking) ?>
        </div>


        <div class="card-body  border rounded p-2">
            <!-- Booking Form -->
            <form action="/guest/booking-update/<?= $booking->id_booking ?>" method="POST">
                <!-- Guest Name -->
                <input type="hidden" name="roomId" value="<?= $booking->id ?>">

                <!-- Check-in and Check-out Dates -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="checkInDate" class="form-label"><i class="fas fa-calendar-alt"></i>Check-In
                            Date</label>
                        <input type="date" class="form-control" id="checkInDate" name="check_in_date"
                               required onchange="calculateTotal()"
                               value="<?= htmlspecialchars($booking->check_in_date) ?>">
                        <!--                                    <p>-->
                        <?php //= htmlspecialchars($booking->check_in_date) ?><!--</p>-->

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="checkOutDate" class="form-label"><i class="fas fa-calendar-alt"></i>
                            Check-Out Date</label>
                        <input type="date" class="form-control" id="checkOutDate" name="check_out_date"
                               required onchange="calculateTotal()"
                               value="<?= htmlspecialchars($booking->check_out_date) ?>">
                        <!--                                    <p>-->
                        <?php //= htmlspecialchars($booking->check_out_date) ?><!--</p>-->

                    </div>
                </div>


                <!-- Total Price (calculated based on room selection and dates) -->
                <div class="mb-3">
                    <label for="totalPrice" class="form-label">
                        <i class="fas fa-dollar-sign"></i>
                        Total Price
                    </label>
                    <input type="number" class="form-control" id="totalPrice" name="total_price"
                           placeholder="Calculated Total" readonly
                           min="1"
                    >
                </div>

                <!-- Booking Status -->
                <div class="mb-3">
                    <label for="statusSelect" class="form-label">
                        <i class="fas fa-info-circle"></i>
                        Booking Status
                    </label>
                    <select class="form-select" id="statusSelect" name="status">
                        <option value='1'>Booked</option>
                        <option value="0">Cancelled</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center gap-2">
                    <a href="/guest/booking" class=" btn btn-secondary me-2">Back</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Booking
                    </button>

                </div>
            </form>
        </div>


    </div>
<?php endif; ?>
