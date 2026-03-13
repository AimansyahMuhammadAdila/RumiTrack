<?= $this->extend('layout/landing_layout') ?>
<?= $this->section('content') ?>

<!-- Navbar -->
<nav class="lp-navbar" id="lp-navbar">
    <div class="lp-container">
        <a href="#" class="lp-logo">
            <div class="logo-icon"><i class="fas fa-cow"></i></div>
            <div>
                <span>RumiTrack</span>
                <small>Smart Ruminant Management</small>
            </div>
        </a>

        <ul class="lp-nav-links" id="lp-nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#keunggulan">Keunggulan</a></li>
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#bergabung">Bergabung</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>

        <div class="lp-nav-cta">
            <a href="<?= base_url('login') ?>" class="lp-btn lp-btn-outline">Masuk</a>
            <a href="<?= base_url('register') ?>" class="lp-btn lp-btn-primary">Daftar</a>
        </div>

        <button class="lp-menu-toggle" id="lp-menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<!-- Hero Section -->
<section class="lp-hero" id="beranda">
    <div class="lp-container">
        <div class="lp-hero-content">
            <h1>Solusi untuk Semua<br><span>Masalah Peternakan</span></h1>
            <p>Kelola peternakan ruminansia Anda lebih cerdas, efisien, dan terstruktur dengan sistem manajemen
                terintegrasi berbasis teknologi.</p>
            <div class="lp-hero-buttons">
                <a href="<?= base_url('register') ?>" class="lp-btn lp-btn-primary lp-btn-lg">
                    <i class="fas fa-rocket"></i> Mulai Sekarang
                </a>
                <a href="#fitur" class="lp-btn lp-btn-outline lp-btn-lg">
                    <i class="fas fa-play-circle"></i> Lihat Fitur
                </a>
            </div>
        </div>
        <div class="lp-hero-image">
            <img src="<?= base_url('images/hero-illustration.png') ?>" alt="RumiTrack - Smart Ruminant Management">
        </div>
    </div>
</section>

<!-- Feature Icons Strip -->
<section class="lp-features-strip lp-reveal">
    <div class="lp-container">
        <div class="lp-feature-icon-card">
            <div class="icon-circle red"><i class="fas fa-heartbeat"></i></div>
            <h4>Kesehatan Hewan</h4>
            <p>Monitoring vaksin & pengobatan</p>
        </div>
        <div class="lp-feature-icon-card">
            <div class="icon-circle orange"><i class="fas fa-seedling"></i></div>
            <h4>Pakan Ternak</h4>
            <p>Stok & dosis pakan otomatis</p>
        </div>
        <div class="lp-feature-icon-card">
            <div class="icon-circle green"><i class="fas fa-chart-line"></i></div>
            <h4>Produksi Ternak</h4>
            <p>Data pertumbuhan & peranakan</p>
        </div>
        <div class="lp-feature-icon-card">
            <div class="icon-circle blue"><i class="fas fa-money-bill-wave"></i></div>
            <h4>Keuangan Peternakan</h4>
            <p>Pemasukan & pengeluaran</p>
        </div>
    </div>
</section>

