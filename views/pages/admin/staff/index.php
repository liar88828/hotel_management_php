<h1 class="mb-1">Staff </h1>

<section class="mb-3">
    <form class="input-group mb-3" action="/admin/staff" method="POST">
        <input type="text" class="form-control" placeholder="Recipient's username"
               aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </form>
    <a href="/admin/staff/create" class='btn btn-success'> Create</a>
</section>

<?php if (empty($data['staffs'])): ?>
    <p>No Staff available.</p>
<?php else: ?>
    <h2>User List</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Img</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Pin Code</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var StaffBase $staff */
        if (empty($staffs)) : ?>
            <h1>Data is Empty</h1>
        <?php else: ?>
            <?php foreach ($staffs as $staff): ?>
                <?php
//                        print_r($guest->id);
                ?>
                <tr>
                    <td><?= htmlspecialchars($staff->id); ?></td>

                    <td>
                        <img src="/images/person/<?= htmlspecialchars($staff->image); ?>"
                             alt="<?= htmlspecialchars($staff->image); ?>"
                             style="width: 5rem;height:5rem; border-radius: 50%; object-fit: cover;"/>
                    </td>
                    <td><?= htmlspecialchars($staff->name); ?></td>
                    <td><?= htmlspecialchars($staff->position); ?></td>
                    <td><?= htmlspecialchars($staff->email); ?></td>
                    <td><?= htmlspecialchars($staff->phone); ?></td>
                    <td><?= htmlspecialchars($staff->address); ?></td>
                    <td><?= htmlspecialchars($staff->pin_code); ?></td>
                    <td class="">
                        <form
                                action="/admin/staff/delete/<?= htmlspecialchars($staff->id); ?>"
                                method="post">
                            <button class="btn btn-danger m-1">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        <a href="/admin/staff/update/<?= htmlspecialchars($staff->id); ?>"
                           class="btn btn-info m-1">

                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="/admin/staff/<?= htmlspecialchars($staff->id); ?>"
                           class="btn btn-success m-1">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
