<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-baby text-accent" style="margin-right:8px"></i>
            <?= isset($peranakan) ? 'Edit Peranakan' : 'Tambah Peranakan Baru' ?>
        </h3>
        <a href="<?= base_url('peranakan') ?>" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form
            action="<?= isset($peranakan) ? base_url('peranakan/update/' . $peranakan['id']) : base_url('peranakan/store') ?>"
            method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="kandang_id">Nama Kandang</label>
                    <select name="kandang_id" id="kandang_id" class="form-control" required>
                        <option value="">-- Pilih Kandang --</option>
                        <?php foreach ($kandangList as $k): ?>
                            <option value="<?= $k['id'] ?>" <?= old('kandang_id', $peranakan['kandang_id'] ?? '') == $k['id'] ? 'selected' : '' ?>>
                                <?= esc($k['nama_kandang']) ?> (
                                <?= esc($k['kode_kandang']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_ternak">ID / Kode Ternak</label>
                    <input type="text" name="kode_ternak" id="kode_ternak" class="form-control"
                        value="<?= old('kode_ternak', $peranakan['kode_ternak'] ?? '') ?>" placeholder="Contoh: ANK-001"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_ruminan">Jenis Ruminan</label>
                    <select name="jenis_ruminan" id="jenis_ruminan" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <?php
                        $jenisOptions = ['Sapi', 'Kambing', 'Domba', 'Kerbau'];
                        foreach ($jenisOptions as $j):
                            ?>
                            <option value="<?= $j ?>" <?= old('jenis_ruminan', $peranakan['jenis_ruminan'] ?? '') === $j ? 'selected' : '' ?>>
                                <?= $j ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="Jantan" <?= old('jenis_kelamin', $peranakan['jenis_kelamin'] ?? '') === 'Jantan' ? 'selected' : '' ?>>Jantan</option>
                        <option value="Betina" <?= old('jenis_kelamin', $peranakan['jenis_kelamin'] ?? '') === 'Betina' ? 'selected' : '' ?>>Betina</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_perolehan">Awal Perolehan</label>
                    <input type="date" name="tanggal_perolehan" id="tanggal_perolehan" class="form-control"
                        value="<?= old('tanggal_perolehan', $peranakan['tanggal_perolehan'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="umur_bulan">Umur (Bulan)</label>
                    <input type="number" name="umur_bulan" id="umur_bulan" class="form-control"
                        value="<?= old('umur_bulan', $peranakan['umur_bulan'] ?? 0) ?>" min="0">
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control"
                    placeholder="Catatan tambahan (opsional)"><?= old('catatan', $peranakan['catatan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;margin-top:24px;">
                <a href="<?= base_url('peranakan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($peranakan) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>