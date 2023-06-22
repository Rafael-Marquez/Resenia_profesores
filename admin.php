<?php
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores ingresados por el usuario
    $usuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    // Verificar las credenciales en la base de datos
    $conexión = mysqli_connect('localhost', 'root', 'usbw', 'sesion');
    if (!$conexión) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Consulta para verificar las credenciales del usuario
    $consulta = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$contraseña'";
    $resultado = mysqli_query($conexión, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        // Credenciales válidas, iniciar sesión y redirigir al usuario a la página de inicio
        $_SESSION['usuario'] = $usuario;
        header('Location: pagina_inicio.php');
        exit();
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        $error = "Nombre de usuario o contraseña incorrectos";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexión);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="nombre">Usuario:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
