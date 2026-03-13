<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-seedling text-accent" style="margin-right:8px"></i>
            <?= esc($title) ?>
        </h3>
        <a href="<?= base_url('pakan') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url(isset($pakan) ? 'pakan/update/' . $pakan['id'] : 'pakan/store') ?>" method="post">

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <?php foreach (session()->getFlashdata('errors') as $err): ?>
                            <div>
                                <?= esc($err) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-row">
                <div class="form-group">
                    <label for="nama_pakan">Nama Pakan *</label>
                    <input type="text" id="nama_pakan" name="nama_pakan" class="form-control"
                        value="<?= old('nama_pakan', $pakan['nama_pakan'] ?? '') ?>" placeholder="Nama pakan" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Pakan *</label>
                    <select id="jenis" name="jenis" class="form-control" required>
                        <option value="">Pilih Jenis</option>
                        <?php foreach (['Hijauan', 'Konsentrat', 'Pabrikan', 'Suplemen', 'Fermentasi', 'Lainnya'] as $j): ?>
                            <option value="<?= $j ?>" <?= old('jenis', $pakan['jenis'] ?? '') === $j ? 'selected' : '' ?>>
                                <?= $j ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="satuan">Satuan *</label>
                    <select id="satuan" name="satuan" class="form-control" required>
                        <?php foreach (['kg', 'gram', 'liter', 'sak', 'karung'] as $s): ?>
                            <option value="<?= $s ?>" <?= old('satuan', $pakan['satuan'] ?? 'kg') === $s ? 'selected' : '' ?>>
                                <?= $s ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga_per_satuan">Harga per Satuan (Rp)</label>
                    <input type="number" id="harga_per_satuan" name="harga_per_satuan" class="form-control" step="100"
                        value="<?= old('harga_per_satuan', $pakan['harga_per_satuan'] ?? '') ?>" placeholder="0">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" class="form-control" step="0.01"
                        value="<?= old('stok', $pakan['stok'] ?? '') ?>" placeholder="0">
                </div>
                <div class="form-group">
                    <label for="protein">Protein (%)</label>
                    <input type="number" id="protein" name="protein" class="form-control" step="0.01"
                        value="<?= old('protein', $pakan['protein'] ?? '') ?>" placeholder="0.00">
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control"
                    placeholder="Keterangan tambahan..."><?= old('keterangan', $pakan['keterangan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="<?= base_url('pakan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($pakan) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>