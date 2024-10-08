<!-- plugins:js -->
<script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('staradmin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"></script>
<script src="{{ asset('staradmin/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>{{-- basic-table.html --}}
<script src="{{ asset('staradmin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script> {{-- assets pendaftaran --}}
<script src="{{ asset('staradmin/vendors/select2/select2.min.js') }}"></script> {{-- assets pendaftaran --}}
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
<script src="{{ asset('staradmin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('staradmin/js/template.js') }}"></script>
<script src="{{ asset('staradmin/js/settings.js') }}"></script>
<script src="{{ asset('staradmin/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('staradmin/js/dashboard.js') }}"></script>
<script src="{{ asset('staradmin/js/Chart.roundedBarCharts.js') }}"></script>
<script src="{{ asset('staradmin/js/file-upload.js') }}"></script>
<script src="{{ asset('staradmin/js/typeahead.js') }}"></script>
<script src="{{ asset('staradmin/js/select2.js') }}"></script>
<!-- End custom js for this page-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize single select box
        $('.js-example-basic-single').select2();

        // Initialize multiple select box
        $('.js-example-basic-multiple').select2();
    });
    $('.js-example-basic-single').select2({
        placeholder: 'Select a state',
        allowClear: true
    });
</script>

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 2.2 !important;
        /* Adjust line height */
        padding: 5px 10px !important;
        /* Adjust padding */
    }

    .select2-container .select2-selection--single {
        height: auto !important;
        /* Make sure the height is auto-adjusted */
        padding: 0px !important;
        /* Remove extra padding */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        /* Ensure arrow icon is vertically centered */
    }

    .select2-container--default .select2-selection--single {
        display: flex;
        align-items: center;
    }
</style>
