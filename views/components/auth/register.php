<!-- registermodel -->
<div class="modal fade" id="registermodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div>
                <div class="modal-header">
                    <h5 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close">

                    </button>
                </div>

                <form action="/auth/register" method="post" class="modal-body" enctype="multipart/form-data">

                    <span class="badge rounded-pill text-bg-light mb-3 text-wrap ls-base">Note: Your detais must match with ID (Adhar Card, passport, Driving Licence, etc) that will be required during check in.</span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control shadow-none" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control shadow-none" id="email" name="email" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="number" class="form-control shadow-none" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" id="image">Profile Image</label>
                                <input type="file" class="form-control shadow-none" id="image" name="image" required>
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
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control shadow-none" id="password" name="password"
                                       required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label" for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control shadow-none" id="confirm_password"
                                       name="confirm_password" required>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="guest" value="guest"
                                       checked/>
                                <label class="form-check-label" for="guest">Guest</label>
                            </div>

<!--                            <div class="form-check">-->
<!--                                <input class="form-check-input" type="radio" name="role" id="staff" value="staff"/>-->
<!--                                <label class="form-check-label" for="staff">Staff</label>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark shadow-none">Register</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>