<h1>Create Guest</h1>

<?php /** @var GuestBase $guest */
if (empty($guest)): ?>
    <div class="alert alert-info">
        <p>No Guest available.</p>
    </div>
<?php else: ?>
    <form action="/admin/guest/edit/<?php print_r($guest->id) ?>" method="post" class="modal-body"
          enctype="multipart/form-data">

        <span class="badge rounded-pill text-bg-light mb-3 text-wrap ls-base">Note: Your details must match with ID (Card, passport, Driving Licence, etc) that will be required during check in.</span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control shadow-none" id="name" name="name" required
                           value="<?php echo $guest->name; ?>">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control shadow-none" id="email" name="email"
                           required value="<?php echo $guest->email; ?>">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="number" class="form-control shadow-none" id="phone" name="phone"
                           required value="<?php echo $guest->phone; ?>">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" id="image">Profile Image</label>
                    <input type="file" class="form-control shadow-none" id="image" name="image"
                           required value="<?php echo $guest->image; ?>">
                </div>
                <div class="col-md-12 ps-0 mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea class="form-control shadow-none" rows="1" id="address" name="address"
                              required><?php echo $guest->address; ?></textarea>
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="pin_code">Pin Code</label>
                    <input type="number" class="form-control shadow-none" id="pin_code" name="pin_code"
                           required value="<?php echo $guest->pin_code; ?>">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="date_of_birth">Date of birth</label>
                    <input type="date" class="form-control shadow-none" id="date_of_birth"
                           name="date_of_birth" required value="<?php echo $guest->date_of_birth; ?>">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control shadow-none" id="password"
                           name="password"
                           required>
                </div>
                <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control shadow-none" id="confirm_password"
                           name="confirm_password" required>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark shadow-none">Update Guest</button>
        </div>
    </form>
<?php endif; ?>
