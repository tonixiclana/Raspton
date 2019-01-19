<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//Galeria musica rasptong
//Antonio Jesús Morales 
//Proyecto Asir 2014

	//funciones para los botones
function play($archivo){
		exec('bash /home/pi/www/reproductor/play.sh '.$archivo.'>/dev/null');
		
}
function stop(){
		exec('bash /home/pi/www/reproductor/stop.sh > /dev/null');
		
}
function pause(){
		exec('bash /home/pi/www/reproductor/pause.sh > /dev/null');
		
}
function subirv(){
		exec('bash /home/pi/www/reproductor/subirv.sh > /dev/null');
		
}
function bajarv(){
		exec('bash /home/pi/www/reproductor/bajarv.sh > /dev/null');
		
}

	
	//Si la variable post canción existe se reproduce
	if ($_POST['cancion'] != null){
$file=$_POST['cancion'];

	play($file);
	
} 
//Si la variable comando corresponde a algunas de las funciones de control se ejecutan
if ($_POST['comando'] == "Stop"){
	stop();
}
if ($_POST['comando'] == "Pause"){
	pause();
}
if ($_POST['comando'] == "Volumen +"){
	subirv();
}
if ($_POST['comando'] == "Volumen -"){
	bajarv();
}

//Se abre directorio de música
$directorio = opendir("/home/pi/musica"); //ruta actual

echo '<html><head></head><body><center>';
//Se muestran los botones de control
echo '<form action="reproductor.php" method="POST"><input type="submit" name="comando" value="Stop" /> <input type="submit" name="comando" value="Pause" /><input type="submit" name="comando" value="Volumen +" /><input type="submit" name="comando" value="Volumen -" /></form>';
echo "<p>------------------------------------------</p>";

//Se listas las canciones del directorio música insertándolas en un botçon para su posterior selección
echo '<form action="reproductor.php" method="POST">';
		

		

while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{

if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo."]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo '<input type="submit" name="cancion" value="'.$archivo.'"/><br />';
		echo "<p>------------------------------------------</p>";
		
    }
			
	
}
echo '</form>';




echo "</center></body></html>";
?>