<h1>Rooms</h1>
<section class="mb-3">
    <form class="input-group mb-3" action="/guest/room" method="post">
        <input type="text" class="form-control" placeholder="Recipient's username"
               aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="bi bi-search"></i>
        </button>

    </form>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi-filter bi"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/guest/room-filter" method="post">
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
                                <input type="checkbox" id="f2" class="form-check-input shadow-none me-1"
                                       name="wifi">
                                <label class="form-check-label" for="f2">Wifi</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1"
                                       name="ac">
                                <label class="form-check-label" for="f3">AC</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1"
                                       name="cctv">
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
                                    <input type="number" class="form-control shadow-none" id="adult"
                                           name="adult">
                                </div>
                                <div>
                                    <label class="form-label" for="children">Children</label>
                                    <input type="number" class="form-control shadow-none" id="children"
                                           name="children">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</section>

<section>
    <?php if (empty($rooms)): ?>
        <p>No rooms available.</p>
    <?php else: ?>
        <?php foreach ($rooms as $room): ?>
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="/images/rooms/<?= htmlspecialchars($room->image) ?>"
                             class="img-fluid rounded "
                             height="200"
                             width="200"
                             alt="<?= htmlspecialchars($room->name) ?>"
                        >
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-1"><?= htmlspecialchars($room->name) ?>
                            <span class="badge rounded-pill text-bg-<?= $room->status == 1 ? 'success' : 'danger' ?> ">
                                        <?= htmlspecialchars($room->status == 1 ? 'Available' : 'Unavailable') ?>
                                      </span>
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
                            ?>/night
                        </h6>

                        <a href="/guest/room/<?= $room->id ?>"
                           class="btn w-100 btn-outline-dark ">More Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

