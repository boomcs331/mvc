<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Modern Design</title>
    <link href="<?= BASE_URL ?>lib/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>lib/fontawesome/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-wrapper {
            perspective: 1000px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 0;
            overflow: hidden;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            transform-style: preserve-3d;
            transition: transform 0.3s ease;
            max-width: 450px;
            width: 100%;
        }

        .login-container:hover {
            transform: rotateY(5deg) rotateX(5deg);
        }

        .login-header {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
            padding: 3rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"><animate attributeName="opacity" values="0.1;0.3;0.1" dur="3s" repeatCount="indefinite"/></circle><circle cx="80" cy="30" r="1.5" fill="white" opacity="0.1"><animate attributeName="opacity" values="0.1;0.4;0.1" dur="2s" repeatCount="indefinite"/></circle><circle cx="60" cy="70" r="1" fill="white" opacity="0.1"><animate attributeName="opacity" values="0.1;0.5;0.1" dur="4s" repeatCount="indefinite"/></circle></svg>');
            pointer-events: none;
        }

        .logo-container {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .logo {
            font-size: 4rem;
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .login-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .login-body {
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .form-floating {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 15px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            height: auto;
        }

        .form-control:focus {
            background: white;
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }

        .form-floating > label {
            color: #667eea;
            font-weight: 500;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            z-index: 10;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .alert {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: #721c24;
            border-radius: 15px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            animation: slideInDown 0.5s ease;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .footer-text i {
            color: #667eea;
            margin-right: 0.5rem;
        }

        /* Loading Animation */
        .btn-loading {
            pointer-events: none;
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                margin: 1rem;
                border-radius: 20px;
            }
            
            .login-header {
                padding: 2rem 1.5rem 1.5rem;
            }
            
            .login-body {
                padding: 2rem 1.5rem;
            }
            
            .logo {
                font-size: 3rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }

        /* Form Validation */
        .form-control.is-invalid {
            border-color: #dc3545;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Particles Background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(20px) rotate(240deg); }
        }
    </style>
</head>
<body>
    <!-- Particles Background -->
    <div class="particles" id="particles"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="login-wrapper">
                    <div class="login-container">
                        <div class="login-header">
                            <div class="logo-container">
                                <div class="logo">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                            </div>
                            <h1 class="login-title">เข้าสู่ระบบ</h1>
                            <p class="login-subtitle">ยินดีต้อนรับสู่ระบบจัดการ</p>
                        </div>
                        
                        <div class="login-body">
                            <?php if (isset($error)): ?>
                                <div class="alert" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= BASE_URL ?>authen/login_check" method="POST" id="loginForm">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control" 
                                           id="user_id" 
                                           name="user_id" 
                                           placeholder="รหัสผู้ใช้"
                                           required 
                                           autocomplete="username"
                                           maxlength="50">
                                    <label for="user_id">
                                        <i class="fas fa-user me-2"></i>รหัสผู้ใช้
                                    </label>
                                    <div class="input-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="invalid-feedback" id="userIdError"></div>
                                </div>

                                <button type="submit" class="btn btn-login" id="loginBtn">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    เข้าสู่ระบบ
                                </button>
                            </form>

                            <div class="footer-text">
                                <i class="fas fa-info-circle"></i>
                                หากมีปัญหาในการเข้าสู่ระบบ กรุณาติดต่อผู้ดูแลระบบ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL ?>lib/js/bootstrap.bundle.min.js"></script>
    <script>
        // Create particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 4 + 1;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 6 + 's';
                particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
                
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles
        createParticles();

        // Auto focus on user_id input
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('user_id').focus();
        });

        // Form validation and submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const userIdInput = document.getElementById('user_id');
            const loginBtn = document.getElementById('loginBtn');
            const userIdError = document.getElementById('userIdError');
            
            // Reset previous validation
            userIdInput.classList.remove('is-invalid');
            userIdError.textContent = '';
            
            // Validate input
            const userId = userIdInput.value.trim();
            if (!userId) {
                e.preventDefault();
                userIdInput.classList.add('is-invalid');
                userIdError.textContent = 'กรุณากรอกรหัสผู้ใช้';
                userIdInput.focus();
                return;
            }
            
            if (userId.length < 3) {
                e.preventDefault();
                userIdInput.classList.add('is-invalid');
                userIdError.textContent = 'รหัสผู้ใช้ต้องมีอย่างน้อย 3 ตัวอักษร';
                userIdInput.focus();
                return;
            }
            
            // Add loading state
            loginBtn.classList.add('btn-loading');
            loginBtn.innerHTML = '<span class="spinner"></span>กำลังเข้าสู่ระบบ...';
            loginBtn.disabled = true;
        });
        
        // Remove validation errors on input
        document.getElementById('user_id').addEventListener('input', function() {
            this.classList.remove('is-invalid');
            document.getElementById('userIdError').textContent = '';
        });
        
        // Handle Enter key
        document.getElementById('user_id').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('loginForm').dispatchEvent(new Event('submit'));
            }
        });

        // Add some interactive effects
        document.querySelector('.login-container').addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            this.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        document.querySelector('.login-container').addEventListener('mouseleave', function() {
            this.style.transform = 'rotateX(0deg) rotateY(0deg)';
        });
    </script>
</body>
</html>