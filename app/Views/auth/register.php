<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropTrack | Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        .register-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            max-width: 500px;
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

    <div class="register-card p-4 p-sm-5">
        <div class="text-center mb-4">
            <a href="<?= base_url('/') ?>" class="brand-logo mb-2 d-block">
            <i class="bi bi-building-houses me-2"></i>PropTrack
            </a>
            <h4 class="fw-bold text-dark">Create an Account</h4>
            <p class="text-muted small">Join us to start managing or browsing properties</p>
        </div>

        <form action="<?= base_url('/signup') ?>" method="POST">
            
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Full Name</label>
                <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-person"></i></span>
                <input type="text" name="name" class="form-control border-start-0" placeholder="John Doe" required>
            </div>
            </div>

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
                <input type="password" name="password" class="form-control border-start-0" placeholder="Minimum 8 characters" required>
            </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-secondary">Confirm Password</label>
                <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password_confirm" class="form-control border-start-0" placeholder="Repeat your password" required>
            </div>
            </div>

            <button type="submit" class="btn btn-success w-100 fw-bold py-2.5 mb-3 shadow-sm">
            <i class="bi bi-person-plus me-2"></i>Register
            </button>

            <div class="text-center mt-4 border-top pt-3">
            <p class="text-secondary small mb-0">Already have an account? 
            <a href="<?= base_url('/signin') ?>" class="text-success fw-bold text-decoration-none">Sign In instead</a>
        </p>
        </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>