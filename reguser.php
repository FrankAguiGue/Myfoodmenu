<?php
$nom=$_POST["name"];
$restnom=$_POST["restname"];
$tel=$_POST["tel"];
$pass=$_POST["pass"];
$mail=$_POST["email"];
require_once('conexion.php');
mysqli_query($cn,"INSERT INTO foodmenu VALUES(null,'$nom','$restnom','$tel','$pass','$mail')");
mysqli_close($cn);
header('location:indexreg.html?#registrado');

?>