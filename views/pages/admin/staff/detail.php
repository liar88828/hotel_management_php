<h1 class="mb-1">Profile</h1>
<?php /** @var StaffBase $staff */
if (empty($staff)): ?>
    <div class="alert alert-info">
        <p> Guest Is Not Found</p>
    </div>
<?php else: ?>

    <div class="card rounded-5 profile-card">
        <div class="profile-header">
            <img src="/images/person/<?php echo htmlspecialchars($staff->image ?: 'default-avatar.png'); ?>"
                 alt="Profile Image"
                 style="width: 10rem; height: 10rem; border-radius: 50%; object-fit: cover;">
            <h1><?php echo htmlspecialchars($staff->name); ?></h1>
        </div>
        <div class="card-body">
            <!-- Profile Header -->


            <!-- Profile Info -->
            <div class="profile-info">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Contact Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Position: </strong><?php echo htmlspecialchars($staff->position); ?></li>
                            <li><strong>Email: </strong><?php echo htmlspecialchars($staff->email); ?></li>
                            <li>
                                <strong>Phone: </strong><?php echo htmlspecialchars($staff->phone ?: 'Not provided'); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>Personal Details</h5>
                        <ul class="list-unstyled">
                            <li>
                                <strong>Address: </strong><?php echo htmlspecialchars($staff->address ?: 'Not provided'); ?>
                            </li>
                            <li>
                                <strong>Pin
                                    Code: </strong><?php echo htmlspecialchars($staff->pin_code ?: 'Not provided'); ?>
                            </li>
                            <li><strong>Date of
                                    Birth: </strong><?php echo htmlspecialchars($staff->date_of_birth ?: 'Not provided'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 ">
        <a href="/admin/staff" class="btn btn-secondary">Back</a>
        <a href="/admin/staff/update/<?php echo htmlspecialchars($staff->id); ?>"
           class="btn btn-primary">
            Update Guest
        </a>
    </div>

<?php endif; ?>

