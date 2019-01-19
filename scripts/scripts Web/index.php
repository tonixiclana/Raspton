<html>
<head>
 <style type="text/css">
 
	body{
	margin: 0 0 0 0;
	background-color: white;
	}
	
	h1 {
	text-align:center;
	background-color: #20E887;
	height: 5%;
	padding-top: 2%;
	color: #0B7FFB; 
	}
	
	h2 {
	text-align: left;
	}
	
	input {
		width: 10%;
		height: auto;
		
	}
	#puerta input {
		width: 20%;
		height: auto;
	}
	
	#alarma input {
		width: 20%;
		height: auto;
	}
	
	#lye {
	width: 100%;
	height: 35%;
	padding-top: 2%;
	position: absolute;
	text-align:center;
	background-color: #0B7FFB;
	color: #20E887;
	font-size: 100%;
	}
	#puerta {
	top: 42%;
	width: 50%;
	height: 35%;
	padding-top: 2%;
	text-align:center;
	position: absolute;
	background-color: #20E887;
	font-size: 100%;
	color: #0B7FFB;
	
	}
	
	#alarma {
	top: 42%;
	width: 50%;
	left: 50%;
	height: 35%;
	padding-top: 2%;
	text-align:center;
	position: absolute;
	background-color: #20E887;
	font-size: 150%;
	color: #0B7FFB;
	
	}
	#apagar {
	top: 70%;
	width: 100%;
	height: 25%;
	padding-top: 2%;
	text-align:center;
	position: absolute;
	background-color: #0B7FFB;
	}
  </style>
  </head>
<body>
<h1><b>RASPTON</b></h1>

<form action="index.php" method="POST">


<?php
// este script contiene los botones que ejecutan los script para las luces de la vivienda
//Antonio Jesús morales. Iespicasso 2014
function interruptor($habitacion){
	switch($habitacion){
		case "onsalon":
			exec("sh /home/pi/gpioscripts/luces/arduino_salon.sh encender");
			break;
		case "offsalon":
			exec("sh /home/pi/gpioscripts/luces/arduino_salon.sh apagar");
			break;
		case "onexterior":
			exec("sh /home/pi/gpioscripts/luces/arduino_exterior.sh encender");
			break;
		case "offexterior":
			exec("sh /home/pi/gpioscripts/luces/arduino_exterior.sh apagar");
			break;
		case "ongaraje":
			exec("sh /home/pi/gpioscripts/luces/arduino_garaje.sh encender");
			break;
		case "offgaraje":
			exec("sh /home/pi/gpioscripts/luces/arduino_garaje.sh apagar");
			break;
		case "onvent":
			exec("sh /home/pi/gpioscripts/ventilacion/arduino_ventilador.sh encender");
		break;
		case "offvent":
			exec("sh /home/pi/gpioscripts/ventilacion/arduino_ventilador.sh apagar");
		break;
		case "updoor":
			exec("sh /home/pi/gpioscripts/motor/arduino_motor.sh up");
		break;
		case "downdoor":
			exec("sh /home/pi/gpioscripts/motor/arduino_motor.sh down");
		break;
		case "stopdoor":
			exec("sh /home/pi/gpioscripts/motor/arduino_motor.sh off");
		break;
		case "apagarequipo":
			exec('sudo halt -n');
		break;
		case "reiniciarequipo":
			exec('sudo reboot');
		break;
		case "onalarma":
			exec('sh /home/pi/alarma/start_alarm.sh >/dev/null &');
		break;
		case "offalarma":
			exec('echo 0 > /home/pi/alarma/interruptor');
		break;
	}
}
	

interruptor($_POST['luces']);

$estadosalon = exec("cat /home/pi/gpioscripts/luces/estado_salon");
$estadoexterior = exec("cat /home/pi/gpioscripts/luces/estado_exterior");
$estadogaraje = exec("cat /home/pi/gpioscripts/luces/estado_garaje");
$estadovent = exec("cat /home/pi/gpioscripts/ventilacion/estado_ventilador");
$estadoalarma = exec('cat /home/pi/alarma/interruptor');


echo "<div id='lye'>";
	echo "Luz Salon";
if($estadosalon == 0){
echo '<input type="image" src="luzapagada.png"  name="luces" value="onsalon">';
} else {
echo '<input type="image" src="luzencendida.png" width="10%" name="luces" value="offsalon">';
}
	echo "Luz Exterior";
if($estadoexterior == 0){
echo '<input type="image" src="luzapagada.png" width="10%" name="luces" value="onexterior">';
} else {
echo '<input type="image" src="luzencendida.png" width="10%" name="luces" value="offexterior">';
}
echo "Enchufe";
if($estadovent == 0){
echo '<input type="image" src="luzapagada.png" width="10%"  name="luces" value="onvent">';
} else {
echo '<input type="image" src="luzencendida.png" width="10%" name="luces" value="offvent">';
}

echo "Luz garaje";
if($estadogaraje == 0){
echo '<input type="image" src="luzapagada.png" width="10%"  name="luces" value="ongaraje">'; 
} else {
echo '<input type="image" src="luzencendida.png" width="10%" name="luces" value="offgaraje">';
}

echo "</div>";

echo "<div id='puerta'>";
echo "Garaje arriba";
echo '<input type="image" src="boton_arriba.png" width="10%" name="luces" value="updoor">';

echo "Garaje abajo";
echo '<input type="image" src="boton_abajo.png" width="10%" name="luces" value="downdoor">';

echo "Parar garaje";
echo '<input type="image" src="stop.png" width="10%" name="luces" value="stopdoor"></div>';

echo "<div id='alarma'>";

echo "Alarma";
if($estadoalarma == 0){
echo '<input type="image" src="luzapagada.png" width="10%" name="luces" value="onalarma">';
} else {
echo '<input type="image" src="luzencendida.png" width="10%" name="luces" value="offalarma">';
}
echo "</div>";

echo "<div id='apagar'>";
echo '<input type="image" src="botonapagado.png" width="10%" name="luces" value="apagarequipo"/>';
echo '<input type="image" src="botonreset.png" width="10%" name="luces" value="reiniciarequipo"/></div>';

?>
</form>

</body>
</html>