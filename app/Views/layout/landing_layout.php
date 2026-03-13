<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="RumiTrack - Smart Ruminant Management. Solusi cerdas untuk pengelolaan peternakan modern.">
    <title>RumiTrack - Smart Ruminant Management</title>
    <link rel="stylesheet" href="<?= base_url('css/landing.css') ?>">
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

<body class="landing-page">
    <!-- Page Loading Overlay -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-icon"><i class="fas fa-cow"></i></div>
        <div class="loader-spinner"></div>
        <div class="loader-text">Memuat halaman...</div>
    </div>

    <?= $this->renderSection('content') ?>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.lp-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        document.querySelector('.lp-menu-toggle')?.addEventListener('click', function () {
            document.querySelector('.lp-nav-links').classList.toggle('open');
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    document.querySelector('.lp-nav-links')?.classList.remove('open');
                }
            });
        });

        // FAQ Accordion
        document.querySelectorAll('.lp-faq-question').forEach(question => {
            question.addEventListener('click', function () {
                const item = this.parentElement;
                const wasActive = item.classList.contains('active');
                document.querySelectorAll('.lp-faq-item').forEach(i => i.classList.remove('active'));
                if (!wasActive) item.classList.add('active');
            });
        });

        // Scroll reveal
        const revealElements = document.querySelectorAll('.lp-reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, { threshold: 0.15 });
        revealElements.forEach(el => observer.observe(el));

        // Page loader - hide when page is ready
        window.addEventListener('load', function () {
            document.getElementById('pageLoader').classList.add('hidden');
        });

        // Show loader on navigation (skip anchor links)
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
    </script>
</body>

</html>