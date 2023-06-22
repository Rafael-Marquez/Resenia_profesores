<?php include("template/cabecera.php"); ?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos
?>
<body>
    <div class="container">
        <form action="registro_materia.php" method="post">
            <div class="jumbotron">
                <h1 class="display-3">Materias</h1>
                <p class="lead">Esperamos que esto te ayude a pasar la materia que deseas</p>
                <hr class="my-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Materia_">Ingresa el nombre de la materia</label>
                            <input type="text" class="form-control" id="Materia_" name="Materia_" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Descrip">Descripción</label>
                            <input type="text" class="form-control" id="Descrip" name="Descrip" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
            </div>
        </form>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Materia</th>
          <th>Descripcion</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Código PHP para mostrar los archivos en la tabla
        $result = mysqli_query($con, "SELECT * FROM materia") or die("Error en la consulta SQL");
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['Nombre_Materia'] . "</td>";
          echo "<td>" . $row['Descripcion'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <?php include("template/pie.php"); ?>
</body>
