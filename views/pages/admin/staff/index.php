<?php
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
            <h3 class="mb-1">Staff </h3>

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
                <section class="container mt-5">
                    <h2>User List</h2>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Pin Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--                        --><?php //= print_r($staffs)?>
                        <?php if (empty($staffs)) : ?>
                            <h1>Data is Empty</h1>
                        <?php else: ?>
                            <?php foreach ($staffs as $staff): ?>
                                <?php
//                        print_r($guest->id);
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($staff->id); ?></td>
                                    <td><?php echo htmlspecialchars($staff->name); ?></td>
                                    <td><?php echo htmlspecialchars($staff->email); ?></td>
                                    <td><?php echo htmlspecialchars($staff->phone); ?></td>
                                    <td><?php echo htmlspecialchars($staff->address); ?></td>
                                    <td><?php echo htmlspecialchars($staff->pin_code); ?></td>
                                    <td class="d-flex gap-1">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <button class="btn btn-info">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
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



