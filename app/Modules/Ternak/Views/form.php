<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-horse text-accent" style="margin-right:8px"></i>
            <?= esc($title) ?>
        </h3>
        <a href="<?= base_url('ternak') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="<?= base_url(isset($ternak) ? 'ternak/update/' . $ternak['id'] : 'ternak/store') ?>"
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
                    <label for="kode_ternak">Kode Ternak *</label>
                    <input type="text" id="kode_ternak" name="kode_ternak" class="form-control"
                        value="<?= old('kode_ternak', $ternak['kode_ternak'] ?? '') ?>" placeholder="Contoh: SPi-001"
                        required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Ternak *</label>
                    <input type="text" id="nama" name="nama" class="form-control"
                        value="<?= old('nama', $ternak['nama'] ?? '') ?>" placeholder="Nama ternak" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis">Jenis *</label>
                    <select id="jenis" name="jenis" class="form-control" required>
                        <option value="">Pilih Jenis</option>
                        <?php foreach (['Sapi', 'Kambing', 'Ayam', 'Domba', 'Bebek', 'Kerbau', 'Kelinci', 'Lainnya'] as $j): ?>
                            <option value="<?= $j ?>" <?= old('jenis', $ternak['jenis'] ?? '') === $j ? 'selected' : '' ?>>
                                <?= $j ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ras">Ras / Bangsa</label>
                    <input type="text" id="ras" name="ras" class="form-control"
                        value="<?= old('ras', $ternak['ras'] ?? '') ?>" placeholder="Contoh: Limousin, Etawa">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                        <option value="Jantan" <?= old('jenis_kelamin', $ternak['jenis_kelamin'] ?? '') === 'Jantan' ? 'selected' : '' ?>>Jantan</option>
                        <option value="Betina" <?= old('jenis_kelamin', $ternak['jenis_kelamin'] ?? '') === 'Betina' ? 'selected' : '' ?>>Betina</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                        value="<?= old('tanggal_lahir', $ternak['tanggal_lahir'] ?? '') ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="berat_awal">Berat Awal (kg)</label>
                    <input type="number" id="berat_awal" name="berat_awal" class="form-control" step="0.01"
                        value="<?= old('berat_awal', $ternak['berat_awal'] ?? '') ?>" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <?php foreach (['Aktif', 'Sakit', 'Terjual', 'Mati'] as $s): ?>
                            <option value="<?= $s ?>" <?= old('status', $ternak['status'] ?? 'Aktif') === $s ? 'selected' : '' ?>>
                                <?= $s ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea id="catatan" name="catatan" class="form-control"
                    placeholder="Catatan tambahan..."><?= old('catatan', $ternak['catatan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;">
                <a href="<?= base_url('ternak') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($ternak) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>