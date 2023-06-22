<?php

///***** PRIMERO RECIBO LOS DATOS DEL FORMULARIO Y LOS GUARDO EN VARIABLES
$Materia_ = $_POST['Materia_']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'matricula'
$Descrip = $_POST['Descrip']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'nombre'


//***************INSERCION EN BASE DE DATOS ***********************************************************

//________________________PHP 7 _________________________________________
include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos
 
 $consulta_mat=mysqli_query($con, "SELECT Nombre_Materia FROM materia WHERE Nombre_Materia= '$Materia_'");
 
 if (mysqli_num_rows($consulta_mat)>0)//verificxa si exiten datos
 {
	 echo"no seas wey papito, ya existe esto";
	 
 }
 else
 { 
	$reg = mysqli_query($con, "INSERT INTO materia (Nombre_Materia, Descripcion) 
	VALUES ('".$Materia_."', '".$Descrip."')");

if ($reg === false) {
echo "Error en la consulta: " . mysqli_error($con);
} else {
echo "Datos ingresados correctamente.";
header('Location: Materias.php');
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