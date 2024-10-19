<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bank</th>
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
    <tbody id="bank-table-body">
        @foreach ($bank as $bn)
            <tr>
                <td>{{ $bank->firstItem() + $loop->index }}</td>
                <td>{{ $bn->nama_bank }}</td>
                <td>
                    @if($bn->status == 1)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-btn"
                        data-id="{{ $bn->id_bank }}"
                        data-nama="{{ $bn->nama_bank }}"
                        data-status="{{ $bn->status }}"
                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $bank->appends(request()->except('page'))->links() }}
