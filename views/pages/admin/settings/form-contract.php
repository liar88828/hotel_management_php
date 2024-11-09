<!-- Contact details section -->

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">Contact Settings</h5>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                    data-bs-target="#contact-s">
                <i class="bi bi-pencil-square"></i> Edit
            </button>
        </div>
        <?php if (empty($setting_contact)) : ?>
            <h1 class='text-center text-danger'>Please Add Data</h1>
        <?php else : ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                        <p class="card-text" id="address">
                            <?php print_r($setting_contact->address); ?>
                        </p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                        <p class="card-text" id="gmap">
                            <?php print_r($setting_contact->gmap); ?>

                        </p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                        <p class="card-text mb-1">
                            <i class="bi bi-telephone-inbound-fill"></i>
                            <span id="pn1">
                        <?php print_r($setting_contact->pn1); ?>

                          </span>
                        </p>
                        <p class="card-text">
                            <i class="bi bi-telephone-inbound-fill"></i>
                            <span id="pn2">
                        <?php print_r($setting_contact->pn2); ?>

                          </span>
                        </p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                        <p class="card-text" id="email">
                            <?php print_r($setting_contact->email); ?>

                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                        <p class="card-text mb-1">
                            <i class="bi bi-twitter me-1"></i>
                            <span id="tw">
                        <?php print_r($setting_contact->fb); ?>

                          </span>
                        </p>
                        <p class="card-text mb-1">
                            <i class="bi bi-instagram me-1"></i>
                            <span id="ig">
                        <?php print_r($setting_contact->insta); ?>

                          </span>
                        </p>
                        <p class="card-text">
                            <i class="bi bi-youtube me-1"></i>
                            <span id="fb">
                        <?php print_r($setting_contact->tw); ?>

                          </span>
                        </p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                        <iframe id="iframe" class="border p-2 w-100" loading="lazy"
                                src="<?php print_r($setting_contact->iframe); ?>"
                        >
                        </iframe>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>
</div>


<!-- Contact details modal -->

<div class="modal fade" id="contact-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="contacts_s_form" action="/admin/settings/contact/<?= htmlspecialchars($setting_contact->id) ?>"
              method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contacts Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address_inp" class="form-label fw-bold">Address</label>
                                    <input type="text" name="address" id="address_inp"
                                           class="form-control shadow-none" required
                                           value="<?php print_r($setting_contact->address); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="gmap_inp" class="form-label fw-bold">Google Map Links</label>
                                    <input type="text" name="gmap" id="gmap_inp"
                                           class="form-control shadow-none" required
                                           value="<?php print_r($setting_contact->gmap); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email_inp" class="form-label fw-bold">Email</label>
                                    <input type="text" name="email" id="email_inp"
                                           class="form-control shadow-none" required
                                           value="<?php print_r($setting_contact->email); ?>">
                                </div>
                                <div class="mb-3">
                                    <span class="form-label fw-bold">Phone Numbers (with country)</span>
                                    <div class="input-group mb-3">
                                        <label for="pn1_inp" class="input-group-text">
                                            <i class="bi bi-telephone-inbound-fill"></i>
                                        </label>
                                        <input type="text" name="pn1" id="pn1_inp"
                                               class="form-control shadow-none" required
                                               value="<?php print_r($setting_contact->pn1); ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="pn2_inp" class="input-group-text">
                                            <i class="bi bi-telephone-inbound-fill"></i>
                                        </label>
                                        <input type="text" name="pn2" id="pn2_inp"
                                               class="form-control shadow-none" required
                                               value="<?php print_r($setting_contact->pn2); ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-label fw-bold">Social Links</div>
                                    <div class="input-group mb-3">
                                        <label for="tw_inp" class="input-group-text">
                                            <i class="bi bi-twitter me-1"></i>
                                        </label>
                                        <input type="text" name="tw" id="tw_inp"
                                               class="form-control shadow-none" required
                                               value="<?php print_r($setting_contact->tw); ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="ig_inp" class="input-group-text">
                                            <i class="bi bi-instagram me-1"></i>
                                        </label>
                                        <input type="text" name="insta" id="ig_inp"
                                               class="form-control shadow-none" required
                                               value="<?php print_r($setting_contact->insta); ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="yt_inp" class="input-group-text">
                                            <i class="bi bi-facebook me-1"></i>
                                        </label>
                                        <input type="text" name="fb" id="yt_inp"
                                               class="form-control shadow-none" required

                                               value="<?php print_r($setting_contact->fb); ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="iframe_inp" class="form-label fw-bold">iFrame Src</label>
                                    <textarea name="iframe" id="iframe_inp"
                                              class="form-control shadow-none"
                                              required><?php print_r($setting_contact->iframe); ?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info  shadow-none">SUBMIT</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="contacts_inp(contacts_data)"
                                class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>
