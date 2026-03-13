<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-warehouse text-accent" style="margin-right:8px"></i>
            <?= isset($kandang) ? 'Edit Kandang' : 'Tambah Kandang Baru' ?>
        </h3>
        <a href="<?= base_url('kandang') ?>" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="<?= isset($kandang) ? base_url('kandang/update/' . $kandang['id']) : base_url('kandang/store') ?>"
            method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="kode_kandang">Kode Kandang</label>
                    <input type="text" name="kode_kandang" id="kode_kandang" class="form-control"
                        value="<?= old('kode_kandang', $kandang['kode_kandang'] ?? '') ?>" placeholder="Contoh: KDG-001"
                        required>
                </div>
                <div class="form-group">
                    <label for="nama_kandang">Nama Kandang</label>
                    <input type="text" name="nama_kandang" id="nama_kandang" class="form-control"
                        value="<?= old('nama_kandang', $kandang['nama_kandang'] ?? '') ?>"
                        placeholder="Contoh: Kandang Utama A" required>
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
                            <option value="<?= $j ?>" <?= old('jenis_ruminan', $kandang['jenis_ruminan'] ?? '') === $j ? 'selected' : '' ?>>
                                <?= $j ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <select name="tujuan" id="tujuan" class="form-control" required>
                        <?php
                        $tujuanOptions = ['Produksi Daging', 'Bibit/Reproduksi', 'Produksi Kulit/Produk Samping', 'Pemanfaatan Kotoran'];
                        foreach ($tujuanOptions as $t):
                            ?>
                            <option value="<?= $t ?>" <?= old('tujuan', $kandang['tujuan'] ?? '') === $t ? 'selected' : '' ?>>
                                <?= $t ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="kapasitas">Kapasitas (ekor)</label>
                    <input type="number" name="kapasitas" id="kapasitas" class="form-control"
                        value="<?= old('kapasitas', $kandang['kapasitas'] ?? 0) ?>" min="0">
                </div>
                <div class="form-group">
                    <label for="tanggal_perolehan">Tanggal Perolehan</label>
                    <input type="date" name="tanggal_perolehan" id="tanggal_perolehan" class="form-control"
                        value="<?= old('tanggal_perolehan', $kandang['tanggal_perolehan'] ?? '') ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control"
                    placeholder="Catatan tambahan (opsional)"><?= old('catatan', $kandang['catatan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;margin-top:24px;">
                <a href="<?= base_url('kandang') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($kandang) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>