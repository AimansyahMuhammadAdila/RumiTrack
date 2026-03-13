<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-heartbeat text-accent" style="margin-right:8px"></i>
            <?= esc($title) ?>
        </h3>
        <a href="<?= base_url('kesehatan') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url(isset($kesehatan) ? 'kesehatan/update/' . $kesehatan['id'] : 'kesehatan/store') ?>"
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
                            <option value="<?= $t['id'] ?>" <?= old('ternak_id', $kesehatan['ternak_id'] ?? '') == $t['id'] ? 'selected' : '' ?>>
                                <?= esc($t['kode_ternak']) ?> -
                                <?= esc($t['nama']) ?> (
                                <?= esc($t['jenis']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Pemeriksaan *</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control"
                        value="<?= old('tanggal', $kesehatan['tanggal'] ?? date('Y-m-d')) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="kondisi">Kondisi *</label>
                    <select id="kondisi" name="kondisi" class="form-control" required>
                        <?php foreach (['Sehat', 'Sakit', 'Dalam Perawatan', 'Sembuh'] as $k): ?>
                            <option value="<?= $k ?>" <?= old('kondisi', $kesehatan['kondisi'] ?? '') === $k ? 'selected' : '' ?>>
                                <?= $k ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <input type="text" id="diagnosa" name="diagnosa" class="form-control"
                        value="<?= old('diagnosa', $kesehatan['diagnosa'] ?? '') ?>"
                        placeholder="Contoh: Cacingan, Demam">
                </div>
            </div>

            <div class="form-group">
                <label for="gejala">Gejala</label>
                <textarea id="gejala" name="gejala" class="form-control"
                    placeholder="Deskripsikan gejala yang terlihat..."><?= old('gejala', $kesehatan['gejala'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="penanganan">Penanganan</label>
                <textarea id="penanganan" name="penanganan" class="form-control"
                    placeholder="Tindakan yang dilakukan..."><?= old('penanganan', $kesehatan['penanganan'] ?? '') ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="obat">Obat</label>
                    <input type="text" id="obat" name="obat" class="form-control"
                        value="<?= old('obat', $kesehatan['obat'] ?? '') ?>" placeholder="Nama obat yang diberikan">
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya (Rp)</label>
                    <input type="number" id="biaya" name="biaya" class="form-control" step="1000"
                        value="<?= old('biaya', $kesehatan['biaya'] ?? 0) ?>" placeholder="0">
                </div>
            </div>

            <div class="form-group">
                <label for="dokter">Dokter / Petugas</label>
                <input type="text" id="dokter" name="dokter" class="form-control"
                    value="<?= old('dokter', $kesehatan['dokter'] ?? '') ?>" placeholder="Nama dokter hewan / petugas">
            </div>

            <div class="form-group">
                <label for="catatan">Catatan Tambahan</label>
                <textarea id="catatan" name="catatan" class="form-control"
                    placeholder="Catatan lainnya..."><?= old('catatan', $kesehatan['catatan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="<?= base_url('kesehatan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($kesehatan) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>