<?php 
    $host_db = "localhost"; // Nombre del Host de la BD 
    $usuario_db = "root"; // Usuario de la BD 
    $clave_db = "usbw"; // Contraseña de la BD 
    $nombre_db = "apoyo"; // Nombre de la BD 
	
	
	/***************** PHP 7 *****************************/
	$con = mysqli_connect($host_db, $usuario_db, $clave_db, $nombre_db)  //Hacemos la conexion, pasamos las variables que albergan nuestros valores de sesión y los pasamos como parametros.
    or die("error de conexion");  //Seleccionamos la BD
	mysqli_set_charset($con,'utf8'); // <--- NO ES OBLIGATORIO
	
?>