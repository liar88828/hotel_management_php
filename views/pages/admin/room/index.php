<h1>Rooms</h1>
<section class="mb-3">
    <form
            action="/admin/room"
            method="post"
            class="input-group mb-3"
    >
        <input type="text" class="form-control" placeholder="Recipient's username"
               aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="bi bi-search"></i>
        </button>
    </form>
    <div class="d-flex justify-content-between">
        <div class="d-flex gap-2">
            <a href="/admin/room" class='btn btn-secondary'>All</a>
            <a href="/admin/room-available" class='btn btn-success'>Available</a>
            <a href="/admin/room-full" class='btn btn-danger'>Full</a>
        </div>

        <div class="">
            <a href="/admin/room/create" class='btn btn-info'>Create
                <i class="bi bi-plus-square-dotted"></i>
            </a>
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
                                        <?= htmlspecialchars($room->status ? 'Available' : 'Full') ?>
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
                        <form action="/admin/room-available/<?= $room->id ?>" method="post">

                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1"
                                       name="status"<?= $room->status ? 'checked' : '' ?>>
                                <label class="form-check-label" for="f3">
                                    <button class="btn w-100 btn-info ">Status</button>
                                </label>
                            </div>
                        </form>
                        <h6 class="mb-1">
                            <?php
                            setlocale(LC_MONETARY, "id_ID");
                            echo "Rp. " . number_format((int)$room->price, 0, ',', '.');
                            ?>/night</h6>


                        <!--                                    <a href="/admin/room/update/-->
                        <?php //= $room->id ?><!--"-->
                        <!--                                       class="btn btn-info w-100 shadow-none mb-2">-->
                        <!--                                        <i class="bi bi-pencil-square"></i> Edit-->
                        <!--                                    </a>-->

                        <a href="/admin/room/<?= $room->id ?>"
                           class="btn w-100 btn-outline-dark mb-2">More Details</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
