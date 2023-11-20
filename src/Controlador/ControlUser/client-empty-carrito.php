<?php
session_start();
unset($_SESSION['carro']);
?>
<script>
    window.location = "/Vista/viewUser/vistaCarrito.php";
</script>