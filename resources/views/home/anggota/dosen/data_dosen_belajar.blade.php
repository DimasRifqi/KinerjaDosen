@extends('layouts.home.app')
@section('title', 'Data Dosen (belajar)')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Dosen</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NIDN</th>
                                    <th>Universitas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>john.doe@example.com</td>
                                    <td>0123456789</td>
                                    <td>Universitas 17 Agustus 1945 Banyuwangi</td>
                                    <td>
                                        <span class="badge bg-warning">Belajar</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>jane.smith@example.com</td>
                                    <td>0987612345</td>
                                    <td>Universitas 17 Agustus 1945 Banyuwangi</td>
                                    <td>
                                        <span class="badge bg-warning">Belajar</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Alice Johnson</td>
                                    <td>alice.johnson@example.com</td>
                                    <td>6543210987</td>
                                    <td>Universitas 17 Agustus 1945 Banyuwangi</td>
                                    <td>
                                        <span class="badge bg-warning">Belajar</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection