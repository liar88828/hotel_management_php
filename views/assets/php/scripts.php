<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
