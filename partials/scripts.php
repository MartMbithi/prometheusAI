<!-- Vendor Js -->
<script src="../public/js/vendor.min.js"></script>
<!-- App Js -->
<script src="../public/js/app.min.js"></script>
<!-- Mojs -->
<script src="../public/plugins/mojs/mo.js"></script>
<!-- Noty -->
<script src="../public/js/noty/noty.js"></script>
<!-- Load Alerts -->
<?php include('alerts.php'); ?>

<!-- Prevent Double Submission -->
<script type="text/javascript">
    /* Prevent Double Submissions */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    /* Filter Products */
    function FilterFunction() {
        let input = document.getElementById('Asset_Category_Search').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('Asset_Category_Name');
        /* Perform Magic Here */
        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                x[i].style.display = "";
            }
        }
    }
    /* Automatically Update Where You At */
    $(function() {
        var current = location.pathname;
        $('#nav li a').each(function() {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($this.attr('href').indexOf(current) !== -1) {
                $this.addClass('active');
            }
        })
    })
</script>