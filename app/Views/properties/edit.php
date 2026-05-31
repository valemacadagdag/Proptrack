<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropTrack | Edit Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card shadow-sm">
    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Edit Property Details</h4>
    <a href="<?= base_url('properties') ?>" class="btn btn-sm btn-light">Cancel</a>
</div>
    <div class="card-body p-4">
                        
    <form action="<?= base_url('properties/update/' . $property['id']) ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= $property['id'] ?>">
                            
    <div class="mb-3">
    <label for="title" class="form-label">Property Title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= esc($property['title']) ?>" required>
</div>

    <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="4" required><?= esc($property['description']) ?></textarea>
</div>

    <div class="mb-3">
    <label for="price" class="form-label">Price (PHP)</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= esc($property['price']) ?>" required>
</div>

    <div class="mb-3">
    <label for="property_image" class="form-label d-block">Current Image</label>
    <?php if (!empty($property['image'])): ?>
    <img src="<?= base_url('uploads/' . $property['image']) ?>" alt="Current" class="img-thumbnail mb-2" style="max-height: 150px;">
    <?php else: ?>
    <p class="text-muted small">No image uploaded yet.</p>
    <?php endif; ?>
                                
    <input type="file" class="form-control" id="property_image" name="property_image" accept="image/*">
    <div class="form-text">Leave blank if you don't want to change the image.</div>
</div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
    <button type="submit" class="btn btn-primary px-4">Update Property</button>
</div>
</form>

</div>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>