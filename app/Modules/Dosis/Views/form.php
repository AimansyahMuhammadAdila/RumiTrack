<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-prescription-bottle text-accent" style="margin-right:8px"></i>
            <?= esc($title) ?>
        </h3>
        <a href="<?= base_url('dosis') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url(isset($dosis) ? 'dosis/update/' . $dosis['id'] : 'dosis/store') ?>" method="post">

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
                            <option value="<?= $t['id'] ?>" <?= old('ternak_id', $dosis['ternak_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                                <?= esc($t['kode_ternak']) ?> -
                                <?= esc($t['nama']) ?> (
                                <?= esc($t['jenis']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pakan_id">Pakan *</label>
                    <select id="pakan_id" name="pakan_id" class="form-control" required>
                        <option value="">Pilih Pakan</option>
                        <?php foreach ($pakan as $p): ?>
                            <option value="<?= $p['id'] ?>" <?= old('pakan_id', $dosis['pakan_id'] ?? '') == $p['id'] ? 'selected' : '' ?>>
                                <?= esc($p['nama_pakan']) ?> (
                                <?= esc($p['satuan']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jumlah">Jumlah per Pemberian *</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" step="0.01"
                        value="<?= old('jumlah', $dosis['jumlah'] ?? '') ?>" placeholder="0.00" required>
                </div>
                <div class="form-group">
                    <label for="frekuensi">Frekuensi (per hari) *</label>
                    <input type="number" id="frekuensi" name="frekuensi" class="form-control" min="1" max="10"
                        value="<?= old('frekuensi', $dosis['frekuensi'] ?? 2) ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="waktu_pemberian">Waktu Pemberian</label>
                <input type="text" id="waktu_pemberian" name="waktu_pemberian" class="form-control"
                    value="<?= old('waktu_pemberian', $dosis['waktu_pemberian'] ?? '') ?>"
                    placeholder="Contoh: Pagi, Siang, Sore">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai *</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control"
                        value="<?= old('tanggal_mulai', $dosis['tanggal_mulai'] ?? date('Y-m-d')) ?>" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control"
                        value="<?= old('tanggal_selesai', $dosis['tanggal_selesai'] ?? '') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea id="catatan" name="catatan" class="form-control"
                    placeholder="Catatan..."><?= old('catatan', $dosis['catatan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="<?= base_url('dosis') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($dosis) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>