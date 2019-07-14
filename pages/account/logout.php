
<?php
@session_start();

@session_destroy();

@session_unset();
?>
<script>
   window.location.href = "pages/account/login.php";
</script>

