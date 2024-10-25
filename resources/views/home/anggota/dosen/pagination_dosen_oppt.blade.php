    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIDN</th>
                <th>Universitas</th>
                <th>
                     <div class="dropdown">
                        <a href="#" id="statusDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: inherit;">
                            Status
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                            <li><a class="dropdown-item status-filter-option" href="#" data-status="">Semua Status</a></li>
                            <li><a class="dropdown-item status-filter-option" href="#" data-status="aktif">Aktif</a></li>
                            <li><a class="dropdown-item status-filter-option" href="#" data-status="non-aktif">Non Aktif</a></li>
                            <li><a class="dropdown-item status-filter-option" href="#" data-status="pensiun">Pensiun</a></li>
                            <li><a class="dropdown-item status-filter-option" href="#" data-status="belajar">Belajar</a></li>
                        </ul>
                    </div>
                </th>
                <th>Aksi</th>
                <th>Edit</th>
                <th>Riwayat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosen as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nidn }}</td>
                    <td>{{ $item->universitas->nama_universitas ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status == 'aktif' ? 'success' : ($item->status == 'non-aktif' ? 'danger' : ($item->status == 'pensiun' ? 'secondary' : 'warning')) }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('oppt.updateStatus.dosen', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status" class="form-select form-select-sm">
                                    <option value="aktif" {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="non-aktif" {{ $item->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                    <option value="pensiun" {{ $item->status == 'pensiun' ? 'selected' : '' }}>Pensiun</option>
                                    <option value="belajar" {{ $item->status == 'belajar' ? 'selected' : '' }}>Belajar</option>
                                </select>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('oppt.edit.dosen', $item->id) }}">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('oppt.history.dosen', $item->id) }}">
                            <button type="submit" class="btn btn-primary btn-sm">Riwayat</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{-- {{ $dosen->links() }} --}}
        {{ $dosen->appends(request()->except('page'))->links() }}
    
