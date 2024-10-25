<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>NIDN</th>
            <th>Universitas</th>
            <th>Awal Tugas Belajar</th>
            <th>Akhir Tugas Belajar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosen as $item)                                    
        <tr>
            <td>{{ $dosen->firstItem() + $loop->index }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->nidn }}</td>
            <td>{{ optional($item->universitas)->nama_universitas ?? 'No University' }}</td>
            <td>{{ $item->awal_belajar }}</td>
            <td>{{ $item->akhir_belajar }}</td>
            <td>
                <span class="badge bg-warning">{{ $item->status }}</span>
            </td>
        </tr>                               
        @endforeach
    </tbody>
</table>
{{ $dosen->appends(request()->except('page'))->links() }}
