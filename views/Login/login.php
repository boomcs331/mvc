<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="<?= BASE_URL ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>lib/css/login.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .login-body {
            padding: 2.5rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .logo {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .welcome-text {
            font-size: 1.2rem;
            opacity: 0.9;
        }
    </style>
</head>

<body class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-container">
                    <div class="login-header">
                        <div class="logo">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h2 class="mb-0">เข้าสู่ระบบ</h2>
                        <p class="welcome-text mb-0">ยินดีต้อนรับเข้าสู่ระบบ</p>
                    </div>

                    <div class="login-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>login_check" method="POST">
                            <div class="mb-4">
                                <label for="user_id" class="form-label fw-bold">
                                    <i class="fas fa-user me-2"></i>รหัสผู้ใช้
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control"
                                        id="user_id"
                                        name="user_id"
                                        placeholder="กรุณากรอกรหัสผู้ใช้"
                                        required
                                        autocomplete="username"
                                        maxlength="50">
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-login">
                                    <i class="fas fa-sign-in-alt me-2"></i>เข้าสู่ระบบ
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                หากมีปัญหาในการเข้าสู่ระบบ กรุณาติดต่อผู้ดูแลระบบ
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL ?>lib/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto focus on user_id input
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('user_id').focus();
        });

        // Add loading state to button on form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const userIdInput = document.getElementById('user_id');
            const btn = document.querySelector('.btn-login');

            // Validate input
            if (!userIdInput.value.trim()) {
                e.preventDefault();
                userIdInput.classList.add('is-invalid');
                userIdInput.focus();
                return;
            }

            // Remove invalid class if exists
            userIdInput.classList.remove('is-invalid');

            // Add loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>กำลังเข้าสู่ระบบ...';
            btn.disabled = true;
            btn.classList.add('btn-loading');
        });

        // Remove invalid class on input
        document.getElementById('user_id').addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });

        // Handle Enter key
        document.getElementById('user_id').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('form').dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>

</html>