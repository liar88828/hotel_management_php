<section class="d-flex align-items-center justify-content-center" style="min-height: 50vh;">

    <div class="text-center">
        <h1 class="display-1 fw-bold text-danger">error</h1>
        <p class="lead">
            <?php if (isset($message)): ?>
                <?= htmlspecialchars($message); ?>
            <?php else: ?>
            Oops! The page you're looking is Error
        </p>
        <?php endif; ?>
        <a href="/" class="btn btn-primary mt-3">Go Back to Home</a>
    </div>
</section>