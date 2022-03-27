<?php
session_start();
$user=$_POST['mail'];
$pass=$_POST['pas'];
require_once('conexion.php');
$sql="SELECT * FROM foodmenu WHERE email='$user'";
$resultado = $cn -> query($sql);
$contador=$resultado->num_rows;

if(!$resultado)
{
		echo'<script type="text/javascript">
    alert("¡Error de datos Intenta nuevamente!");
    window.location.href="login.html";
    </script>';
}
else if($contador<=0)
{
			echo'<script type="text/javascript">
    alert("¡Error de datos Intenta nuevamente!");
    window.location.href="login.html";
    </script>';
}	
else
{	
		while($row=$resultado->fetch_assoc())
		{
	
		$row["pass"];
		
			if($row ["pass"]== $pass)
			{
			header('Location:menu.php');
			$_SESSION['correo']=$row['email'];
			$_SESSION['nombre']=$row['name'];
			$_SESSION['rest']=$row['restname'];
			$_SESSION['tel']=$row['tel'];
			$_SESSION['iduser']=$row['id'];
			}
			else
			{
			echo'<script type="text/javascript">
    alert("Correo y/o contraseña incorrecta");
    window.location.href="login.html";
    </script>';
			}
		}
	
}
mysqli_close($cn);
?>