<section class="d-flex align-items-center justify-content-center" style="min-height: 50vh;">
    <div class="container text-center">
        <h1 class="display-4">You have been logged out</h1>
        <p class="lead">Thank you for visiting! Click below to log in again.</p>

        <?php if (!empty(getSessionGuest())): ?>
            <form action="/auth/logout" method="post">
                <button type="submit" class="btn btn-primary mt-3">
                    Logout
                </button>
            </form>
        <?php else: ?>
            <a href="/auth/login" class="btn btn-primary mt-3">Login Again</a>
        <?php endif; ?>
        <a href="/" class="btn btn-secondary mt-3">Go Back to Home</a>
    </div>
</section>