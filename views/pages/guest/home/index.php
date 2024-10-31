<h1 class="mb-1">Profile</h1>
<?php if (empty($guest)): ?>
    <div class="alert alert-info">
        <p> Guest Is Not Found</p>
    </div>
<?php else: ?>

    <div class="card rounded-5 profile-card">
        <div class="profile-header">
            <img src="/images/person/<?php echo htmlspecialchars($guest->image ?: 'default-avatar.png'); ?>"
                 alt="Profile Image"
                 style="width: 10rem; height: 10rem; border-radius: 50%; object-fit: cover;">
            <h1><?php echo htmlspecialchars($guest->name); ?></h1>
        </div>
        <div class="card-body">
            <!-- Profile Header -->


            <!-- Profile Info -->
            <div class="profile-info">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Contact Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Email: </strong><?php echo htmlspecialchars($guest->email); ?></li>
                            <li>
                                <strong>Phone: </strong><?php echo htmlspecialchars($guest->phone ?: 'Not provided'); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>Personal Details</h5>
                        <ul class="list-unstyled">
                            <li>
                                <strong>Address: </strong><?php echo htmlspecialchars($guest->address ?: 'Not provided'); ?>
                            </li>
                            <li><strong>Pin
                                    Code: </strong><?php echo htmlspecialchars($guest->pin_code ?: 'Not provided'); ?>
                            </li>
                            <li><strong>Date of
                                    Birth: </strong><?php echo htmlspecialchars($guest->date_of_birth ?: 'Not provided'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 ">
        <a href="/guest/profile-update" class="btn btn-primary">Update Guest</a>
    </div>

<?php endif; ?>

