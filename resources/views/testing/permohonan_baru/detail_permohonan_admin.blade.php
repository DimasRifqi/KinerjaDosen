<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permohonan Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Detail Perubahan Dosen</h1>

        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>ID Permohonan</th>
                    <td>{{ $permohonan->id_permohonan }}</td>
                </tr>
                <tr>
                    <th>Nama Dosen</th>
                    <td>{{ $permohonan->user->name }}</td>
                </tr>
                <tr>
                    <th>ID Jabatan Fungsional Baru</th>
                    <td>{{ $permohonan->id_jabatan_fungsional_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>ID Universitas Baru</th>
                    <td>{{ $permohonan->id_universitas_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>ID Prodi Baru</th>
                    <td>{{ $permohonan->id_prodi_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>ID Pangkat Dosen Baru</th>
                    <td>{{ $permohonan->id_pangkat_dosen_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>ID Gelar Depan Baru</th>
                    <td>{{ $permohonan->id_gelar_depan_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>ID Gelar Belakang Baru</th>
                    <td>{{ $permohonan->id_gelar_belakang_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>ID Bank Baru</th>
                    <td>{{ $permohonan->id_bank_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Nama Baru</th>
                    <td>{{ $permohonan->name_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Awal Kerja Baru</th>
                    <td>{{ $permohonan->awal_kerja_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Nama Rekening Baru</th>
                    <td>{{ $permohonan->nama_rekening_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>No Rekening Baru</th>
                    <td>{{ $permohonan->no_rek_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>NPWP Baru</th>
                    <td>{{ $permohonan->npwp_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>NIDN Baru</th>
                    <td>{{ $permohonan->nidn_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>File Serdos</th>
                    <td>@if ($permohonan->file_serdos_baru)
                        <a href="{{ Storage::url('/' . $permohonan->file_serdos_baru) }}" download>
                            Download Serdos ({{ $permohonan->file_serdos_baru }})
                       </a>
                         @else
                                    -
                        @endif</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir Baru</th>
                    <td>{{ $permohonan->tanggal_lahir_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir Baru</th>
                    <td>{{ $permohonan->tempat_lahir_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Image Baru</th>
                    <td>
                        @if ($permohonan->image_baru)
                            <img src="{{ asset('storage/' . $permohonan->image_baru) }}" alt="Image Baru" width="150">
                        @else
                            Tidak ada gambar.
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Email Baru</th>
                    <td>{{ $permohonan->email_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Password Baru</th>
                    <td>{{ $permohonan->password_baru ?? 'tidak ada perubahan' }}</td>
                </tr>
                <tr>
                    <th>Permohonan</th>
                    <td>{{ $permohonan->permohonan }}</td>
                </tr>
                <tr>
                    <th>Status Baru</th>
                    <td>{{ ucfirst($permohonan->status_baru) }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $permohonan->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diupdate</th>
                    <td>{{ $permohonan->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Lampiran Permohonan</th>
                    <td>@if ($permohonan->lampiran_permohonan)
                        <a href="{{ Storage::url('/' . $permohonan->lampiran_permohonan) }}" download>
                            Download Lampiran ({{ $permohonan->lampiran_permohonan }})
                       </a>
                         @else
                                    -
                        @endif</td>
                </tr>
            </tbody>
        </table>

        <h1 class="mb-4">Data Dosen Lama</h1>

        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>Nama Dosen</th>
                    <td>{{ $permohonan->user->name }}</td>
                </tr>
                <tr>
                    <th> Jabatan Fungsional </th>
                    <td>{{ $permohonan->user->jabatan_fungsional->nama_jabatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Universitas </th>
                    <td>{{ $permohonan->user->universitas->nama_universitas ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Prodi </th>
                    <td>{{ $permohonan->user->prodi->nama_prodi ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Pangkat Dosen </th>
                    <td>{{ $permohonan->user->pangkat_dosen->nama_pangkat ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Gelar Depan </th>
                    <td>{{ $permohonan->user->gelar_depan->nama_gelar_depan ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Gelar Belakang </th>
                    <td>{{ $permohonan->user->gelar_belakang->nama_gelar_belakang ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Bank </th>
                    <td>{{ $permohonan->user->bank->nama_bank ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama </th>
                    <td>{{ $permohonan->user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Awal Kerja </th>
                    <td>{{ $permohonan->user->awal_kerja ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama Rekening </th>
                    <td>{{ $permohonan->user->nama_rekening ?? '-' }}</td>
                </tr>
                <tr>
                    <th> Rekening </th>
                    <td>{{ $permohonan->user->no_rek ?? '-' }}</td>
                </tr>
                <tr>
                    <th>NPWP </th>
                    <td>{{ $permohonan->user->npwp ?? '-' }}</td>
                </tr>
                <tr>
                    <th>NIDN </th>
                    <td>{{ $permohonan->user->nidn ?? '-' }}</td>
                </tr>
            <tr>
                <tr>

                </tr>
                <th>File Serdos</th>
                <td>@if ($permohonan->user->file_serdos)
                    <a href="{{ Storage::url('/' . $permohonan->user->file_serdos) }}" download>
                        Download Serdos ({{ $permohonan->user->file_serdos }})
                   </a>
                     @else
                                -
                    @endif</td>

            </tr>

                <tr>
                    <th>Tanggal Lahir </th>
                    <td>{{ $permohonan->user->tanggal_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir </th>
                    <td>{{ $permohonan->user->tempat_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Image </th>
                    <td>
                        @if ($permohonan->user->image)
                            <img src="{{ asset('storage/' . $permohonan->user->image) }}" alt="Image Baru" width="150">
                        @else
                            Tidak ada gambar.
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Email </th>
                    <td>{{ $permohonan->user->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Password </th>
                    <td>{{ $permohonan->user->password ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Permohonan</th>
                    <td>{{ $permohonan->permohonan }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucfirst($permohonan->user->status) }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $permohonan->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diupdate</th>
                    <td>{{ $permohonan->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            </tbody>
        </table>



        <a href="{{ route('admin.permohonan.index') }}" class="btn btn-primary mt-4">Kembali ke Daftar Permohonan</a>
        <form action="{{ route('admin.permohonan.update', $permohonan->id_permohonan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="pesan_admin">Pesan Admin</label>
                <textarea class="form-control" id="pesan_admin" name="pesan_admin" rows="3">{{ old('pesan_admin') }}</textarea>
            </div>
            <button class="btn btn-info" type="submit">Update data terbaru</button>
        </form>
        <form action="{{ route('admin.permohonan.tolak', $permohonan->id_permohonan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="pesan_admin">Pesan Admin</label>
                <textarea class="form-control" id="pesan_admin" name="pesan_admin" rows="3">{{ old('pesan_admin') }}</textarea>
            </div>
            <button class="btn btn-danger" type="submit">Tolak Permohonan</button>
        </form>
    </div>

</body>
</html>
