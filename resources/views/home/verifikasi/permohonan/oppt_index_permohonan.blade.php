@extends('layouts.home.app')
@section('title', 'Data Permohonan Dosen')
@section('userTypeOnPage', 'OPPT')
@section('content')

<div class="container">
    <h1 class="mb-4">Daftar Permohonan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Permohonan</th>
                <th>Nama Dosen</th>
                <th>Status Permohonan</th>
                <th>Permohonan</th>
                <th>Tanggal Permohonan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permohonan as $item)
                <tr>
                    <td>{{ $item->id_permohonan }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->status_permohonan }}</td>
                    <td>{{ $item->permohonan }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                       <form action="{{ route('permohonan.delete', $item->id_permohonan) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
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

@endsection
