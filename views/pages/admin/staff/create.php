<h1>Create User</h1>

<?php if (!empty($message)): ?>
    <div class="alert alert-info">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>
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
