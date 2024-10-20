<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('views/assets/php/links.php') ?>
    <title>ASRAMA DIKLAT - HOME</title>

</head>
<body class="bg-light">

<?php require('views/components/header.php') ?>

<!-- Swiper -->
<div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./images/carousel/diklat1.jpg" class="w-100 d-block" alt="image1"/>
            </div>
            <div class="swiper-slide">
                <img src="./images/carousel/diklat7.jpg" class="w-100 d-block" alt="image2"/>
            </div>
            <div class="swiper-slide">
                <img src="./images/carousel/diklat5.jpg" class="w-100 d-block" alt="image3"/>
            </div>

            <div class="swiper-slide">
                <img src="./images/carousel/diklat6.jpg" class="w-100 d-block" alt="image4"/>
            </div>
            <div class="swiper-slide">
                <img src="./images/carousel/kamar.jpg" class="w-100 d-block" alt="image4"/>
            </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
</div>
<!-- Check Availability Form -->
<div class="container availablity-form">
    <div class="row">
        <div class="col-lg-12 bg-white p-4 rounded">
            <h4 class="mb-4">Check Booking Availability </h4>
            <form>
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label
                                for="check_in"
                                class="form-label" style="font-weight: 500">Check in</label>
                        <input
                                name="check_in"
                                type="date" class="form-control shadow-none" aria-describedby="emailHelp">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label
                                for="check_out"
                                class="form-label" style="font-weight: 500">Check Out</label>
                        <input type="date"
                               name="check_out"
                               class="form-control shadow-none" aria-describedby="emailHelp">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500">Adult</label>
                        <select class="form-select shadow-none">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500">Children</label>
                        <select class="form-select shadow-none">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Our Rooms -->
<h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="./images/carousel/kamar.jpg" class="card-img-top"
                     alt="image1"
                />
                <div class="card-body">
                    <h5>Kamar A</h5>
                    <h6 class="mb-5">Rp.200.000/night</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">2 Bedroom</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">1 Bathrooms</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">Wardrobe</span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">Wi-Fi</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">Television</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">AC</span>
                    </div>
                    <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">2 Adults</span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge-rounded-pill bg-light">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="./images/carousel/kamar.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Kamar B</h5>
                    <h6 class="mb-5">Rp.200.000/night</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">2 Bedroom</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">1 Bathrooms</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">Wardrobe</span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">Wifi</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">Television</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">AC</span>
                    </div>
                    <div class="guests mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">2 Adults</span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge-rounded-pill bg-light">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </span>
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="./images/carousel/kelas.jpg" class="card-img-top">
                <div class="card-body">
                    <h5>Meeting Room Kecil</h5>
                    <h6 class="mb-5">Rp.1.250.000/day</h6>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill text-bg-light text-wrap">Wifi</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">CCTV 24 Hr</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">AC</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">Dining Room</span>
                        <span class="badge rounded-pill text-bg-light text-wrap">Parking Area</span>
                    </div>
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge-rounded-pill bg-light">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </span>
                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">MORE ROOMS >></a>
        </div>
    </div>
</div>
<!-- OUR FACILITIES -->
<h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="./images/facilities/IMG_43553.svg" width="80px">
            <h5 class="mt-3">wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="./images/facilities/cctvcamera.svg" width="80px">
            <h5 class="mt-3">CCTV</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="./images/facilities/IMG_49949.svg" width="80px">
            <h5 class="mt-3">AC</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="./images/facilities/IMG_41622.svg" width="80px">
            <h5 class="mt-3">TV</h5>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">MORE FACILITIES >></a>
        </div>
    </div>
</div>

<!-- Testimonials -->
<h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
<div class="container">

    <!-- Swiper -->
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-5">

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="./images/person/orang1.jpg" width="30px">
                    <h6 class="m-0 ms-2">Katarina</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Sint numquam amet impedit, sunt voluptas expedita dolorum
                </p>
                <div class="rating">
          <span class="badge-rounded-pill bg-light">
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
         </span>
                </div>
            </div>
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="./images/person/person2.jpg" width="30px">
                    <h6 class="m-0 ms-2">Kairos</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Sint numquam amet impedit, sunt voluptas expedita dolorum
                </p>
                <div class="rating">
          <span class="badge-rounded-pill bg-light">
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
         </span>
                </div>
            </div>
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="./images/person/person3.jpg" width="30px">
                    <h6 class="m-0 ms-2">Hwang In-Yeop</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Sint numquam amet impedit, sunt voluptas expedita dolorum
                </p>
                <div class="rating">
          <span class="badge-rounded-pill bg-light">
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
         </span>
                </div>
            </div>
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="./images/about/rating.svg" width="20px">
                    <h6 class="m-0 ms-2">Rendom User 1</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Sint numquam amet impedit, sunt voluptas expedita dolorum
                </p>
                <div class="rating">
          <span class="badge-rounded-pill bg-light">
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
           <i class="bi bi-star-fill text-warning"></i>
         </span>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="col-lg-12 text-center mt-5">
        <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">MORE Testimonials >></a>
    </div>
</div>

<!-- Reach Us -->
<h2 class="mt-4 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="320"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8251100029665!2d110.46534507318081!3d-7.0298326688678845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c53a1fbd12f%3A0x764f3182cbd088d9!2sBalai%20Diklat%20BKPP%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1728911570150!5m2!1sid!2sid"
                    style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="col-lg-4 col-md-4">

            <div class="bg-white p-4 rounded mb-4">
                <h4>Call Us</h4>
                <a href="tel: +9178943958936" class="d-inline-block mb-2 text-decoration-none text-dark "><i
                            class="bi bi-telephone"></i> 024-3586680</a><br>
                <a href="tel: +9154539589342" class="d-inline-block mb-2 text-decoration-none text-dark "><i
                            class="bi bi-telephone"></i> 024-3513366</a>
            </div>

            <div class="bg-white p-4 rounded mb-4">
                <h4>Follow Us</h4>
                <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-twitter"></i> Twitter
          </span>
                </a><br>
                <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-youtube me-1"></i> Youtube
          </span>
                </a><br>
                <a href="#" class="d-inline-block">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-instagram"></i> Instagram
          </span>
                </a><br>
            </div>

        </div>
    </div>
</div>

<?php require('views/components/footer.php') ?>
<?php require('views/assets/php/swiper.php') ?>


</body>
</html>