<?php
session_start();

if(isset($_POST["submit"])){
    
        $image = $_FILES['image']['name'];
        $target = "img/".basename($image);
        $archivos_disp_ar = array('jpg', 'jpeg', 'png');

$restnom=$_SESSION['rest'];
$nombreplatillo=$_POST["nombreplatillo"];
$desc=$_POST["desc"];
$precio=$_POST["precio"];

$array_nombre = explode('.',$image);
$cuenta_arr_nombre = count($array_nombre);
$extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
//verifica el tamaño del archivo
$tamano= $_FILES['image']['size'];
if($tamano > 1000000 and $archivos_disp_ar==true)
//validamos la extension
  if(!in_array($extension, $archivos_disp_ar)){
  }else{
   echo'<script type="text/javascript">
alert("Este tipo de archivo no es permitido o es de mayor tamaño");
window.location.href="editmenu.php";
</script>'; $error = "error"; }

if(empty($error)){
    //vemos si tenemos el mismo platillo creado
require_once('conexion.php');
$sql="SELECT * FROM platillos WHERE nombrerestaurante='$restnom' AND nameplate='$nombreplatillo'";
$resultado = $cn -> query($sql);
$contador=$resultado->num_rows;
//Si el contador es 0 quiere decir que no tenemos duplicados yeeiii y procedemos a subir el platillo.
if($contador<=0)
{

}	
else{
while($row=$resultado->fetch_assoc())
		{
	
		$row["nameplate"];
		
			if($row ["nameplate"]== $nombreplatillo)
			{
			        mysqli_close($cn);
	echo'<script type="text/javascript">
    alert("Este platillo ya existe, intenta con otro nombre");
    window.location.href="editmenu.php";
    </script>';

			}
			else
			{
			}
}	
			}
mysqli_query($cn,"INSERT INTO platillos VALUES(null,'$restnom','$image','$nombreplatillo','$desc','$precio')");
mysqli_close($cn);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  	echo'<script type="text/javascript">
alert("¡Platillo creado con exito!");
window.location.href="editmenu.php";
</script>';
  	}else{
  		echo'<script type="text/javascript">
    alert("Por favor carga una imagen para el platillo, recuerda una imagen vale más que mil palabras");
    window.location.href="editmenu.php";
    </script>';
  	}}
		



}else{
        	echo'<script type="text/javascript">
    alert("Por favor carga una imagen para el platillo, recuerda una imagen vale más que mil palabras");
    window.location.href="editmenu.php";
    </script>';
    }

?>