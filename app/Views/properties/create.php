<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropTrack | Add New Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Add New Property</h4>
    <a href="<?= base_url('properties') ?>" class="btn btn-sm btn-light">Back to List</a>
</div>
    <div class="card-body p-4">
                        
    <form action="<?= base_url('add-property') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
                            
    <div class="mb-3">
    <label for="title" class="form-label">Property Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Modern 2-Bedroom Condo" required>
</div>

    <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter property details, amenities, and location specifics..." required></textarea>
</div>

    <div class="mb-3">
    <label for="price" class="form-label">Price (PHP)</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="e.g., 5000000" required>
</div>

    <div class="mb-3">
    <label for="property_image" class="form-label">Property Image</label>
    <input type="file" class="form-control" id="property_image" name="property_image" accept="image/*" required>
    <div class="form-text">Accepted formats: JPG, JPEG, PNG.</div>
</div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
    <button type="reset" class="btn btn-secondary me-md-2">Clear Form</button>
    <button type="submit" class="btn btn-success px-4">Save Property</button>
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