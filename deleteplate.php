<?php
ob_start();
require_once('conexion.php');
session_start();
$restname = $_SESSION['rest'];
$nameplate=$_POST['nameplate'];
mysqli_query($cn,"DELETE FROM platillos WHERE nombrerestaurante='$restname' AND nameplate='$nameplate'");
mysqli_close($cn);
	echo'<script type="text/javascript">
    alert("Platillo borrado con éxito ");
    window.location.href="delmenu.php";
    </script>';
?>