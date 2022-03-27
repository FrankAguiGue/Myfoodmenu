<?php
session_start();
require_once('conexion.php');
if(!isset ($_SESSION['iduser']) )
{
	header ('Location:index.html');
}

$restnom=$_SESSION['rest'];
$result = mysqli_query($cn, "SELECT * FROM platillos WHERE nombrerestaurante='$restnom'");
?>

<html lang="es">
		<head>
        <style>
            .col{
  float: left;
  margin: 1px;
  padding: 10px;
  width:25%;
}
        </style>
		<link rel="icon" type="image/png" href="img/icon.png" sizes="96x96">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta charset="UTF-8"> 

		<title>MyFoodMenu</title> 
		<link rel="stylesheet" href="css/estilo2.css"> 
		</head>
		<body id="captura">
			<header>
			<form class="menu">
                <select  name="CambiarFondo" id="mySelection" onchange="fondo()">
                       <option value="img/fondo2.jpg">Fondo 1
                           </option><option value="img/fondo4.jpg">Fondo 2
                               </option><option value="img/fondo3.jpg">Fondo 3
                                   </option></select>
            </form>
            <script>
            function fondo(){
                var seleccionar = document.getElementById("mySelection").value;
                document.getElementById("captura").style.backgroundImage = "url(' "+ seleccionar+"')";
            }
            </script>
			<img class="logo" src="img/logo3.png">
			<a id="salirse" href="logout.php"><img class="salir" src="img/salir.png"></a>
			</header> 
			<div>
			<p class="slogan">Editor de menú v0.2 Alpha</p>
			<p class="slogan">¡Bienvenido <?php echo $_SESSION['nombre'] ?>! </p>
			<p class="slogan">Restaurante <?php echo $_SESSION['rest'] ?> </p>
			<br>
			<p class="slogan">¿Qué desea hacer?</p>
			<br>
    <p class="slogan"><a class="opciones" href="https://franciscoproyectos.000webhostapp.com/MyFoodMenu/editmenu.php">Agregar platillo ☕</a></p>
    <p class="slogan"><a class="opciones" href="https://franciscoproyectos.000webhostapp.com/MyFoodMenu/delmenu.php">Borrar un platillo ❌</a></p>
			</div>
    <p class="slogan"><a class="opciones" href="https://franciscoproyectos.000webhostapp.com/MyFoodMenu/viewmenu.php?menu=<?php echo $_SESSION['rest'] ?>" target="_blank">Ver el link de mi menú 📎</a></p>
    <p class="slogan" style="font-size:18px;">Nota: Recuerda compartir el link de tu menu<p>
    
    <br>
    <br>
    <p class="slogan">Platillos agregados 🍴</p>
    <br>
<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div style='background: #00000057;width: 30%;border-radius: 10px;width: 410px;margin-left: auto;margin-right: auto; margin-bottom:15px;padding-bottom: 10px;'>";
      	echo "<img src='img/".$row['image']."'width='230' heigth='220' style='
    display: block;
    margin: auto;
    border-radius: 20px;
    padding-top: 10px;
'>";
      	echo "<p class='slogan'>".$row['nameplate']."</p>";
      	echo "<p class='slogan'>".$row['descplate']."</p>";
      	echo "<p class='slogan'>$".$row['priceplate']."</p>";
      echo "</div>";
    }
  ?>
			
			
		</body>
</html> 