<!-- Keunggulan Section -->
<section class="lp-advantages lp-section" id="keunggulan">
    <div class="lp-container">
        <div class="lp-section-title lp-reveal">
            <h2>Keunggulan Sistem Informasi Manajemen Peternakan</h2>
            <p>RumiTrack dirancang khusus untuk peternak ruminansia modern yang ingin meningkatkan efisiensi dan
                produktivitas.</p>
        </div>
        <div class="lp-advantages-grid lp-reveal">
            <div class="lp-advantages-visual">
                <div class="lp-chart-card">
                    <div class="chart-donut donut-1"></div>
                    <h5>Distribusi Pakan</h5>
                    <p>Per jenis ternak</p>
                </div>
                <div class="lp-chart-card">
                    <div class="chart-donut donut-2"></div>
                    <h5>Kesehatan Ternak</h5>
                    <p>Status monitoring</p>
                </div>
                <div class="lp-chart-card" style="width: 100%; max-width: 420px;">
                    <div
                        style="height: 80px; background: linear-gradient(90deg, transparent, rgba(22,163,74,0.1), rgba(22,163,74,0.2), rgba(22,163,74,0.15), rgba(22,163,74,0.3), rgba(22,163,74,0.25), rgba(22,163,74,0.4)); border-radius: 8px; display: flex; align-items: flex-end; padding: 8px;">
                        <div
                            style="flex:1;background:var(--lp-primary);height:40%;border-radius:4px 4px 0 0;margin:0 4px;">
                        </div>
                        <div
                            style="flex:1;background:var(--lp-primary);height:60%;border-radius:4px 4px 0 0;margin:0 4px;opacity:0.8;">
                        </div>
                        <div
                            style="flex:1;background:var(--lp-primary);height:45%;border-radius:4px 4px 0 0;margin:0 4px;opacity:0.9;">
                        </div>
                        <div
                            style="flex:1;background:var(--lp-primary);height:75%;border-radius:4px 4px 0 0;margin:0 4px;">
                        </div>
                        <div
                            style="flex:1;background:var(--lp-primary);height:55%;border-radius:4px 4px 0 0;margin:0 4px;opacity:0.85;">
                        </div>
                        <div
                            style="flex:1;background:var(--lp-primary);height:90%;border-radius:4px 4px 0 0;margin:0 4px;">
                        </div>
                    </div>
                    <h5 style="margin-top:12px;">Grafik Keuangan</h5>
                    <p>Tren bulanan</p>
                </div>
            </div>
            <div class="lp-advantages-content">
                <h3>Mengapa Memilih RumiTrack?</h3>
                <ul class="lp-advantages-list">
                    <li>
                        <span class="check-icon"><i class="fas fa-check"></i></span>
                        <div>
                            <strong>Data Terstruktur</strong> — Semua informasi ternak tersimpan rapi dan mudah diakses
                            kapan saja
                        </div>
                    </li>
                    <li>
                        <span class="check-icon"><i class="fas fa-check"></i></span>
                        <div>
                            <strong>Monitoring Real-time</strong> — Pantau kesehatan, pakan, dan pertumbuhan ternak
                            secara langsung
                        </div>
                    </li>
                    <li>
                        <span class="check-icon"><i class="fas fa-check"></i></span>
                        <div>
                            <strong>Laporan Keuangan Otomatis</strong> — Pemasukan dan pengeluaran tercatat otomatis
                            dengan grafik visual
                        </div>
                    </li>
                    <li>
                        <span class="check-icon"><i class="fas fa-check"></i></span>
                        <div>
                            <strong>Akses Mudah</strong> — Gunakan dari perangkat apapun, kapan saja dan di mana saja
                        </div>
                    </li>
                    <li>
                        <span class="check-icon"><i class="fas fa-check"></i></span>
                        <div>
                            <strong>Catatan Rekomendasi</strong> — Dapatkan analisis dan rekomendasi bulanan untuk
                            peternakan Anda
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Manfaat Section -->
<section class="lp-benefits lp-reveal">
    <div class="lp-container">
        <div class="lp-benefits-grid">
            <div class="lp-benefits-content">
                <h3>Manfaat Menggunakan RumiTrack</h3>
                <div class="lp-benefit-item">
                    <div class="benefit-num">1</div>
                    <div>
                        <h4>Mengurangi Risiko Kerugian</h4>
                        <p>Deteksi dini penyakit dan monitoring kesehatan ternak secara berkala membantu mengurangi
                            angka kematian.</p>
                    </div>
                </div>
                <div class="lp-benefit-item">
                    <div class="benefit-num">2</div>
                    <div>
                        <h4>Efisiensi Biaya Pakan</h4>
                        <p>Perhitungan dosis pakan otomatis berdasarkan berat badan dan jenis ternak menghemat biaya
                            operasional.</p>
                    </div>
                </div>
                <div class="lp-benefit-item">
                    <div class="benefit-num">3</div>
                    <div>
                        <h4>Pengambilan Keputusan Tepat</h4>
                        <p>Laporan keuangan dan analisis data membantu Anda membuat keputusan bisnis yang lebih baik.
                        </p>
                    </div>
                </div>
                <div class="lp-benefit-item">
                    <div class="benefit-num">4</div>
                    <div>
                        <h4>Meningkatkan Produktivitas</h4>
                        <p>Otomatisasi pencatatan dan pelaporan memberi lebih banyak waktu untuk fokus pada pengembangan
                            peternakan.</p>
                    </div>
                </div>
            </div>
            <div class="lp-benefits-image">
                <img src="<?= base_url('images/benefit-illustration.png') ?>" alt="Manfaat RumiTrack">
            </div>
        </div>
    </div>
