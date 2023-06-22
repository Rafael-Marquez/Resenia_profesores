<?php

///***** PRIMERO RECIBO LOS DATOS DEL FORMULARIO Y LOS GUARDO EN VARIABLES
$Nombre_Prof = $_POST['Nombre_Prof']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'matricula'
$Apodo = $_POST['Apodo']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'nombre'


//***************INSERCION EN BASE DE DATOS ***********************************************************

//________________________PHP 7 _________________________________________
include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos
 
 $consulta_prof=mysqli_query($con, "SELECT Nombre_Profesor FROM registro_profesor WHERE Nombre_Profesor= '$Nombre_Prof'");
 
 if (mysqli_num_rows($consulta_prof)>0)//verificxa si exiten datos
 {
	 echo"no seas wey papito, ya existe esto";
	 
 }
 else
 { 
	$reg = mysqli_query($con, "INSERT INTO registro_profesor (Nombre_Profesor, Apodo_prof) 
	VALUES ('".$Nombre_Prof."', '".$Apodo."')");

if ($reg === false) {
echo "Error en la consulta: " . mysqli_error($con);
} else {
echo "Datos ingresados correctamente.";
header('Location: agregar_prof.php');
}

 }
 
 



?>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav">
            <li class="nav-item ">
            "Ha ocurrido un error y no se registraron los datos. <a href='javascript:history.back();'>Reintentar</a>"; 
            </li>
        </ul>
    </nav>