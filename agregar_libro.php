<?php include("template/cabecera.php");?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examen</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>El conocimiento es libre</h1>
    <form action="guardar_archivos_libros.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
      </div>
      <div class="form-group">
        <label for="edicion">Edicion:</label>
        <input type="text" class="form-control" id="edicion" name="edicion" required>
      </div>
      <div class="form-group">
        <label for="editorial">Editorial:</label>
        <input type="text" class="form-control" id="editorial" name="editorial" required>
        
        <div class="col-md-6">
                        <label for="mat_eria">Ingresa una materia</label>
                        <select name="mat_eria" id="mat_eria" class="form-control">
                            <option value="">Selecciona una materia</option>
                            <?php
                            $materias = mysqli_query($con, "SELECT * FROM materia ORDER BY Nombre_Materia") or die("Error en la consulta SQL");
                            while ($row_materia = mysqli_fetch_array($materias)) {
                                echo "<option value='" . $row_materia['Nombre_Materia'] . "'>" . $row_materia['Nombre_Materia'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
      </div>
      
      <div class="form-group">
        <label for="archivo">Archivo:</label>
        <input type="file" class="form-control-file" id="archivo" name="archivo" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <?php include("template/pie.php");?>