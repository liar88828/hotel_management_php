<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('views/assets/php/links.php') ?>
    <title>ASRAMA DIKLAT - FACILITIES</title>

</head>
<body class="bg-light">

<?php require('./views/components/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Testimonials</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
        Eligendi verit ullam dignissimos adipisci autem.</p>
</div>

<div class="container">
    <div class="row gap-5 mb-5 justify-content-between align-items-center">

        <?php if (isset($testimonials)): ?>
            <?php foreach ($testimonials as $testimonial): ?>
                <div class=" bg-white p-4 col-5  px-4 border">
                    <div class="profile d-flex gap-3">
                        <img
                                src="/images/person/<?php print_r($testimonial->image); ?>"
                                width="100px"
                                height="100px"
                                alt="<?php print_r($testimonial->image) ?>"
                                class="rounded-circle"
                        />
                        <h2 ><?php print_r($testimonial->name) ?></h2>
                    </div>
                    <p class="my-5 ">
                        <?php print_r($testimonial->text) ?>
                    </p>
                    <div class="rating">
                         <span class="badge-rounded-pill bg-light">
                             <?php foreach (range(1, $testimonial->rating) as $star): ?>
                                 <i class="bi bi-star-fill text-warning"></i>
                             <?php endforeach; ?>
                         </span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class=" bg-white p-4 col-sm-5 col-md-3 px-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="../../images/person/orang1.jpg" width="30px"
                         alt="orang1"
                    />
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

            <div class=" bg-white p-4 col-sm-5 col-md-3 px-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="../../images/person/orang1.jpg" width="30px"
                         alt="orang1"
                    />
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

            <div class=" bg-white p-4 col-sm-5 col-md-3 px-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="../../images/person/orang1.jpg" width="30px"
                         alt="orang1"
                    />
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

            <div class=" bg-white p-4 col-sm-5 col-md-3 px-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="../../images/person/orang1.jpg" width="30px"
                         alt="orang1"
                    />
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

            <div class=" bg-white p-4 col-sm-5 col-md-3 px-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="../../images/person/orang1.jpg" width="30px"
                         alt="orang1"
                    />
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

            <div class=" bg-white p-4 col-sm-5 col-md-3 px-4">
                <div class="profile d-flex align-items-center p-4">
                    <img src="../../images/person/orang1.jpg" width="30px"
                         alt="orang1"
                    />
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
        <?php endif; ?>
    </div>
</div>


<?php require('./views/components/footer.php'); ?>

</body>
</html>