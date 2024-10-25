@extends('layouts.home.app')
@section('title', 'Buat Permohonan')
@section('userTypeOnPage', 'OPPT')
@section('content')

<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buat Permohonan</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                        </div>
                            @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="permohonanForm" action="{{ route('oppt.permohonan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id">Dosen</label>
                        <select class="form-control" id="id" name="id">
                        <option value="">Select Dosen</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name_baru" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name_baru" name="name_baru"
                        value="{{ old('name_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="gelar_depan_baru">Gelar Depan</label>
                        <input type="text" class="form-control" id="gelar_depan_baru" name="gelar_depan_baru" 
                        value="{{ old('gelar_depan_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="gelar_belakang_baru">Gelar Belakang</label>
                        <input type="text" class="form-control" id="gelar_belakang_baru" name="gelar_belakang_baru" 
                        value="{{ old('gelar_belakang_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir_baru">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir_baru" name="tempat_lahir_baru" 
                        value="{{ old('tempat_lahir_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir_baru">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir_baru" name="tanggal_lahir_baru" 
                        value="{{ old('tanggal_lahir_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="nidn_baru">NIDN</label>
                        <input type="text" class="form-control" id="nidn_baru" name="nidn_baru"
                        value="{{ old('nidn_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="npwp_baru">NPWP</label>
                        <input type="text" class="form-control" id="npwp_baru" name="npwp_baru" placeholder="NPWP"
                        value="{{ old('npwp_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="masa_kerja_baru">Masa Kerja</label>
                        <input type="text" class="form-control" id="masa_kerja_baru" name="masa_kerja_baru" placeholder="Masa Kerja"
                        value="{{ old('masa_kerja_baru') }}">
                    </div>

                    <!-- Bank Select -->
                    <div class="form-group">
                        <label for="id_bank">Bank</label>
                        <select class="form-control" id="id_bank_baru" name="id_bank_baru">
                            <option value="">Select bank</option>
                            @foreach($bank as $b)
                                <option value="{{ $b->id_bank }}">{{ $b->nama_bank }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_rek_baru">No Rekening</label>
                        <input type="text" class="form-control" id="no_rek_baru" name="no_rek_baru"
                        value="{{ old('no_rek_baru') }}" placeholder="No Rekening">
                    </div>

                    <div class="form-group">
                        <label for="nama_rekening_baru">Nama Rekening</label>
                        <input type="text" class="form-control" id="nama_rekening_baru" name="nama_rekening_baru"
                        value="{{ old('nama_rekening_baru') }}" placeholder="Nama Rekening">
                    </div>

                    <div class="form-group">
                        <label for="email_baru">Email</label>
                        <input type="email" class="form-control" id="email_baru" name="email_baru" placeholder="Email"
                        value="{{ old('email_baru') }}">
                    </div>

                    <div class="form-group">
                        <label for="password_baru">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_baru" name="password_baru"
                                placeholder="Password" >
                            <span class="input-group-text"
                                onclick="togglePassword('password_baru', 'togglePasswordIcon1')">
                                <i class="mdi mdi-eye" id="togglePasswordIcon1"></i> <!-- Icon mata untuk password -->
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_baru_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_baru_confirmation"
                                name="password_baru_confirmation" placeholder="Konfirmasi Password">
                            <span class="input-group-text"
                                onclick="togglePassword('password_baru_confirmation', 'togglePasswordIcon2')">
                                <i class="mdi mdi-eye" id="togglePasswordIcon2"></i>
                                <!-- Icon mata untuk konfirmasi password -->
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_universitas_baru">Universitas</label>
                        <select class="form-control" id="id_universitas_baru" name="id_universitas_baru">
                            <option value="">Pilih Universitas</option>
                            @foreach($universitas as $univ)
                                <option value="{{ $univ->id_universitas }}">{{ $univ->nama_universitas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_jabatan_fungsional_baru">Jabatan Fungsional</label>
                        <select class="form-control" id="id_jabatan_fungsional_baru" name="id_jabatan_fungsional_baru">
                        <option value="">Select Jabatan Fungsional</option>
                            @foreach($jabatanFungsional as $jabatan)
                                <option value="{{ $jabatan->id_jabatan_fungsional }}">{{ $jabatan->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_pangkat_dosen_baru">Pangkat Dosen</label>
                        <select class="form-control" id="id_pangkat_dosen_baru" name="id_pangkat_dosen_baru">
                            <option value="">Pilih Pangkat Dosen</option>
                            @foreach($pangkatDosen as $pangkat)
                                <option value="{{ $pangkat->id_pangkat_dosen }}">{{ $pangkat->nama_pangkat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ui lama -->
                    <div class="form-group">
                        <label for="file_serdos_baru">File Sertifikasi Dosen</label>
                        <input type="file" class="form-control-file" id="file_serdos_baru" name="file_serdos_baru"
                            accept=".pdf">
                    </div>

                    <div class="form-group">
                        <label for="image_baru">Foto</label>
                        <input type="file" class="form-control-file" id="image_baru" name="image_baru">
                    </div>

                    <div class="form-group">
                        <label for="lampiran_permohonan">Lampiran permohonan</label>
                        <input type="file" class="form-control-file" id="lampiran_permohonan" name="lampiran_permohonan">
                    </div>

                    <!-- <div class="form-group file-input-container">
                <label for="file_serdos_baru">File Sertifikasi Dosen</label>
                <div>
                    <input type="file" class="form-control-file" id="file_serdos_baru" name="file_serdos_baru" accept=".pdf" onchange="updateFileName('file_serdos_baru')">
                    <span class="file-name" id="file_name_serdos">Belum ada file yang dipilih</span>
                </div>
            </div>

            <div class="form-group file-input-container">
                <label for="image_baru">Foto</label>
                <div>
                    <input type="file" class="form-control-file" id="image_baru" name="image_baru" onchange="updateFileName('image_baru')">
                    <span class="file-name" id="file_name_image">Belum ada file yang dipilih</span>
                </div>
            </div>

            <div class="form-group file-input-container">
                <label for="lampiran_permohonan">Lampiran permohonan</label>
                <div>
                    <input type="file" class="form-control-file" id="lampiran_permohonan" name="lampiran_permohonan" onchange="updateFileName('lampiran_permohonan')">
                    <span class="file-name" id="file_name_lampiran">Belum ada file yang dipilih</span>
                </div>
            </div> -->

                    <!-- ui baru -->
                    <div class="form-group">
                        <label for="file_serdos_baru">File Sertifikasi Dosen</label>
                        <input type="file" class="file-upload-default" accept=".pdf" id="file_serdos_baru" name="file_serdos_baru" style="display: none;" onchange="updateFileName(this, 'file_serdos_baru_info');">
                        <div class="input-group col-xs-12">
                            <div class="form-control file-upload-info" id="file_serdos_baru_info" style="border: none; background-color: #f5f5f5;" placeholder="Upload File Sertifikasi Dosen">Upload File Sertifikasi Dosen</div>
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('file_serdos_baru').click();">Upload</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image_baru">Foto</label>
                        <input type="file" class="file-upload-default" accept="image/*" id="image_baru" name="image_baru[]" style="display: none;" onchange="updateFileName(this, 'image_baru_info');" multiple>
                        <div class="input-group col-xs-12">
                            <div class="form-control file-upload-info" id="image_baru_info" style="border: none; background-color: #f5f5f5;">Upload Foto</div>
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('image_baru').click();">Upload</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lampiran_permohonan">Lampiran Permohonan</label>
                        <input type="file" class="file-upload-default" accept=".pdf" id="lampiran_permohonan" name="lampiran_permohonan" style="display: none;" onchange="updateFileName(this, 'lampiran_permohonan_info');">
                        <div class="input-group col-xs-12">
                            <div class="form-control file-upload-info" id="lampiran_permohonan_info" style="border: none; background-color: #f5f5f5;">Upload Lampiran Permohonan</div>
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('lampiran_permohonan').click();">Upload</button>
                            </span>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="status_baru">Status</label>
                        <select class="form-control" id="status_baru" name="status_baru">
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                            <option value="pensiun">Pensiun</option>
                            <option value="belajar">Belajar</option>
                        </select>
                    </div>

                    <!-- Permohonan Description -->
                    <div class="form-group">
                        <label for="permohonan">Permohonan Description</label>
                        <textarea class="form-control" id="permohonan" name="permohonan" rows="3">{{ old('permohonan') }}</textarea>
                    </div>
                    
                    <button type="button" id="kirimPermohonanBtn" class="btn btn-primary">Kirim Permohonan</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Mengatur warna teks select secara umum */
    select {
        color: #6c757d; /* Warna abu-abu untuk placeholder */
    }

    /* Mengubah warna teks setelah ada pilihan */
    select:focus,
    select option {
        color: black; /* Warna hitam untuk semua opsi */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // Fungsi untuk memperbarui warna teks elemen select
        function updateSelectColor(select) {
            // Jika opsi yang dipilih bukan placeholder, atur warna teks menjadi hitam
            select.style.color = select.value ? 'black' : '#6c757d'; // Warna abu-abu untuk placeholder
        }

        // Fungsi untuk memperbarui nama file yang dipilih
        function updateFileName(input, targetId) {
            const fileName = input.files.length > 1 
                ? `${input.files.length} files selected` 
                : input.files[0].name;
            document.getElementById(targetId).textContent = fileName;
        }

        // Ambil semua elemen select
        const selects = document.querySelectorAll('select');
        
        // Setel warna default ketika halaman dimuat dan tambahkan event listener untuk setiap select
        selects.forEach(select => {
            updateSelectColor(select); // Set warna awal saat halaman dimuat

            // Tambahkan event listener untuk mengubah warna saat opsi dipilih
            select.addEventListener('change', function () {
                updateSelectColor(this);
            });
        });

        // Event Listener untuk tombol kirim permohonan dengan SweetAlert
        const kirimPermohonanBtn = document.getElementById('kirimPermohonanBtn');
        const permohonanForm = document.getElementById('permohonanForm');
        
        if (kirimPermohonanBtn && permohonanForm) {
            kirimPermohonanBtn.addEventListener('click', function (e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Kirim permohonan edit data dosen?',
                    text: "Apakah Anda yakin ingin mengajukan permohonan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Ajukan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form
                        permohonanForm.submit();
                        
                        // Optional: Tampilkan pesan sukses
                        Swal.fire(
                            'Terkirim!',
                            'Permohonan Anda telah berhasil diajukan.',
                            'success'
                        );
                    }
                    // Tidak perlu aksi jika "Batal" ditekan, tetap di halaman
                });
            });
        }
    });
</script>



@endsection