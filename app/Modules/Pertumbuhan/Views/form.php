<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-chart-line text-accent" style="margin-right:8px"></i>
            <?= esc($title) ?>
        </h3>
        <a href="<?= base_url('pertumbuhan') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form
            action="<?= base_url(isset($pertumbuhan) ? 'pertumbuhan/update/' . $pertumbuhan['id'] : 'pertumbuhan/store') ?>"
            method="post">

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
                    <label for="ternak_id">Ternak *</label>
                    <select id="ternak_id" name="ternak_id" class="form-control" required>
                        <option value="">Pilih Ternak</option>
                        <?php foreach ($ternak as $t): ?>
                            <option value="<?= $t['id'] ?>" <?= old('ternak_id', $pertumbuhan['ternak_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                                <?= esc($t['kode_ternak']) ?> -
                                <?= esc($t['nama']) ?> (
                                <?= esc($t['jenis']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Pengukuran *</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control"
                        value="<?= old('tanggal', $pertumbuhan['tanggal'] ?? date('Y-m-d')) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="berat">Berat (kg) *</label>
                    <input type="number" id="berat" name="berat" class="form-control" step="0.01"
                        value="<?= old('berat', $pertumbuhan['berat'] ?? '') ?>" placeholder="0.00" required>
                </div>
                <div class="form-group">
                    <label for="tinggi">Tinggi (cm)</label>
                    <input type="number" id="tinggi" name="tinggi" class="form-control" step="0.01"
                        value="<?= old('tinggi', $pertumbuhan['tinggi'] ?? '') ?>" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="lingkar_dada">Lingkar Dada (cm)</label>
                    <input type="number" id="lingkar_dada" name="lingkar_dada" class="form-control" step="0.01"
                        value="<?= old('lingkar_dada', $pertumbuhan['lingkar_dada'] ?? '') ?>" placeholder="0.00">
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea id="catatan" name="catatan" class="form-control"
                    placeholder="Catatan perkembangan..."><?= old('catatan', $pertumbuhan['catatan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="<?= base_url('pertumbuhan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($pertumbuhan) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>