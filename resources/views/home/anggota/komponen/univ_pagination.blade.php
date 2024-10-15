<table class="table table-striped">
    <thead>
        <tr>
            <th>ID Universitas</th>
            <th>Nama Universitas</th>
            <th>Kota</th>
            <th>Tipe</th>
            <th>Status</th>
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
                <td>{{ $uni->status ? 'Active' : 'Inactive' }}</td>
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
