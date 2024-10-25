@extends('layouts.home.app')
@section('title', 'Data Dosen')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Dosen</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                                    <div class="table-responsive" id="pagination-data">
                                        @if ($dosen->isEmpty())
                                            <div class="alert alert-warning text-center">
                                                <strong>Tidak Ada Data yang ditemukan</strong>
                                            </div>
                                        @else
                                            @include('home.anggota.dosen.pagination_dosen_oppt')
                                        @endif
                                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            // Setup token CSRF untuk request POST
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var currentStatus = '';

            // Saat link pagination diklik
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page, currentStatus);
            });

            $(document).on('click', '.status-filter-option', function(e) {
                // console.log();
                
                e.preventDefault();
                currentStatus = $(this).data('status');
                fetch_data(1, currentStatus);
            });

            function fetch_data(page, status = '') {
                var search = $('#search').val();                

                $.ajax({
                    url: "{{ route('oppt.index.dosen') }}?page=" + page + "&search=" + search + "&status=" +
                        status,
                    success: function(data) {
                        $('#pagination-data').html(data.html);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + xhr.responseText);
                    }
                });
            }
        });
    </script>

@endsection
