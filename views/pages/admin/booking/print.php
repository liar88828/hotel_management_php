<div id="content">
    <div class="card">
        <div class="card-header text-center">
            Booking Details for Guest
        </div>
        <?php /** @var BookingBase $booking */
        if (empty($booking)): ?>
            <div class="alert alert-info">
                <p> Room Is Not Found</p>
            </div>
        <?php else: ?>
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
                <div class="d-flex justify-content-center gap-2">
                    <a href="/admin/booking/<?= htmlspecialchars($booking->id_booking) ?> "
                       class="btn btn-secondary ">
                        Back
                    </a>
                    <button
                            class="btn btn-info"
                            onclick="printPDF()">Download PDF
                    </button>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>