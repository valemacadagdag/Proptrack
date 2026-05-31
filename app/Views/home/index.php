<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropTrack | Smart Property & Asset Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), 
                        url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            min-height: 75vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .hover-card { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .hover-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
    <a class="navbar-brand fw-bold text-success" href="<?= base_url('/') ?>">
    <i class="bi bi-building-houses me-2"></i>PropTrack
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto fw-medium">
    <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('catalog') ?>">Properties</a></li>
                    
    <?php if(session()->get('isLoggedIn')): ?>
    <?php if(session()->get('role') === 'admin'): ?>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin') ?>">Admin Dashboard</a></li>
    <?php endif; ?>
    <li class="nav-item"><a class="nav-link text-danger" href="<?= base_url('logout') ?>">Logout</a></li>
    <?php else: ?>
    <li class="nav-item ms-lg-3"><a class="btn btn-success btn-sm px-3 mt-1" href="<?= base_url('signin') ?>">Login</a></li>
    <?php endif; ?>
</ul>
</div>
</div>
</nav>

    <header class="hero-section text-center text-md-start">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-12 text-center">
    <span class="badge bg-success px-3 py-2 rounded-pill mb-3 fw-bold text-uppercase">Smart Asset Tracking</span>
    <h1 class="display-4 fw-bold mb-3">Manage & Find Real Estate Properties Effortlessly</h1>
    <p class="lead text-white-50 mb-4">PropTrack helps you view real estate listings, request viewing slots, and access official unit documents securely in one dashboard.</p>
    <a href="<?= base_url('catalog') ?>" class="btn btn-success btn-lg px-4 me-2 fw-bold shadow">Browse Catalog</a>
</div>
</div>
</div>
</header>

    <section class="container py-5 my-4">
    <div class="text-center mb-5">
    <h2 class="fw-bold">Featured Properties</h2>
    <p class="text-muted">Take a look at some of our top-rated asset listings available right now.</p>
</div>
        
    <div class="row g-4">
    <?php foreach($featured as $p): ?>
    <div class="col-md-4">
    <div class="card h-100 shadow-sm border-0 hover-card">
    <img src="<?= base_url('uploads/'.$p['image']) ?>" class="card-img-top" alt="Property" style="height: 200px; object-fit: cover;">
    <div class="card-body">
    <h5 class="card-title fw-bold"><?= esc($p['title']) ?></h5>
    <h5 class="text-success fw-bold">₱ <?= number_format($p['price'], 2) ?></h5>
</div>
    <div class="card-footer bg-white border-0 pb-3">
    <a href="<?= base_url('property/'.$p['id']) ?>" class="btn btn-outline-dark btn-sm w-100">See Details</a>
</div>
</div>
</div>
    <?php endforeach; ?>
</div>
</section>

    <section class="bg-light py-5">
    <div class="container py-3">
    <div class="row align-items-center">
    <div class="col-md-6 mb-4 mb-md-0">
    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm" alt="Office Building">
</div>
    <div class="col-md-6 ps-md-5">
    <h2 class="fw-bold mb-3">Why Choose PropTrack?</h2>
    <p class="text-secondary">We bridge the gap between property managers and prospective clients. Our system provides automated email alerts for viewing schedules and handles data with top-tier security standards.</p>
</div>
</div>
</div>
</section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
        <p class="m-0 small">&copy; 2026 PropTrack Asset Management System. Developed by Cosain, Macadagdag, Manalili, Sabio.</p>
    </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>