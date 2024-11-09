<?php
/** @var SettingBase $setting
 * @var int $room_count
 * @var int $guest_count
 *
 * */

?>
<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">About Us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        <?php print_r(isset($setting->site_about) ? $setting->site_about : ''); ?>
    </p>
</div>

<div class="flex-column-reverse flex-md-row row row-cols-1 row-cols-md-2 align-items-center">
    <div class="">
        <h3 class="mb-3"></h3>
        <p class="text-center text-md-end ">
            <?php print_r(isset($setting->description_about) ? $setting->description_about : ''); ?>
        </p>
    </div>
    <div class=" ">
        <img src="../../../images/about/asrama.jpg"
             class="w-100"
             alt="asrama"/>
    </div>
</div>


<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="../../../images/about/hotel.svg" width="70px"
                     alt="hotel"
                />
                <h4 class="mt-3"><?= htmlspecialchars($room_count); ?> Rooms</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="../../../images/about/staff.svg" width="70px"
                     alt="staff"
                />
                <h4 class="mt-3">STAFF 24 HOURS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="../../../images/about/rating.svg" width="70px"
                     alt="rating"
                />
                <h4 class="mt-3">90+ REVIEWS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="../../../images/about/customers.svg" width="70px"
                     alt="customers"
                />
                <h4 class="mt-3"><?= htmlspecialchars($guest_count); ?>+ CUSTOMERS</h4>
            </div>
        </div>
    </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<div class="container px-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper mb-5">

            <?php /** @var StaffBase $staff */
            if (empty($member_staff)):?>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="../../../images/about/IMG_16569.jpeg"
                         style="width:20rem;height: 20rem ; object-fit: cover ;border-radius: 20%" alt="staff member"/>

                    <h5 class="mt-2">Random Name</h5>
                </div>
            <?php else: ?>

                <?php foreach ($member_staff as $staff): ?>
                    <div class="swiper-slide bg-white text-center overflow-hidden rounded w-50">
                        <img src="/images/person/<?= htmlspecialchars($staff->image) ?>"
                             style="width:20rem;height: 20rem ; object-fit: cover;border-radius: 20%"
                             alt="staff member"/>
                        <div class="bg-opacity-50 bg-black rounded shadow p-4 text-center box">

                            <h1 class="mt-2"><?= htmlspecialchars($staff->name) ?></h1>
                            <h2><?= htmlspecialchars($staff->position) ?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

