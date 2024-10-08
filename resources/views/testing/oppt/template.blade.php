<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lampiran Surat Pernyataan Tanggung Jawab Mutlak Pimpinan Perguruan Tinggi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </style>
</head>
<body>
    <div class="container mt-5">
        <h4 class="text-center mb-4">Lampiran II</h4>
        <p class="text-center mb-4"><u>Lampiran Surat Pernyataan Tanggung Jawab Mutlak Pimpinan Perguruan Tinggi</u></p>

        <div class="text-center mb-4">
            <strong>KOP SURAT PERGURUAN TINGGI</strong>
        </div>

        <h5 class="text-center mb-4">LAMPIRAN SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK PIMPINAN PERGURUAN TINGGI</h5>

        <h5 class="text-center mb-4">DAFTAR NAMA PENERIMA TUNJANGAN PROFESI DAN TUNJANGAN KEHORMATAN</h5>

        <h5 class="text-center mb-4">PERIODE BULAN ... TAHUN 2024 <sup>#)</sup></h5>

        <div class="table-responsive">
            <table class="table table-bordered">
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
                        @if ($item->pivot->status == 'diajukan')
                            <td>&#10004;</td> <!-- This will display a checkmark -->
                        @else
                            <td>&#10008;</td>
                        @endif                        
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

        <div class="text-end mt-4 mb-4">
            <p>................................, ........................ 2024</p>
            <p>Rektor/ Ketua/ Direktur,</p>
            <div style="height: 100px;"></div>
            <p>................................................................</p>
        </div>

        <div class="mt-4">
            <p>*) Diisi dengan nomor rekening bank milik dosen ybs yang digunakan untuk menerima transfer tunjangan profesi / tunjangan kehormatan</p>
            <p>**) Diisi dengan nama yang tercantum pada buku rekening bank yang digunakan untuk menerima transfer tunjangan profesi / tunjangan kehormatan</p>
            <p>***) Jika dosen ybs diusulkan untuk menerima tunjangan profesi / tunjangan kehormatan, centang pada kolom "Ya", jika tidak diusulkan, centang pada kolom "Tidak"</p>
            <p>****) Jika ada, diisi dengan keterangan mutasi kepegawaian yang mengakibatkan pemberhentian / pembatalan tunjangan profesi / tunjangan kehormatan atau keterangan perubahan data NPWP atau rekening bank (misalnya : meninggal TMT 15-2-2013, pindah TMT 1-3-2013, tugas belajar/BPPS/BPPDN/BPPLN/BUDI-DN/BUDI-LN TMT 1-3-2013), ganti nomor NPWP, ganti nomor rekening, dll.</p>
        </div>

        <div class="mt-4">
            <p>Catatan: lampiran SPTJM ini agar dibuat dengan menggunakan daftar nama dosen yang diperoleh dari laman 
                {{-- <a href="http://kinerjadosen.kopertis7.go.id">http://kinerjadosen.kopertis7.go.id</a> --}}
            </p>
            <p><sup>#)</sup> sesuaikan dengan periode bulan tunjangan yang diajukan pembayaran</p>
            <ul>
                <li>bulan Januari Tahun 2024</li>
                <li>bulan Februari Tahun 2024</li>
            </ul>
        </div>

        <div class="mt-4">
            <p>Agar dapat diperhatikan:</p>
            <ol type="a">
                <li>Daftar nama dosen yang tercantum pada lampiran SPTJM Pimpinan PT <u>diurutkan</u> sesuai nama dosen yang ada di dalam daftar pada laman kinerja dosen;</li>
                <li>Lampiran SPTJM Pimpinan PT dicetak <em>landscape</em> dengan font TNR ukuran 12, <em>row height</em> minimal 20 pt maksimal 25 pt;</li>
                <li>Dokumen Lampiran SPTJM Pimpinan PT yang diajukan tiap bulan pengusulan agar dipindai (<em>scan</em>) sebagai dokumen PDF berbasis OCR (<em>Optical Character Recognition</em>)</li>
            </ol>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>        .table-bordered td, .table-bordered th { border: 1px solid #dee2e6; }
</body>
</html>
