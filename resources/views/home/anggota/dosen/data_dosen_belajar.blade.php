@extends('layouts.home.app')
@section('title', 'Data Dosen (belajar)')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form id="searchForm" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Cari berdasarkan Nama Dosen atau Universitas"
                                value="{{ request()->input('search') }}">
                            <button class="btn btn-primary text-white" type="submit">Cari / Reset</button>
                        </div>
                    </form>
                    <h4 class="card-title">Data Dosen</h4>
                    <div class="table-responsive" id="pagination-data">
                       @if ($dosen->isEmpty())
                            <div class="alert alert-warning text-center">
                                <strong>Tidak Ada Data yang ditemukan</strong>
                            </div>
                        @else
                            @include('home.anggota.dosen.pagination_dosen_belajar')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var currentStatus = '';
        var typingTimer; // Timer identifier for debounce
        var doneTypingInterval = 500; // Time delay in milliseconds (0.5 seconds)

        $('#search').on('input', function() {
            clearTimeout(typingTimer); // Clear the previous timer
            typingTimer = setTimeout(function() {
                fetch_data(1, currentStatus); // Fetch data after the delay
            }, doneTypingInterval);
        });

        $(document).on('click', '.pagination a', function(e) {            
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page, currentStatus);
        });

        function fetch_data(page, status = '') {
            var search = $('#search').val();

            $.ajax({
                url: "{{ route('data.dosen.belajar') }}?page=" + page + "&search=" + search + "&status=" +
                    status,
                success: function(data) {
                    $('#pagination-data').html(data.html);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + xhr.responseText);
                }
            });

            // console.log('fetch');
            
        }
    });
</script>

@endsection