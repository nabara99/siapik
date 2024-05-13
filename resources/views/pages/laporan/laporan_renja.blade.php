<!DOCTYPE html>
<html lang="en">

<?php
use Carbon\Carbon;
setlocale(LC_TIME, 'id_ID');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Renja</title>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse; text-align: center; font-family: arial; font-size: 8pt;">
        <tr>
            <td colspan="3"><b>PEMERINTAH KABUPATEN TANAH BUMBU</b></td>
        </tr>
        <tr>
            <td colspan="3"><b>LAPORAN RENCANA KERJA</b></td>
        </tr>
        <tr>
            <td colspan="3"><b>TAHUN ANGGARAN 2024</b></td>
        </tr>
        <tr>
            <td width="15%">&nbsp&nbsp&nbsp&nbsp SKPD</td>
            <td width="1%">:</td>
            <td width="50%" style="text-align: left;">Kecamatan Sungai Loban</td>
        </tr>
        <tr>
            <td colspan="3">
                <br>
                <center>
                    <?php $previousNamaSub = null; ?>
                    @foreach ($realisasiBelanjaUnionSpd->groupBy('nama_sub') as $namaSub => $realisasiSub)
                        <?php $spanCount = $realisasiSub->count(); ?>
                        @if ($previousNamaSub !== $namaSub)
                            <?php
                                $totalJanuariSub = $totalFebruariSub = $totalMaretSub = $totalAprilSub = $totalMeiSub = $totalJuniSub = $totalJuliSub = $totalAgustusSub = $totalSeptemberSub = $totalOktoberSub = $totalNovemberSub = $totalDesemberSub = $totalPagu = $sisaPagu = 0;
                            ?>
                            <?php $previousNamaSub = $namaSub; ?>
                            <table border="1" cellpadding="5" style="border-collapse: collapse; border: 1px solid #000; text-align: center; width: 80%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Sub Kegiatan</th>
                                        <th rowspan="2">Rekening</th>
                                        <th rowspan="2">Komponen Belanja</th>
                                        <th rowspan="2">Anggaran</th>
                                        <th colspan="12">Realisasi Anggaran</th>
                                        <th rowspan="2">Jumlah</th>
                                        <th rowspan="2">Sisa</th>
                                    </tr>
                                    <tr>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>Mei</th>
                                        <th>Juni</th>
                                        <th>Juli</th>
                                        <th>Agt</th>
                                        <th>Sept</th>
                                        <th>Okt</th>
                                        <th>Nov</th>
                                        <th>Des</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($realisasiSub as $index => $realisasi)
                                        <?php
                                            $totalJanuariSub += $realisasi->januari_total;
                                            $totalFebruariSub += $realisasi->februari_total;
                                            $totalMaretSub += $realisasi->maret_total;
                                            $totalAprilSub += $realisasi->april_total;
                                            $totalMeiSub += $realisasi->mei_total;
                                            $totalJuniSub += $realisasi->juni_total;
                                            $totalJuliSub += $realisasi->juli_total;
                                            $totalAgustusSub += $realisasi->agustus_total;
                                            $totalSeptemberSub += $realisasi->september_total;
                                            $totalOktoberSub += $realisasi->oktober_total;
                                            $totalNovemberSub += $realisasi->november_total;
                                            $totalDesemberSub += $realisasi->desember_total;
                                            $totalPagu += $realisasi->pagu;
                                            $sisaPagu += $realisasi->sisa_pagu;
                                        ?>
                                        <tr>
                                            @if ($index === 0)
                                                <td style="text-align: left" rowspan="{{ $spanCount }}">{{ $namaSub }}</td>
                                            @endif
                                            <td style="text-align: left">{{ $realisasi->kode_rekening }} <br> {{ $realisasi->nama_rekening }}</td>
                                            <td style="text-align: left">{{ $realisasi->uraian }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->pagu) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->januari_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->februari_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->maret_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->april_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->mei_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->juni_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->juli_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->agustus_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->september_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->oktober_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->november_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->desember_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->januari_total+$realisasi->februari_total+$realisasi->maret_total+$realisasi->april_total+$realisasi->mei_total+$realisasi->juni_total+$realisasi->juli_total+$realisasi->agustus_total+$realisasi->september_total+$realisasi->oktober_total+$realisasi->november_total+$realisasi->desember_total) }}</td>
                                            <td style="text-align: right">{{ number_format($realisasi->sisa_pagu) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr style="text-align: right">
                                        <td style="text-align: center" colspan="3">Total</td>
                                        <td>{{ number_format($totalPagu) }}</td>
                                        <td>{{ number_format($totalJanuariSub) }}</td>
                                        <td>{{ number_format($totalFebruariSub) }}</td>
                                        <td>{{ number_format($totalMaretSub) }}</td>
                                        <td>{{ number_format($totalAprilSub) }}</td>
                                        <td>{{ number_format($totalMeiSub) }}</td>
                                        <td>{{ number_format($totalJuniSub) }}</td>
                                        <td>{{ number_format($totalJuliSub) }}</td>
                                        <td>{{ number_format($totalAgustusSub) }}</td>
                                        <td>{{ number_format($totalSeptemberSub) }}</td>
                                        <td>{{ number_format($totalOktoberSub) }}</td>
                                        <td>{{ number_format($totalNovemberSub) }}</td>
                                        <td>{{ number_format($totalDesemberSub) }}</td>
                                        <td>{{ number_format($totalJanuariSub + $totalFebruariSub + $totalMaretSub + $totalAprilSub + $totalMeiSub + $totalJuniSub + $totalJuliSub + $totalAgustusSub + $totalSeptemberSub + $totalOktoberSub + $totalNovemberSub + $totalDesemberSub) }}</td>
                                        <td>{{number_format($sisaPagu) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        @endif
                    @endforeach
                </center>
            </td>
        </tr>
    </table>
</body>

</html>
