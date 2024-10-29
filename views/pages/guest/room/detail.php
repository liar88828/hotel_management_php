<?php if (empty($room)): ?>
    <div class="alert alert-info">
        <p> Room Is Not Found</p>
    </div>
<?php else: ?>

    <section class=" card">
        <div class="card-body">
            <h1 class="card-title">
                <?= htmlspecialchars($room->name) ?>
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
    </section>

    <section class="card mt-2">
        <div class="card-body ">
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
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center gap-2">
                    <a href="/guest/room" class="btn btn-secondary">
                        Back to Rooms
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ba bi-save"></i>
                        Submit Booking
                    </button>
                </div>
            </form>
        </div>
    </section>
<?php endif; ?>
