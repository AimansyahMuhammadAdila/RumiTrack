<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card-header" style="background:none;border:none;padding:0 0 20px 0;">
    <h3><i class="fas fa-warehouse text-accent" style="margin-right:8px"></i> Data Kandang</h3>
    <a href="<?= base_url('kandang/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Kandang
    </a>
</div>

<!-- Stats -->
<div class="stats-grid" style="margin-bottom:24px;">
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-warehouse"></i></div>
        <div class="stat-info">
            <h4>Total Kandang</h4>
            <div class="stat-value">
                <?= count($kandang) ?>
            </div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-paw"></i></div>
        <div class="stat-info">
            <h4>Total Ternak</h4>
            <div class="stat-value">
                <?= array_sum(array_column($kandang, 'jumlah_ternak')) ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body" style="padding:0;">
        <?php if (!empty($kandang)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kandang</th>
                            <th>Jenis Ruminan</th>
                            <th>Tujuan</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Tgl Perolehan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kandang as $i => $k): ?>
                            <tr>
                                <td>
                                    <?= $i + 1 ?>
                                </td>
                                <td class="fw-semibold text-accent">
                                    <?= esc($k['kode_kandang']) ?>
                                </td>
                                <td class="fw-semibold">
                                    <?= esc($k['nama_kandang']) ?>
                                </td>
                                <td>
                                    <?= esc($k['jenis_ruminan']) ?>
                                </td>
                                <td><span class="badge badge-aktif">
                                        <?= esc($k['tujuan']) ?>
                                    </span></td>
                                <td>
                                    <?= $k['kapasitas'] ?> ekor
                                </td>
                                <td>
                                    <span
                                        class="badge <?= $k['jumlah_ternak'] >= $k['kapasitas'] && $k['kapasitas'] > 0 ? 'badge-sakit' : 'badge-aktif' ?>">
                                        <?= $k['jumlah_ternak'] ?> ekor
                                    </span>
                                </td>
                                <td>
                                    <?= $k['tanggal_perolehan'] ? date('d/m/Y', strtotime($k['tanggal_perolehan'])) : '-' ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('kandang/edit/' . $k['id']) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('kandang/delete/' . $k['id']) ?>', '<?= esc($k['nama_kandang']) ?>')"
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
                <div class="empty-icon">🏠</div>
                <h4>Belum Ada Data Kandang</h4>
                <p>Mulai tambahkan kandang untuk mengelola ternak Anda</p>
                <a href="<?= base_url('kandang/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kandang Pertama
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>