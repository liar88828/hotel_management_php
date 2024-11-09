<h3 class="mb-1">Carousel </h3>

<section class="mb-3">
    <form action="/admin/carousel" method="post" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username"
               aria-label="" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="bi-search bi"></i>
        </button>
    </form>
    <!--                <a href="/admin/carousel/create" class='btn btn-success'>Create</a>-->
    <!-- Button trigger modal -->
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
            <form class="modal-content"
                  method="POST" action="/admin/carousel/create"
                  enctype="multipart/form-data"
            >
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Create new carousel
                    </h1>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                    </button>
                </div>
                <div class="modal-body ">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                               required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="image">Profile Image</label>
                        <input type="file" class="form-control shadow-none" id="image" name="image"
                               accept="image/*" required onchange="previewImage(event)">
                    </div>


                    <!-- Image preview -->
                    <div class="mb-3">
                        <img id="image-preview" src="" alt="Image Preview" class="img-fluid"
                             style="max-height: 300px; display: none;">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>

                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close
                    </button>

                </div>
            </form>
        </div>
    </div>

    <a href="/" class='btn btn-info'>Home</a>
</section>

<?php if (empty($carousels)): ?>
    <div class="alert alert-info">
        <p>Data Is Empty</p>
    </div>
<?php else: ?>
    <section class="container mt-5">
        <div class="d-flex gap-2 flex-wrap justify-content-center ">
            <?php foreach ($carousels as $carousel): ?>
                <div class="flex-shrink-0  card ">
                    <div class="card-body ">
                        <div class="d-flex align-items-center justify-content-center flex-column">
                            <img
                                    src="/images/carousel/<?php print_r($carousel->image); ?>"
                                    alt="<?php print_r($carousel->image) ?>"
                                    style="height: 15rem; width: 15rem; object-fit: cover;"
                            />
                            <h6 class="m-0 ms-2 my-4">
                                <?php print_r($carousel->name) ?>
                            </h6>
                            <div class="d-flex gap-2">

                                <!--------------DELETE---->
                                <div class="">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal_delete<?= htmlspecialchars($carousel->id) ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade"
                                         id="modal_delete<?= htmlspecialchars($carousel->id) ?>"
                                         tabindex="-1" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Delete <?php print_r($carousel->name) ?>
                                                    </h1>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center flex-column gap-2">
                                                    <img
                                                            src="/images/carousel/<?php print_r($carousel->image); ?>"
                                                            alt="<?php print_r($carousel->image) ?>"
                                                            style="height: 40rem; width: auto; object-fit: contain;"
                                                    />
                                                    <div class="d-flex gap-2 items-center flex-column justify-content-center mt-2">
                                                        <h1>Apakah anda yakin ingin menghapus ?</h1>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/admin/carousel/delete/<?= htmlspecialchars($carousel->id) ?>"
                                                          method="post">
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--  -----------DETAIL------------------->
                                <div class="">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modal_detail<?= htmlspecialchars($carousel->id) ?>">
                                        <i class="bi bi-zoom-in"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade"
                                         id="modal_detail<?= htmlspecialchars($carousel->id) ?>"
                                         tabindex="-1" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        <?php print_r($carousel->name) ?>
                                                    </h1>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center">
                                                    <img
                                                            src="/images/carousel/<?php print_r($carousel->image); ?>"
                                                            alt="<?php print_r($carousel->image) ?>"
                                                            style="height: 40rem; width: auto; object-fit: contain;"
                                                    />
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

                                <!-------------UPDATE-------------->
                                <div class="">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal_update<?= htmlspecialchars($carousel->id) ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade"
                                         id="modal_update<?= htmlspecialchars($carousel->id) ?>"
                                         tabindex="-1" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">

                                            <form class="modal-content"
                                                  enctype="multipart/form-data"
                                                  method="POST"
                                                  action="/admin/carousel/update/<?php print_r($carousel->id) ?>"
                                            >
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Update Carousel
                                                    </h1>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">

                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name"
                                                               class="form-label">Name</label>
                                                        <input id="name" type="text"
                                                               class="form-control" name="name"
                                                               placeholder="Name"
                                                               value="<?php print_r($carousel->name) ?>"
                                                               required>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="image">
                                                            Profile Image
                                                        </label>
                                                        <input type="file"
                                                               class="form-control shadow-none"
                                                               id="image" name="image"
                                                               accept="image/*" required
                                                               onchange="previewImage(event)">
                                                    </div>


                                                    <!-- Image preview -->

                                                    <div class="mb-3">
                                                        <img id="image-preview-update" src=""
                                                             alt="Image Preview" class="img-fluid"
                                                             style="max-height: 300px; display: none;">
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </form>
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
