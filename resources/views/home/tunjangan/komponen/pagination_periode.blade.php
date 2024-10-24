<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Periode</th>
            <th>Tipe Periode</th>
            <th>Masa Periode Awal</th>
            <th>Masa Periode Berakhir</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($periodes as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->nama_periode }}</td>
                <td>
                    @if ($item->tipe_periode == 1)
                        <span class="badge bg-info">Bulanan</span>
                    @else
                        <span class="badge bg-success">Semester</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($item->masa_periode_awal)->translatedFormat('d F Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->masa_periode_berakhir)->translatedFormat('d F Y') }}</td>
                <td>
                    @if ($item->status == 1)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm edit-btn text-white"
                        data-id="{{ $item->id_periode }}" data-nama_periode="{{ $item->nama_periode }}"
                        data-tipe_periode="{{ $item->tipe_periode }}"
                        data-masa_periode_awal="{{ $item->masa_periode_awal }}"
                        data-masa_periode_berakhir="{{ $item->masa_periode_berakhir }}"
                        data-status="{{ $item->status }}" data-bs-toggle="modal"
                        data-bs-target="#editModal">Edit</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination-links">
    {{ $periodes->links() }}
</div>
