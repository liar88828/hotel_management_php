<header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top ">
    <div class="container-fluid">


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="/admin/dashboard">ADMIN PANEL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/room">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/staff">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/guest">Guest</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  " href="/admin/testimonial">Testimonial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/booking">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/carousel">Carousel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/admin/settings">Settings</a>
                </li>
            </ul>
        </div>
        <form action="/auth/logout" method="POST">
            <button type="submit" class="btn btn-info">
                LOGOUT
            </button>
        </form>
    </div>
</nav>
</header>