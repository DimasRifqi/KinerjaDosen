<form action="{{ route('gelar-belakang.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_gelar_belakang" class="form-label">Nama Gelar Belakang</label>
        <input type="text" class="form-control" id="nama_gelar_belakang" name="nama_gelar_belakang" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
