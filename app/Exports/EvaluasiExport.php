<?php

namespace App\Exports;

use App\Models\EvaluasiBulanan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class EvaluasiExport
{
    protected EvaluasiBulanan $evaluasi;
    protected Spreadsheet $spreadsheet;
    protected Worksheet $sheet;

    const COLOR_LIGHT_BLUE = 'BDD7EE'; 
    const COLOR_WHITE = 'FFFFFF';
    const COLOR_BLACK = '000000';

    public function __construct(EvaluasiBulanan $evaluasi)
    {
        $this->evaluasi = $evaluasi;
    }

    public function generate(): string
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
        $this->sheet->setTitle('Evaluasi Kinerja');

        // Page setup
        $this->sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $this->sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $this->sheet->getPageSetup()->setFitToWidth(1);
        $this->sheet->getPageSetup()->setFitToHeight(0);
        
        $this->sheet->getPageMargins()->setTop(0.4);
        $this->sheet->getPageMargins()->setBottom(0.4);
        $this->sheet->getPageMargins()->setLeft(0.4);
        $this->sheet->getPageMargins()->setRight(0.4);

        // Default font
        $this->spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(9);

        // Define Column Widths to perfectly match the 8-column grid layout (A to H) in Gambar 2
        $this->sheet->getColumnDimension('A')->setWidth(4);   // NO
        $this->sheet->getColumnDimension('B')->setWidth(20);  // Key Pegawai (NAMA, NI PPPK, dll)
        $this->sheet->getColumnDimension('C')->setWidth(25);  // Value Pegawai part 1
        $this->sheet->getColumnDimension('D')->setWidth(15);  // Value Pegawai part 2
        $this->sheet->getColumnDimension('E')->setWidth(12);  // NO Penilai / Target tahunan
        $this->sheet->getColumnDimension('F')->setWidth(18);  // Key Penilai / Target Bulan
        $this->sheet->getColumnDimension('G')->setWidth(18);  // Value Penilai part 1 / Realisasi / Predikat Perilaku
        $this->sheet->getColumnDimension('H')->setWidth(10);  // Value Penilai part 2 / Capaian / Skor Perilaku

        $this->writeHeader();
        $this->writeIdentity();
        $this->writeHasilKerja();
        $this->writePerilaku();
        $this->writeSignature();

        // Save to temp file
        $filename = 'Evaluasi_Kinerja_' . str_replace(' ', '_', $this->evaluasi->pegawai->nama)
            . '_' . $this->evaluasi->nama_bulan . '_' . $this->evaluasi->tahun . '.xlsx';
        $path = storage_path('app/' . $filename);
        $writer = new Xlsx($this->spreadsheet);
        $writer->save($path);

        return $path;
    }

    public function getFilename(): string
    {
        return 'Evaluasi_Kinerja_' . str_replace(' ', '_', $this->evaluasi->pegawai->nama)
            . '_' . $this->evaluasi->nama_bulan . '_' . $this->evaluasi->tahun . '.xlsx';
    }

    protected function writeHeader(): void
    {
        // Baris 1-3, Merge & Center dari Kolom A sampai Kolom H
        $this->sheet->mergeCells("A1:H1");
        $this->sheet->setCellValue("A1", 'EVALUASI KINERJA BULANAN PEGAWAI');
        $this->applyStyle("A1", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['bold' => true]]);

        $this->sheet->mergeCells("A2:H2");
        $this->sheet->setCellValue("A2", 'PEGAWAI PEMERINTAH DENGAN PERJANJIAN KERJA PARUH WAKTU');
        $this->applyStyle("A2", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['bold' => true]]);

        $this->sheet->mergeCells("A3:H3");
        $this->sheet->setCellValue("A3", 'BULAN ' . strtoupper($this->evaluasi->nama_bulan));
        $this->applyStyle("A3", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['bold' => true]]);
    }

    protected function writeIdentity(): void
    {
        $pegawai = $this->evaluasi->pegawai;
        $penilai = $this->evaluasi->pejabatPenilai;

        // Baris 5: Identity Header
        $this->sheet->setCellValue("A5", 'NO');
        $this->sheet->mergeCells("B5:D5");
        $this->sheet->setCellValue("B5", 'PEGAWAI YANG DINILAI');
        
        $this->sheet->setCellValue("E5", 'NO');
        $this->sheet->mergeCells("F5:H5");
        $this->sheet->setCellValue("F5", 'PEJABAT PENILAI KINERJA');

        $this->applyHeaderStyle("A5:D5");
        $this->applyHeaderStyle("E5:H5");

        $leftData = [
            ['1', 'NAMA', strtoupper($pegawai->nama)],
            ['2', 'NI PPPK', $pegawai->ni_pppk],
            ['3', 'PANGKAT/GOL. RUANG', $pegawai->pangkat_gol ?? '-'],
            ['4', 'JABATAN', $pegawai->jabatan->nama_jabatan ?? '-'],
            ['5', 'UNIT KERJA', strtoupper($pegawai->unit_kerja)],
        ];

        $rightData = [
            ['1', 'NAMA', strtoupper($penilai->nama)],
            ['2', 'NIP', $penilai->nip],
            ['3', 'PANGKAT/ GOL.RUANG', strtoupper($penilai->pangkat_gol ?? '-')],
            ['4', 'JABATAN', strtoupper($penilai->jabatan ?? '-')],
            ['5', 'UNIT KERJA', strtoupper($penilai->unit_kerja)],
        ];

        // Baris 6 s.d 10: Profil Data
        for ($i = 0; $i < 5; $i++) {
            $r = 6 + $i;
            
            // Data Pegawai (Label di Kolom B, Nilai di Kolom C & D di-merge)
            $this->sheet->setCellValue("A{$r}", $leftData[$i][0]);
            $this->sheet->setCellValue("B{$r}", $leftData[$i][1]);
            $this->sheet->mergeCells("C{$r}:D{$r}");
            $this->sheet->setCellValue("C{$r}", $leftData[$i][2]);
            $this->applyBorder("A{$r}:D{$r}");
            $this->applyStyle("A{$r}", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);

            // Data Pejabat (Label di Kolom F, Nilai di Kolom G & H di-merge)
            $this->sheet->setCellValue("E{$r}", $rightData[$i][0]);
            $this->sheet->setCellValue("F{$r}", $rightData[$i][1]);
            $this->sheet->mergeCells("G{$r}:H{$r}");
            $this->sheet->setCellValue("G{$r}", $rightData[$i][2]);
            $this->applyBorder("E{$r}:H{$r}");
            $this->applyStyle("E{$r}", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
            
            // Set text format code for NI PPPK and NIP to preserve leading zeros
            if ($i === 1) {
                $this->sheet->getStyle("C{$r}")->getNumberFormat()->setFormatCode('@');
                $this->sheet->getStyle("G{$r}")->getNumberFormat()->setFormatCode('@');
            }
        }
    }

    protected function writeHasilKerja(): void
    {
        // Baris 12: Kolom A = "HASIL KERJA" (Format Tebal)
        $this->sheet->setCellValue("A12", 'HASIL KERJA');
        $this->sheet->getStyle("A12")->getFont()->setBold(true);

        // Baris 13 (Header Tabel Utama)
        $this->sheet->setCellValue("A13", 'No');
        $this->sheet->mergeCells("B13:D13");
        $this->sheet->setCellValue("B13", 'Indikator Kinerja Individu');
        $this->sheet->setCellValue("E13", 'Target tahunan');
        $this->sheet->setCellValue("F13", 'Target Bulan');
        $this->sheet->setCellValue("G13", 'Realisasi');
        $this->sheet->setCellValue("H13", 'Capaian');

        $this->applyHeaderStyle("A13:H13");
        $this->applyStyle("A13:H13", [
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true]
        ]);

        // Baris 14 s.d 18: Looping Data Dinamis dari rsHasilKerja
        $hasilKerja = $this->evaluasi->hasilKerja;
        for ($i = 0; $i < 5; $i++) {
            $r = 14 + $i;
            $hk = $hasilKerja[$i] ?? null;
            
            $this->sheet->setCellValue("A{$r}", $i + 1);
            $this->sheet->mergeCells("B{$r}:D{$r}");
            
            if ($hk) {
                $this->sheet->setCellValue("B{$r}", $hk->indikatorKinerja->deskripsi);
                $this->sheet->setCellValue("E{$r}", $hk->indikatorKinerja->target_tahunan);
                $this->sheet->setCellValue("F{$r}", $hk->target_bulan);
                $this->sheet->setCellValue("G{$r}", $hk->realisasi);
                // Rumus Excel: =IF(F14>0, (G14/F14)*100, 0)
                $this->sheet->setCellValue("H{$r}", "=IF(F{$r}>0, (G{$r}/F{$r})*100, 0)");
            }

            $this->applyBorder("A{$r}:H{$r}");
            $this->applyStyle("A{$r}", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_TOP]]);
            $this->applyStyle("B{$r}", ['alignment' => ['wrapText' => true, 'vertical' => Alignment::VERTICAL_TOP], 'font' => ['size' => 8]]);
            $this->applyStyle("E{$r}:H{$r}", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_TOP], 'font' => ['size' => 8]]);
        }

        // Baris 19: Total Hasil Kerja
        $this->sheet->mergeCells("A19:G19");
        $this->sheet->setCellValue("A19", 'Capaian Hasil Kerja Bulanan');
        $this->sheet->setCellValue("H19", '=AVERAGE(H14:H18)');
        
        $this->applyBorder("A19:H19");
        $this->applyStyle("A19", ['font' => ['bold' => true]]);
        $this->applyStyle("H19", ['font' => ['bold' => true], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
        $this->sheet->getStyle("H19")->getNumberFormat()->setFormatCode('0.00');
    }

    protected function writePerilaku(): void
    {
        // Baris 21: Header Tabel Perilaku (Baris 20 dibiarkan kosong sebagai pemisah)
        $this->sheet->setCellValue("A21", 'No');
        $this->sheet->mergeCells("B21:F21");
        $this->sheet->setCellValue("B21", 'Aspek Perilaku');
        $this->sheet->mergeCells("G21:H21");
        $this->sheet->setCellValue("G21", 'Nilai');

        $this->applyHeaderStyle("A21:H21");
        $this->applyStyle("A21:H21", [
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]
        ]);

        // Baris 22 s.d 28: Looping 7 Aspek BerAKHLAK dari rsPerilaku
        $perilaku = $this->evaluasi->perilaku;
        for ($i = 0; $i < 7; $i++) {
            $r = 22 + $i;
            $pr = $perilaku[$i] ?? null;

            $this->sheet->setCellValue("A{$r}", $i + 1);
            $this->sheet->mergeCells("B{$r}:F{$r}");
            
            if ($pr) {
                $this->sheet->setCellValue("B{$r}", $pr->aspek_perilaku);
                $this->sheet->setCellValue("G{$r}", $pr->pengkategorian);
                $this->sheet->setCellValue("H{$r}", $pr->nilai);
            }

            $this->applyBorder("A{$r}:H{$r}");
            $this->applyStyle("A{$r}", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
            $this->applyStyle("B{$r}", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT], 'font' => ['size' => 8]]);
            $this->applyStyle("G{$r}:H{$r}", ['font' => ['size' => 8], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
        }

        // Baris 29: Total Perilaku
        $this->sheet->mergeCells("A29:G29");
        $this->sheet->setCellValue("A29", 'Capaian Perilaku Kerja Bulanan');
        $this->sheet->setCellValue("H29", '=AVERAGE(H22:H28)');

        $this->applyBorder("A29:H29");
        $this->applyStyle("A29", ['font' => ['bold' => true]]);
        $this->applyStyle("H29", ['font' => ['bold' => true], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
        $this->sheet->getStyle("H29")->getNumberFormat()->setFormatCode('0.00');
    }

    protected function writeSignature(): void
    {
        $bulanNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        if ($this->evaluasi->tanggal_evaluasi) {
            $tgl = $this->evaluasi->tanggal_evaluasi;
            $tanggalText = 'Jakarta, ' . $tgl->format('d') . ' ' . $bulanNames[(int)$tgl->format('n')] . ' ' . $tgl->format('Y');
        } else {
            $tanggalText = 'Jakarta, ' . date('d') . ' ' . $bulanNames[(int)date('n')] . ' ' . $this->evaluasi->tahun;
        }

        // Baris 31 Kolom G (Merge G31:H31)
        $this->sheet->mergeCells("G31:H31");
        $this->sheet->setCellValue("G31", $tanggalText);
        $this->applyStyle("G31", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['size' => 8]]);

        // Baris 32: Merge B32:D32 & Merge G32:H32
        $this->sheet->mergeCells("B32:D32");
        $this->sheet->setCellValue("B32", 'Pegawai yang Dinilai');
        $this->applyStyle("B32", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['size' => 8]]);

        $this->sheet->mergeCells("G32:H32");
        $this->sheet->setCellValue("G32", 'Pejabat Penilai Kinerja,');
        $this->applyStyle("G32", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['size' => 8]]);

        // Baris 36: Merge B36:D36 & Merge G36:H36
        $this->sheet->mergeCells("B36:D36");
        $this->sheet->setCellValue("B36", $this->evaluasi->pegawai->nama);
        $this->applyStyle("B36", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['bold' => true]]);

        $this->sheet->mergeCells("G36:H36");
        $this->sheet->setCellValue("G36", $this->evaluasi->pejabatPenilai->nama);
        $this->applyStyle("G36", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['bold' => true]]);

        // Baris 37: Merge B37:D37 & Merge G37:H37
        $this->sheet->mergeCells("B37:D37");
        $this->sheet->setCellValue("B37", 'NI PPPK ' . $this->evaluasi->pegawai->ni_pppk);
        $this->applyStyle("B37", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['size' => 8]]);

        $this->sheet->mergeCells("G37:H37");
        $this->sheet->setCellValue("G37", 'NIP ' . $this->evaluasi->pejabatPenilai->nip);
        $this->applyStyle("G37", ['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER], 'font' => ['size' => 8]]);
        
        // Force NI PPPK and NIP as Text in signature
        $this->sheet->getStyle("B37")->getNumberFormat()->setFormatCode('@');
        $this->sheet->getStyle("G37")->getNumberFormat()->setFormatCode('@');
    }

    protected function applyHeaderStyle(string $range): void
    {
        $style = $this->sheet->getStyle($range);
        $style->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB(self::COLOR_LIGHT_BLUE);
        $style->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $style->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $style->getFont()->setBold(true)->setSize(8);
        $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    }

    protected function applyBorder(string $range): void
    {
        $this->sheet->getStyle($range)->getBorders()->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);
    }

    protected function applyStyle(string $cell, array $styles): void
    {
        $style = $this->sheet->getStyle($cell);
        if (isset($styles['font'])) {
            $font = $style->getFont();
            if (isset($styles['font']['bold'])) $font->setBold($styles['font']['bold']);
            if (isset($styles['font']['size'])) $font->setSize($styles['font']['size']);
        }
        if (isset($styles['alignment'])) {
            $alignment = $style->getAlignment();
            if (isset($styles['alignment']['horizontal'])) $alignment->setHorizontal($styles['alignment']['horizontal']);
            if (isset($styles['alignment']['vertical'])) $alignment->setVertical($styles['alignment']['vertical']);
            if (isset($styles['alignment']['wrapText'])) $alignment->setWrapText($styles['alignment']['wrapText']);
        }
    }
}
