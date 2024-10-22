<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('./views/assets/php/links.php') ?>
    <title>ASRAMA DIKLAT - ROOMS</title>
</head>
<body class="bg-light">

<?php require('./views/components/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Rooms</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <h4 class="mt-2">FILTER</h4>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <form
                            action="/room/search"
                            method="post"
                            class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3 mt-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                            <label class="form-label">Check-in</label>
                            <input type="date" class="form-control shadow-none mb-3">
                            <label class="form-label">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                <label class="form-check-label" for="f1">Facilities one</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                <label class="form-check-label" for="f2">Facilities two</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label class="form-check-label" for="f3">Facilities three</label>
                            </div>
                        </div>

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                            <div class="d-flex">
                                <div class="me-3">
                                    <label class="form-label">Adults</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div>
                                    <label class="form-label">Children</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </form>
                </div>

            </nav>
        </div>
        <?php if (empty($rooms)): ?>
            <div class="h-line bg-dark"></div>
        <?php else: ?>

        <div class="col-lg-9 col-md-12 px-4">
            <?php foreach ($rooms as $room): ?>

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="../../images/carousel/kamar.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1"><?= htmlspecialchars($room->name) ?>
                                <!--                                <span class="badge rounded-pill text-bg--->
                                <?php //= $room->status == 1 ? 'success' : 'danger' ?><!-- ">-->
                                <!--                                        --><?php //= htmlspecialchars($room->status == 1 ? 'Available' : 'Unavailable') ?>
                                <!--                                      </span>-->
                            </h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill text-bg-light text-wrap"><?= htmlspecialchars($room->bedrooms) ?> Bedrooms</span>
                                <span class="badge rounded-pill text-bg-light text-wrap"><?= htmlspecialchars($room->bathrooms) ?> Bathrooms</span>
                                <span class="badge rounded-pill text-bg-light text-wrap"><?= htmlspecialchars($room->wardrobe) ?> Wardrobe</span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <?php if ($room->wifi): ?>
                                    <span class="badge rounded-pill text-bg-light text-wrap">Wi-Fi</span>
                                <?php endif; ?>
                                <?php if ($room->television): ?>
                                    <span class="badge rounded-pill text-bg-light text-wrap">Television</span>
                                <?php endif; ?>
                                <?php if ($room->ac): ?>
                                    <span class="badge rounded-pill text-bg-light text-wrap">AC</span>
                                <?php endif; ?>
                                <?php if ($room->cctv): ?>
                                    <span class="badge rounded-pill text-bg-light text-wrap">CCTV</span>
                                <?php endif; ?>
                                <?php if ($room->dining_room): ?>
                                    <span class="badge rounded-pill text-bg-light text-wrap">Dining Room</span>
                                <?php endif; ?>
                                <?php if ($room->parking_area): ?>
                                    <span class="badge rounded-pill text-bg-light text-wrap">Parking Area</span>
                                <?php endif; ?>
                            </div>
                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <?php if ($room->adult > 0) {
                                    echo "<span class='badge rounded-pill text-bg-light text-wrap'> $room->adult Adults </span>";
                                } ?>
                                <?php if ($room->children > 0) {
                                    echo "<span class='badge rounded-pill text-bg-light text-wrap'> $room->adult Children </span>";
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-1">
                                <?php
                                setlocale(LC_MONETARY, "id_ID");
                                echo "Rp. " . number_format((int)$room->price, 0, ',', '.');
                                ?>/night</h6>
                            <a href="#" class="btn btn-info w-100 shadow-none mb-2">
                                Book Now
                            </a>

                            <a href="/room/detail/<?= $room->id ?>"
                               class="btn w-100 btn-outline-dark ">More Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php require('./views/components/footer.php'); ?>

</body>
</html>