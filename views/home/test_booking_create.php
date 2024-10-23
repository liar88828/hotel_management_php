<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8, #d9e8fc);
            font-family: 'Arial', sans-serif;
        }
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

<div class="container">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-calendar-plus"></i> Create Booking
        </div>
        <div class="card-body">
            <!-- Booking Form -->
            <form action="create_booking.php" method="POST">
                <!-- Guest Name -->
                <div class="mb-3">
                    <label for="guestName" class="form-label"><i class="fas fa-user"></i> Guest Name</label>
                    <input type="text" class="form-control" id="guestName" name="guest_name" placeholder="Enter guest name" required>
                </div>

                <!-- Room Selection -->
                <div class="mb-3">
                    <label for="roomSelect" class="form-label"><i class="fas fa-bed"></i> Select Room</label>
                    <select class="form-select" id="roomSelect" name="room_id" required>
                        <option value="1">Deluxe Room - $120/night</option>
                        <option value="2">Suite Room - $200/night</option>
                        <option value="3">Standard Room - $80/night</option>
                    </select>
                </div>

                <!-- Check-in and Check-out Dates -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="checkInDate" class="form-label"><i class="fas fa-calendar-alt"></i> Check-In Date</label>
                        <input type="date" class="form-control" id="checkInDate" name="check_in_date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="checkOutDate" class="form-label"><i class="fas fa-calendar-alt"></i> Check-Out Date</label>
                        <input type="date" class="form-control" id="checkOutDate" name="check_out_date" required>
                    </div>
                </div>

                <!-- Total Price (calculated based on room selection and dates) -->
                <div class="mb-3">
                    <label for="totalPrice" class="form-label"><i class="fas fa-dollar-sign"></i> Total Price</label>
                    <input type="number" class="form-control" id="totalPrice" name="total_price" placeholder="Calculated Total" readonly>
                </div>

                <!-- Booking Status -->
                <div class="mb-3">
                    <label for="statusSelect" class="form-label"><i class="fas fa-info-circle"></i> Booking Status</label>
                    <select class="form-select" id="statusSelect" name="status">
                        <option value="booked">Booked</option>
                        <option value="pending">Pending</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
	// JavaScript to calculate total price based on room selection and date difference
	const roomPrices = {
		1: 120,
		2: 200,
		3: 80
	};

	document.getElementById('roomSelect').addEventListener('change', updateTotalPrice);
	document.getElementById('checkInDate').addEventListener('change', updateTotalPrice);
	document.getElementById('checkOutDate').addEventListener('change', updateTotalPrice);

	function updateTotalPrice() {
		const roomId = document.getElementById('roomSelect').value;
		const checkInDate = new Date(document.getElementById('checkInDate').value);
		const checkOutDate = new Date(document.getElementById('checkOutDate').value);

		if (roomId && checkInDate && checkOutDate && checkOutDate > checkInDate) {
			const days = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24); // Calculate difference in days
			const totalPrice = days * roomPrices[roomId];
			document.getElementById('totalPrice').value = totalPrice.toFixed(2);
		} else {
			document.getElementById('totalPrice').value = '';
		}
	}
</script>

</body>
</html>