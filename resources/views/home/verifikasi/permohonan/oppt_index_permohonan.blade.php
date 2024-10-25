@extends('layouts.home.app')
@section('title', 'Data Permohonan Dosen')
@section('userTypeOnPage', 'OPPT')
@section('content')

<div class="content-wrapper">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Permohonan Edit Data Dosen</h4>
                        <p class="card-description">
                            Lorem ipsum dolor sit
                        </p>
                        <!-- Success Message -->
                        <div class="alert alert-success" style="display: none;">
                            <!-- Success message can be shown here if needed -->
                        </div>
                        <!-- Error Messages -->
                        <div class="alert alert-danger" style="display: none;">
                            <ul>
                                <li>Error example 1</li>
                                <li>Error example 2</li>
                            </ul>
                        </div>
                        <div class="alert alert-warning" style="display: none;">
                            Tidak ada permohonan yang ditemukan.
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped permohonan-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID Permohonan</th>
                                        <th class="text-center">Nama Dosen</th>
                                        <th class="text-center">Status Permohonan</th>
                                        <th class="text-center">Permohonan</th>
                                        <th class="text-center">Tanggal Permohonan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($permohonan as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id_permohonan }}</td>
                                            <td class="text-center">{{ $item->user->name }}</td>
                                            <td class="text-center">{{ $item->status_permohonan }}</td>
                                            <td class="text-center">{{ $item->permohonan }}</td>
                                            <td class="text-center">{{ $item->created_at }}</td>
                                            <td class="text-center">
                                            <form action="{{ route('permohonan.delete', $item->id_permohonan) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ">Hapus</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada permohonan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
