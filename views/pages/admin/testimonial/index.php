<h3 class="mb-1">Testimonial </h3>
<section class="mb-3">
    <form class="input-group mb-3" method='POST' action='/admin/testimonial'>
        <input type="text" class="form-control" placeholder="Search Testimonial User"
               aria-label="Recipient's username" aria-describedby="button-addon2"
               name='search'>
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="bi-search bi"></i>
        </button>
    </form>
    <!--                -->
    <div class="">
        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#modal_create">
            Create
        </button>

        <!-- Modal -->
        <div class="modal fade"
             id="modal_create"
             tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            Create New Testimonial
                        </h1>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                        <form method="POST" action="/admin/testimonial/create" class="mb-4"
                              enctype="multipart/form-data"
                        >
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name"
                                       placeholder="Name"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="image">Profile Image</label>
                                <input type="file" class="form-control shadow-none" id="image" name="image"
                                       accept="image/*" required onchange="previewImage(event)">
                            </div>


                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea id="text" class="form-control" name="text" placeholder="text"
                                          required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select name="rating" id="rating" class="form-select" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <!-- Image preview -->
                            <div class="mb-3">
                                <img id="image-preview" src="" alt="Image Preview" class="img-fluid"
                                     style="max-height: 300px; display: none;">
                            </div>


                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php if (empty($testimonials)): ?>

    <div class="alert alert-info">
        <p>Data Is Empty</p>
    </div>

<?php else: ?>
    <section class="container  mt-5 ">
        <div class="row row-cols-1 row-cols-lg-2  row-cols-xl-3 ">
            <?php /** @var TestimonialBase $testimonial */
            foreach ($testimonials as $testimonial): ?>
                <div class="col ">
                    <div class="card  my-4">
                        <div class="card-body">
                            <div class="profile d-flex gap-2">
                                <img
                                        src="/images/testimonial/<?php print_r($testimonial->image); ?>"
                                        alt="<?php print_r($testimonial->image) ?>"
                                        style="height: 8rem; width: 8rem; border-radius:50%; object-fit: cover;   ">
                                <div class="">
                                    <h3 class="text-end"><?php print_r($testimonial->name) ?></h3>
                                </div>
                            </div>
                            <p style="text-align: justify;">
                                <?php print_r($testimonial->text) ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rating">
                                                <span class="badge-rounded-pill bg-light">
                                                    <?php foreach (range(1, $testimonial->rating) as $star): ?>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    <?php endforeach; ?>
                                                </span>
                                </div>
                                <div class="d-flex gap-2">

                                    <!--------------DELETE---->
                                    <div class="">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal_delete<?= htmlspecialchars($testimonial->id) ?>">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade"
                                             id="modal_delete<?= htmlspecialchars($testimonial->id) ?>"
                                             tabindex="-1" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Delete <?php print_r($testimonial->name) ?>
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center flex-column gap-2">
                                                        <img
                                                                src="/images/carousel/<?php print_r($testimonial->image); ?>"
                                                                alt="<?php print_r($testimonial->image) ?>"
                                                                style="height: 40rem; width: auto; object-fit: contain;"
                                                        />
                                                        <div class="d-flex gap-2 items-center flex-column justify-content-center mt-2">
                                                            <h1>Apakah anda yakin ingin menghapus</h1>
                                                            <form action="/admin/testimonial/delete/<?= htmlspecialchars($testimonial->id) ?>"
                                                                  method="post">
                                                                <button type="submit"
                                                                        class="btn btn-danger">
                                                                    Delete <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!----------Update----->
                                    <div class="">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#modal_update<?= htmlspecialchars($testimonial->id) ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade"
                                             id="modal_update<?= htmlspecialchars($testimonial->id) ?>"
                                             tabindex="-1" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Create New Testimonial
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center">
                                                        <form
                                                                method="POST"
                                                                action="/admin/testimonial/update/<?php print_r($testimonial->id) ?>"
                                                                class="mb-4"
                                                                enctype="multipart/form-data"
                                                        >
                                                            <div class="mb-3">
                                                                <label for="name"
                                                                       class="form-label">Name</label>
                                                                <input id="name" type="text"
                                                                       class="form-control" name="name"
                                                                       placeholder="Name"
                                                                       value="<?php print_r($testimonial->name) ?>"
                                                                       required>

                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="image">Profile
                                                                    Image</label>
                                                                <input type="file"
                                                                       class="form-control shadow-none"
                                                                       id="image" name="image"
                                                                       accept="image/*" required
                                                                       onchange="previewImage(event)">
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="text"
                                                                       class="form-label">Text</label>
                                                                <textarea id="text" class="form-control"
                                                                          name="text" placeholder="text"
                                                                          required><?php print_r($testimonial->text) ?></textarea>
                                                            </div>

                                                            <!-- Image preview -->
                                                            <div class="mb-3">
                                                                <img id="image-preview-update" src=""
                                                                     alt="Image Preview" class="img-fluid"
                                                                     style="max-height: 300px; display: none;">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="rating" class="form-label">Rating</label>
                                                                <select name="rating" id="rating"
                                                                        class="form-select" required>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">
                                                                Update
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
<?php endif; ?>
