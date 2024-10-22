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
            <h1>Create Room</h1>
            <?php showMessage(); ?>
            <form method="post" action="/admin/room/store"
                  enctype="multipart/form-data">
                <!-- Form Fields as in the previous example -->
                <div class="mb-3">
                    <label for="name" class="form-label">Room Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Area (m²)</label>
                    <input type="number" class="form-control" id="area" name="area" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="adult" class="form-label">Adults</label>
                    <input type="number" class="form-control" id="adult" name="adult" required>
                </div>
                <div class="mb-3">
                    <label for="children" class="form-label">Children</label>
                    <input type="number" class="form-control" id="children" name="children" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Features</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="wifi" name="wifi">
                        <label class="form-check-label" for="wifi">Wi-Fi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="television" name="television">
                        <label class="form-check-label" for="television">Television</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ac" name="ac">
                        <label class="form-check-label" for="ac">Air Conditioning</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cctv" name="cctv">
                        <label class="form-check-label" for="cctv">CCTV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dining_room" name="dining_room">
                        <label class="form-check-label" for="dining_room">Dining Room</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="parking_area" name="parking_area">
                        <label class="form-check-label" for="parking_area">Parking Area</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="security" name="security">
                        <label class="form-check-label" for="security">security</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bedrooms">Bedrooms</label>
                    <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
                </div>
                <div class="form-group">
                    <label for="bathrooms">Bathrooms</label>
                    <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
                </div>
                <div class="form-group">
                    <label for="wardrobe">Wardrobe</label>
                    <input type="number" class="form-control" id="wardrobe" name="wardrobe" required>
                </div>
                <div class="form-group">
                    <label class="form-label" id="image">Profile Image</label>
                    <input type="file" class="form-control shadow-none" id="image" name="image"
                           required >
                </div>
                <button type="submit" class="btn btn-primary mt-2">Create Room</button>
            </form>
        </div>
    </div>
  </div>
</div>
<?php require('views/assets/php/scripts.php') ?>
</body>
</html>



