<!-- General Setting section admin panel -->

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">General Settings</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                    data-bs-target="#general-s">
                <i class="bi bi-pencil-square"></i> Edit
            </button>
        </div>
      <?php
      if (!isset($setting_general)) : ?>
          <h1 class='text-center text-danger'>Please Add Data</h1>
      <?php else : ?>
          <h6 class="card-subtitle mb-1 fw-bold">Site title</h6>
          <p class="card-text" id="site_title">
            <?php print_r($setting_general->site_title); ?>
          </p>
          <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
          <p class="card-text" id="site_about">
            <?php print_r($setting_general->site_about); ?>
          </p>
      <?php endif; ?>
    </div>

</div>

<!-- General settings modal -->
<div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form
                action="/admin/settings/general/<?php print_r($setting_general->sr_no); ?>"
                method="post"
                id="general_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">General Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="site_title_inp" class="form-label">Site Title</label>
                        <input type="text" name="site_title" id="site_title_inp"
                               class="form-control shadow-none"
                               value="<?php isset($setting_general->site_title) ? print_r($setting_general->site_title) : ''; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="site_about_inp" class="form-label">About Us</Address></label>
                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6"
                                  required><?php isset($setting_general->site_about) ? print_r($setting_general->site_about) : ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">
                        SUBMIT
                    </button>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="button" onclick="site_title.value = general_data.site_title"
                                class="btn btn-secondary shadow-none" data-bs-dismiss="modal">
                            Close
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
