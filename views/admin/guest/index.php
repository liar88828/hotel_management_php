<?php
require('views/assets/php/essentials.php');
adminLogin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php require('./views/assets/php/admin/links.php') ?>
</head>
<body class="bg-white ">
<div class="container-fluid" id="main-content">

    <div class="row">
        <?php require('views/components/admin/header.php'); ?>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <?= showMessage() ?>
            <h3 class="mb-1">Guest</h3>

            <section class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
                <a href="/admin/guest/create" class='btn btn-success'> Create</a>
            </section>

            <?php if (empty($data['guests'])): ?>

                <p>No Guest available.</p>
            <?php else: ?>
                <section class="container mt-5">
                    <h2>User List</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Pin Code</th>
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
                                <td><img
                                            src="/images/person/<?php print_r($guest->image); ?>"
                                            alt="<?php print_r($guest->image); ?>"
                                            height="100" width="100"></td>
                                <td><?php echo htmlspecialchars($guest->name); ?></td>
                                <td><?php echo htmlspecialchars($guest->email); ?></td>
                                <td><?php echo htmlspecialchars($guest->phone); ?></td>
                                <td><?php echo htmlspecialchars($guest->address); ?></td>
                                <td><?php echo htmlspecialchars($guest->pin_code); ?></td>
                                <td><?php echo htmlspecialchars($guest->date_of_birth); ?></td>
                                <td class="">
                                    <button class="btn btn-danger m-2">
                                        <i class="bi bi-trash"></i>
                                    </button>

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
                </section>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



