<!-- loginmodel -->
<div class="modal fade" id="loginmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <div class="modal-header">
                    <h5 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>
                        User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <form action="/auth/login" method="post" class="modal-body">
                    <div class="row  g-2-">
                        <label class="mb-3">
                            <span class="form-label">Email address</span>
                            <input
                                    name="email"
                                    type="text" class="form-control ">
                        </label>

                        <label class="mb-3">
                            <span class="form-label">Password</span>
                            <input type="password"
                                   name="password"
                                   class="form-control " aria-describedby="emailHelp">
                        </label>

                    </div>


                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="guest" value="guest" checked/>
                        <label class="form-check-label" for="guest">Guest</label>
                    </div>

                    <!--                    <div class="form-check">-->
                    <!--                        <input class="form-check-input" type="radio" name="role" id="staff" value="staff"/>-->
                    <!--                        <label class="form-check-label" for="staff">Staff</label>-->
                    <!--                    </div>-->

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="admin" value="admin"/>
                        <label class="form-check-label" for="admin">
                            Admin
                        </label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">Login</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

