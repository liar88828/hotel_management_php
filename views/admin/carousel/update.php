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

            <div class="container mt-5">
                <h1>Update Testimonial</h1>

                <?php if (!empty($message)): ?>
                    <div class="alert alert-info">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>
                <?php if (empty($testimonial)): ?>
                    <div class="alert alert-info">
                        Error
                    </div>
                <?php else: ?>

                    <form
                            method="POST"
                            action="/admin/testimonial/edit/<?php print_r($testimonial->id) ?>"
                            class="mb-4"
                            enctype="multipart/form-data"
                    >
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                                   value="<?php print_r($testimonial->name) ?>" required>

                        </div>

                        <div class="mb-3">
                            <label class="form-label" id="image">Profile Image</label>
                            <input type="file" class="form-control shadow-none" id="image" name="image"
                                   value="/images/person/<?php print_r($testimonial->image) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">Text</label>
                            <textarea id="text" class="form-control" name="text" placeholder="text"
                                      required><?php print_r($testimonial->text) ?></textarea>
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
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/admin/testimonial"  class="btn btn-secondary">Back</a>
                    </form>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



