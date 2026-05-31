<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PropTrack | <?= esc($property['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card shadow-sm border-0 overflow-hidden">
    <?php if (!empty($property['image']) && file_exists(FCPATH . 'uploads/' . $property['image'])): ?>
    <img src="<?= base_url('uploads/' . $property['image']) ?>" class="w-100" style="max-height: 400px; object-fit: cover;">
    <?php else: ?>
    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=600&q=80" class="w-100" style="max-height: 400px; object-fit: cover;">
    <?php endif; ?>
                    
    <div class="card-body p-5">
    <h2 class="fw-bold text-dark"><?= esc($property['title']) ?></h2>
    <h3 class="text-success fw-bold my-3">₱ <?= number_format($property['price'], 2) ?></h3>
    <p class="text-secondary" style="white-space: pre-line;"><?= esc($property['description']) ?></p>
                        
    <hr class="my-4">

    <div class="mt-4 p-4 bg-light rounded">
    <h4 class="mb-3">Inquire about this property</h4>
    <form action="<?= base_url('properties/sendInquiry/' . $property['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
    <label class="form-label">Your Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
</div>
    <div class="mb-3">
    <label class="form-label">Message</label>
    <textarea name="message" class="form-control" rows="3" placeholder="How can we help you?" required></textarea>
</div>
    <button type="submit" class="btn btn-primary">Send Inquiry</button>
    </form>
</div>
    <a href="<?= base_url('properties') ?>" class="btn btn-dark px-4 mt-4">Back to Catalog</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>