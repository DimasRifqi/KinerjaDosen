<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document with Sidebar and Footer</title>
    <style>
        /* General styling for the PDF layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            max-width: 850px;
            margin: auto;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h3 {
            border-bottom: 2px solid #900;
            margin: 0;
        }

        .header h5 {
            margin-top: 10px;
        }

        /* Sidebar section */
        .sidebar {
            float: left;
            width: 130px;
            padding-top: 20px;
        }

        .sidebar img {
            width: 100%;
        }

        .content {
            margin-left: 140px;
            padding: 10px;
            text-align: justify;
        }

        .content h5 {
            text-align: center;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        /* Table like structure for the form data */
        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 4px;
        }

        .info-table td:first-child {
            width: 150px;
            font-weight: bold;
        }

        /* Footer section */
        .footer {
            margin-top: 60px;
            padding-top: 20px;
            border-top: 2px solid #900;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            font-size: 12px;
        }

        .campus-info {
            flex: 1;
            padding: 0 10px;
            text-align: left;
        }

        .campus-info p {
            margin: 4px 0;
        }

        /* Campus title styling */
        .campus-info p:first-child {
            font-weight: bold;
            color: #900;
        }

        /* Ensure the footer stays on one line */
        .footer p {
            font-size: 12px;
        }

        /* Signature section */
        .signature-section {
            text-align: right;
            margin-top: 50px;
        }

        .signature-section img {
            height: 100px;
            display: block;
            margin-right: 10px;
        }

        .signature-section p {
            margin-top: 5px;
        }

        /* Footer logos */
        .footer-logos {
            float: left;
            width: 100px;
            text-align: center;
        }

        .footer-logos img {
            width: 90px;
            margin-bottom: 5px;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 100px;
            }

            .content {
                margin-left: 110px;
            }

            .footer .campus-info {
                display: block;
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Section -->
    <div class="sidebar">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('template/logoUM.png'))) }}" alt="Sidebar Logo">

    </div>

    <!-- Header Section -->
    <div class="header">
        <h3>UNIVERSITAS MUHAMMADIYAH MALANG</h3>
        <b style="display: block; margin-top: 10px;">SURAT PERNYATAAN KEBENARAN DAN KEASLIAN DOKUMEN</b>
    </div>


    <!-- Main Content Section -->
    <div class="content">
        <!-- Information Table -->
        <table class="info-table">
            <tr>
                <td>Nama</td>
                <td>: Dr. Nasaruddin Malik, SE., M.Si.</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Rektor</td>
            </tr>
            <tr>
                <td>Nama PTS</td>
                <td>: Universitas Muhammadiyah Malang</td>
            </tr>
            <tr>
                <td>Alamat PTS</td>
                <td>: Jl. Raya Tlogomas No. 246 Malang</td>
            </tr>
            <tr>
                <td>Nomor HP/Telp</td>
                <td>: +62 341 464 318</td>
            </tr>
        </table>

        <!-- Statement Section -->
        <p>Dengan ini menyatakan dengan sebenarnya dan sesungguhnya bahwa semua data, informasi dan dokumen yang saya
            sampaikan adalah benar dan sesuai dengan aslinya.</p>

        <p>Apabila dikemudian hari ditemukan data, informasi dan dokumen yang tidak benar dan/atau ada pemalsuan, maka
            saya
            bersedia bertanggung jawab sepenuhnya dan bersedia dikenakan sanksi yang berlaku.</p>

        <p>Demikian Surat Pernyataan ini saya buat dengan sebenarnya tanpa ada tekanan dari pihak lain dan disusun
            sebagai
            kelengkapan berkas Laporan Beban Kerja Dosen Semester <strong>Genap 2023-2024</strong>.</p>

        <!-- Signature Section -->
        <div class="signature-section" style="text-align: center;">
            <p>Malang, 14 Agustus 2024</p>
            <p>Rektor</p>
            <img src="{{ asset('template/stamp.png') }}" alt="foto TTD">
            <p>Dr. Nasaruddin Malik, SE., M.Si.</p>
        </div>

    </div>

    <!-- Footer Section -->
    <div class="footer">

        <!-- Campus Information -->
        <div class="campus-info">
            <p><strong>Kampus I:</strong></p>
            <p>Jl. Bandung 1 Malang, Jawa Timur</p>
            <p>P: +62 341 551 253 (Hunting)</p>
            <p>F: +62 341 460 435</p>
        </div>
        <div class="campus-info">
            <p><strong>Kampus II:</strong></p>
            <p>Jl. Bendungan Sutami No. 188 Malang, Jawa Timur</p>
            <p>P: +62 341 551 149 (Hunting)</p>
            <p>F: +62 341 582 060</p>
        </div>
        <div class="campus-info">
            <p><strong>Kampus III:</strong></p>
            <p>Jl. Raya Tlogomas No. 246 Malang, Jawa Timur</p>
            <p>P: +62 341 464 318 (Hunting)</p>
            <p>F: +62 341 480 435</p>
            <p>E: webmaster@umm.ac.id</p>
        </div>
    </div>
</body>

</html>
