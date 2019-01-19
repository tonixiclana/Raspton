<?php
echo "Subir canción al servidor";

function subir($file,$boton){
$ruta= "/home/pi/musica/".$file;
if (isset($boton)){
	if(copy($_FILES['archivo']['tmp_name'],$ruta)){
	echo "<center>La Canción a sido subida correctamente</center>";
	} else {
	echo "<center>Ha habido un problema al subir la canción</center>";
	}
} 
}

function limpiarnombre($nombre){
$cadena= $nombre;
//patrones
$exp_regular = array();
$exp_regular[0] = ' ';

//cadena nueva
$cadena_nueva = '';
//filtro los enlaces
$cadena_resultante = preg_replace($exp_regular, $cadena_nueva, $cadena);
return $cadena_resultante;
}
//formulario selección archivo

echo '<form action="subir.php" method="POST" enctype="multipart/form-data" name="form1"><input name="archivo" type="file" id="archivo"><input name="boton" type="submit" id="boton" value="Subir"></form>';
$nombrearch=$_FILES['archivo']['name'];
echo limpiarnombre($nombrearch);

?>