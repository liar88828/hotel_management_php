<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details PDF</title>
    <!-- Bootstrap for styling (optional, but recommended to keep the card layout) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body>
<div class="container mt-10" id="content">
    <div class="card">
        <div class="card-header text-center">
            Booking Details for Guest
        </div>
        <?php if (empty($booking)): ?>
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
                <div class="d-flex justify-content-center">
                    <a
                            class="btn btn-secondary mr-2"
                            href="/guest/booking">Back</a>
                    <button
                            class="btn btn-info"
                            onclick="printPDF()">Download PDF</button>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Script to generate PDF -->
<script>
	function printPDF() {
		var element = document.getElementById('content');
		var opt = {
			margin     : 0.5,
			filename   : 'booking-details.pdf',
			image      : {type: 'jpeg', quality: 0.98},
			html2canvas: {scale: 2},
			jsPDF      : {unit: 'in', format: 'letter', orientation: 'portrait'}
		};

		// Convert HTML to PDF
		html2pdf().set(opt).from(element).save();
	}
</script>
</body>
</html>
