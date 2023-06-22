<?php include("template/cabecera.php"); ?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos
?>
<body>
    <div class="container">
        <form action="registro_prof.php" method="post">
            <div class="jumbotron">
                <h1 class="display-3">Califica a los prof</h1>
                <p class="lead">Esperamos que esto te ayude a pasar la materia que deseas</p>
                <hr class="my-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nombre_Prof">Ingresa el nombre del profesor</label>
                            <input type="text" class="form-control" id="Nombre_Prof" name="Nombre_Prof" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Apodo">Apodo</label>
                            <input type="text" class="form-control" id="Apodo" name="Apodo" required>
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
          <th>Nombre</th>
          <th>Apodo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Código PHP para mostrar los archivos en la tabla
        $result = mysqli_query($con, "SELECT * FROM registro_profesor") or die("Error en la consulta SQL");
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['Nombre_Profesor'] . "</td>";
          echo "<td>" . $row['Apodo_prof'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <?php include("template/pie.php"); ?>
</body>
