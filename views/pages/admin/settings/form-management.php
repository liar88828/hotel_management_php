<!-- Management Team Section -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">Management Team</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                    data-bs-target="#management-s">
                <i class="bi bi-plus-square"></i> Add
            </button>
        </div>
        <div class="row" id="team-data">

            <?php /** @var StaffBase $staff */
            if (empty($setting_management)):?>
                <div class="alert alert-warning" role="alert"></div>
            <?php else: ?>
                <?php foreach ($setting_management as $staff): ?>
                    <div class="col-md-2 mb-3">
                        <div class="card bg-dark text-white">
                            <img src="/images/person/<?= htmlspecialchars($staff->image) ?>"
                                 class="card-img" alt="team"/>
                            <div class="card-img-overlay text-end">
                                <button type="button" class="btn btn-danger btn-sm ">
                                    <i class="bi bi-trash3"></i>
                                </button>

                                <button type="button" class="btn btn-info btn-sm ">
                                    <i class="bi bi-zoom-in"></i>
                                </button>
                            </div>
                            <div class="card-text text-center px-3 py-2">
                                <p>
                                    Name : <?= htmlspecialchars($staff->name) ?>
                                </p>
                                <p>
                                    Position : <?= htmlspecialchars($staff->position) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- Management Team Modal -->
<div class="modal fade" id="management-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="team_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/settings/staff" method="post" class="modal-body" enctype="multipart/form-data">

                        <span class="badge rounded-pill text-bg-light mb-3 text-wrap ls-base">Note: Your detais must match with ID (Adhar Card, passport, Driving Licence, etc) that will be required during check in.</span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control shadow-none" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control shadow-none" id="email" name="email"
                                           required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" for="phone">Phone Number</label>
                                    <input type="number" class="form-control shadow-none" id="phone" name="phone"
                                           required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" id="image">Profile Image</label>
                                    <input type="file" class="form-control shadow-none" id="image" name="image"
                                           required>
                                </div>
                                <div class="col-md-12 ps-0 mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <textarea class="form-control shadow-none" rows="1" id="address" name="address"
                                              required></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" for="pin_code">Pin Code</label>
                                    <input type="number" class="form-control shadow-none" id="pin_code" name="pin_code"
                                           required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" for="date_of_birth">Date of birth</label>
                                    <input type="date" class="form-control shadow-none" id="date_of_birth"
                                           name="date_of_birth" required>
                                </div>


                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label" for="position">Position</label>
                                    <input type="text" class="form-control shadow-none" id="position" name="position"
                                           required>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="staff" value="staff"
                                           checked/>
                                    <label class="form-check-label" for="staff">Staff</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark shadow-none">Register</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="" class="btn btn-secondary shadow-none"
                            data-bs-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
