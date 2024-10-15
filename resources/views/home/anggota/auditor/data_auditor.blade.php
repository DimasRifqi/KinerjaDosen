@extends('layouts.home.app')
@section('title', 'Data Auditor')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Auditor</h4>
                        <p class="card-description">
                            Lorem ipsum dolor sit </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Peran
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($admin as $index => $user)
                                        <tr>
                                            <td class="py-1"> {{ $index + 1 }} </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role->nama_role }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <!-- Tombol Edit yang mengarah ke halaman edit -->
                                                <a href="{{ route('oppt.edit.dosen', $user->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No user found</td>
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
@endsection
