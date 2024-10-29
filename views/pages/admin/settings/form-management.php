
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
      <div class="col-md-2 mb-3">
        <div class="card bg-dark text-white">
          <img src="../../images/about/team.jpg" class="card-img" alt="team"/>
          <div class="card-img-overlay text-end">
            <button type="button" class="btn btn-danger btn-sm shadow-none">
              <i class="bi bi-trash3"></i>Delete
            </button>
          </div>
          <p class="card-text text-center px-3 py-2">Random Name</p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Management Team Modal -->
<div class="modal fade" id="management-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="team_s_form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Team Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label class="mb-3">
            <span class="form-label">Name</span>
            <input type="text" name="member_name" id="member_name_inp"
                   class="form-control shadow-none" required>
          </label>
          <div class="mb-3">
            <label class="form-label">Picture</Address></label>
            <input type="file" name="member_picture" id="member_picture_inp"
                   accept=".jpg, .png, .webp, ,jpeg" class="form-control shadow-none" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="" class="btn btn-secondary shadow-none"
                  data-bs-dismiss="modal">Close
          </button>
          <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
        </div>
      </div>
    </form>
  </div>
</div>
