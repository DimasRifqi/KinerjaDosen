<table class="table table-striped">
    <thead>
        <tr>
            <th>ID Universitas</th>
            <th>Nama Universitas</th>
            <th>Kota</th>
            <th>Tipe</th>
            <th>
                <div class="dropdown">
                    <a href="#" id="statusDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: inherit;">
                        Status
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                        <li><a class="dropdown-item status-filter-option" href="#" data-status="">Semua Status</a></li>
                        <li><a class="dropdown-item status-filter-option" href="#" data-status="1">Aktif</a></li>
                        <li><a class="dropdown-item status-filter-option" href="#" data-status="0">Tidak Aktif</a></li>
                    </ul>
                </div>
            </th>

            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="univ-table-body">
        @foreach ($univ as $uni)
            <tr>
                <td>{{ $univ->firstItem() + $loop->index }}</td>
                <td>{{ $uni->nama_universitas }}</td>
                <td>{{ $uni->kota ? $uni->kota->nama_kota : 'N/A' }}</td>

                <td>{{ $uni->tipe }}</td>
                <td>
                    @if($uni->status == 1)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-btn"
                        data-id="{{ $uni->id_universitas }}"
                        data-nama="{{ $uni->nama_universitas }}"
                        data-kota="{{ $uni->id_kota }}"
                        data-tipe="{{ $uni->tipe }}"
                        data-status="{{ $uni->status }}"
                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $univ->appends(request()->except('page'))->links() }}
