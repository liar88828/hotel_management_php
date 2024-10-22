<?php
require('views/assets/php/essentials.php');
adminLogin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./views/assets/php/admin/links.php') ?>
</head>
<body class="bg-white ">
<div class="container-fluid  " id="main-content">
    <div class="row">
        <?php require('views/components/admin/header.php'); ?>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-1">Testimonial </h3>

            <section class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
                <a href="/admin/testimonial/create" class='btn btn-success'> Create</a>
            </section>

            <?php if (empty($testimonials)): ?>
                <div class="alert alert-info">
                    <p>Data Is Empty</p>
                </div>
            <?php else: ?>
                <section class="container mt-5">
                    <div class="col">
                        <div class="row gap-2">
                            <?php foreach ($testimonials as $testimonial): ?>
                                <div class=" bg-white p-4 col-5  px-4 border">
                                    <div class="profile d-flex justify-content-between">
                                        <img
                                                src="/images/person/<?php print_r($testimonial->image); ?>"
                                                width="100px"
                                                alt="<?php print_r($testimonial->image) ?>"
                                        />
                                        <h6 class="m-0 ms-2"><?php print_r($testimonial->name) ?></h6>
                                        <div class="">

                                            <a href="/admin/testimonial/update/<?php print_r($testimonial->id) ?>"
                                               class='btn btn-success'>
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p><?php print_r($testimonial->text) ?>
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
                        </div>
                    </div>

                </section>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