</section>

<!-- Fitur Terbaik Section -->
<section class="lp-best-features lp-section lp-reveal" id="fitur">
    <div class="lp-container">
        <div class="lp-section-title">
            <h2>Fitur Terbaik Di RumiTrack</h2>
            <p>Fitur-fitur lengkap yang dirancang untuk memenuhi semua kebutuhan manajemen peternakan ruminansia Anda.
            </p>
        </div>
        <div class="lp-best-features-grid">
            <div class="lp-best-feature-card">
                <div class="feature-icon f-red"><i class="fas fa-chart-bar"></i></div>
                <div>
                    <h4>Laporan Penjualan</h4>
                    <p>Rekap penjualan ternak dengan grafik visual dan filter periode</p>
                </div>
            </div>
            <div class="lp-best-feature-card">
                <div class="feature-icon f-blue"><i class="fas fa-clipboard-list"></i></div>
                <div>
                    <h4>Laporan Pakan</h4>
                    <p>Monitoring stok pakan dan pengeluaran harian secara detail</p>
                </div>
            </div>
            <div class="lp-best-feature-card">
                <div class="feature-icon f-green"><i class="fas fa-stethoscope"></i></div>
                <div>
                    <h4>Laporan Penyakit</h4>
                    <p>Riwayat kesehatan lengkap dengan vaksin dan pengobatan</p>
                </div>
            </div>
            <div class="lp-best-feature-card">
                <div class="feature-icon f-orange"><i class="fas fa-calculator"></i></div>
                <div>
                    <h4>Sistem Akuntansi</h4>
                    <p>Pemasukan, pengeluaran, dan profit bersih otomatis</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bergabung Section -->
