<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-money-bill-wave text-accent" style="margin-right:8px"></i>
            <?= isset($keuangan) ? 'Edit Transaksi' : 'Tambah Transaksi Baru' ?>
        </h3>
        <a href="<?= base_url('keuangan') ?>" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form
            action="<?= isset($keuangan) ? base_url('keuangan/update/' . $keuangan['id']) : base_url('keuangan/store') ?>"
            method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                        value="<?= old('tanggal', $keuangan['tanggal'] ?? date('Y-m-d')) ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Transaksi</label>
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="Pemasukan" <?= old('jenis', $keuangan['jenis'] ?? '') === 'Pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                        <option value="Pengeluaran" <?= old('jenis', $keuangan['jenis'] ?? '') === 'Pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control"
                        value="<?= old('kategori', $keuangan['kategori'] ?? '') ?>"
                        placeholder="Contoh: Penjualan Ternak, Pembelian Pakan, dll">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control"
                        value="<?= old('jumlah', $keuangan['jumlah'] ?? '') ?>" placeholder="Contoh: 500000" step="0.01"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"
                    placeholder="Detail transaksi (opsional)"><?= old('keterangan', $keuangan['keterangan'] ?? '') ?></textarea>
            </div>

            <div style="display:flex;gap:12px;justify-content:flex-end;margin-top:24px;">
                <a href="<?= base_url('keuangan') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    <?= isset($keuangan) ? 'Perbarui' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>