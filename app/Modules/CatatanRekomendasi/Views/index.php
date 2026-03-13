<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card-header" style="background:none;border:none;padding:0 0 20px 0;">
    <h3><i class="fas fa-clipboard-check text-accent" style="margin-right:8px"></i> Catatan Rekomendasi</h3>
    <a href="<?= base_url('catatan-rekomendasi/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Catatan
    </a>
</div>

<p class="text-muted" style="margin-bottom:24px;">Analisis kesimpulan data keseluruhan dilakukan per bulan.</p>

<div class="card">
    <div class="card-body" style="padding:0;">
        <?php if (!empty($catatan)): ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Periode</th>
                            <th>Kesimpulan</th>
                            <th>Analisis</th>
                            <th>Rekomendasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        foreach ($catatan as $i => $c):
                            $badgeClass = 'badge-aktif';
                            if ($c['kesimpulan'] === 'Cukup Baik')
                                $badgeClass = 'badge-perawatan';
                            elseif ($c['kesimpulan'] === 'Obesitas')
                                $badgeClass = 'badge-sakit';
                            elseif ($c['kesimpulan'] === 'Kekurangan Nutrisi')
                                $badgeClass = 'badge-sakit';
                            elseif ($c['kesimpulan'] === 'Inbreeding')
                                $badgeClass = 'badge-mati';
                            elseif ($c['kesimpulan'] === 'Lainnya')
                                $badgeClass = 'badge-terjual';
                            ?>
                            <tr>
                                <td>
                                    <?= $i + 1 ?>
                                </td>
                                <td class="fw-semibold">
                                    <?= $namaBulan[$c['bulan']] ?>
                                    <?= $c['tahun'] ?>
                                </td>
                                <td>
                                    <span class="badge <?= $badgeClass ?>">
                                        <?= esc($c['kesimpulan']) ?>
                                    </span>
                                </td>
                                <td>
                                    <?= esc(mb_strimwidth($c['analisis'] ?? '-', 0, 80, '...')) ?>
                                </td>
                                <td>
                                    <?= esc(mb_strimwidth($c['rekomendasi'] ?? '-', 0, 80, '...')) ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('catatan-rekomendasi/edit/' . $c['id']) ?>"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirmDelete('<?= base_url('catatan-rekomendasi/delete/' . $c['id']) ?>', 'catatan <?= $namaBulan[$c['bulan']] ?> <?= $c['tahun'] ?>')"
                                            class="btn btn-sm btn-danger">
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
                <div class="empty-icon">📋</div>
                <h4>Belum Ada Catatan Rekomendasi</h4>
                <p>Mulai buat analisis bulanan untuk evaluasi peternakan</p>
                <a href="<?= base_url('catatan-rekomendasi/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Buat Catatan Pertama
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>