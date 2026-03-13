<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card-header" style="background:none;border:none;padding:0 0 20px 0;">
    <h3><i class="fas fa-baby text-accent" style="margin-right:8px"></i> Data Peranakan</h3>
    <a href="<?= base_url('peranakan/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Peranakan
    </a>
</div>

<!-- Stats -->
<div class="stats-grid" style="margin-bottom:24px;">
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-paw"></i></div>
        <div class="stat-info">
            <h4>Total Anakan</h4>
            <div class="stat-value">
                <?= count($peranakan) ?>
            </div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-mars"></i></div>
        <div class="stat-info">
            <h4>Jantan</h4>
            <div class="stat-value">
                <?= $totalJantan ?>
            </div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(236,72,153,0.1);color:#ec4899;"><i class="fas fa-venus"></i></div>
        <div class="stat-info">
            <h4>Betina</h4>
            <div class="stat-value">
                <?= $totalBetina ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body" style="padding:0;">
        <?php if (!empty($peranakan)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kandang</th>
                            <th>Kode Ternak</th>
                            <th>Jenis Ruminan</th>
                            <th>Kelamin</th>
                            <th>Tgl Perolehan</th>
                            <th>Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peranakan as $i => $p): ?>
                            <tr>
                                <td>
                                    <?= $i + 1 ?>
                                </td>
                                <td class="fw-semibold">
                                    <?= esc($p['nama_kandang']) ?>
                                </td>
                                <td class="fw-semibold text-accent">
                                    <?= esc($p['kode_ternak']) ?>
                                </td>
                                <td>
                                    <?= esc($p['jenis_ruminan']) ?>
                                </td>
                                <td>
                                    <span
                                        class="badge <?= $p['jenis_kelamin'] === 'Jantan' ? 'badge-terjual' : 'badge-perawatan' ?>">
                                        <i class="fas fa-<?= $p['jenis_kelamin'] === 'Jantan' ? 'mars' : 'venus' ?>"></i>
                                        <?= $p['jenis_kelamin'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?= $p['tanggal_perolehan'] ? date('d/m/Y', strtotime($p['tanggal_perolehan'])) : '-' ?>
                                </td>
                                <td>
                                    <?= $p['umur_bulan'] ?> bulan
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('peranakan/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('peranakan/delete/' . $p['id']) ?>', '<?= esc($p['kode_ternak']) ?>')"
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
                <div class="empty-icon">🐣</div>
                <h4>Belum Ada Data Peranakan</h4>
                <p>Mulai tambahkan data anakan ternak Anda</p>
                <a href="<?= base_url('peranakan/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Peranakan Pertama
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>