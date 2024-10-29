<?php
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
<div class="container-fluid" id="main-content">
    <div class="row">
        <?php require('views/components/admin/header.php'); ?>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <?php showMessage() ?>

            <h1>Room Detail </h1>


            <?php /** @var RoomBase $room */
            if (empty($room)): ?>
                <div class="alert alert-info">
                    <p> Room Is Not Found</p>
                </div>


            <?php else: ?>
                <section class=" card">
                    <div class="card-body">

                        <h1 class="card-title"><?= htmlspecialchars($room->name) ?></h1>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="swiper swiper-container mySwiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="/images/rooms/<?= htmlspecialchars($room->image) ?>"
                                                 class="w-100  d-block  "
                                                 alt="image1"
                                                 style="object-fit:cover;
                                                        object-position:center;
                                                        /*width: 200px;*/
                                                        height: 400px;"
                                            >
                                        </div>

                                        <?php if (!empty($room_images)): ?>
                                            <?php /** @var RoomImageBase $room_image */
                                            foreach ($room_images as $room_image) : ?>

                                                <div class="swiper-slide">
                                                    <img
                                                            src="/images/rooms/<?= htmlspecialchars($room_image->image) ?>"
                                                            class="w-100  d-block  "
                                                            alt="image1"
                                                            style="object-fit:cover;
                                object-position:center;
                                /*width: 200px;*/
                                height: 400px;"
                                                    >
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4>Room Details</h4>
                                <p><strong>Area:</strong> <?= htmlspecialchars($room->area) ?> m²</p>
                                <p><strong>Price:</strong> Rp. <?= number_format($room->price, 0, ',', '.') ?>/night
                                </p>
                                <p><strong>Status:</strong> <span
                                            class="badge rounded-pill text-bg-<?= $room->status == 1 ? 'success' : 'danger' ?>"><?= htmlspecialchars($room->status == 1 ? 'Available' : 'Unavailable') ?></span>
                                </p>
                                <p><strong>Description:</strong> <?= htmlspecialchars($room->description) ?></p>

                                <div class="features">
                                    <h5>Features</h5>
                                    <p><?= htmlspecialchars($room->bedrooms) ?>
                                        Bedrooms, <?= htmlspecialchars($room->bathrooms) ?>
                                        Bathrooms, <?= htmlspecialchars($room->wardrobe) ?> Wardrobe</p>
                                </div>

                                <div class="facilities">
                                    <h5>Facilities</h5>
                                    <ul>
                                        <?php if ($room->wifi): ?>
                                            <li>Wi-Fi</li><?php endif; ?>
                                        <?php if ($room->television): ?>
                                            <li>Television</li><?php endif; ?>
                                        <?php if ($room->ac): ?>
                                            <li>AC</li><?php endif; ?>
                                        <?php if ($room->cctv): ?>
                                            <li>CCTV</li><?php endif; ?>
                                        <?php if ($room->dining_room): ?>
                                            <li>Dining Room</li><?php endif; ?>
                                        <?php if ($room->parking_area): ?>
                                            <li>Parking Area</li><?php endif; ?>
                                    </ul>
                                </div>

                                <div class="guests">
                                    <h5>Guest Capacity</h5>
                                    <p><?= htmlspecialchars($room->adult) ?>
                                        Adults, <?= htmlspecialchars($room->children) ?>
                                        Children</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="/admin/room" class="btn btn-secondary">Back to Rooms</a>
                            <a href="/admin/room/update/<?= $room->id ?>"
                               class="btn btn-info">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                        </div>
                    </div>
                </section>
                <section class="card mt-2 ">
                    <div class="card-body">
                        <div class="d-flex gap-2  align-items-center " style="overflow-x: auto; width: auto;">
                            <div style="flex-shrink: 0">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    Add Image<i class="bi bi-plus-square-dotted p-2"></i>

                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/room/<?= htmlspecialchars($room->id) ?>"
                                                      method="post"
                                                      enctype="multipart/form-data"
                                                >
                                                    <!-- Image input-->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="image">Add Image Room</label>
                                                        <input type="file" class="form-control shadow-none" id="image"
                                                               name="image"
                                                               accept="image/*" required onchange="previewImage(event)">
                                                    </div>

                                                    <!-- Image preview -->
                                                    <div class="mb-3">
                                                        <img id="image-preview" src="" alt="Image Preview"
                                                             class="img-fluid"
                                                             style="max-height: 300px; display: none;">
                                                    </div>
                                                    <button class="btn btn-info" type="submit">Save</button>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <!--                                                <button type="button" class="btn btn-primary">Save changes</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (empty($room_images)): ?>
                                <div class="card " style="flex-shrink: 0">
                                    <div class="card-body">
                                        <h1>Empty</h1>
                                    </div>

                                </div>
                            <?php else: ?>

                                <?php /** @var RoomImageBase $room_image */
                                foreach ($room_images as $room_image) : ?>

                                    <div class="card " style="flex-shrink: 0">
                                        <div class="card-body">
                                            <img src="/images/rooms/<?= htmlspecialchars($room_image->image) ?>"
                                                 class="img-fluid rounded"
                                                 style="object-fit: fill; height: 200px; width:200px ;"
                                                 alt="<?= htmlspecialchars($room_image->image) ?>">
                                            <form action="/admin/room-delete/<?= htmlspecialchars($room_image->id) ?>"
                                                  method="post">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <div class="card " style="flex-shrink: 0">
                                <div class="card-body">
                                    <img src="/images/rooms/<?= htmlspecialchars($room->image) ?>"
                                         class="img-fluid rounded"
                                         style="object-fit: fill; height: 200px; width:200px ;"
                                         alt="<?= htmlspecialchars($room->name) ?>">"
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
<?php require('views/assets/php/swiper.php') ?>

</body>
</html>



