<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropTrack | Browse Properties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hero-bg {
            background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), 
                        url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 50px 0;
        }
        .property-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: none;
        }
        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.12) !important;
        }
        .badge-type {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 10;
        }
        /* Pagination Styling */
        .pagination { display: flex; justify-content: center; list-style: none; padding: 0; }
        .pagination li { margin: 0 5px; }
        .pagination li a, .pagination li span { padding: 8px 16px; border: 1px solid #dee2e6; color: #198754; text-decoration: none; border-radius: 4px; }
        .pagination li.active span { background-color: #198754; color: white; border-color: #198754; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
    <a class="navbar-brand fw-bold text-success" href="<?= base_url('/') ?>">
    <i class="bi bi-building-houses me-2"></i>PropTrack
</a>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto fw-medium">
    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
    <li class="nav-item"><a class="nav-link active" href="<?= base_url('properties') ?>">Properties</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About Us</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact</a></li>
    <?php if (session()->get('role') === 'admin'): ?>
    <li class="nav-item ms-lg-3"><a class="btn btn-success btn-sm px-3 mt-1" href="<?= base_url('properties/create') ?>">Add Property</a></li>
    <?php endif; ?>
</ul>
</div>
</div>
</nav>

    <div class="hero-bg text-center mb-5">
    <div class="container">
    <h2 class="fw-bold mb-2">Explore Available Properties</h2>
    <p class="text-white-50 mb-4">Find your perfect match from our database.</p>
</div>
</div>

    <div class="container mb-5 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0"><i class="bi bi-grid-fill text-success me-2"></i>Available Units</h4>
    <form action="<?= base_url('properties') ?>" method="GET" class="d-flex">
    <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search..." value="<?= esc($search ?? '') ?>">
    <button type="submit" class="btn btn-success btn-sm">Search</button>
</form>
</div>

    <div class="row g-4">
    <?php if (!empty($properties) && is_array($properties)): ?>
    <?php foreach ($properties as $property): ?>
    <div class="col-md-4">
    <div class="card h-100 shadow-sm property-card position-relative">
    <span class="badge bg-success badge-type px-3 py-2 shadow-sm">Property</span>
    <?php if (!empty($property['image']) && file_exists(FCPATH . 'uploads/' . $property['image'])): ?>
    <img src="<?= base_url('uploads/' . $property['image']) ?>" class="card-img-top" style="height: 220px; object-fit: cover;">
    <?php else: ?>
    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 220px; object-fit: cover;">
    <?php endif; ?>
    <div class="card-body p-4">
    <h5 class="card-title fw-bold text-dark mb-1"><?= esc($property['title'] ?? 'N/A') ?></h5>
    <div class="border-top pt-3 mt-3">
    <h4 class="text-success fw-bold m-0">₱ <?= number_format($property['price'] ?? 0, 2) ?></h4>
</div>
</div>
    <div class="card-footer bg-transparent border-0 p-4 pt-0 d-flex gap-2">
    <a href="<?= base_url('properties/show/' . ($property['id'] ?? '')) ?>" class="btn btn-outline-dark btn-sm w-100">View Details</a>
    <?php if (session()->get('role') === 'admin'): ?>
    <a href="<?= base_url('properties/edit/' . ($property['id'] ?? '')) ?>" class="btn btn-outline-warning btn-sm w-100">Edit</a>
    <form action="<?= base_url('properties/delete/' . ($property['id'] ?? '')) ?>" method="POST" onsubmit="return confirm('Are you sure?');" class="w-100">
    <?= csrf_field() ?>
    <button type="submit" class="btn btn-outline-danger btn-sm w-100">Delete</button>
    </form>
    <?php endif; ?>
</div>
</div>
</div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="col-12 text-center">
    <p class="text-muted">No properties found.</p>
</div>
    <?php endif; ?>
</div>

<div class="mt-5">
    <?php if (isset($pager)) echo $pager->links('default', 'default_full'); ?>
</div>
</div>

    <footer class="bg-dark text-white text-center py-4 mt-auto border-top border-success border-3">
        <div class="container">
        <p class="m-0 small">&copy; 2026 PropTrack Asset Management System. Developed by Cosain, Macadagdag, Manalili, Sabio.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>