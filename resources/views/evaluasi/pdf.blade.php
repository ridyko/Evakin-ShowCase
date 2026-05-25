<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Evaluasi Kinerja {{ $evaluasi->pegawai->nama }} - {{ $evaluasi->nama_bulan }} {{ $evaluasi->tahun }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8.5pt;
            color: #000;
            line-height: 1.25;
            padding: 15px;
        }

        .page-border {
            position: fixed;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            border: 1.5px solid #000;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 10pt;
            font-weight: bold;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 9.5pt;
            font-weight: bold;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .header h3 {
            font-size: 9.5pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .section-title {
            font-weight: bold;
            font-size: 9pt;
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .table-header {
            background-color: #bdd7ee;
            color: #000;
            font-weight: bold;
            text-align: center;
            font-size: 8pt;
        }

        .border-all {
            border: 1.5px solid #000;
        }

        .border-cell {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="page-border"></div>
    
    {{-- Header --}}
        <div class="header">
            <h1>EVALUASI KINERJA BULANAN PEGAWAI</h1>
            <h2>PEGAWAI PEMERINTAH DENGAN PERJANJIAN KERJA PARUH WAKTU</h2>
            <h3>BULAN {{ strtoupper($evaluasi->nama_bulan) }}</h3>
        </div>

        {{-- Identity Section - Side by Side --}}
        <table style="width: 100%; margin-bottom: 8px;" cellspacing="0" cellpadding="0">
            <tr>
                {{-- Left Column: Pegawai --}}
                <td style="width: 50%; vertical-align: top; padding-right: 4px;">
                    <table cellspacing="0" cellpadding="0">
                        <tr class="table-header">
                            <td style="border: 1px solid #000; width: 22px; padding: 4px 2px;">NO</td>
                            <td colspan="2" style="border: 1px solid #000; padding: 4px 2px;">PEGAWAI YANG DINILAI</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">1</td>
                            <td style="border: 1px solid #000; width: 110px; padding: 4px; font-size: 8pt;">NAMA</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt; font-weight: bold;">{{ strtoupper($evaluasi->pegawai->nama) }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">2</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">NI PPPK</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt;">{{ $evaluasi->pegawai->ni_pppk }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">3</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">PANGKAT/GOL. RUANG</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt;">{{ $evaluasi->pegawai->pangkat_gol ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">4</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">JABATAN</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt; line-height: 1.15;">{{ $evaluasi->pegawai->jabatan->nama_jabatan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">5</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">UNIT KERJA</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt;">{{ strtoupper($evaluasi->pegawai->unit_kerja) }}</td>
                        </tr>
                    </table>
                </td>
                {{-- Right Column: Penilai --}}
                <td style="width: 50%; vertical-align: top; padding-left: 4px;">
                    <table cellspacing="0" cellpadding="0">
                        <tr class="table-header">
                            <td style="border: 1px solid #000; width: 22px; padding: 4px 2px;">NO</td>
                            <td colspan="2" style="border: 1px solid #000; padding: 4px 2px;">PEJABAT PENILAI KINERJA</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">1</td>
                            <td style="border: 1px solid #000; width: 110px; padding: 4px; font-size: 8pt;">NAMA</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt; font-weight: bold;">{{ strtoupper($evaluasi->pejabatPenilai->nama) }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">2</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">NIP</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt;">{{ $evaluasi->pejabatPenilai->nip }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">3</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">PANGKAT/ GOL.RUANG</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt;">{{ strtoupper($evaluasi->pejabatPenilai->pangkat_gol ?? '-') }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">4</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">JABATAN</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt; line-height: 1.15;">{{ strtoupper($evaluasi->pejabatPenilai->jabatan ?? '-') }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000; text-align: center; padding: 4px; font-size: 8.5pt;">5</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8pt;">UNIT KERJA</td>
                            <td style="border: 1px solid #000; padding: 4px; font-size: 8.5pt;">{{ strtoupper($evaluasi->pejabatPenilai->unit_kerja) }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        {{-- HASIL KERJA --}}
        <div class="section-title">HASIL KERJA</div>
        <table style="margin-bottom: 0;" cellspacing="0" cellpadding="0">
            <tr class="table-header">
                <td style="border: 1px solid #000; padding: 5px 2px; width: 25px;">No</td>
                <td style="border: 1px solid #000; padding: 5px 4px; text-align: left;">Indikator Kinerja Individu</td>
                <td style="border: 1px solid #000; padding: 5px 2px; width: 85px;">Target tahunan</td>
                <td style="border: 1px solid #000; padding: 5px 2px; width: 65px;">Target Bulan</td>
                <td style="border: 1px solid #000; padding: 5px 2px; width: 65px;">Realisasi</td>
                <td style="border: 1px solid #000; padding: 5px 2px; width: 65px;">Capaian</td>
            </tr>
            @foreach($evaluasi->hasilKerja as $i => $hk)
            <tr>
                <td style="border: 1px solid #000; text-align: center; padding: 5px 2px; font-size: 8.5pt; vertical-align: middle;">{{ $i + 1 }}</td>
                <td style="border: 1px solid #000; padding: 5px 6px; font-size: 8pt; vertical-align: middle; text-align: left; line-height: 1.2;">{{ $hk->indikatorKinerja->deskripsi }}</td>
                <td style="border: 1px solid #000; text-align: center; padding: 5px 2px; font-size: 8pt; vertical-align: middle;">{{ $hk->indikatorKinerja->target_tahunan }}</td>
                <td style="border: 1px solid #000; text-align: center; padding: 5px 2px; font-size: 8.5pt; vertical-align: middle;">{{ $hk->target_bulan }}</td>
                <td style="border: 1px solid #000; text-align: center; padding: 5px 2px; font-size: 8.5pt; vertical-align: middle;">{{ number_format($hk->realisasi, 0) }}</td>
                <td style="border: 1px solid #000; text-align: center; padding: 5px 2px; font-size: 8.5pt; vertical-align: middle;">{{ number_format($hk->capaian, 0) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5" style="border: 1px solid #000; font-weight: bold; font-size: 8.5pt; padding: 5px 6px; text-align: left;">Capaian Hasil Kerja Bulanan</td>
                <td style="border: 1px solid #000; text-align: center; font-weight: bold; font-size: 9pt; padding: 5px 2px;">{{ number_format($evaluasi->capaian_hasil_kerja, 2, ',', '.') }}</td>
            </tr>
        </table>

        {{-- ASPEK PERILAKU --}}
        <div class="section-title" style="margin-top: 10px;">Aspek Perilaku</div>
        <table style="margin-bottom: 0;" cellspacing="0" cellpadding="0">
            <tr class="table-header">
                <td style="border: 1px solid #000; padding: 5px 2px; width: 25px;">No</td>
                <td style="border: 1px solid #000; padding: 5px 6px; text-align: left;">Aspek Perilaku</td>
                <td colspan="2" style="border: 1px solid #000; padding: 5px 2px; width: 180px;">Nilai</td>
            </tr>
            @foreach($evaluasi->perilaku as $i => $pr)
            <tr>
                <td style="border: 1px solid #000; text-align: center; padding: 5px 2px; font-size: 8.5pt; vertical-align: middle;">{{ $i + 1 }}</td>
                <td style="border: 1px solid #000; padding: 5px 6px; font-size: 8pt; vertical-align: middle; text-align: left;">{{ $pr->aspek_perilaku }}</td>
                <td style="border: 1px solid #000; padding: 5px 6px; font-size: 8pt; vertical-align: middle; width: 130px; text-align: left;">{{ $pr->pengkategorian }}</td>
                <td style="border: 1px solid #000; text-align: center; font-weight: bold; padding: 5px 2px; font-size: 9pt; vertical-align: middle; width: 50px;">{{ $pr->nilai }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" style="border: 1px solid #000; font-weight: bold; font-size: 8.5pt; padding: 5px 6px; text-align: left;">Capaian Perilaku Kerja Bulanan</td>
                <td style="border: 1px solid #000; text-align: center; font-weight: bold; font-size: 9pt; padding: 5px 2px;">{{ number_format($evaluasi->capaian_perilaku_kerja, 2, ',', '.') }}</td>
            </tr>
        </table>

        {{-- Signature --}}
        @php
            $bulanNames = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
                4 => 'April', 5 => 'Mei', 6 => 'Juni',
                7 => 'Juli', 8 => 'Agustus', 9 => 'September',
                10 => 'Oktober', 11 => 'November', 12 => 'Desember',
            ];
            if ($evaluasi->tanggal_evaluasi) {
                $tanggal = 'Jakarta, ' . $evaluasi->tanggal_evaluasi->format('d') . ' ' . $bulanNames[(int)$evaluasi->tanggal_evaluasi->format('n')] . ' ' . $evaluasi->tanggal_evaluasi->format('Y');
            } else {
                $tanggal = 'Jakarta, ' . date('d') . ' ' . $bulanNames[(int)date('n')] . ' ' . $evaluasi->tahun;
            }
        @endphp

        <table style="width: 100%; margin-top: 12px;" cellspacing="0" cellpadding="0">
            <tr>
                {{-- Left column: Employee --}}
                <td style="width: 50%; text-align: center; font-size: 8.5pt; vertical-align: top; padding-top: 15px;">
                    <p>Pegawai yang Dinilai</p>
                    <br><br><br><br>
                    <p style="font-weight: bold;">{{ $evaluasi->pegawai->nama }}</p>
                    <p>NI PPPK {{ $evaluasi->pegawai->ni_pppk }}</p>
                </td>
                {{-- Right column: Penilai + Date --}}
                <td style="width: 50%; text-align: center; font-size: 8.5pt; vertical-align: top;">
                    <p style="text-align: center; margin-bottom: 15px;">{{ $tanggal }}</p>
                    <p>Pejabat Penilai Kinerja,</p>
                    <br><br><br>
                    <p style="font-weight: bold;">{{ $evaluasi->pejabatPenilai->nama }}</p>
                    <p>NIP {{ $evaluasi->pejabatPenilai->nip }}</p>
                </td>
            </tr>
        </table>
</body>
</html>