<section class="lp-pricing lp-reveal" id="bergabung">
    <div class="lp-container">
        <div class="lp-section-title">
            <h2>Bergabung Sekarang</h2>
            <p>Mulai kelola peternakan Anda dengan lebih cerdas dan efisien. Daftar sekarang dan nikmati semua fitur RumiTrack secara gratis!</p>
        </div>
        <div style="text-align: center; margin-top: 2rem;">
            <a href="<?= base_url('register') ?>" class="lp-btn lp-btn-primary lp-btn-lg" style="font-size: 1.2rem; padding: 1rem 3rem;">
                <i class="fas fa-rocket"></i> Daftar Sekarang
            </a>
            <p style="margin-top: 1.5rem; color: var(--lp-text-light); font-size: 0.95rem;">Gratis dan tanpa komitmen. Langsung akses semua fitur!</p>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="lp-faq lp-section lp-reveal" id="faq">
    <div class="lp-container">
        <div class="lp-section-title">
            <h2>FAQ</h2>
            <p>Pertanyaan yang sering diajukan tentang sistem manajemen peternakan RumiTrack.</p>
        </div>
        <div class="lp-faq-list">
            <div class="lp-faq-item active">
                <div class="lp-faq-question">
                    <span>Apa itu RumiTrack Sistem Manajemen Peternakan?</span>
                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="lp-faq-answer">
                    <div class="lp-faq-answer-inner">
                        RumiTrack adalah sistem informasi manajemen peternakan ruminansia berbasis web yang membantu
                        peternak mengelola data ternak, pakan, kesehatan, keuangan, dan peranakan secara terintegrasi
                        dan efisien.
                    </div>
                </div>
            </div>
            <div class="lp-faq-item">
                <div class="lp-faq-question">
                    <span>Apakah saya perlu keahlian IT untuk menggunakan RumiTrack?</span>
                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="lp-faq-answer">
                    <div class="lp-faq-answer-inner">
                        Tidak. RumiTrack dirancang dengan antarmuka yang intuitif dan mudah digunakan. Anda hanya perlu
                        koneksi internet dan perangkat (HP/laptop/tablet) untuk mengakses semua fitur.
                    </div>
                </div>
            </div>
            <div class="lp-faq-item">
                <div class="lp-faq-question">
                    <span>Jenis ternak apa saja yang didukung?</span>
                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="lp-faq-answer">
                    <div class="lp-faq-answer-inner">
                        RumiTrack mendukung berbagai jenis ternak ruminansia seperti sapi, kambing, domba, dan kerbau.
                        Setiap jenis ternak memiliki perhitungan dosis pakan yang disesuaikan.
                    </div>
                </div>
            </div>
            <div class="lp-faq-item">
                <div class="lp-faq-question">
                    <span>Bagaimana cara menghitung dosis pakan secara otomatis?</span>
                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="lp-faq-answer">
                    <div class="lp-faq-answer-inner">
                        Sistem akan menghitung dosis pakan berdasarkan berat badan ternak, jenis pakan, dan kebutuhan
                        nutrisi. Anda cukup memasukkan data ternak, dan sistem akan memberikan rekomendasi dosis yang
                        tepat.
                    </div>
                </div>
            </div>
            <div class="lp-faq-item">
                <div class="lp-faq-question">
                    <span>Apakah data saya aman di RumiTrack?</span>
                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="lp-faq-answer">
                    <div class="lp-faq-answer-inner">
                        Ya, keamanan data adalah prioritas kami. Semua data disimpan dengan enkripsi dan backup berkala.
                        Hanya pengguna yang berwenang yang dapat mengakses data peternakan Anda.
                    </div>
                </div>
            </div>
        </div>
        <div class="lp-faq-cta">
            <a href="#kontak" class="lp-btn lp-btn-primary">
                <i class="fas fa-envelope"></i> Punya Pertanyaan Lain?
            </a>
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section class="lp-contact lp-reveal" id="kontak">
    <div class="lp-container">
        <div class="lp-section-title">
            <h2>Kontak</h2>
            <p>Hubungi kami untuk informasi lebih lanjut atau demo sistem RumiTrack.</p>
        </div>
        <div class="lp-contact-grid">
            <div class="lp-contact-item">
                <div class="contact-icon ci-red"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <h4>Alamat Kantor</h4>
                    <p>Jl. Peternakan No. 123, Kota Malang, Jawa Timur</p>
                </div>
            </div>
            <div class="lp-contact-item">
                <div class="contact-icon ci-blue"><i class="fas fa-envelope"></i></div>
                <div>
                    <h4>Email</h4>
                    <p>info@rumitrack.com</p>
                </div>
            </div>
            <div class="lp-contact-item">
                <div class="contact-icon ci-green"><i class="fab fa-whatsapp"></i></div>
                <div>
                    <h4>WhatsApp</h4>
                    <p>+62 812-3456-7890</p>
                </div>
            </div>
            <div class="lp-contact-item">
                <div class="contact-icon ci-orange"><i class="fas fa-phone-alt"></i></div>
                <div>
                    <h4>Telepon</h4>
                    <p>+62 341-123456</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="lp-footer">
    <div class="lp-container">
        <div class="lp-logo">
            <div class="logo-icon"><i class="fas fa-cow"></i></div>
            <span>RumiTrack</span>
        </div>
        <p>&copy;
            <?= date('Y') ?> RumiTrack - Smart Ruminant Management. All rights reserved.
        </p>
    </div>
</footer>

<?= $this->endSection() ?>