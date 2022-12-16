<script src="../public/auth_assets/js/main.min.js"></script>
<script src="../public/auth_assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
<script src="../public/js/noty/noty.js"></script>
<?php include('alerts.php'); ?>
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>