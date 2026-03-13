<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RumiTrack - Smart Ruminant Management">
    <title>
        <?= esc($title ?? 'Dashboard') ?> | RumiTrack
    </title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Page Loading Overlay */
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
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }

        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .page-loader .loader-icon {
            font-size: 2.5rem;
            color: #16a34a;
            animation: loaderPulse 1s ease-in-out infinite;
        }

        .page-loader .loader-spinner {
            margin-top: 18px;
            width: 38px;
            height: 38px;
            border: 3.5px solid #e5e7eb;
            border-top-color: #16a34a;
            border-radius: 50%;
            animation: loaderSpin 0.7s linear infinite;
        }

        .page-loader .loader-text {
            margin-top: 14px;
            font-size: 0.9rem;
            color: #6b7280;
            font-family: 'Segoe UI', sans-serif;
            letter-spacing: 0.5px;
        }

        @keyframes loaderSpin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes loaderPulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.15);
                opacity: 0.7;
            }
        }
    </style>
</head>

<body>
    <!-- Page Loading Overlay -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-icon"><i class="fas fa-cow"></i></div>
        <div class="loader-spinner"></div>
        <div class="loader-text">Memuat halaman...</div>
    </div>

    <div class="app-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <div class="brand-icon">🐄</div>
                <div class="brand-text">
                    <h1>RumiTrack</h1>
                    <span>Smart Ruminant Management</span>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Menu Utama</div>
                    <a href="<?= base_url('dashboard') ?>"
                        class="nav-link <?= ($title ?? '') === 'Dashboard' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-th-large"></i></span>
                        Dashboard
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Data Master</div>
                    <a href="<?= base_url('kandang') ?>"
                        class="nav-link <?= ($title ?? '') === 'Data Kandang' || ($title ?? '') === 'Tambah Kandang' || ($title ?? '') === 'Edit Kandang' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-warehouse"></i></span>
                        Kandang
                    </a>
                    <a href="<?= base_url('peranakan') ?>"
                        class="nav-link <?= ($title ?? '') === 'Data Peranakan' || ($title ?? '') === 'Tambah Peranakan' || ($title ?? '') === 'Edit Peranakan' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-baby"></i></span>
                        Peranakan
                    </a>
                    <a href="<?= base_url('ternak') ?>"
                        class="nav-link <?= ($title ?? '') === 'Data Ternak' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-horse"></i></span>
                        Data Ternak
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Operasional</div>
                    <a href="<?= base_url('pakan') ?>"
                        class="nav-link <?= ($title ?? '') === 'Data Pakan' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-seedling"></i></span>
                        Pakan
                    </a>
                    <a href="<?= base_url('dosis') ?>"
                        class="nav-link <?= ($title ?? '') === 'Dosis Pakan' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-prescription-bottle"></i></span>
                        Dosis Pakan
                    </a>
                    <a href="<?= base_url('kesehatan') ?>"
                        class="nav-link <?= ($title ?? '') === 'Catatan Kesehatan' || ($title ?? '') === 'Kesehatan' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-heartbeat"></i></span>
                        Kesehatan
                    </a>
                    <a href="<?= base_url('pertumbuhan') ?>"
                        class="nav-link <?= ($title ?? '') === 'Data Pertumbuhan' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-chart-line"></i></span>
                        Pertumbuhan
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Analitik</div>
                    <a href="<?= base_url('keuangan') ?>"
                        class="nav-link <?= ($title ?? '') === 'Keuangan' || ($title ?? '') === 'Tambah Transaksi' || ($title ?? '') === 'Edit Transaksi' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-money-bill-wave"></i></span>
                        Keuangan
                    </a>
                    <a href="<?= base_url('catatan-rekomendasi') ?>"
                        class="nav-link <?= ($title ?? '') === 'Catatan Rekomendasi' || ($title ?? '') === 'Tambah Catatan Rekomendasi' || ($title ?? '') === 'Edit Catatan Rekomendasi' ? 'active' : '' ?>">
                        <span class="nav-icon"><i class="fas fa-clipboard-check"></i></span>
                        Catatan Rekomendasi
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
                &copy;
                <?= date('Y') ?> RumiTrack v2.0 — Smart Ruminant Management
            </div>
        </aside>

        <!-- Sidebar Overlay (mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Main Content -->
        <main class="main-content">
            <header class="topbar">
                <div style="display:flex;align-items:center;gap:12px;">
                    <button class="mobile-toggle" id="mobileToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="page-title">
                        <?= esc($title ?? 'Dashboard') ?>
                    </div>
                </div>
                <div class="topbar-actions" style="display:flex;align-items:center;gap:16px;">
                    <span class="text-muted" style="font-size:13px;">
                        <i class="fas fa-calendar-alt"></i>
                        <?= date('d M Y') ?>
                    </span>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <span style="font-size:13px;color:var(--text-secondary);">
                            <i class="fas fa-user-circle"></i>
                            <?= esc(session()->get('userName')) ?>
                        </span>
                        <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-danger" style="font-size:12px;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    <?php endif; ?>
                </div>
            </header>

            <div class="content-area fade-in">
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
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

                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>

    <script>
        // Page loader - hide when page is ready
        window.addEventListener('load', function () {
            document.getElementById('pageLoader').classList.add('hidden');
        });

        // Show loader on navigation
        document.addEventListener('click', function (e) {
            const link = e.target.closest('a[href]');
            if (link && !link.getAttribute('href').startsWith('#') && !link.getAttribute('href').startsWith('javascript') && !link.hasAttribute('download') && link.target !== '_blank') {
                document.getElementById('pageLoader').classList.remove('hidden');
            }
        });

        // Show loader on form submit
        document.addEventListener('submit', function () {
            document.getElementById('pageLoader').classList.remove('hidden');
        });

        // Mobile sidebar toggle with overlay
        (function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('mobileToggle');

            function openSidebar() {
                sidebar.classList.add('open');
                overlay.classList.add('active');
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            }

            if (toggle) {
                toggle.addEventListener('click', function () {
                    if (sidebar.classList.contains('open')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            // Close on resize to desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768) {
                    closeSidebar();
                }
            });
        })();

        // Confirm delete
        function confirmDelete(url, name) {
            if (confirm('Apakah Anda yakin ingin menghapus "' + name + '"?')) {
                window.location.href = url;
            }
        }
    </script>
</body>

</html>