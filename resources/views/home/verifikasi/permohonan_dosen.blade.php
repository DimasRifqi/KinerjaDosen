@extends('layouts.home.app')
@section('title', 'Permohonan Verifikasi Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Permohonan Verifikasi Dosen</h4>
                        <p class="card-description">
                            Lorem ipsum dolor sit </p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($permohonan->isEmpty())
                            <div class="alert alert-warning">
                                Tidak ada permohonan yang tersedia.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped permohonan-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Dosen</th>
                                            <th>Universitas</th>
                                            <th>Permohonan</th>
                                            <th>Status</th>
                                            <th>Tanggal Diajukan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->user->universitas->nama_universitas ?? '-' }}</td>
                                                <!-- Asumsi ada relasi universitas -->
                                                <td>{{ $item->permohonan }}</td>
                                                <td> <span class="badge bg-{{ $item->status ? 'success' : 'warning' }}">
                                                        {{ $item->status ? 'Selesai' : 'Proses' }} </span>
                                                </td>
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('verifikator.permohonan.show', $item->id_permohonan) }}"
                                                        class="btn btn-info btn-sm">
                                                        Lanjutkan</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" 
                                                            data-id="{{ $item->id_permohonan }}"
                                                            data-name="{{ $item->user->name }}"
                                                            data-universitas="{{ $item->user->universitas->nama_universitas }}"
                                                            data-permohonan="{{ $item->permohonan }}"
                                                            data-tanggal="{{ $item->timestamps }}">
                                                        Lihat Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Detail Permohonan -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog medium-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Permohonan Verifikasi Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label>Nama Dosen</label>
                                        <input type="text" class="form-control" id="nama_dosen" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Universitas</label>
                                        <input type="text" class="form-control" id="universitas" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Permohonan</label>
                                        <input type="text" class="form-control" id="permohonan" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diajukan</label>
                                        <input type="text" class="form-control" id="tanggal" disabled>
                                    </div>
                                    <div class="form-group" id="action-buttons">
                                        <form id="updateStatusForm">
                                            @csrf
                                            <input type="hidden" id="permohonan_id" name="permohonan_id">
                                            <button type="submit" class="btn btn-success" id="btn-selesaikan">
                                                Selesaikan
                                            </button>
                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                                                Kembali
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
    .medium-modal {
        max-width: 600px;
    }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        const maxChars = 25; // Atur batas karakter di sini

        // Targetkan hanya tabel dengan kelas 'permohonan-table'
        document.querySelectorAll(".permohonan-table td:nth-child(4)").forEach((cell) => {
            if (cell.textContent.length > maxChars) {
                cell.textContent = cell.textContent.slice(0, maxChars) + "..."; // Tambahkan ellipsis
            }
        });
        
        // Ketika modal dibuka
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            
            // Ajax request untuk mendapatkan detail permohonan
            $.ajax({
                url: '{{ route('oppt.showPermohonan.dosen', '') }}/' + id,
                method: 'GET',
                success: function(response) {
                    $('#nama_dosen').val(response.user.name);
                    $('#universitas').val(response.user.universitas ? response.user.universitas.nama_universitas : '-');
                    $('#permohonan').val(response.permohonan);
                    $('#tanggal').val(moment(response.created_at).format('DD MMM YYYY'));
                    $('#permohonan_id').val(response.id_permohonan);
                    
                    // Update tombol berdasarkan status
                    if(response.status) {
                        $('#action-buttons').html(`
                            <button disabled type="button" class="btn btn-inverse-success btn-fw">
                                Terselesaikan
                            </button>
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                                Kembali
                            </button>
                        `);
                    }
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengambil data');
                }
            });
        });

        // Handle form submit untuk update status
        $('#updateStatusForm').on('submit', function(e) {
            e.preventDefault();
            
            var id = $('#permohonan_id').val();
            
            $.ajax({
                url: `/verifikator/permohonan/${id}/status`,
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#detailModal').modal('hide');
                    // Refresh halaman atau update UI
                    location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengupdate status');
                }
            });
        });
    });
    </script>
@endsection
