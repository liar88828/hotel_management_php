<div id="content">
    <!---->
    <?php
    /** @var RoomBase $room
     * @var GuestBase $guest
     * @var BookingBase $booking
     * */
    if (empty($guest) && empty($booking) && empty($room)): ?>
        <div class="alert alert-info">
            <p> Guest Is Not Found</p>
        </div>
    <?php else: ?>

        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h3>Hotel Receipt</h3>
                <p>Thank you for staying with us!</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 ">
                        <h5>Guest Information</h5>
                        <div class="row row-cols-2">

                            <p><strong>Name:</strong> <?php echo htmlspecialchars($guest->name); ?></p>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($guest->email); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($guest->phone ?: 'Not provided'); ?>
                            </p>
                            <p>
                                <strong>Address:</strong> <?php echo htmlspecialchars($guest->address ?: 'Not provided'); ?>
                            </p>
                            <p><strong>Pin
                                    Code:</strong> <?php echo htmlspecialchars($guest->pin_code ?: 'Not provided'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5>Booking Details</h5>
                        <p><strong>Booking ID:</strong> #<?= htmlspecialchars($booking->id) ?></p>
                        <p><strong>Check-in Date:</strong> <?= htmlspecialchars($booking->check_in_date) ?></p>
                        <p><strong>Check-out Date:</strong> <?= htmlspecialchars($booking->check_out_date) ?></p>
                    </div>
                </div>
                <hr>
                <h5>Room Details</h5>
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>Room Name</th>
                        <th>Area (sq ft)</th>
                        <th>Price per Night</th>
                        <th>Adult</th>
                        <th>Children</th>
                        <!--                        <th>Total Price</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= htmlspecialchars($room->name) ?></td>
                        <td><?= htmlspecialchars($room->area) ?></td>
                        <td><?= toRupiah(htmlspecialchars($room->price)) ?></td>
                        <td><?= htmlspecialchars($room->adult) ?></td>
                        <td><?= htmlspecialchars($room->children) ?></td>
                        <!--                        <td>1</td>-->
                        <!--                        <td>$900</td>-->
                    </tr>
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Amenities</h5>
                        <ul class="row row-cols-2">
                            <?php if ($room->wifi): ?>
                                <li>Wi-Fi</li>
                            <?php endif; ?>
                            <?php if ($room->television): ?>
                                <li>Television</li>
                            <?php endif; ?>
                            <?php if ($room->ac): ?>
                                <li>AC</li>
                            <?php endif; ?>
                            <?php if ($room->cctv): ?>
                                <li>CCTV</li>
                            <?php endif; ?>
                            <?php if ($room->dining_room): ?>
                                <li>Dining Room</li>
                            <?php endif; ?>
                            <?php if ($room->parking_area): ?>
                                <li>Parking Area</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5>Total Payment</h5>
                        <p><strong>Total Price:</strong>
                            <?= toRupiah($booking->total_price); ?></p>
                        <p><strong>Status:</strong>
                            <?php if ($booking->confirm == 1) : ?>
                                <span class="badge text-bg-success">Confirm</span>
                            <?php elseif ($booking->finish == 1) : ?>
                                <span class="badge text-bg-info">Finish</>
                            <?php elseif ($booking->booking == 1) : ?>
                                <span class="badge text-bg-warning">Booking</>
                            <?php elseif ($booking->booking == 0) : ?>
                                <span class="badge text-bg-danger">Canceled</>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <p>We hope to see you again soon!</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="d-flex justify-content-center gap-2 mt-4">
    <a
            class="btn btn-secondary mr-2"
            href="/admin/booking">Back</a>
    <button
            class="btn btn-info"
            onclick="printPDF()">Download PDF
    </button>

</div>
