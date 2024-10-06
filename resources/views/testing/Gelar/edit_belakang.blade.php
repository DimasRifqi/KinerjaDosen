<form action="{{ route('gelar-belakang.update', $gelarBelakang->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_gelar_belakang" class="form-label">Nama Gelar Belakang</label>
        <input type="text" class="form-control" id="nama_gelar_belakang" name="nama_gelar_belakang" value="{{ $gelarBelakang->nama_gelar_belakang }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="1" {{ $gelarBelakang->status == 1 ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ $gelarBelakang->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
