<!-- Ensure jQuery is loaded first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js for Bootstrap tooltips -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- Only include one version of Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

<!-- Or, if using the local version, comment out the CDN and use this -->
<!-- <script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script> -->

<!-- Initialize Tooltip after ensuring jQuery and Bootstrap are loaded -->
<script type="text/javascript">
    $(document).ready(function() {
        // Initialize Select2
        $('.js-example-basic-single').select2({
            placeholder: 'Mohon Pilih',
            allowClear: true
        });

        $('.js-example-basic-multiple').select2({
            placeholder: 'Mohon Pilih',
            allowClear: true
        });

        // Initialize Bootstrap tooltip
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

<!-- Other plugin JS files (ensure they load after Bootstrap and jQuery) -->
<script src="{{ asset('staradmin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"></script>
<script src="{{ asset('staradmin/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/select2/select2.min.js') }}"></script>

<!-- Other custom JS files -->
<script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
<script src="{{ asset('staradmin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('staradmin/js/template.js') }}"></script>
<script src="{{ asset('staradmin/js/settings.js') }}"></script>
<script src="{{ asset('staradmin/js/todolist.js') }}"></script>
<script src="{{ asset('js/register-password.js') }}"></script>
