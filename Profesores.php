<?php include("template/cabecera.php"); ?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos ?>

<body>
    <div class="container">
        <a href="reseñar_prof.php" class="btn btn-primary btn-sm mt-3">Es tu turno de calificarlos</a>

        <div class="jumbotron">
            <h1 class="display-3">Observa bien con quien inscribirlas</h1>
            <p class="lead">Sabemos que hay unos peores que otros...</p>
            <hr class="my-2">

            <div class="container">
                <h1 class="text-center">Reseñas de Profesores</h1>
                <div class="mb-3">
                    <form method="get" class="form-inline justify-content-center">
                        <label for="searchProfesor" class="mr-2">Buscar por profesor:</label>
                        <select name="searchProfesor" id="searchProfesor" class="form-control mr-2">
                            <option value="">Todos los profesores</option>
                            <?php
                            $profesores = mysqli_query($con, "SELECT * FROM registro_profesor ORDER BY Nombre_Profesor") or die("Error en la consulta SQL");
                            while ($row_profesor = mysqli_fetch_array($profesores)) {
                                echo "<option value='" . $row_profesor['Nombre_Profesor'] . "'>" . $row_profesor['Nombre_Profesor'] . "</option>";
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Profesor</th>
                            <th scope="col">Dificultad</th>
                            <th scope="col">Calidad</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Opiniones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $searchProfesor = isset($_GET['searchProfesor']) ? $_GET['searchProfesor'] : "";

                        $query = "SELECT * FROM resenia_profesor";
                        if ($searchProfesor != "") {
                            $query .= " WHERE Nombre_Profesor LIKE '%$searchProfesor%'";
                        }

                        $result = mysqli_query($con, $query) or die("Error en la consulta sql");
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                <td>" . $row['Nombre_Profesor'] . "</td>
                                <td>" . $row['Nivel_Dificultad'] . "</td>
                                <td>" . $row['Calidad_Ensenanza'] . "</td>
                                <td>" . $row['Nombre_Materia'] . "</td>
                                <td>" . $row['Opiniones'] . "</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include("template/pie.php"); ?>
    </div>
</body>
