<h1>Dashboard</h1>
<section class=" border p-3 mb-2">
    <h2>User Management</h2>
    <div class="row gap-5  justify-content-center">
        <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">User All</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_guest ?? 0) ?>


                </h5>
            </div>
        </div>
        <div class="card bg-light  " style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">User Booking Now</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_guest_booking ?? 0) ?>
                </h5>
            </div>
        </div>
        <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">User Confirm Now</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_guest_confirm ?? 0) ?>

                </h5>
            </div>
        </div>
    </div>

</section>

<section class=" border p-3 mb-2">
    <h2>Room Management</h2>
    <div class="row gap-5 p-2  justify-content-center">
        <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">All Room</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_room ?? 0) ?>
                </h5>
            </div>
        </div>
        <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">Room Available</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_room_available ?? 0) ?>
                </h5>
            </div>
        </div>
        <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">Room Full</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_room_full ?? 0) ?>

                </h5>
            </div>
        </div>
    </div>
</section>

<section class=" border p-3">
    <h2>Booking Management</h2>
    <div class="row gap-5   justify-content-center">
        <div class="card bg-light mb-3" style="width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">All Booking</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_booking ?? 0) ?>
                </h5>
            </div>
        </div>
        <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">Booking</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_booking ?? 0) ?>
                </h5>
            </div>
        </div>


        <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">Booking Cancel</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_booking_cancel ?? 0) ?>

                </h5>
            </div>
        </div>

        <div class="card bg-light " style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">Booking Finish</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_booking_confirm ?? 0) ?>

                </h5>
            </div>
        </div>

        <div class="card bg-light mb-3" style="max-width: 18rem; height: 10rem;">
            <div class="card-header fw-bold">Booking Finish</div>
            <div class="card-body text-center">
                <h5 class="card-title fs-2">
                    <?= htmlspecialchars($count_booking_finish ?? 0) ?>
                </h5>
            </div>
        </div>
    </div>
</section>


