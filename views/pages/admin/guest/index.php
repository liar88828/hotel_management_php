<h1 class="mb-1">Guest</h1>

<section class="mb-3">
    <form class="input-group mb-3" action="/admin/guest" method="post">
        <input type="text" class="form-control" placeholder="Recipient's username"
               aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="bi-search bi"></i>
        </button>
    </form>
    <a href="/admin/guest/create" class='btn btn-success'> Create</a>
</section>

<?php if (empty($data['guests'])): ?>

    <p>No Guest available.</p>
<?php else: ?>
    <h2>User List</h2>
    <div class="overflow-auto">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th class="text-nowrap">Pin Code</th>
                <th>Date Birth</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['guests'] as $guest): ?>
                <?php
//                        print_r($guest->id);
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($guest->id); ?></td>
                    <td>
                        <img
                                src="/images/person/<?php print_r($guest->image); ?>"
                                alt="<?php print_r($guest->image); ?>"
                                style="width: 10rem;height:10rem; border-radius: 50%; object-fit: cover;"/>
                    </td>
                    <td><?php echo htmlspecialchars($guest->name); ?></td>
                    <td><?php echo htmlspecialchars($guest->email); ?></td>
                    <td><?php echo htmlspecialchars($guest->phone); ?></td>
                    <td><?php echo htmlspecialchars($guest->address); ?></td>
                    <td><?php echo htmlspecialchars($guest->pin_code); ?></td>
                    <td class="text-nowrap"><?php echo htmlspecialchars($guest->date_of_birth); ?></td>

                    <td class="">

                        <!--------------DELETE---->
                        <div class="m-2">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger square " data-bs-toggle="modal"
                                    data-bs-target="#modal_delete<?= htmlspecialchars($guest->id) ?>">
                                <i class="bi bi-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade"
                                 id="modal_delete<?= htmlspecialchars($guest->id) ?>"
                                 tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Delete <?php print_r($guest->name) ?>
                                            </h1>
                                            <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center flex-column">
                                            <img
                                                    src="/images/person/<?php print_r($guest->image); ?>"
                                                    alt="<?php print_r($guest->image) ?>"
                                                    style="height: 20rem; width: auto; object-fit: contain;"
                                            />
                                            <h1>Apakah anda yakin ingin menghapus</h1>

                                        </div>
                                        <div class="modal-footer">
                                            <form action="/admin/guest/delete/<?= htmlspecialchars($guest->id) ?>"
                                                  method="post">
                                                <button type="submit"
                                                        class="btn btn-danger">
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
                        <a href="/admin/guest/update/<?php print_r($guest->id) ?>"
                           class="btn btn-info m-2">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a
                                href="/admin/guest/<?php print_r($guest->id) ?>"
                                class="btn btn-success m-2">
                            <i class="bi bi-person"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php endif; ?>
