<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RumiTrack - Login">
    <title>Login | RumiTrack</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            transition: opacity .4s ease, visibility .4s ease
        }

        .page-loader.hidden {
            opacity: 0;
            visibility: hidden
        }

        .page-loader .loader-icon {
            font-size: 2.5rem;
            color: #16a34a;
            animation: loaderPulse 1s ease-in-out infinite
        }

        .page-loader .loader-spinner {
            margin-top: 18px;
            width: 38px;
            height: 38px;
            border: 3.5px solid #e5e7eb;
            border-top-color: #16a34a;
            border-radius: 50%;
            animation: loaderSpin .7s linear infinite
        }

        .page-loader .loader-text {
            margin-top: 14px;
            font-size: .9rem;
            color: #6b7280;
            font-family: 'Segoe UI', sans-serif;
            letter-spacing: .5px
        }

        @keyframes loaderSpin {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes loaderPulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1
            }

            50% {
                transform: scale(1.15);
                opacity: .7
            }
        }
    </style>
</head>

<body class="login-body">
    <div class="page-loader" id="pageLoader">
        <div class="loader-icon"><i class="fas fa-cow"></i></div>
        <div class="loader-spinner"></div>
        <div class="loader-text">Memuat halaman...</div>
    </div>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">🐄</div>
                <h1>RumiTrack</h1>
                <p class="login-subtitle">Smart Ruminant Management System</p>
                <div class="login-acronym">
                    <span><strong>S</strong>tructured</span>
                    <span><strong>M</strong>onitoring</span>
                    <span><strong>A</strong>ccessible</span>
                    <span><strong>R</strong>esource</span>
                    <span><strong>T</strong>echnology</span>
                </div>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" style="margin: 0 24px;">
                    <i class="fas fa-check-circle"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger" style="margin: 0 24px;">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (is_array($errors)) {
                        echo implode('<br>', $errors);
                    } else {
                        echo $errors;
                    }
                    ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST" class="login-form">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" name="username" id="username" class="form-control"
                        placeholder="Masukkan username" value="<?= old('username') ?>" required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
            </form>

            <div class="login-footer">
                <p style="margin-bottom: 8px;">
                    Belum punya akun? <a href="<?= base_url('register') ?>"
                        style="color: var(--primary); font-weight: 600; text-decoration: none;">Daftar Sekarang</a>
                </p>
                <p>
                    <a href="<?= base_url('/') ?>"
                        style="color: var(--text-muted); font-size: 12px; text-decoration: none;">
                        <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                    </a>
                </p>
                <p style="margin-top: 12px;">&copy;
                    <?= date('Y') ?> RumiTrack — Smart Ruminant Management
                </p>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function () { document.getElementById('pageLoader').classList.add('hidden') });
        document.addEventListener('click', function (e) { var l = e.target.closest('a[href]'); if (l && !l.getAttribute('href').startsWith('#') && !l.getAttribute('href').startsWith('javascript') && !l.hasAttribute('download') && l.target !== '_blank') { document.getElementById('pageLoader').classList.remove('hidden') } });
        document.addEventListener('submit', function () { document.getElementById('pageLoader').classList.remove('hidden') });
    </script>
</body>

</html>