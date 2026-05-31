<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section { padding: 60px 0; text-align: center; }
        .card-img-top { height: 250px; object-fit: cover; }
        .card-custom { border: none; transition: 0.3s; }
        .card-custom:hover { transform: translateY(-10px); }
    </style>
</head>
<body>

<div class="container mt-4">
    <a href="<?= base_url('home') ?>" class="btn btn-outline-secondary">← Back to Dashboard</a>
</div>

<div class="container hero-section">
    <h1 class="fw-bold display-3">About Us</h1>
    <hr class="w-25 mx-auto border-primary border-2">
    <p class="lead mt-4 text-muted w-75 mx-auto">
        What started small, with a single idea of selling property for less, has grown over the years into a trusted partner in the real estate industry. We are committed to creating opportunities and bringing value to our community.
    </p>
</div>

   <div class="container mb-5">
   <div class="row">
   <div class="col-md-6">
   <div class="card card-custom shadow-sm">
   <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800" class="card-img-top" alt="Business">
   <div class="card-body bg-dark text-white text-center p-4">
   <h3>Our Business</h3>
</div>
 </div>
</div>
    <div class="col-md-6">
    <div class="card card-custom shadow-sm">
    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800" class="card-img-top" alt="Location">
    <div class="card-body bg-primary text-white text-center p-4">
    <h3>Location Facts</h3>
</div>
</div>
</div>
</div>
</div>

</body>
</html>