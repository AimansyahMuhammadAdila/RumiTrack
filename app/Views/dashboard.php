<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="dashboard-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Selamat Datang di RumiTrack 👋</h1>
            <p>RumiTrack — Smart Ruminant Management — Kelola ternak ruminansia lebih cerdas, efisien, dan
                terstruktur.</p>
            <div class="smart-acronym">
                <span class="smart-letter"><strong>S</strong>tructured Data</span>
                <span class="smart-letter"><strong>M</strong>onitoring</span>
                <span class="smart-letter"><strong>A</strong>ccessible</span>
                <span class="smart-letter"><strong>R</strong>esource Efficient</span>
                <span class="smart-letter"><strong>T</strong>ech Driven</span>
            </div>
            <div class="hero-actions">
                <a href="<?= base_url('kandang/create') ?>" class="hero-btn hero-btn-white">
                    <i class="fas fa-plus"></i> Tambah Kandang
                </a>
                <a href="<?= base_url('keuangan') ?>" class="hero-btn hero-btn-outline">
                    <i class="fas fa-chart-bar"></i> Lihat Keuangan
                </a>
            </div>
        </div>
        <div class="hero-illustration">🐄</div>
    </div>
</div>

<!-- Period Filter -->
<div class="period-filter" style="margin-bottom:24px;">
    <div class="filter-tabs">
        <a href="<?= base_url('dashboard?period=all') ?>" class="filter-tab <?= $period === 'all' ? 'active' : '' ?>">
            <i class="fas fa-globe"></i> Semua
        </a>
        <a href="<?= base_url('dashboard?period=month') ?>"
            class="filter-tab <?= $period === 'month' ? 'active' : '' ?>">
            <i class="fas fa-calendar-day"></i> Bulan Ini
        </a>
        <a href="<?= base_url('dashboard?period=year') ?>" class="filter-tab <?= $period === 'year' ? 'active' : '' ?>">
            <i class="fas fa-calendar-alt"></i> Tahun Ini
        </a>
    </div>
</div>

<!-- Ringkasan Keuangan -->
<div class="section-header">
    <h2><i class="fas fa-money-bill-wave"></i> Ringkasan Keuangan</h2>
</div>
<div class="dash-stats-grid">
    <div class="dash-stat-card gradient-green">
        <div class="stat-icon-lg"><i class="fas fa-arrow-down"></i></div>
        <div class="stat-number">Rp <?= number_format($pemasukan, 0, ',', '.') ?></div>
        <div class="stat-title">Pemasukan</div>
    </div>
    <div class="dash-stat-card gradient-red">
        <div class="stat-icon-lg"><i class="fas fa-arrow-up"></i></div>
        <div class="stat-number">Rp <?= number_format($pengeluaran, 0, ',', '.') ?></div>
        <div class="stat-title">Pengeluaran</div>
    </div>
    <div class="dash-stat-card <?= $profit >= 0 ? 'gradient-blue' : 'gradient-orange' ?>">
        <div class="stat-icon-lg"><i class="fas fa-chart-line"></i></div>
        <div class="stat-number">Rp <?= number_format(abs($profit), 0, ',', '.') ?></div>
        <div class="stat-title">Profit Bersih <?= $profit < 0 ? '(Rugi)' : '' ?></div>
    </div>
</div>

<!-- Stats Grid -->
<div class="section-header">
    <h2><i class="fas fa-th-large"></i> Ringkasan Data</h2>
</div>
<div class="dash-stats-grid">
    <div class="dash-stat-card gradient-green">
        <div class="stat-icon-lg"><i class="fas fa-warehouse"></i></div>
        <div class="stat-number"><?= $totalKandang ?></div>
        <div class="stat-title">Jumlah Kandang</div>
    </div>
    <div class="dash-stat-card gradient-blue">
        <div class="stat-icon-lg"><i class="fas fa-baby"></i></div>
        <div class="stat-number"><?= $totalPeranakan ?></div>
        <div class="stat-title">Peranakan / Anakan</div>
        <div class="stat-sub"><?= $totalJantan ?> jantan · <?= $totalBetina ?> betina</div>
    </div>
    <div class="dash-stat-card gradient-orange">
        <div class="stat-icon-lg"><i class="fas fa-horse"></i></div>
        <div class="stat-number"><?= $totalTernak ?></div>
        <div class="stat-title">Total Ternak</div>
        <div class="stat-sub"><?= $ternakAktif ?> aktif</div>
    </div>
    <div class="dash-stat-card gradient-red">
        <div class="stat-icon-lg"><i class="fas fa-heartbeat"></i></div>
        <div class="stat-number"><?= $ternakSakit ?></div>
        <div class="stat-title">Ternak Sakit</div>
        <div class="stat-sub">perlu perhatian</div>
    </div>
