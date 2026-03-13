<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-clipboard-check text-accent" style="margin-right:8px"></i>
            <?= isset($catatan) ? 'Edit Catatan Rekomendasi' : 'Tambah Catatan Rekomendasi' ?>
        </h3>
        <a href="<?= base_url('catatan-rekomendasi') ?>" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form
            action="<?= isset($catatan) ? base_url('catatan-rekomendasi/update/' . $catatan['id']) : base_url('catatan-rekomendasi/store') ?>"
            method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control" required>
                        <?php
                        $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        for ($m = 1; $m <= 12; $m++):
                            ?>
                            <option value="<?= $m ?>" <?= old('bulan', $catatan['bulan'] ?? date('n')) == $m ? 'selected' : '' ?>>
                                <?= $namaBulan[$m] ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" id="tahun" class="form-control"
                        value="<?= old('tahun', $catatan['tahun'] ?? date('Y')) ?>" min="2021" max="2030" required>
                </div>
            </div>

            <div class="form-group">
                <label for="kesimpulan">Kesimpulan</label>
                <select name="kesimpulan" id="kesimpulan" class="form-control" required>
                    <?php
                    $kesimpulanOptions = ['Baik', 'Cukup Baik', 'Obesitas', 'Kekurangan Nutrisi', 'Inbreeding', 'Lainnya'];
                    foreach ($kesimpulanOptions as $opt):
                        ?>
                        <option value="<?= $opt ?>" <?= old('kesimpulan', $catatan['kesimpulan'] ?? '') === $opt ? 'selected' : '' ?>>
                            <?= $opt ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="analisis">Analisis</label>
                <textarea name="analisis" id="analisis" class="form-control" rows="4"
                    placeholder="Tuliskan analisis kesimpulan data keseluruhan..."><?= old('analisis', $catatan['analisis'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="rekomendasi">Rekomendasi</label>
                <textarea name="rekomendasi" id="rekomendasi" class="form-control" rows="4"
                    placeholder="Tuliskan rekomendasi tindakan..."><?= old('rekomendasi', $catatan['rekomendasi'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;margin-top:24px;">
                <a href="<?= base_url('catatan-rekomendasi') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($catatan) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>