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

            <div class="container mt-5">
                <h1>Create User</h1>

                <?php if (!empty($message)): ?>
                    <div class="alert alert-info">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/admin/carousel/create" class="mb-4"
                      enctype="multipart/form-data"
                >
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

                    <button type="submit" class="btn btn-primary">Create</button>

                    <a href="/admin/carousel" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php require('views/assets/php/scripts.php') ?>
</html>



