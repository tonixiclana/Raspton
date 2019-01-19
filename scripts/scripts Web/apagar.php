<html>
<head>
</head>
<body>
<form action="#" method="POST">
<input type="image" src="botonapagado.jpg" width="100" height="75" name="apagar" value="apagar"/>
<input type="image" src="botonreset.jpg" width="100" height="75" name="reiniciar" value="reiniciar"/>

</form>
<?php
if($_POST['apagar']) {
	exec('sudo halt -n');
	} elseif($_POST['reiniciar']) {
	exec('sudo reboot');
	}
?>
</body>
</html>
