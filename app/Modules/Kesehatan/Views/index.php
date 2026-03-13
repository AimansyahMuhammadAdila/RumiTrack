<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Rutinan/Harian Stats -->
<div class="section-header">
    <h2><i class="fas fa-heartbeat"></i> Monitoring Kesehatan Harian</h2>
</div>
<div class="dash-stats-grid" style="margin-bottom:24px;">
    <div class="dash-stat-card gradient-green">
        <div class="stat-icon-lg"><i class="fas fa-horse"></i></div>
        <div class="stat-number"><?= $totalTernak ?></div>
        <div class="stat-title">Total Ternak</div>
    </div>
    <div class="dash-stat-card gradient-blue">
        <div class="stat-icon-lg"><i class="fas fa-heart"></i></div>
        <div class="stat-number"><?= $totalSehat ?></div>
        <div class="stat-title">Ternak Sehat</div>
    </div>
    <div class="dash-stat-card gradient-orange">
        <div class="stat-icon-lg"><i class="fas fa-procedures"></i></div>
        <div class="stat-number"><?= $totalPemulihan ?></div>
        <div class="stat-title">Tahap Pemulihan</div>
    </div>
    <div class="dash-stat-card gradient-red">
        <div class="stat-icon-lg"><i class="fas fa-virus"></i></div>
        <div class="stat-number"><?= $totalSakit ?></div>
        <div class="stat-title">Ternak Sakit</div>
    </div>
</div>

<!-- Tabs -->
<div class="kesehatan-tabs">
    <button class="kesehatan-tab active" onclick="switchTab('vaksin')">
        <i class="fas fa-syringe"></i> Vaksin
    </button>
    <button class="kesehatan-tab" onclick="switchTab('pengobatan')">
        <i class="fas fa-pills"></i> Pengobatan
    </button>
    <button class="kesehatan-tab" onclick="switchTab('riwayat')">
        <i class="fas fa-file-medical"></i> Riwayat Kesehatan
    </button>
</div>

<!-- Tab: Vaksin -->
<div class="tab-content active" id="tab-vaksin">
    <div class="card" style="margin-bottom:24px;">
        <div class="card-header">
            <h3><i class="fas fa-syringe text-accent" style="margin-right:8px"></i> Catat Vaksin</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('kesehatan/vaksin/store') ?>" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="v_ternak_id">Ternak</label>
                        <select name="ternak_id" id="v_ternak_id" class="form-control" required>
                            <option value="">-- Pilih Ternak --</option>
                            <?php foreach ($ternakList as $t): ?>
                                <option value="<?= $t['id'] ?>"><?= esc($t['nama']) ?> (<?= esc($t['kode_ternak']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_vaksin">Jenis Vaksin</label>
                        <input type="text" name="jenis_vaksin" id="jenis_vaksin" class="form-control"
                            placeholder="Contoh: Vaksin SE" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="v_dosis">Dosis</label>
                        <input type="text" name="dosis" id="v_dosis" class="form-control" placeholder="Contoh: 2ml"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="v_tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="v_tanggal" class="form-control"
                            value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>
                <div style="text-align:right;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Vaksin</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-history text-accent" style="margin-right:8px"></i> Riwayat Vaksin</h3>
        </div>
        <div class="card-body" style="padding:0;">
            <?php if (!empty($vaksin)): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Ternak</th>
                                <th>Jenis Vaksin</th>
                                <th>Dosis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vaksin as $v): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($v['tanggal'])) ?></td>
                                    <td class="fw-semibold"><?= esc($v['nama_ternak']) ?> <span
                                            class="text-muted">(<?= esc($v['kode_ternak']) ?>)</span></td>
                                    <td><span class="badge badge-aktif"><?= esc($v['jenis_vaksin']) ?></span></td>
                                    <td><?= esc($v['dosis']) ?></td>
                                    <td>
                                        <button
                                            onclick="confirmDelete('<?= base_url('kesehatan/vaksin/delete/' . $v['id']) ?>', 'vaksin ini')"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">💉</div>
                    <h4>Belum ada data vaksin</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Tab: Pengobatan -->
