<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Rooms</h2>
    <div class="h-line bg-dark"></div>
</div>
<div class="row">
    <section class="col-lg-3 col-md-12 mb-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2">FILTER</h4>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form
                        action="/room"
                        method="post"
                        class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

                    <div class="border bg-light p-3 rounded mb-3">
                        <h5 class="mb-3 mt-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                        <label class="form-label " for="check_in_date">Check-in</label>
                        <input type="date" class="form-control shadow-none mb-3" name="check_in_date"
                               id="check_in_date">
                        <label class="form-label" for="check_out_date">Check-out</label>
                        <input type="date" class="form-control shadow-none" name="check_out_date"
                               id="check_out_date">
                    </div>

                    <div class="border bg-light p-3 rounded mb-3">
                        <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                        <div class="mb-2">
                            <input type="checkbox" id="f1" class="form-check-input shadow-none me-1"
                                   name="television">
                            <label class="form-check-label" for="f1">Television</label>
                        </div>
                        <div class="mb-2">
                            <input type="checkbox" id="f2" class="form-check-input shadow-none me-1" name="wifi">
                            <label class="form-check-label" for="f2">Wifi</label>
                        </div>
                        <div class="mb-2">
                            <input type="checkbox" id="f3" class="form-check-input shadow-none me-1" name="ac">
                            <label class="form-check-label" for="f3">AC</label>
                        </div>
                        <div class="mb-2">
                            <input type="checkbox" id="f3" class="form-check-input shadow-none me-1" name="cctv">
                            <label class="form-check-label" for="f3">CCTV</label>
                        </div>
                        <div class="mb-2">
                            <input type="checkbox" id="f3" class="form-check-input shadow-none me-1"
                                   name="dining_room">
                            <label class="form-check-label" for="f3">Dining Room</label>
                        </div>
                        <div class="mb-2">
                            <input type="checkbox" id="f3" class="form-check-input shadow-none me-1"
                                   name="parking_area">
                            <label class="form-check-label" for="f3">Parking Area</label>
                        </div>
                        <div class="mb-2">
                            <input type="checkbox" id="f3" class="form-check-input shadow-none me-1"
                                   name="security">
                            <label class="form-check-label" for="f3">Security</label>
                        </div>
                    </div>

                    <div class="border bg-light p-3 rounded mb-3">
                        <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                        <div class="d-flex">
                            <div class="me-3">
                                <label class="form-label" for="adult">Adults</label>
                                <input type="number" class="form-control shadow-none" id="adult" name="adult">
                            </div>
                            <div>
                                <label class="form-label" for="children">Children</label>
                                <input type="number" class="form-control shadow-none" id="children" name="children">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </form>
            </div>

        </nav>
    </section>

    <section class="col-lg-9 col-md-12 gap-2 d-flex flex-column">
        <?php if (empty($rooms)): ?>
            <h1>Data is not Found</h1>
        <?php else: ?>
            <?php /** @var RoomBase $room */
            foreach ($rooms as $room): ?>

                <div class="card  shadow">
                    <div class="card-body">
                        <div class="row row-cols-1 justify-content-between">
                            <div class=" col-5">
                                <img
                                        src="/images/rooms/<?= htmlspecialchars($room->image) ?>"
                                        class="img-fluid rounded"
                                        style="width: 20rem; height: 20rem; object-fit: cover;"
                                        alt="<?= htmlspecialchars($room->name) ?>">
                            </div>
                            <div class=" col-4">
                                <h5 class="mb-1">
                                    <?= htmlspecialchars($room->name) ?>
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

                            <div class=" col-3 gap-2 d-flex  flex-column">
                                <h6 class="">
                                    <?php
                                    setlocale(LC_MONETARY, "id_ID");
                                    echo "Rp. " . number_format((int)$room->price, 0, ',', '.');
                                    ?>
                                    /night
                                </h6>
                                <?php if (getSessionGuest()): ?>
                                    <a href="/guest/booking/<?= $room->id ?>" class="btn btn-info   ">
                                        Book Now
                                    </a>
                                <?php endif; ?>
                                <a href="/room/<?= $room->id ?>"
                                   class="btn w-100 btn-outline-dark ">
                                    More Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>


