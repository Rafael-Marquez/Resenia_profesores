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
$uploadPath = "./files_books/"; // Reemplaza con la ruta real

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$edicion = $_POST['edicion'];
$editorial = $_POST['editorial'];
$mat_eria = $_POST['mat_eria'];

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
        $sql = "INSERT INTO materialapoyo (Nombre_Doc, Fecha_Publi, Edicion, Editorial, Nombre_Materia, archivo)
                VALUES ('$nombre', '$fecha', '$edicion', '$editorial', '$mat_eria', '$uniqueName')";

        if ($conn->query($sql) === true) {
            echo "El archivo se ha subido .";
            header('Location: Libros.php');

        } else {
            echo "Error al subir el archivo: " . $conn->error;
        }
    } else {
        echo "Error al mover el archivo.";
    }
}

// Cerrar la conexión
$conn->close();
?>
