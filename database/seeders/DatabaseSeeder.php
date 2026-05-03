<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\PejabatPenilai;
use App\Models\IndikatorKinerja;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 1. JABATAN (Positions)
        // ==========================================
        $administrasi = Jabatan::create([
            'nama_jabatan' => 'Operator Layanan Operasional - Tenaga Administrasi',
            'deskripsi' => 'Tenaga administrasi pada satuan pendidikan',
        ]);

        $laboran = Jabatan::create([
            'nama_jabatan' => 'Operator Layanan Operasional - Tenaga Kependidikan - Laboran',
            'deskripsi' => 'Tenaga laboran pada satuan pendidikan',
        ]);

        $pustakawan = Jabatan::create([
            'nama_jabatan' => 'Operator Layanan Operasional - Pustakawan',
            'deskripsi' => 'Tenaga pustakawan pada satuan pendidikan',
        ]);

        // ==========================================
        // 2. INDIKATOR KINERJA per Jabatan
        // ==========================================

        // -- Administrasi --
        $indikatorAdm = [
            'Jumlah rekapitulasi pelaksanaan tugas administrasi pada satuan pendidikan meliputi urusan kepegawaian, kesiswaan, guru, kurikulum, prasarana dan sarana, aset dan keuangan',
            'Jumlah rekapitulasi pengolahan dan pemuktahiran dan penyajian data satuan pendidikan yang disusun secara manual maupun melalui sistem informasi yang berlaku pada satuan pendidikan',
            'Jumlah rekapitulasi perbantuan pelaksanaan kegiatan yang diselenggarakan satuan pendidikan',
            'Jumlah rekapitulasi persuratan meliputi konsep, penomoran, stempel, pendistribusian, penggandaan, legalisasi dan pengarsipan dokumen satuan pendidikan',
            'Jumlah rekapitulasi pelayanan masyarakat dan peserta didik yang membutuhkan layanan administrasi pada satuan pendidikan',
        ];

        foreach ($indikatorAdm as $i => $desc) {
            IndikatorKinerja::create([
                'jabatan_id' => $administrasi->id,
                'nomor_urut' => $i + 1,
                'deskripsi' => $desc,
                'target_tahunan' => '12 Rekapitulasi',
            ]);
        }

        // -- Laboran --
        $indikatorLab = [
            'Jumlah rekapitulasi penyiapan dan pengelolaan bahan serta alat praktik laboratorium pada satuan pendidikan',
            'Jumlah rekapitulasi perawatan dan pemeliharaan alat-alat laboratorium pada satuan pendidikan',
            'Jumlah rekapitulasi perbantuan pelaksanaan kegiatan praktikum peserta didik pada satuan pendidikan',
            'Jumlah rekapitulasi inventarisasi bahan dan alat laboratorium pada satuan pendidikan',
            'Jumlah rekapitulasi penerapan keselamatan dan kesehatan kerja (K3) di laboratorium pada satuan pendidikan',
        ];

        foreach ($indikatorLab as $i => $desc) {
            IndikatorKinerja::create([
                'jabatan_id' => $laboran->id,
                'nomor_urut' => $i + 1,
                'deskripsi' => $desc,
                'target_tahunan' => '12 Rekapitulasi',
            ]);
        }

        // -- Pustakawan --
        $indikatorPust = [
            'Jumlah rekapitulasi pengelolaan koleksi bahan pustaka perpustakaan pada satuan pendidikan',
            'Jumlah rekapitulasi pelayanan sirkulasi dan referensi perpustakaan pada satuan pendidikan',
            'Jumlah rekapitulasi perawatan dan pemeliharaan bahan pustaka perpustakaan pada satuan pendidikan',
            'Jumlah rekapitulasi promosi dan pembinaan minat baca peserta didik pada satuan pendidikan',
            'Jumlah rekapitulasi inventarisasi dan katalogisasi bahan pustaka perpustakaan pada satuan pendidikan',
        ];

        foreach ($indikatorPust as $i => $desc) {
            IndikatorKinerja::create([
                'jabatan_id' => $pustakawan->id,
                'nomor_urut' => $i + 1,
                'deskripsi' => $desc,
                'target_tahunan' => '12 Rekapitulasi',
            ]);
        }

        // ==========================================
        // 3. PEJABAT PENILAI
        // ==========================================
        $penilai = PejabatPenilai::create([
            'nama' => 'Drs. Kakashi Hatake, M.Si',
            'nip' => '197501012000011001',
            'pangkat_gol' => 'Pembina (IV/A)',
            'jabatan' => 'Kepala Sub Bagian Tata Usaha',
            'unit_kerja' => 'Pemerintah Daerah Konoha',
        ]);

        // ==========================================
        // 4. PEGAWAI (12 orang) + AUTO-CREATE USER ACCOUNTS
        // ==========================================
        $pegawaiData = [
            ['nama' => 'Naruto Uzumaki', 'ni_pppk' => '199001012024211001', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'naruto@konoha.test'],
            ['nama' => 'Sasuke Uchiha', 'ni_pppk' => '199202022024212002', 'pangkat_gol' => 'IX', 'jabatan_id' => $pustakawan->id, 'email' => 'sasuke@konoha.test'],
            ['nama' => 'Sakura Haruno', 'ni_pppk' => '198503032024211003', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'sakura@konoha.test'],
            ['nama' => 'Shikamaru Nara', 'ni_pppk' => '199504042024212004', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'shikamaru@konoha.test'],
            ['nama' => 'Hinata Hyuga', 'ni_pppk' => '198805052024211005', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'hinata@konoha.test'],
            ['nama' => 'Rock Lee', 'ni_pppk' => '199306062024212006', 'pangkat_gol' => 'IX', 'jabatan_id' => $laboran->id, 'email' => 'lee@konoha.test'],
            ['nama' => 'Neji Hyuga', 'ni_pppk' => '199107072024211007', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'neji@konoha.test'],
            ['nama' => 'Tenten', 'ni_pppk' => '199108082024212008', 'pangkat_gol' => 'IX', 'jabatan_id' => $pustakawan->id, 'email' => 'tenten@konoha.test'],
            ['nama' => 'Ino Yamanaka', 'ni_pppk' => '199209092024212009', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'ino@konoha.test'],
            ['nama' => 'Choji Akimichi', 'ni_pppk' => '199010102024211010', 'pangkat_gol' => 'IX', 'jabatan_id' => $administrasi->id, 'email' => 'choji@konoha.test'],
            ['nama' => 'Kiba Inuzuka', 'ni_pppk' => '199311112024211011', 'pangkat_gol' => 'IX', 'jabatan_id' => $laboran->id, 'email' => 'kiba@konoha.test'],
            ['nama' => 'Shino Aburame', 'ni_pppk' => '199412122024211012', 'pangkat_gol' => 'IX', 'jabatan_id' => $pustakawan->id, 'email' => 'shino@konoha.test'],
        ];

        foreach ($pegawaiData as $data) {
            $pegawai = Pegawai::create([
                'nama' => $data['nama'],
                'ni_pppk' => $data['ni_pppk'],
                'pangkat_gol' => $data['pangkat_gol'],
                'jabatan_id' => $data['jabatan_id'],
                'unit_kerja' => 'Pemerintah Daerah Konoha',
            ]);

            // Auto-create user account (password = NI PPPK)
            User::create([
                'name' => $data['nama'],
                'email' => $data['email'],
                'password' => Hash::make($data['ni_pppk']),
                'role' => 'pegawai',
                'pegawai_id' => $pegawai->id,
            ]);
        }

        // ==========================================
        // 5. SPECIAL USERS (Admin & Penilai)
        // ==========================================

        // Admin
        User::create([
            'name' => 'Administrator Konoha',
            'email' => 'admin@konoha.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Penilai
        User::create([
            'name' => 'Drs. Kakashi Hatake, M.Si',
            'email' => 'pejabat@konoha.test',
            'password' => Hash::make('password'),
            'role' => 'penilai',
            'pejabat_penilai_id' => $penilai->id,
        ]);
    }
}