<div class="tab-content" id="tab-pengobatan">
    <div class="card" style="margin-bottom:24px;">
        <div class="card-header">
            <h3><i class="fas fa-pills text-accent" style="margin-right:8px"></i> Catat Pengobatan</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('kesehatan/pengobatan/store') ?>" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="p_ternak_id">Ternak</label>
                        <select name="ternak_id" id="p_ternak_id" class="form-control" required>
                            <option value="">-- Pilih Ternak --</option>
                            <?php foreach ($ternakList as $t): ?>
                                <option value="<?= $t['id'] ?>"><?= esc($t['nama']) ?> (<?= esc($t['kode_ternak']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pengobatan">Jenis Pengobatan</label>
                        <input type="text" name="jenis_pengobatan" id="jenis_pengobatan" class="form-control"
                            placeholder="Contoh: Antibiotik" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="p_dosis">Dosis</label>
                        <input type="text" name="dosis" id="p_dosis" class="form-control" placeholder="Contoh: 5ml/hari"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="p_tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="p_tanggal" class="form-control"
                            value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>
                <div style="text-align:right;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Pengobatan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-history text-accent" style="margin-right:8px"></i> Riwayat Pengobatan</h3>
        </div>
        <div class="card-body" style="padding:0;">
            <?php if (!empty($pengobatan)): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Ternak</th>
                                <th>Jenis Pengobatan</th>
                                <th>Dosis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengobatan as $po): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($po['tanggal'])) ?></td>
                                    <td class="fw-semibold"><?= esc($po['nama_ternak']) ?> <span
                                            class="text-muted">(<?= esc($po['kode_ternak']) ?>)</span></td>
                                    <td><span class="badge badge-perawatan"><?= esc($po['jenis_pengobatan']) ?></span></td>
                                    <td><?= esc($po['dosis']) ?></td>
                                    <td>
                                        <button
                                            onclick="confirmDelete('<?= base_url('kesehatan/pengobatan/delete/' . $po['id']) ?>', 'pengobatan ini')"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">💊</div>
                    <h4>Belum ada data pengobatan</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Tab: Riwayat Kesehatan -->
<div class="tab-content" id="tab-riwayat">
    <div class="card">
        <div class="card-header">
            <h3><i class="fas fa-file-medical text-accent" style="margin-right:8px"></i> Riwayat Catatan Kesehatan</h3>
            <a href="<?= base_url('kesehatan/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Catatan
            </a>
        </div>
        <div class="card-body" style="padding:0;">
            <?php if (!empty($kesehatan)): ?>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Ternak</th>
                                <th>Kondisi</th>
                                <th>Diagnosa</th>
                                <th>Penanganan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_slice($kesehatan, 0, 20) as $k): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($k['tanggal'])) ?></td>
                                    <td>
                                        <span class="fw-semibold"><?= esc($k['nama_ternak']) ?></span>
                                        <span class="text-muted"
                                            style="font-size:11px;margin-left:4px;"><?= esc($k['kode_ternak']) ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        $bc = 'badge-sehat';
                                        if ($k['kondisi'] === 'Sakit')
                                            $bc = 'badge-sakit';
                                        elseif ($k['kondisi'] === 'Dalam Perawatan')
                                            $bc = 'badge-perawatan';
                                        elseif ($k['kondisi'] === 'Sembuh')
                                            $bc = 'badge-sembuh';
                                        ?>
                                        <span class="badge <?= $bc ?>"><?= esc($k['kondisi']) ?></span>
                                    </td>
                                    <td><?= esc($k['diagnosa'] ?? '-') ?></td>
                                    <td><?= esc($k['penanganan'] ?? '-') ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('kesehatan/edit/' . $k['id']) ?>"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <button
                                                onclick="confirmDelete('<?= base_url('kesehatan/delete/' . $k['id']) ?>', 'catatan ini')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">🏥</div>
                    <h4>Belum ada catatan kesehatan</h4>
                    <p>Tambahkan catatan kesehatan ternak Anda</p>
                    <a href="<?= base_url('kesehatan/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Catatan
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.kesehatan-tab').forEach(el => el.classList.remove('active'));
        document.getElementById('tab-' + tab).classList.add('active');
        event.target.closest('.kesehatan-tab').classList.add('active');
    }
</script>

<?= $this->endSection() ?>