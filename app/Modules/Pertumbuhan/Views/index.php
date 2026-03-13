<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-chart-line text-accent" style="margin-right:8px"></i> Data Pertumbuhan</h3>
        <a href="<?= base_url('pertumbuhan/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body" style="padding:0;">
        <?php if (!empty($pertumbuhan)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Ternak</th>
                            <th>Berat (kg)</th>
                            <th>Tinggi (cm)</th>
                            <th>Lingkar Dada (cm)</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pertumbuhan as $p): ?>
                            <tr>
                                <td>
                                    <?= date('d/m/Y', strtotime($p['tanggal'])) ?>
                                </td>
                                <td>
                                    <span class="fw-semibold">
                                        <?= esc($p['nama_ternak']) ?>
                                    </span>
                                    <br><span class="text-muted" style="font-size:11px;">
                                        <?= esc($p['kode_ternak']) ?> -
                                        <?= esc($p['jenis_ternak']) ?>
                                    </span>
                                </td>
                                <td class="fw-bold text-accent">
                                    <?= number_format($p['berat'], 1) ?>
                                </td>
                                <td>
                                    <?= $p['tinggi'] ? number_format($p['tinggi'], 1) : '-' ?>
                                </td>
                                <td>
                                    <?= $p['lingkar_dada'] ? number_format($p['lingkar_dada'], 1) : '-' ?>
                                </td>
                                <td>
                                    <?= esc($p['catatan'] ?? '-') ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('pertumbuhan/edit/' . $p['id']) ?>" class="btn btn-warning btn-sm"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('pertumbuhan/delete/' . $p['id']) ?>', 'data pertumbuhan')"
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
                <div class="empty-icon">📈</div>
                <h4>Belum ada data pertumbuhan</h4>
                <p>Catat perkembangan berat dan tinggi ternak Anda</p>
                <a href="<?= base_url('pertumbuhan/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>