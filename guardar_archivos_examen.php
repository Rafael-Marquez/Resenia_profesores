<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "apoyo";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer el juego de caracteres de la conexión
$conn->set_charset("utf8");

// Ruta donde se guardarán los archivos subidos
$uploadPath = "./files_examen/"; 

// Obtener los datos del formulario
$Profe = $_POST['Profe'];
$Materia = $_POST['Materia'];
$fecha = $_POST['fecha'];
$Tipo = $_POST['Tipo'];

// Comprobar si se ha enviado un archivo
if (isset($_FILES['archivo'])) {
    $file = $_FILES['archivo'];

    // Obtener el nombre y la extensión del archivo
    $fileName = $file['name'];
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    // Generar un nombre único para el archivo
    $uniqueName = uniqid() . '.' . $fileExt;

    // Mover el archivo a la ubicación deseada
    $destination = $uploadPath . $uniqueName;
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO examen (Nombre_Profesor, Nombre_Materia, Fecha_Publicacion, Tipo_Examen, archivo)
                VALUES ('$Profe', '$Materia', '$fecha', '$Tipo', '$uniqueName')";

        if ($conn->query($sql) === true) {
            echo "El archivo se ha subido correctamente.";
            header('Location: Examenes_y_guias.php');
        } else {
            echo "Error al subir el archivo: " . $conn->error;
        }
    } else {
        echo "Error al mover el archivo.";
    }
}
?>