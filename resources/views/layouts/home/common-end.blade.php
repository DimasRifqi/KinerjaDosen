<!-- CSS Override with Higher Specificity to resolve persistent bug of 'dot' element on sidebar -->
<style>
    /* Target the active state indicator 'dot' in the sidebar with more specificity */
    .sidebar .nav .nav-item .nav-link.active::before,
    .sidebar .nav .nav-item .nav-link[aria-expanded="true"]::before {
        display: none !important;
        /* Ensure the 'dot' is hidden */
        content: none !important;
    }
</style>

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


        //  $('#searchInput').on('input', function() {
        //     var query = $(this).val();

        //     if (query !== '') {
        //         $.ajax({
        //             url: "",
        //             method: 'GET',
        //             data: { query: query },
        //             dataType: 'json',
        //             success: function(data) {
        //                 if (data.data.length > 0) {
        //                     updateTable(data);
        //                 } else {
        //                     $('#tableKota tbody').html('<tr class="tr"><td colspan="9" class="text-center">Project tidak ditemukan</td></tr>'); // Display "No Projects Available" message
        //                 }
        //             },
        //             error: function(error) {
        //                 console.error('Error fetching search results:', error);
        //             }
        //         });
        //     }else{
        //         $.ajax({
        //             url: "{{ route('kota.index') }}",
        //             method: 'GET',
        //             data: {query: ''},
        //             dataType: 'json',
        //             success: function(data){
        //                 updateTable(data);
        //             }
        //         })
        //     }

        //     console.log(data.links);

        // });

        // function updateTable(response) {
        //     var tbody = $('.table-responsive table tbody'); // Target the new table's body
        //     tbody.empty(); // Clear the existing rows


        //     $.each(response.data, function(index, item) {
        //         var idKota = index + 1;
        //         var row = '<tr>';

        //         // Add each column based on the new table structure
        //         row += '<td>' + idKota + '</td>';  // ID Kota
        //         row += '<td>' + item.nama_kota + '</td>';  // Nama Kota

        //         // For Provinsi, since it's hardcoded to "Jawa Timur" in the Blade template, you can hardcode it here as well
        //         row += '<td>Jawa Timur</td>';

        //         // Actions: Edit button
        //         var editAction = '{{ route('kota.edit', ':id') }}';
        //         editAction = editAction.replace(':id', item.id_kota);
        //         row += '<td>';
        //         row += '<a href="' + editAction + '" class="btn btn-warning btn-sm">Edit</a>';
        //         row += '</td>';

        //         row += '</tr>';
        //         tbody.append(row); // Add the row to the table body
        //     });

        //     // Update the pagination links

        //         $('.pagination').html(response.links);  // Update the pagination links

        //     // console.log(response);

        // }

    });
</script>

<!-- Other plugin JS files (ensure they load after Bootstrap and jQuery) -->
<script src="{{ asset('staradmin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"></script>
<script src="{{ asset('staradmin/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script>

<!-- Other custom JS files -->
<script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
<script src="{{ asset('staradmin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('staradmin/js/template.js') }}"></script>
<script src="{{ asset('staradmin/js/settings.js') }}"></script>
<script src="{{ asset('staradmin/js/todolist.js') }}"></script>
<script src="{{ asset('js/register-password.js') }}"></script>
<script src="{{ asset('staradmin/js/chart.js') }}"></script>
<script src="{{ asset('staradmin/js/dashboard.js') }}"></script>
<script src="{{ asset('staradmin/js/Chart.roundedBarCharts.js') }}"></script>
