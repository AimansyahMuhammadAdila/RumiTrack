<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-horse text-accent" style="margin-right:8px"></i> Daftar Ternak</h3>
        <a href="<?= base_url('ternak/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Ternak
        </a>
    </div>
    <div class="card-body" style="padding:0;">
        <?php if (!empty($ternak)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Ras</th>
                            <th>Kelamin</th>
                            <th>Berat Awal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ternak as $t): ?>
                            <tr>
                                <td class="fw-semibold text-accent">
                                    <?= esc($t['kode_ternak']) ?>
                                </td>
                                <td class="fw-semibold">
                                    <?= esc($t['nama']) ?>
                                </td>
                                <td>
                                    <?= esc($t['jenis']) ?>
                                </td>
                                <td>
                                    <?= esc($t['ras'] ?? '-') ?>
                                </td>
                                <td>
                                    <?= esc($t['jenis_kelamin']) ?>
                                </td>
                                <td>
                                    <?= number_format($t['berat_awal'], 1) ?> kg
                                </td>
                                <td>
                                    <?php
                                    $bc = 'badge-aktif';
                                    if ($t['status'] === 'Sakit')
                                        $bc = 'badge-sakit';
                                    elseif ($t['status'] === 'Terjual')
                                        $bc = 'badge-terjual';
                                    elseif ($t['status'] === 'Mati')
                                        $bc = 'badge-mati';
                                    ?>
                                    <span class="badge <?= $bc ?>">
                                        <?= esc($t['status']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('ternak/edit/' . $t['id']) ?>" class="btn btn-warning btn-sm"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('ternak/delete/' . $t['id']) ?>', '<?= esc($t['nama']) ?>')"
                                            class="btn btn-danger btn-sm" title="Hapus">
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
                <div class="empty-icon">🐄</div>
                <h4>Belum ada data ternak</h4>
                <p>Mulai tambahkan data ternak Anda</p>
                <a href="<?= base_url('ternak/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Ternak
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>