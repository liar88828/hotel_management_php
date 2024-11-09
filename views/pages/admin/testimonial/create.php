<h1>Create User</h1>

<?php if (!empty($message)): ?>
    <div class="alert alert-info">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<form method="POST" action="/admin/testimonial/store" class="mb-4"
      enctype="multipart/form-data"
>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" class="form-control" name="name" placeholder="Name"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label" id="image">Profile Image</label>
        <input type="file" class="form-control shadow-none" id="image" name="image" required>
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
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="/admin/testimonial" class="btn btn-secondary">Back</a>
</form>
