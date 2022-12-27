<!-- Vendor Js -->
<script src="../public/js/vendor.min.js"></script>
<!-- App Js -->
<script src="../public/js/app.min.js"></script>
<!-- Mojs -->
<script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
<!-- Data Tables CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.12.1/sorting/natural.js"></script>
<!-- Noty -->
<script src="../public/js/noty/noty.js"></script>
<!-- Load Alerts -->
<?php include('alerts.php'); ?>

<!-- Prevent Double Submission -->
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    /* Init Data Tables */
    $(document).ready(function() {
        $('.table').DataTable({
            responsive: true,
            order: [
                [0, 'asc']
            ],
            columnDefs: [{
                type: 'natural',
                targets: 0
            }]
        });
    });
</script>