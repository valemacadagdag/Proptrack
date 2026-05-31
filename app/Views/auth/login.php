<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropTrack | Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            max-width: 450px;
            width: 100%;
            background: white;
        }
        .brand-logo {
            font-size: 2rem;
            font-weight: 800;
            color: #198754;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-card p-4 p-sm-5">
    <div class="text-center mb-4">
        <a href="<?= base_url('/') ?>" class="brand-logo mb-2 d-block">
        <i class="bi bi-building-houses me-2"></i>PropTrack
        </a>
        <h4 class="fw-bold text-dark">Welcome Back</h4>
        <p class="text-muted small">Sign in to manage your properties and assets</p>
    </div>

        <form action="<?= base_url('/signin') ?>" method="POST">
            
        <?= csrf_field() ?>

        <div class="mb-3">
        <label class="form-label fw-semibold small text-secondary">Email Address</label>
        <div class="input-group">
        <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
        <input type="email" name="email" class="form-control border-start-0" placeholder="name@example.com" required>
    </div>
</div>

    <div class="mb-3">
        <label class="form-label fw-semibold small text-secondary">Password</label>
        <div class="input-group">
        <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-lock"></i></span>
        <input type="password" name="password" class="form-control border-start-0" placeholder="••••••••" required>
    </div>
</div>

        <div class="form-check mb-4 small">
        <input class="form-check-input" type="checkbox" id="rememberMe">
        <label class="form-check-label text-secondary" for="rememberMe">
        Keep me logged in
        </label>
        </div>

        <button type="submit" class="btn btn-success w-100 fw-bold py-2.5 mb-3 shadow-sm">
        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
        </button>

        <div class="text-center mt-4 border-top pt-3">
        <p class="mb-2">
        <a href="#" class="text-success small text-decoration-none fw-medium">Forgot your password?</a>
        </p>
                
        <p class="text-secondary small mb-0">Don't have an account yet? 
        <a href="<?= base_url('/signup') ?>" class="text-success fw-bold text-decoration-none">Create Account</a>
        </p>
    </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>