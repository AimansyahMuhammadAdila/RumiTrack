<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Period Filter -->
<div class="period-filter" style="margin-bottom:24px;">
    <div class="filter-tabs">
        <a href="<?= base_url('keuangan?period=all') ?>" class="filter-tab <?= $period === 'all' ? 'active' : '' ?>">
            <i class="fas fa-globe"></i> Semua
        </a>
        <a href="<?= base_url('keuangan?period=month') ?>"
            class="filter-tab <?= $period === 'month' ? 'active' : '' ?>">
            <i class="fas fa-calendar-day"></i> Bulan Ini
        </a>
        <a href="<?= base_url('keuangan?period=year') ?>" class="filter-tab <?= $period === 'year' ? 'active' : '' ?>">
            <i class="fas fa-calendar-alt"></i> Tahun Ini
        </a>
    </div>
    <a href="<?= base_url('keuangan/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Transaksi
    </a>
</div>

<!-- Financial Summary Cards -->
<div class="dash-stats-grid" style="margin-bottom:32px;">
    <div class="dash-stat-card gradient-green">
        <div class="stat-icon-lg"><i class="fas fa-arrow-down"></i></div>
        <div class="stat-number">Rp
            <?= number_format($pemasukan, 0, ',', '.') ?>
        </div>
        <div class="stat-title">Total Pemasukan</div>
    </div>
    <div class="dash-stat-card gradient-red">
        <div class="stat-icon-lg"><i class="fas fa-arrow-up"></i></div>
        <div class="stat-number">Rp
            <?= number_format($pengeluaran, 0, ',', '.') ?>
        </div>
        <div class="stat-title">Total Pengeluaran</div>
    </div>
    <div class="dash-stat-card <?= $profit >= 0 ? 'gradient-blue' : 'gradient-orange' ?>">
        <div class="stat-icon-lg"><i class="fas fa-chart-line"></i></div>
        <div class="stat-number">Rp
            <?= number_format(abs($profit), 0, ',', '.') ?>
        </div>
        <div class="stat-title">Profit Bersih
            <?= $profit < 0 ? '(Rugi)' : '' ?>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="grid-2" style="margin-bottom:32px;">
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-chart-bar text-accent" style="margin-right:8px"></i> Grafik Bulanan
                <?= date('Y') ?>
            </h3>
        </div>
        <div class="card-body">
            <canvas id="monthlyBarChart" height="280"></canvas>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-chart-pie text-accent" style="margin-right:8px"></i> Komposisi Keuangan</h3>
        </div>
        <div class="card-body">
            <canvas id="pieChart" height="280"></canvas>
        </div>
    </div>
</div>

<!-- Ringkasan & Analitik -->
<div class="card" style="margin-bottom:24px;">
    <div class="card-header">
        <h3><i class="fas fa-calculator text-accent" style="margin-right:8px"></i> Ringkasan & Analitik Keseluruhan</h3>
    </div>
    <div class="card-body">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-percentage"></i></div>
                <div class="stat-info">
                    <h4>Rasio Profit</h4>
                    <div class="stat-value">
                        <?= $pemasukan > 0 ? number_format(($profit / $pemasukan) * 100, 1) : 0 ?>%
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-receipt"></i></div>
                <div class="stat-info">
                    <h4>Total Transaksi</h4>
                    <div class="stat-value">
                        <?= count($transactions) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Transaksi -->
<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-history text-accent" style="margin-right:8px"></i> Riwayat Transaksi</h3>
    </div>
    <div class="card-body" style="padding:0;">
        <?php if (!empty($transactions)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $i => $t): ?>
                            <tr>
                                <td>
                                    <?= $i + 1 ?>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($t['tanggal'])) ?>
                                </td>
                                <td>
                                    <span class="badge <?= $t['jenis'] === 'Pemasukan' ? 'badge-aktif' : 'badge-sakit' ?>">
                                        <i class="fas fa-<?= $t['jenis'] === 'Pemasukan' ? 'arrow-down' : 'arrow-up' ?>"></i>
                                        <?= $t['jenis'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?= esc($t['kategori'] ?? '-') ?>
                                </td>
                                <td class="fw-semibold <?= $t['jenis'] === 'Pemasukan' ? 'text-accent' : 'text-danger' ?>">
                                    Rp
                                    <?= number_format($t['jumlah'], 0, ',', '.') ?>
                                </td>
                                <td>
                                    <?= esc($t['keterangan'] ?? '-') ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('keuangan/edit/' . $t['id']) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('keuangan/delete/' . $t['id']) ?>', 'transaksi ini')"
                                            class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">💰</div>
                <h4>Belum Ada Transaksi</h4>
                <p>Mulai catat pemasukan dan pengeluaran peternakan Anda</p>
                <a href="<?= base_url('keuangan/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Transaksi Pertama
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    const monthlyData = <?= $monthlyData ?>;
    const bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];

    // Bar Chart
    new Chart(document.getElementById('monthlyBarChart'), {
        type: 'bar',
        data: {
            labels: bulanLabels,
            datasets: [
                {
                    label: 'Pemasukan',
                    data: monthlyData.map(d => d.pemasukan),
                    backgroundColor: 'rgba(22, 163, 74, 0.7)',
                    borderRadius: 6,
                },
                {
                    label: 'Pengeluaran',
                    data: monthlyData.map(d => d.pengeluaran),
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderRadius: 6,
                },
                {
                    label: 'Profit',
                    data: monthlyData.map(d => d.profit),
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderRadius: 6,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: {
                y: { beginAtZero: true, ticks: { callback: v => 'Rp ' + v.toLocaleString('id-ID') } }
            }
        }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Pemasukan', 'Pengeluaran'],
            datasets: [{
                data: [<?= $pemasukan ?>, <?= $pengeluaran ?>],
                backgroundColor: ['rgba(22, 163, 74, 0.8)', 'rgba(239, 68, 68, 0.8)'],
                borderWidth: 0,
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
            }
        }
    });
</script>

<?= $this->endSection() ?>