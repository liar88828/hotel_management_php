<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('./views/assets/php/links.php') ?>
    <title>ASRAMA DIKLAT - CONTACT</title>
</head>
<body class="bg-light">

<?php require('./views/components/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Contact Us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
        Eligendi verit ullam dignissimos adipisci autem.</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded" height="300px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8251100029665!2d110.46534507318081!3d-7.0298326688678845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c53a1fbd12f%3A0x764f3182cbd088d9!2sBalai%20Diklat%20BKPP%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1728911570150!5m2!1sid!2sid"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h5>Address</h5>
                <a href="https://maps.app.goo.gl/nGepWwGWZEUcaFK87" target="_blank"
                   class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt-fill"></i> Jl. Fatmawati No.73a, Kedungmundu, Kec. Tembalang, Kota Semarang,
                    Jawa Tengah 50273
                </a>
                <h5 class="mt-3">Call Us</h5>
                <a href="telp: 0243586680"
                   class="d-inline-block mb-2 text-decoration-none text-dark ">
                    <i class="bi bi-telephone-inbound-fill me-2"></i> 024-3586680
                </a>
                <br>
                <a href="telp: 0243586680" class="d-inline-block mb-2 text-decoration-none text-dark ">
                    <i class="bi bi-telephone-inbound-fill me-2"></i> 024-3513366
                </a>
                <h5 class="mt-4">Email</h5>
                <a href="mailto: bkpp.semarangkota@gmail.com"
                   class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-envelope-fill me-2"></i> bkpp.semarangkota@gmail.com</a>
                <h5 class="mt-3">Follow Us</h5>
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-instagram me-1"></i>
                </a>
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-twitter me-1"></i>
                </a>
                <a href="#" class="d-inline-block text-dark fs-5">
                    <i class="bi bi-youtube me-1"></i>
                </a><br>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 px-4">
            <div class="bg-white rounded shadow p-4">
                <form action="">
                    <h5>Send a message</h5>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Name</label>
                        <input type="text" class="form-control shadow-none" aria-describedby="emailHelp">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Email</label>
                        <input type="email" class="form-control shadow-none" aria-describedby="emailHelp">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Subject</label>
                        <input type="text" class="form-control shadow-none" aria-describedby="emailHelp">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Message</label>
                        <textarea class="form-control shadow-none" rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn custom-bg mt-3 shadow-none">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require('./views/components/footer.php'); ?>
</body>
</html>