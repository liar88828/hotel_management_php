<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/">
            <img src="../../images/logo/logo_bkpp.png" width="150" height="75"
                 alt="logo"
            />
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse h-50" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 h-50">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/room">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/facility">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/contact">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/about">About</a>
                </li>
            </ul>
            <?php if (!empty(checkSessionGuest())): ?>
                <div class="d-flex" role="search">
                    <a href="/guest/profile" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                        Profile
                    </a>
                </div>
            <?php elseif (!empty(checkSessionAdmin())): ?>
                <div class="d-flex" role="search">
                    <a href="/admin/dashboard" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                        Profile
                    </a>
                </div>
            <?php else: ?>
                <div class="d-flex" role="search">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal"
                            data-bs-target="#loginmodel">Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                            data-bs-target="#registermodel">Register
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php require 'views\components\auth\login.php'; ?>
<?php require 'views\components\auth\register.php'; ?>
