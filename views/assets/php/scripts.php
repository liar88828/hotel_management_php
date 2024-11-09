<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
	function previewImage(event) {
		const reader = new FileReader();
		const imagePreview = document.getElementById('image-preview');
		reader.onload = function() {
			if (reader.readyState === 2) {
				imagePreview.src = reader.result;
				imagePreview.style.display = 'block'; // Show the image preview
			}
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>


<script>
	function previewImageUpdate(event) {
		const reader = new FileReader();
		const imagePreview = document.getElementById('image-preview-update');
		reader.onload = function () {
			if (reader.readyState === 2) {
				imagePreview.src = reader.result;
				imagePreview.style.display = 'block'; // Show the image preview
			}
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>


<!-- JavaScript for price calculation -->
<script>
	// const pricePerNight = 200;
	// const pricePerNight = 200;
	const pricePerNight = document.getElementById('thisPrice').value;

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
<!--print -->
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
