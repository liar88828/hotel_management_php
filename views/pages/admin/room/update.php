<h1>Update Room</h1>
<?php showMessage(); ?>
<?php /** @var RoomBase $room */
if (empty($room)): ?>
    <div class="alert alert-warning">Data Is Not Found</div>
<?php else: ?>
    <form method="post" action="/admin/room/update/<?= $room->id ?>"
          enctype="multipart/form-data">
        <!-- Form Fields as in the previous example -->
        <div class="mb-3">
            <label for="name" class="form-label">Room Name</label>
            <input type="text" class="form-control" id="name" name="name" required
                   value="<?= $room->name ?>">
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area (m²)</label>
            <input type="number" class="form-control" id="area" name="area" required
                   value="<?= $room->area ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" required
                   value="<?= $room->price ?>">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required
                   value="<?= $room->quantity ?>">
        </div>
        <div class="mb-3">
            <label for="adult" class="form-label">Adults</label>
            <input type="number" class="form-control" id="adult" name="adult" required
                   value="<?= $room->adult ?>"
            >
        </div>
        <div class="mb-3">
            <label for="children" class="form-label">Children</label>
            <input type="number" class="form-control" id="children" name="children" required
                   value="<?= $room->children ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"
                      required><?php echo $room->description ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Features</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="wifi"
                       name="wifi" <?= $room->wifi ? "checked" : "" ?>
                >
                <label class="form-check-label" for="wifi">Wi-Fi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="television"
                       name="television" <?= $room->television ? "checked" : "" ?>>
                <label class="form-check-label" for="television">Television</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="ac"
                       name="ac" <?= $room->ac ? "checked" : "" ?>>
                <label class="form-check-label" for="ac">Air Conditioning</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cctv"
                       name="cctv" <?= $room->cctv ? "checked" : "" ?>>
                <label class="form-check-label" for="cctv">CCTV</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dining_room"
                       name="dining_room" <?= $room->dining_room ? "checked" : "" ?>>
                <label class="form-check-label" for="dining_room">Dining Room</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="parking_area"
                       name="parking_area" <?= $room->parking_area ? "checked" : "" ?>>
                <label class="form-check-label" for="parking_area">Parking Area</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="security"
                       name="security" <?= $room->security ? "checked" : "" ?>>
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
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" required
                   value="<?= $room->bedrooms ?>">
        </div>
        <div class="form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" required
                   value="<?= $room->bathrooms ?>">
        </div>
        <div class="form-group">
            <label for="wardrobe">Wardrobe</label>
            <input type="number" class="form-control" id="wardrobe" name="wardrobe" required
                   value="<?= $room->wardrobe ?>">
        </div>
        <div class="form-group">
            <label class="form-label" id="image">Profile Image</label>
            <input type="file" class="form-control shadow-none" id="image" name="image"
                   accept="image/*" required onchange="previewImage(event)">
        </div>

        <div class="mb-3">
            <img id="image-preview" src="" alt="Image Preview"
                 class="img-fluid"
                 style="max-height: 300px; display: none;">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update Room</button>
    </form>

<?php endif; ?>
