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

    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <?php if (empty($room)): ?>
                <p>No rooms available.</p>
            <?php else: ?>

                <div class="container mt-5">
                    <h1 class="mb-3"><?= htmlspecialchars($room->name) ?></h1>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../../images/carousel/kamar.jpg" class="img-fluid rounded"
                                 alt="Room Image">
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
                        <a href="/room" class="btn btn-secondary">Back to Rooms</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
</div>
<?php require('./views/components/footer.php'); ?>

</body>
</html>
