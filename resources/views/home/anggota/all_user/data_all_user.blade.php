@extends('layouts.home.app')
@section('title', 'Data All User')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data All User</h4>
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

                                                <a href="{{ route('admin.edit', $user->id) }}"
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
