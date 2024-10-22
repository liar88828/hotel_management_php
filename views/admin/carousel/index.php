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
                <a href="/admin/carousel/create" class='btn btn-success'> Create</a>
            </section>

            <?php if (empty($carousels)): ?>
                <div class="alert alert-info">
                    <p>Data Is Empty</p>
                </div>
            <?php else: ?>
                <section class="container mt-5">
                    <div class="col">
                        <div class="row gap-2">
                            <?php foreach ($carousels as $carousel): ?>
                                <div class=" bg-white p-4 col-5  px-4 border">
                                    <div class="profile  ">
                                        <img
                                                src="/images/carousel/<?php print_r($carousel->image); ?>"
                                                width="300rem"
                                                height="auto"
                                                alt="<?php print_r($carousel->image) ?>"
                                        />
                                        <h6 class="m-0 ms-2 my-4"><?php print_r($carousel->name) ?></h6>
                                        <div class="">
                                            <a href="/admin/carousel/update/<?php print_r($carousel->id) ?>"
                                               class='btn btn-success'>
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </div>
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