</div>

<!-- Rekapan Kandang -->
<div class="section-header">
    <h2><i class="fas fa-warehouse"></i> Rekapan Kandang</h2>
    <a href="<?= base_url('kandang') ?>" class="btn btn-sm btn-secondary">Lihat Semua</a>
</div>
<div class="card">
    <div class="card-body" style="padding:0;">
        <?php if (!empty($kandangList)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Kandang</th>
                            <th>Jenis Ruminan</th>
                            <th>Tujuan</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kandangList as $k): ?>
                            <tr>
                                <td class="fw-semibold text-accent"><?= esc($k['kode_kandang']) ?></td>
                                <td class="fw-semibold"><?= esc($k['nama_kandang']) ?></td>
                                <td><?= esc($k['jenis_ruminan']) ?></td>
                                <td><span class="badge badge-aktif"><?= esc($k['tujuan']) ?></span></td>
                                <td><?= $k['kapasitas'] ?> ekor</td>
                                <td><?= $k['jumlah_ternak'] ?> ekor</td>
                                <td>
                                    <?php
                                    $pct = $k['kapasitas'] > 0 ? ($k['jumlah_ternak'] / $k['kapasitas']) * 100 : 0;
                                    $statusClass = $pct >= 90 ? 'badge-sakit' : ($pct >= 50 ? 'badge-perawatan' : 'badge-aktif');
                                    $statusText = $pct >= 90 ? 'Penuh' : ($pct >= 50 ? 'Cukup' : 'Tersedia');
                                    ?>
                                    <span class="badge <?= $statusClass ?>"><?= $statusText ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">🏠</div>
                <h4>Belum Ada Data Kandang</h4>
                <p>Tambahkan kandang untuk mulai mengelola peternakan</p>
                <a href="<?= base_url('kandang/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kandang
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Quick Access -->
<div class="section-header" style="margin-top:32px;">
    <h2><i class="fas fa-th-large"></i> Akses Cepat</h2>
</div>
<div class="feature-grid">
    <a href="<?= base_url('kandang') ?>" class="feature-card">
        <div class="feature-icon icon-green"><i class="fas fa-warehouse"></i></div>
        <div class="feature-title">Kandang</div>
        <div class="feature-desc">Kelola data kandang peternakan</div>
    </a>
    <a href="<?= base_url('peranakan') ?>" class="feature-card">
        <div class="feature-icon icon-blue"><i class="fas fa-baby"></i></div>
        <div class="feature-title">Peranakan</div>
        <div class="feature-desc">Data anakan & keturunan ternak</div>
    </a>
    <a href="<?= base_url('pakan') ?>" class="feature-card">
        <div class="feature-icon icon-orange"><i class="fas fa-seedling"></i></div>
        <div class="feature-title">Pakan</div>
        <div class="feature-desc">Stok pakan & pengeluaran harian</div>
    </a>
    <a href="<?= base_url('kesehatan') ?>" class="feature-card">
        <div class="feature-icon icon-red"><i class="fas fa-heartbeat"></i></div>
        <div class="feature-title">Kesehatan</div>
        <div class="feature-desc">Vaksin, pengobatan & monitoring</div>
    </a>
    <a href="<?= base_url('keuangan') ?>" class="feature-card">
        <div class="feature-icon icon-purple"><i class="fas fa-money-bill-wave"></i></div>
        <div class="feature-title">Keuangan</div>
        <div class="feature-desc">Pemasukan, pengeluaran & grafik</div>
    </a>
    <a href="<?= base_url('catatan-rekomendasi') ?>" class="feature-card">
        <div class="feature-icon icon-green"><i class="fas fa-clipboard-check"></i></div>
        <div class="feature-title">Catatan Rekomendasi</div>
        <div class="feature-desc">Analisis bulanan peternakan</div>
    </a>
</div>

<?= $this->endSection() ?>