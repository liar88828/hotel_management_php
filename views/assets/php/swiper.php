<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".swiper-container", {
		spaceBetween: 30,
		effect: "fade",
		loop: true,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		},
		// Option to navigate
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});


	var swiper = new Swiper(".swiper-testimonials", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		// slidesPerView: "3",
		loop: true,
		coverflowEffect: {
			rotate: 50,
			stretch: 0,
			depth: 100,
			modifier: 1,
			slideShadows: false,
		},
		pagination: {
			el: ".swiper-pagination",
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			640: {
				slidesPerView: 1,
			},
			768: {
				slidesPerView: 2,
			},
			1024: {
				slidesPerView: 3,
			}
		}
	});


	var swiper = new Swiper(".mySwiper", {
		spaceBetween: 40,
		pagination: {
			el: ".swiper-pagination",
		},
		breakpoints: {
			// 320: {
			// 	slidesPerView: 1,
			// },
			// 640: {
			// 	slidesPerView: 2,
			// },
			// 768: {
			// 	slidesPerView: 2,
			// },
			// 1024: {
			// 	slidesPerView: 3,
			// }
		}
	});
</script>
