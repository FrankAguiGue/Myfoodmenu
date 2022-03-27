<?php
require_once('conexion.php');
$restnom=$_GET['menu'];
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
                <select name="CambiarFondo" id="mySelection" onchange="fondo()">
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
			</header> 
			<div>
			<p class="slogan">Menú del restaurante <?php echo $restnom ?> </p>
			<br>
			<br>
			</div>
			
    
<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div style='background: #00000057;;width: 30%;border-radius: 10px;width: 420px;margin-left: auto;margin-right: auto; margin-bottom:15px;padding-bottom: 10px;'>";
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