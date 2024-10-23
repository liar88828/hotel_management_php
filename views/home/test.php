<div class="row">
    <div class="col-md-6 mb-3">
        <label for="checkInDate" class="form-label"><i class="fas fa-calendar-alt"></i> Check-In Date</label>
        <input type="date" class="form-control" id="checkInDate" name="check_in_date" required onchange="calculateTotal()">
    </div>
    <div class="col-md-6 mb-3">
        <label for="checkOutDate" class="form-label"><i class="fas fa-calendar-alt"></i> Check-Out Date</label>
        <input type="date" class="form-control" id="checkOutDate" name="check_out_date" required onchange="calculateTotal()">
    </div>
</div>

<!-- Total Price (calculated based on room selection and dates) -->
<div class="mb-3">
    <label for="totalPrice" class="form-label"><i class="fas fa-dollar-sign"></i> Total Price</label>
    <input type="number" class="form-control" id="totalPrice" name="total_price" placeholder="Calculated Total" readonly>
</div>

<!-- JavaScript for price calculation -->
<script>
	const pricePerNight = 200;

	function calculateTotal() {
		const checkInDate = document.getElementById('checkInDate').value;
		const checkOutDate = document.getElementById('checkOutDate').value;

		if (checkInDate && checkOutDate) {
			const checkIn = new Date(checkInDate);
			const checkOut = new Date(checkOutDate);

			// Calculate the number of days between check-in and check-out
			const timeDiff = checkOut.getTime() - checkIn.getTime();
			const daysDiff = timeDiff / (1000 * 3600 * 24);

			if (daysDiff > 0) {
				// Calculate the total price
				const totalPrice = daysDiff * pricePerNight;
				document.getElementById('totalPrice').value = totalPrice;
			} else {
				document.getElementById('totalPrice').value = 0;
			}
		}
	}
</script>
