<?php

///***** PRIMERO RECIBO LOS DATOS DEL FORMULARIO Y LOS GUARDO EN VARIABLES
$Profe = $_POST['Profe']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'matricula'
$Di_a = $_POST['Di_a']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'nombre'
$Hora_I = $_POST['Hora_I']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'nombre'
$Hora_S = $_POST['Hora_S']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'nombre'
$Nivel_Dificul = $_POST['Nivel_Dificul']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'paterno'
$Calidad_Ensenan = $_POST['Calidad_Ensenan']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'materno'
$Materia = $_POST['Materia']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'correo'
$Opinion = $_POST['Opinion']; // <-- guardo en una variable nueva lo que contiene el input de nombre 'correo'



//***************INSERCION EN BASE DE DATOS ***********************************************************

//________________________PHP 7 _________________________________________
 include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos
 

$reg = mysqli_query($con, "INSERT INTO resenia_profesor (Nombre_Profesor, Horario_i, Nivel_Dificultad, Calidad_Ensenanza, Nombre_Materia, Opiniones,Horario_S,DIA ) 
VALUES ('".$Profe."', '".$Hora_I."', '".$Nivel_Dificul."', '".$Calidad_Ensenan."', '".$Materia."','".$Opinion."','".$Hora_S."','".$Di_a."')"); 
    if($reg) 
		{ 
        	echo "Datos ingresados correctamente."; 
			header('Location: Profesores.php'); //REDIRECCIONA
        }
				else 
		{ 
            echo "Ha ocurrido un error y no se registraron los datos. <a href='javascript:history.back();'>Reintentar</a>"; 
        } 


 
 



?>