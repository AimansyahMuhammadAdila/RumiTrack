<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // Clear existing data (order matters due to foreign keys)
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $tables = ['catatan_rekomendasi', 'pengobatan', 'vaksin', 'pengeluaran_pakan', 'keuangan', 'peranakan', 'kesehatan', 'pertumbuhan', 'dosis_pakan', 'pakan', 'ternak', 'kandang'];
        foreach ($tables as $t) {
            $this->db->table($t)->truncate();
        }
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        $uid = 1; // Admin user

        // ============ KANDANG ============
        $kandang = [
            ['nama_kandang' => 'Kandang Sapi A', 'jenis_ruminan' => 'Sapi', 'kode_kandang' => 'KD-001', 'tanggal_perolehan' => '2025-01-15', 'tujuan' => 'Produksi Daging', 'kapasitas' => 20, 'catatan' => 'Kandang utama sapi potong', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_kandang' => 'Kandang Sapi B', 'jenis_ruminan' => 'Sapi', 'kode_kandang' => 'KD-002', 'tanggal_perolehan' => '2025-03-10', 'tujuan' => 'Bibit/Reproduksi', 'kapasitas' => 15, 'catatan' => 'Kandang sapi indukan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_kandang' => 'Kandang Kambing', 'jenis_ruminan' => 'Kambing', 'kode_kandang' => 'KD-003', 'tanggal_perolehan' => '2025-06-01', 'tujuan' => 'Produksi Daging', 'kapasitas' => 30, 'catatan' => 'Kandang kambing etawa', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_kandang' => 'Kandang Domba', 'jenis_ruminan' => 'Domba', 'kode_kandang' => 'KD-004', 'tanggal_perolehan' => '2025-08-20', 'tujuan' => 'Produksi Daging', 'kapasitas' => 25, 'catatan' => 'Kandang domba garut', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('kandang')->insertBatch($kandang);

        // ============ TERNAK ============
        $ternak = [
            ['kode_ternak' => 'SPJ-001', 'nama' => 'Banteng', 'jenis' => 'Sapi', 'ras' => 'Limousin', 'jenis_kelamin' => 'Jantan', 'tanggal_lahir' => '2024-02-10', 'berat_awal' => 350.00, 'status' => 'Aktif', 'catatan' => 'Sapi jantan unggulan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'SPB-002', 'nama' => 'Mawar', 'jenis' => 'Sapi', 'ras' => 'Simmental', 'jenis_kelamin' => 'Betina', 'tanggal_lahir' => '2023-08-15', 'berat_awal' => 280.00, 'status' => 'Aktif', 'catatan' => 'Indukan produktif', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'SPJ-003', 'nama' => 'Kebo', 'jenis' => 'Sapi', 'ras' => 'Brahman Cross', 'jenis_kelamin' => 'Jantan', 'tanggal_lahir' => '2024-05-20', 'berat_awal' => 320.00, 'status' => 'Aktif', 'catatan' => 'Sapi potong', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'KMB-001', 'nama' => 'Putih', 'jenis' => 'Kambing', 'ras' => 'Etawa', 'jenis_kelamin' => 'Betina', 'tanggal_lahir' => '2024-01-05', 'berat_awal' => 45.00, 'status' => 'Aktif', 'catatan' => 'Kambing etawa betina', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'KMJ-002', 'nama' => 'Hitam', 'jenis' => 'Kambing', 'ras' => 'Etawa', 'jenis_kelamin' => 'Jantan', 'tanggal_lahir' => '2023-11-12', 'berat_awal' => 55.00, 'status' => 'Aktif', 'catatan' => 'Pejantan kambing etawa', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'DMB-001', 'nama' => 'Si Garut', 'jenis' => 'Domba', 'ras' => 'Garut', 'jenis_kelamin' => 'Jantan', 'tanggal_lahir' => '2024-03-18', 'berat_awal' => 40.00, 'status' => 'Aktif', 'catatan' => 'Domba garut jantan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'SPB-004', 'nama' => 'Melati', 'jenis' => 'Sapi', 'ras' => 'Limousin', 'jenis_kelamin' => 'Betina', 'tanggal_lahir' => '2024-07-01', 'berat_awal' => 260.00, 'status' => 'Sakit', 'catatan' => 'Sedang dalam perawatan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kode_ternak' => 'SPJ-005', 'nama' => 'Gagah', 'jenis' => 'Sapi', 'ras' => 'Simmental', 'jenis_kelamin' => 'Jantan', 'tanggal_lahir' => '2025-01-10', 'berat_awal' => 150.00, 'status' => 'Aktif', 'catatan' => 'Pedet baru', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('ternak')->insertBatch($ternak);

        // ============ PAKAN ============
        $pakan = [
            ['nama_pakan' => 'Rumput Gajah', 'jenis' => 'Hijauan', 'satuan' => 'kg', 'harga_per_satuan' => 1500.00, 'stok' => 500.00, 'protein' => 8.50, 'keterangan' => 'Hijauan utama untuk ruminansia', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_pakan' => 'Jerami Padi', 'jenis' => 'Hijauan', 'satuan' => 'kg', 'harga_per_satuan' => 800.00, 'stok' => 300.00, 'protein' => 4.50, 'keterangan' => 'Pakan serat tinggi', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_pakan' => 'Konsentrat Sapi', 'jenis' => 'Konsentrat', 'satuan' => 'kg', 'harga_per_satuan' => 5000.00, 'stok' => 200.00, 'protein' => 18.00, 'keterangan' => 'Konsentrat protein tinggi untuk sapi', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_pakan' => 'Dedak Padi', 'jenis' => 'Konsentrat', 'satuan' => 'kg', 'harga_per_satuan' => 3000.00, 'stok' => 150.00, 'protein' => 12.00, 'keterangan' => 'Bahan campuran konsentrat', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_pakan' => 'Mineral Block', 'jenis' => 'Vitamin', 'satuan' => 'pcs', 'harga_per_satuan' => 25000.00, 'stok' => 20.00, 'protein' => null, 'keterangan' => 'Suplemen mineral jilat', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['nama_pakan' => 'Ampas Tahu', 'jenis' => 'Konsentrat', 'satuan' => 'kg', 'harga_per_satuan' => 2000.00, 'stok' => 100.00, 'protein' => 23.00, 'keterangan' => 'Sumber protein nabati murah', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('pakan')->insertBatch($pakan);

        // ============ DOSIS PAKAN ============
        $dosis = [
            ['ternak_id' => 1, 'pakan_id' => 1, 'jumlah' => 15.00, 'frekuensi' => 2, 'waktu_pemberian' => 'Pagi, Sore', 'tanggal_mulai' => '2026-01-01', 'tanggal_selesai' => null, 'catatan' => 'Rumput gajah segar', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 1, 'pakan_id' => 3, 'jumlah' => 3.00, 'frekuensi' => 2, 'waktu_pemberian' => 'Pagi, Sore', 'tanggal_mulai' => '2026-01-01', 'tanggal_selesai' => null, 'catatan' => 'Konsentrat penggemukan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 2, 'pakan_id' => 1, 'jumlah' => 12.00, 'frekuensi' => 2, 'waktu_pemberian' => 'Pagi, Sore', 'tanggal_mulai' => '2026-01-01', 'tanggal_selesai' => null, 'catatan' => 'Pakan harian indukan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 4, 'pakan_id' => 1, 'jumlah' => 5.00, 'frekuensi' => 3, 'waktu_pemberian' => 'Pagi, Siang, Sore', 'tanggal_mulai' => '2026-02-01', 'tanggal_selesai' => null, 'catatan' => 'Hijauan kambing', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 4, 'pakan_id' => 4, 'jumlah' => 1.00, 'frekuensi' => 1, 'waktu_pemberian' => 'Pagi', 'tanggal_mulai' => '2026-02-01', 'tanggal_selesai' => null, 'catatan' => 'Campuran dedak padi', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 3, 'pakan_id' => 1, 'jumlah' => 14.00, 'frekuensi' => 2, 'waktu_pemberian' => 'Pagi, Sore', 'tanggal_mulai' => '2026-01-15', 'tanggal_selesai' => null, 'catatan' => 'Pakan utama', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 6, 'pakan_id' => 2, 'jumlah' => 3.00, 'frekuensi' => 2, 'waktu_pemberian' => 'Pagi, Sore', 'tanggal_mulai' => '2026-02-15', 'tanggal_selesai' => null, 'catatan' => 'Jerami untuk domba', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('dosis_pakan')->insertBatch($dosis);

        // ============ PERTUMBUHAN ============
        $pertumbuhan = [
            ['ternak_id' => 1, 'tanggal' => '2026-01-01', 'berat' => 355.00, 'tinggi' => 135.00, 'lingkar_dada' => 180.00, 'catatan' => 'Pengukuran awal tahun', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 1, 'tanggal' => '2026-02-01', 'berat' => 370.00, 'tinggi' => 136.00, 'lingkar_dada' => 182.00, 'catatan' => 'Pertumbuhan bagus', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 1, 'tanggal' => '2026-03-01', 'berat' => 388.00, 'tinggi' => 137.00, 'lingkar_dada' => 185.00, 'catatan' => 'Naik 18 kg', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 2, 'tanggal' => '2026-01-01', 'berat' => 285.00, 'tinggi' => 128.00, 'lingkar_dada' => 165.00, 'catatan' => 'Pengukuran bulanan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 2, 'tanggal' => '2026-02-01', 'berat' => 290.00, 'tinggi' => 128.50, 'lingkar_dada' => 166.00, 'catatan' => 'Stabil', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 4, 'tanggal' => '2026-01-15', 'berat' => 48.00, 'tinggi' => 65.00, 'lingkar_dada' => 70.00, 'catatan' => 'Kambing sehat', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 4, 'tanggal' => '2026-02-15', 'berat' => 52.00, 'tinggi' => 66.50, 'lingkar_dada' => 72.00, 'catatan' => 'Pertumbuhan normal', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 6, 'tanggal' => '2026-02-01', 'berat' => 42.00, 'tinggi' => 60.00, 'lingkar_dada' => 65.00, 'catatan' => 'Domba garut', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 8, 'tanggal' => '2026-02-01', 'berat' => 160.00, 'tinggi' => 105.00, 'lingkar_dada' => 130.00, 'catatan' => 'Pedet berkembang baik', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 8, 'tanggal' => '2026-03-01', 'berat' => 180.00, 'tinggi' => 110.00, 'lingkar_dada' => 138.00, 'catatan' => 'Naik 20 kg dalam sebulan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('pertumbuhan')->insertBatch($pertumbuhan);

        // ============ KESEHATAN ============
        $kesehatan = [
            ['ternak_id' => 1, 'tanggal' => '2026-01-10', 'kondisi' => 'Sehat', 'gejala' => null, 'diagnosa' => 'Sehat', 'penanganan' => 'Pemeriksaan rutin bulanan', 'obat' => null, 'biaya' => 0, 'dokter' => 'drh. Budi Santoso', 'catatan' => 'Kondisi prima', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 2, 'tanggal' => '2026-01-10', 'kondisi' => 'Sehat', 'gejala' => null, 'diagnosa' => 'Sehat', 'penanganan' => 'Pemeriksaan rutin', 'obat' => null, 'biaya' => 0, 'dokter' => 'drh. Budi Santoso', 'catatan' => 'Indukan sehat', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 7, 'tanggal' => '2026-02-20', 'kondisi' => 'Sakit', 'gejala' => 'Nafsu makan menurun, lesu, diare', 'diagnosa' => 'Gangguan pencernaan', 'penanganan' => 'Pemberian obat anti diare dan vitamin', 'obat' => 'Entrostop Vet, Vit B', 'biaya' => 150000, 'dokter' => 'drh. Budi Santoso', 'catatan' => 'Perlu monitoring lanjutan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 7, 'tanggal' => '2026-03-01', 'kondisi' => 'Dalam Perawatan', 'gejala' => 'Masih lesu', 'diagnosa' => 'Gangguan pencernaan', 'penanganan' => 'Lanjutan pengobatan, tambah probiotik', 'obat' => 'Probiotik, Vit B', 'biaya' => 100000, 'dokter' => 'drh. Budi Santoso', 'catatan' => 'Kondisi membaik', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 4, 'tanggal' => '2026-02-05', 'kondisi' => 'Sehat', 'gejala' => null, 'diagnosa' => 'Sehat', 'penanganan' => 'Pemeriksaan rutin kambing', 'obat' => null, 'biaya' => 0, 'dokter' => 'drh. Siti Aminah', 'catatan' => 'Kambing sehat', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 5, 'tanggal' => '2026-01-20', 'kondisi' => 'Sakit', 'gejala' => 'Kaki pincang', 'diagnosa' => 'Radang sendi', 'penanganan' => 'Pemberian anti radang', 'obat' => 'Dexamethasone', 'biaya' => 75000, 'dokter' => 'drh. Siti Aminah', 'catatan' => 'Sembuh 1 minggu', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 5, 'tanggal' => '2026-01-28', 'kondisi' => 'Sembuh', 'gejala' => null, 'diagnosa' => 'Radang sendi sembuh', 'penanganan' => 'Pemeriksaan kontrol', 'obat' => null, 'biaya' => 0, 'dokter' => 'drh. Siti Aminah', 'catatan' => 'Berjalan normal', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('kesehatan')->insertBatch($kesehatan);

        // ============ PERANAKAN ============
        $peranakan = [
            ['kandang_id' => 1, 'kode_ternak' => 'PNK-001', 'jenis_ruminan' => 'Sapi', 'jenis_kelamin' => 'Jantan', 'tanggal_perolehan' => '2026-01-20', 'umur_bulan' => 2, 'catatan' => 'Anak dari Mawar (SPB-002)', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kandang_id' => 1, 'kode_ternak' => 'PNK-002', 'jenis_ruminan' => 'Sapi', 'jenis_kelamin' => 'Betina', 'tanggal_perolehan' => '2026-02-10', 'umur_bulan' => 1, 'catatan' => 'Anak dari Melati (SPB-004)', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kandang_id' => 3, 'kode_ternak' => 'PNK-003', 'jenis_ruminan' => 'Kambing', 'jenis_kelamin' => 'Betina', 'tanggal_perolehan' => '2026-01-05', 'umur_bulan' => 3, 'catatan' => 'Anak kambing etawa betina', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kandang_id' => 3, 'kode_ternak' => 'PNK-004', 'jenis_ruminan' => 'Kambing', 'jenis_kelamin' => 'Jantan', 'tanggal_perolehan' => '2026-01-05', 'umur_bulan' => 3, 'catatan' => 'Anak kambing etawa jantan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['kandang_id' => 4, 'kode_ternak' => 'PNK-005', 'jenis_ruminan' => 'Domba', 'jenis_kelamin' => 'Jantan', 'tanggal_perolehan' => '2026-02-28', 'umur_bulan' => 1, 'catatan' => 'Anak domba garut', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('peranakan')->insertBatch($peranakan);

        // ============ KEUANGAN ============
        $keuangan = [
            ['tanggal' => '2026-01-05', 'jenis' => 'Pemasukan', 'kategori' => 'Penjualan Ternak', 'jumlah' => 18000000.00, 'keterangan' => 'Penjualan 1 ekor sapi potong', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-01-20', 'jenis' => 'Pemasukan', 'kategori' => 'Penjualan Ternak', 'jumlah' => 3500000.00, 'keterangan' => 'Penjualan 2 ekor kambing', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-02-15', 'jenis' => 'Pemasukan', 'kategori' => 'Penjualan Susu', 'jumlah' => 2400000.00, 'keterangan' => 'Penjualan susu kambing 80 liter', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-02-28', 'jenis' => 'Pemasukan', 'kategori' => 'Penjualan Kotoran', 'jumlah' => 500000.00, 'keterangan' => 'Penjualan pupuk kandang', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-03-01', 'jenis' => 'Pemasukan', 'kategori' => 'Penjualan Ternak', 'jumlah' => 22000000.00, 'keterangan' => 'Penjualan 1 ekor sapi besar', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-01-02', 'jenis' => 'Pengeluaran', 'kategori' => 'Pakan', 'jumlah' => 2500000.00, 'keterangan' => 'Pembelian rumput gajah dan konsentrat', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-01-10', 'jenis' => 'Pengeluaran', 'kategori' => 'Kesehatan', 'jumlah' => 500000.00, 'keterangan' => 'Biaya pemeriksaan rutin drh. Budi', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-01-25', 'jenis' => 'Pengeluaran', 'kategori' => 'Operasional', 'jumlah' => 750000.00, 'keterangan' => 'Gaji penjaga kandang', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-02-02', 'jenis' => 'Pengeluaran', 'kategori' => 'Pakan', 'jumlah' => 3000000.00, 'keterangan' => 'Stok pakan bulanan Februari', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-02-20', 'jenis' => 'Pengeluaran', 'kategori' => 'Kesehatan', 'jumlah' => 250000.00, 'keterangan' => 'Biaya pengobatan Melati', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-02-25', 'jenis' => 'Pengeluaran', 'kategori' => 'Operasional', 'jumlah' => 750000.00, 'keterangan' => 'Gaji penjaga kandang Februari', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['tanggal' => '2026-03-02', 'jenis' => 'Pengeluaran', 'kategori' => 'Pakan', 'jumlah' => 2800000.00, 'keterangan' => 'Stok pakan Maret', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('keuangan')->insertBatch($keuangan);

        // ============ PENGELUARAN PAKAN ============
        $pengeluaranPakan = [
            ['pakan_id' => 1, 'jumlah' => 50.00, 'satuan' => 'kg', 'tanggal' => '2026-01-05', 'catatan' => 'Pemberian mingguan sapi', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 3, 'jumlah' => 10.00, 'satuan' => 'kg', 'tanggal' => '2026-01-05', 'catatan' => 'Konsentrat harian', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 1, 'jumlah' => 50.00, 'satuan' => 'kg', 'tanggal' => '2026-01-12', 'catatan' => 'Pemberian mingguan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 2, 'jumlah' => 20.00, 'satuan' => 'kg', 'tanggal' => '2026-01-15', 'catatan' => 'Jerami untuk domba', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 4, 'jumlah' => 15.00, 'satuan' => 'kg', 'tanggal' => '2026-02-01', 'catatan' => 'Dedak padi campuran', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 1, 'jumlah' => 60.00, 'satuan' => 'kg', 'tanggal' => '2026-02-01', 'catatan' => 'Rumput gajah mingguan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 6, 'jumlah' => 25.00, 'satuan' => 'kg', 'tanggal' => '2026-02-10', 'catatan' => 'Ampas tahu protein tinggi', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['pakan_id' => 5, 'jumlah' => 3.00, 'satuan' => 'pcs', 'tanggal' => '2026-02-15', 'catatan' => 'Mineral block untuk kandang', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('pengeluaran_pakan')->insertBatch($pengeluaranPakan);

        // ============ VAKSIN ============
        $vaksin = [
            ['ternak_id' => 1, 'jenis_vaksin' => 'Vaksin SE', 'dosis' => '2 ml', 'tanggal' => '2026-01-15', 'catatan' => 'Vaksin SE rutin tahunan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 2, 'jenis_vaksin' => 'Vaksin SE', 'dosis' => '2 ml', 'tanggal' => '2026-01-15', 'catatan' => 'Vaksin SE rutin', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 3, 'jenis_vaksin' => 'Vaksin SE', 'dosis' => '2 ml', 'tanggal' => '2026-01-15', 'catatan' => 'Vaksin SE rutin', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 1, 'jenis_vaksin' => 'Vaksin Antraks', 'dosis' => '1 ml', 'tanggal' => '2026-02-10', 'catatan' => 'Vaksin antraks tahunan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 4, 'jenis_vaksin' => 'Vaksin PPR', 'dosis' => '1 ml', 'tanggal' => '2026-02-05', 'catatan' => 'Vaksin PPR untuk kambing', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 5, 'jenis_vaksin' => 'Vaksin PPR', 'dosis' => '1 ml', 'tanggal' => '2026-02-05', 'catatan' => 'Vaksin PPR kambing jantan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 6, 'jenis_vaksin' => 'Vaksin PPR', 'dosis' => '1 ml', 'tanggal' => '2026-02-20', 'catatan' => 'Vaksin PPR untuk domba', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('vaksin')->insertBatch($vaksin);

        // ============ PENGOBATAN ============
        $pengobatan = [
            ['ternak_id' => 7, 'jenis_pengobatan' => 'Obat anti diare', 'dosis' => '10 ml 2x/hari', 'tanggal' => '2026-02-20', 'catatan' => 'Diare akut, 5 hari', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 7, 'jenis_pengobatan' => 'Vitamin B Complex', 'dosis' => '5 ml injeksi', 'tanggal' => '2026-02-20', 'catatan' => 'Penambah nafsu makan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 7, 'jenis_pengobatan' => 'Probiotik', 'dosis' => '15 ml oral', 'tanggal' => '2026-03-01', 'catatan' => 'Lanjutan pemulihan pencernaan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 5, 'jenis_pengobatan' => 'Dexamethasone', 'dosis' => '3 ml injeksi', 'tanggal' => '2026-01-20', 'catatan' => 'Anti radang sendi kaki depan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['ternak_id' => 5, 'jenis_pengobatan' => 'Vitamin ADE', 'dosis' => '2 ml injeksi', 'tanggal' => '2026-01-20', 'catatan' => 'Suplemen pemulihan', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('pengobatan')->insertBatch($pengobatan);

        // ============ CATATAN REKOMENDASI ============
        $catatan = [
            ['bulan' => 1, 'tahun' => 2026, 'kesimpulan' => 'Baik', 'analisis' => 'Kondisi peternakan Januari sangat baik. 8 ternak aktif, tingkat kesehatan 87.5%. Pertumbuhan sapi rata-rata 15 kg/bulan. Penjualan ternak Rp 21.5 juta.', 'rekomendasi' => 'Pertahankan program pakan. Lakukan vaksinasi rutin. Siapkan breeding program indukan Mawar. Tingkatkan stok konsentrat menjelang musim kering.', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['bulan' => 2, 'tahun' => 2026, 'kesimpulan' => 'Cukup Baik', 'analisis' => 'Februari ada 1 ternak sakit (Melati - gangguan pencernaan). Pertumbuhan lain stabil. Pemasukan susu kambing mulai berjalan. Biaya pengobatan meningkat.', 'rekomendasi' => 'Fokuskan perawatan Melati. Lanjutkan vaksinasi PPR kambing/domba. Tambahkan ampas tahu sebagai protein murah. Evaluasi kualitas jerami padi.', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
            ['bulan' => 3, 'tahun' => 2026, 'kesimpulan' => 'Baik', 'analisis' => 'Maret menunjukkan pemulihan. Penjualan 1 sapi besar Rp 22 juta. Pedet Gagah tumbuh sangat baik (+20 kg/bulan). 5 peranakan baru sejak awal tahun.', 'rekomendasi' => 'Optimalkan pakan pedet Gagah. Siapkan kandang tambahan untuk peranakan. Laporkan kondisi Melati ke drh. Rencanakan penjualan kambing cukup umur.', 'user_id' => $uid, 'created_at' => $now, 'updated_at' => $now],
        ];
        $this->db->table('catatan_rekomendasi')->insertBatch($catatan);
    }
}
