<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
        <a class="navbar-brand" href="<?= base_url('admin') ?>">Admin Dashboard</a>
        <div class="navbar-nav ms-auto">
        <a class="nav-link" href="<?= base_url('/') ?>">Back to Homepage</a>
        <a class="nav-link text-danger" href="<?= base_url('logout') ?>">Logout</a>
    </div>
    </div>
    </nav>

    <div class="container pb-5">
        <h2 class="mb-4">Property Management</h2>
        
        <div class="row mb-4">
        <div class="col-md-4">
        <div class="card bg-primary text-white p-4">
        <h5>Total Properties</h5>
        <h3><?= $totalProperties ?></h3>
    </div>
    </div>
    </div>

        <div class="card p-4">
        <a href="<?= base_url('add-property') ?>" class="btn btn-success mb-3 w-25">Add New Property</a>
        <table class="table table-bordered">
        <thead>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($properties as $p): ?>
    <tr>
        <td><?= esc($p['title']) ?></td>
        <td>₱ <?= number_format($p['price'], 2) ?></td>
    <td>
        <a href="<?= base_url('properties/edit/'.$p['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
    </td>
    </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
</body>
</html>