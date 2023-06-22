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
    <h1>Examenes</h1>
    <form action="guardar_archivos_examen.php" method="post" enctype="multipart/form-data">

                    <div class="col-md-6">
                        <label for="Profe">Ingresa nombre de tu profesor</label>
                        <select name="Profe" id="Profe" class="form-control">
                            <option value="">Selecciona un profesor</option>
                            <?php
                            $profesores = mysqli_query($con, "SELECT * FROM registro_profesor ORDER BY Nombre_Profesor") or die("Error en la consulta SQL");
                            while ($row_profesor = mysqli_fetch_array($profesores)) {
                                echo "<option value='" . $row_profesor['Nombre_Profesor'] . "'>" . $row_profesor['Nombre_Profesor'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="Materia">Ingresa una materia</label>
                        <select name="Materia" id="Materia" class="form-control">
                            <option value="">Selecciona una materia</option>
                            <?php
                            $materias = mysqli_query($con, "SELECT * FROM materia ORDER BY Nombre_Materia") or die("Error en la consulta SQL");
                            while ($row_materia = mysqli_fetch_array($materias)) {
                                echo "<option value='" . $row_materia['Nombre_Materia'] . "'>" . $row_materia['Nombre_Materia'] . "</option>";
                            }
                            ?>
                        </select>
      <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
      </div>
      <div class="col-md-6">
                        <label for="Tipo">Tipo de examen</label>
                        <select name="Tipo" id="Tipo" class="form-control">
                            <option value="">Selecciona un tipo</option>
                            <?php
                                echo "<option value='Ordinario'>Ordinario</option>";
                                echo "<option value='Extraordinario'>Extraordinario</option>";
                                echo "<option value='ETS'>ETS</option>";
                                echo "<option value='ETS extraordinario'>ETS extraordinario</option>";
                            ?>
                        </select>
                    </div>
      <div class="form-group">
        <label for="archivo">Archivo:</label>
        <input type="file" class="form-control-file" id="archivo" name="archivo" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <?php include("template/pie.php");?>