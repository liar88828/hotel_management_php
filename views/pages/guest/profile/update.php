<h1>Update Profile</h1>
<?php if (empty($guest)): ?>
    <div class="alert alert-info">
        <p> Guest Is Not Found</p>
    </div>
<?php else: ?>
    <form action="/guest/profile-edit" method="post" class="container"
          enctype="multipart/form-data">

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
                       required value="<?php echo $guest->image; ?>"
                       accept="image/*" onchange="previewImage(event)"
                >
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
        <div class="row">
            <div class="mb-3 border rounded  col-5">
                <h3>Old Image</h3>
                <img src="/images/person/<?php echo htmlspecialchars($guest->image ? $guest->image : 'default-avatar.png'); ?>"
                     alt="Profile "
                     style="max-height: 300px">
            </div>

            <!-- Image preview -->
            <div class="mb-3 col-5 border rounded">
                <h3>New Image</h3>
                <img id="image-preview" src="/images/person/<?php echo $guest->image; ?>"
                     alt="Image Preview" class="img-fluid "
                     style="max-height: 300px; display: none; ">
            </div>

        </div>
        <div class="">
            <a href="/guest/profile" class="btn btn-secondary mr-2">Back to Rooms</a>
            <button type="submit" class="btn btn-info">Update Guest</button>
        </div>
    </form>

<?php endif; ?>
