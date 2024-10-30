<?php if (empty($room)): ?>
    <p>No rooms available.</p>
<?php else: ?>

    <div class="container mt-5">
        <h1 class="mb-3"><?= htmlspecialchars($room->name) ?></h1>

        <div class="row">

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
                    <ul class="row row-cols-2">
                        <li>Bedrooms : <?= htmlspecialchars($room->bedrooms) ?></li>
                        <li>Bathrooms : <?= htmlspecialchars($room->bathrooms) ?></li>
                        <li>Wardrobe : <?= htmlspecialchars($room->wardrobe) ?></li>
                    </ul>
                </div>

                <div class="facilities">
                    <h5>Facilities</h5>
                    <ul class="row row-cols-2">
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
                    <ul class="row row-cols-2">
                        <li>
                            Adults :<?= htmlspecialchars($room->adult) ?>
                        </li>
                        <li>
                            Children :<?= htmlspecialchars($room->children) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="/room" class="btn btn-secondary">Back to Rooms</a>
            <?php if (checkSessionGuest()): ?>
                <a href="/guest/room/<?= htmlspecialchars($room->id) ?>" class="btn btn-info">Check</a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
