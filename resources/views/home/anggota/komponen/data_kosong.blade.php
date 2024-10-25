<div class="alert alert-warning text-center">
    <strong>Tidak Ada Data</strong>
</div>

<div class="text-center">
    @if (Route::currentRouteName() === 'univ.index')
        <a href="{{ route('univ.index') }}" class="btn btn-danger mt-3">Back</a>
    @elseif (Route::currentRouteName() === 'index.bank')
        <a href="{{ route('index.bank') }}" class="btn btn-danger mt-3">Back</a>
    @elseif (Route::currentRouteName() === 'oppt.index.dosen')
        <a href="{{ route('oppt.index.dosen') }}" class="btn btn-danger mt-3">Back</a>
    @elseif (Route::currentRouteName() === 'data.dosen.belajar')
        <a href="{{ route('data.dosen.belajar') }}" class="btn btn-danger mt-3">Back</a>
    @endif
</div>
