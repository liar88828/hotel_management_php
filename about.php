<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('./views/assets/php/links.php') ?>
    <title>About Us</title>
    <style>
      .box{
        border-top-color: var(--teal) !important;
      }
    </style>
</head>
<body class="bg-light">

<?php require('./views/components/header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">About Us</h2>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
    Eligendi verit ullam dignissimos adipisci autem.</p>
</div>

<div class="container">
  <div class="row justify-content-between align-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
    <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis reiciendis corrupti laudantium quos saepe, quaerat aliquam.</p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <img src="images/about/asrama.jpg" class="w-100">
    </div>
  </div>
</div>


<div class="container mt-5">
<div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/hotel.svg" width="70px">
                            <h4 class="mt-3">72 Rooms</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/staff.svg" width="70px">
                            <h4 class="mt-3">STAFF 24 HOURS</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/rating.svg" width="70px">
                            <h4 class="mt-3">90+ REVIEWS</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                            <img src="images/about/customers.svg" width="70px">
                            <h4 class="mt-3">100+ CUSTOMERS</h4>
                        </div>
                    </div>
                </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<div class="container px-4">
 <div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Kepala Pimpinan <br> Ratri Nugrahaning </h5>
        </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
      <div class="swiper-slide bg-white text-center overflow-hidden rounded">
        <img src="images/about/IMG_16569.jpeg" class="w-100">
        <h5 class="mt-2">Random Name</h5>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<?php require('views/components/footer.php'); ?>
<?php require('views/assets/php/swiper.php'); ?>

</body>
</html>