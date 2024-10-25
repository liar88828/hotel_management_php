<?php
getSessionGuest()
?>
<div class=" bg-dark text-light p-3 d-flex align-items-center justify-content-between ">
    <h3 class="mb-0 h-font">ASRAMA DIKLAT</h3>
    <form action="/auth/logout" method="POST">
        <button type="submit" class="btn btn-light btn-sm">
            LOGOUT
        </button>
    </form>
</div>

<div class="col-lg-2 bg-dark border-top border-3 border-secondary h-auto"
     id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/guest/profile">Profile</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link text-white" href="/guest/history">History</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link text-white" href="/guest/room">Rooms</a>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/guest/booking">Booking</a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>
</div>