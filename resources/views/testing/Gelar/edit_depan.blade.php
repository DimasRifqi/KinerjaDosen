<form action="{{ route('gelar-depan.update', $gelarDepan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_gelar_depan" class="form-label">Nama Gelar Depan</label>
        <input type="text" class="form-control" id="nama_gelar_depan" name="nama_gelar_depan" value="{{ $gelarDepan->nama_gelar_depan }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="1" {{ $gelarDepan->status == 1 ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ $gelarDepan->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
