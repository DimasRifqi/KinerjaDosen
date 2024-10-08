<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lampiran Surat Pernyataan Tanggung Jawab Mutlak Pimpinan Perguruan Tinggi</title>
    <style>
        /* Orientasi landscape */
        @page {
            size: A4 landscape; /* Mengatur ukuran kertas dan orientasi */
            margin: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th[colspan="2"], th[rowspan="2"] {
            text-align: center;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 style="text-align: center; margin-bottom: 20px;">Lampiran II</h4>
        <p style="text-align: center; margin-bottom: 20px; text-decoration: underline;">Lampiran Surat Pernyataan Tanggung Jawab Mutlak Pimpinan Perguruan Tinggi</p>

        <div style="text-align: center; margin-bottom: 20px;">
            <strong>KOP SURAT PERGURUAN TINGGI</strong>
        </div>

        <h5 style="text-align: center; margin-bottom: 20px;">LAMPIRAN SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK PIMPINAN PERGURUAN TINGGI</h5>
        <h5 style="text-align: center; margin-bottom: 20px;">DAFTAR NAMA PENERIMA TUNJANGAN PROFESI DAN TUNJANGAN KEHORMATAN</h5>
        <h5 style="text-align: center; margin-bottom: 20px;">PERIODE BULAN ... TAHUN 2024 <sup>#)</sup></h5>

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nomor Sertifikat</th>
                        <th rowspan="2">Nama Dosen</th>
                        <th rowspan="2">NPWP</th>
                        <th colspan="2">Rekening</th>
                        <th colspan="2">Diusulkan</th>
                        <th>Keterangan</th>
                    </tr>

                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Ya</th>
                        <th>Tidak</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($pengajuan->user as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->npwp }}</td>
                        <td>{{ $item->no_rek }}</td>
                        <td>**)</td>
                        <td style="text-align: center;">
                            @if ($item->pivot->status == 'diajukan')
                                &#10004;
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($item->pivot->status != 'diajukan')
                                &#10008;
                            @endif
                        </td>
                        <td>****)</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6"><strong>Jumlah (--harus ada--)</strong></td>
                        <td><strong>{{ $jumlah }}</strong></td>
                        <td><strong>?</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>................................, ........................ 2024</p>
            <p>Rektor/ Ketua/ Direktur,</p>
            <div style="height: 100px;"></div>
            <p>................................................................</p>
        </div>
    </div>
</body>
</html>
