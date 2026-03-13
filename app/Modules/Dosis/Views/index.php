<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-prescription-bottle text-accent" style="margin-right:8px"></i> Daftar Dosis Pakan</h3>
        <a href="<?= base_url('dosis/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Dosis
        </a>
    </div>
    <div class="card-body" style="padding:0;">
        <?php if (!empty($dosis)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Ternak</th>
                            <th>Pakan</th>
                            <th>Jumlah</th>
                            <th>Frekuensi</th>
                            <th>Waktu</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dosis as $d): ?>
                            <tr>
                                <td>
                                    <span class="fw-semibold">
                                        <?= esc($d['nama_ternak']) ?>
                                    </span>
                                    <br><span class="text-muted" style="font-size:11px;">
                                        <?= esc($d['kode_ternak']) ?> -
                                        <?= esc($d['jenis_ternak']) ?>
                                    </span>
                                </td>
                                <td class="fw-semibold">
                                    <?= esc($d['nama_pakan']) ?>
                                </td>
                                <td>
                                    <?= number_format($d['jumlah'], 2) ?>
                                    <?= esc($d['satuan']) ?>
                                </td>
                                <td><span class="badge badge-aktif">
                                        <?= $d['frekuensi'] ?>x/hari
                                    </span></td>
                                <td>
                                    <?= esc($d['waktu_pemberian'] ?? '-') ?>
                                </td>
                                <td>
                                    <?= date('d/m/Y', strtotime($d['tanggal_mulai'])) ?>
                                    <?= $d['tanggal_selesai'] ? ' - ' . date('d/m/Y', strtotime($d['tanggal_selesai'])) : ' - sekarang' ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('dosis/edit/' . $d['id']) ?>" class="btn btn-warning btn-sm"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('dosis/delete/' . $d['id']) ?>', 'dosis <?= esc($d['nama_ternak']) ?>')"
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
                <div class="empty-icon">💊</div>
                <h4>Belum ada pengaturan dosis pakan</h4>
                <p>Atur dosis pakan untuk ternak Anda</p>
                <a href="<?= base_url('dosis/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Dosis
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>