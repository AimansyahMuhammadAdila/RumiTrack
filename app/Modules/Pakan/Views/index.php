<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Tabs -->
<div class="kesehatan-tabs" style="margin-bottom:24px;">
    <button class="kesehatan-tab active" onclick="switchTab('stok')">
        <i class="fas fa-boxes"></i> Stok Pakan
    </button>
    <button class="kesehatan-tab" onclick="switchTab('pengeluaran')">
        <i class="fas fa-arrow-circle-down"></i> Pengeluaran Pakan
    </button>
</div>

<!-- Tab: Stok Pakan -->
<div class="tab-content active" id="tab-stok">
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-seedling text-accent" style="margin-right:8px"></i> Stok Pakan</h3>
            <a href="<?= base_url('pakan/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Pakan
            </a>
        </div>
        <div class="card-body" style="padding:0;">
            <?php if (!empty($pakan)): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Pakan</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Protein</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pakan as $p): ?>
                                <tr>
                                    <td class="fw-semibold"><?= esc($p['nama_pakan']) ?></td>
                                    <td><span class="badge badge-aktif"><?= esc($p['jenis']) ?></span></td>
                                    <td class="fw-semibold <?= $p['stok'] <= 5 ? 'text-danger' : 'text-accent' ?>">
                                        <?= number_format($p['stok'], 1) ?>
                                    </td>
                                    <td><?= esc($p['satuan']) ?></td>
                                    <td>Rp <?= number_format($p['harga_per_satuan'], 0, ',', '.') ?></td>
                                    <td><?= $p['protein'] ? number_format($p['protein'], 1) . '%' : '-' ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('pakan/edit/' . $p['id']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="confirmDelete('<?= base_url('pakan/delete/' . $p['id']) ?>', '<?= esc($p['nama_pakan']) ?>')"
                                                class="btn btn-danger btn-sm">
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
                    <div class="empty-icon">🌾</div>
                    <h4>Belum ada data pakan</h4>
                    <p>Mulai tambahkan data pakan ternak Anda</p>
                    <a href="<?= base_url('pakan/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Pakan
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Tab: Pengeluaran Pakan -->
<div class="tab-content" id="tab-pengeluaran">
    <!-- Form Pengeluaran -->
    <div class="card" style="margin-bottom:24px;">
        <div class="card-header">
            <h3><i class="fas fa-plus-circle text-accent" style="margin-right:8px"></i> Catat Pengeluaran Pakan</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pakan/pengeluaran/store') ?>" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="pakan_id">Nama Pakan</label>
                        <select name="pakan_id" id="pakan_id" class="form-control" required>
                            <option value="">-- Pilih Pakan --</option>
                            <?php foreach ($pakanList as $p): ?>
                                <option value="<?= $p['id'] ?>"><?= esc($p['nama_pakan']) ?> (Stok:
                                    <?= number_format($p['stok'], 1) ?>     <?= esc($p['satuan']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Digunakan</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" step="0.1" required
                            placeholder="Contoh: 5.0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" id="satuan" class="form-control">
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="liter">liter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control" rows="2"
                        placeholder="Catatan opsional"></textarea>
                </div>
                <div style="text-align:right;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan
                        Pengeluaran</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Riwayat Pengeluaran -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-history text-accent" style="margin-right:8px"></i> Riwayat Pengeluaran</h3>
        </div>
        <div class="card-body" style="padding:0;">
            <?php if (!empty($pengeluaran)): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Pakan</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengeluaran as $pe): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($pe['tanggal'])) ?></td>
                                    <td class="fw-semibold"><?= esc($pe['nama_pakan']) ?></td>
                                    <td class="fw-semibold text-danger"><?= number_format($pe['jumlah'], 1) ?></td>
                                    <td><?= esc($pe['satuan']) ?></td>
                                    <td><?= esc($pe['catatan'] ?? '-') ?></td>
                                    <td>
                                        <button
                                            onclick="confirmDelete('<?= base_url('pakan/pengeluaran/delete/' . $pe['id']) ?>', 'pengeluaran ini')"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <h4>Belum ada pengeluaran pakan</h4>
                    <p>Catat pengeluaran pakan harian di form di atas</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.kesehatan-tab').forEach(el => el.classList.remove('active'));
        document.getElementById('tab-' + tab).classList.add('active');
        event.target.closest('.kesehatan-tab').classList.add('active');
    }
</script>

<?= $this->endSection() ?>