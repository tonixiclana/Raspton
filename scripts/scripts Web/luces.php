<html>
<head>
 <style type="text/css">
  body {
    color: green;
    text-shadow: 1px 1px 1px #2B9447;
  </style>
  </head>
<body>
<center>
<h1>LUCES</h1>
<form action="luces.php" method="POST">
<table border=0>

<?php
// este script contiene los botones que ejecutan los script para las luces de la vivienda
//Antonio Jesús morales. Iespicasso 2014
function interruptor($habitacion){
	switch($habitacion){
		case "onsalon":
			exec("sh /home/pi/gpioscripts/luces/salon.sh encender");
			break;
		case "offsalon":
			exec("sh /home/pi/gpioscripts/luces/salon.sh apagar");
			break;
		case "onexterior":
			exec("sh /home/pi/gpioscripts/luces/exterior.sh encender");
			break;
		case "offexterior":
			exec("sh /home/pi/gpioscripts/luces/exterior.sh apagar");
			break;
		case "ongaraje":
			exec("sh /home/pi/gpioscripts/luces/garaje.sh encender");
			break;
		case "offgaraje":
			exec("sh /home/pi/gpioscripts/luces/garaje.sh apagar");
			break;
			case "onvent":
			exec("sh /home/pi/gpioscripts/ventilacion/ventilador.sh encender");
			break;
		case "offvent":
			exec("sh /home/pi/gpioscripts/ventilacion/ventilador/ventilador.sh apagar");
			break;
	}
}
interruptor($_POST['luces']);

$estadosalon = exec("cat /sys/class/gpio/gpio4/value");
$estadoexterior = exec("cat /sys/class/gpio/gpio17/value");
$estadogaraje = exec("cat /sys/class/gpio/gpio18/value");
$estadovent = exec("cat /sys/class/gpio/gpio21/value");

	echo "<tr><td><h2>Ventilacion</h2><h2>Salon</h2></td><td><h2>Exterior</h2></td><td><h2>Garaje</h2><td></tr><tr>";
if($estadosalon == 0){
echo '<td><input type="image" src="luzapagada.bmp" width="100" height="75" name="luces" value="onsalon"></td>';
} else {
echo '<td><input type="image" src="luzencendida.bmp" width="100" height="75" name="luces" value="offsalon"></td>';
}

if($estadoexterior == 0){
echo '<td><input type="image" src="luzapagada.bmp" width="100" height="75" name="luces" value="onexterior"></td>';
} else {
echo '<td><input type="image" src="luzencendida.bmp" width="100" height="75" name="luces" value="offexterior"></td>';
}

if($estadogaraje == 0){
echo '<td><input type="image" src="luzapagada.bmp" width="100" height="75" name="luces" value="ongaraje"></td>';
} else {
echo '<td><input type="image" src="luzencendida.bmp" width="100" height="75" name="luces" value="offgaraje"></td>';
}

if($estadovent == 0){
echo '<td><input type="image" src="luzapagada.bmp" width="100" height="75" name="luces" value="onvent"></td>';
} else {
echo '<td><input type="image" src="luzencendida.bmp" width="100" height="75" name="luces" value="offvent"></td>';
}

echo "</tr>";
?>
</table>
</form>
</center>
</body>
</html>