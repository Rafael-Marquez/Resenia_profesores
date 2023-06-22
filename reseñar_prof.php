<?php include("template/cabecera.php"); ?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos
?>

<body>
    <div class="container">
        <a href="agregar_prof.php" class="btn btn-primary btn-sm mt-3">Si no ves a tu profesor, haz click aquí para agregarlo</a>
        <a href="Materias.php" class="btn btn-primary btn-sm mt-3">Si no ves una materia, haz click aquí para agregarla</a>

        <form action="registro.php" method="post" class="mt-5">
            <div class="jumbotron">
                <h1 class="display-3">Suelta todo lo que tienes</h1>
                <p class="lead">Es tu turno de ponerles un 5, así como ellos en el parcial</p>
                <hr class="my-2">
                <div class="row">
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
                        <label for="Nivel_Dificul">Nivel de dificultad</label>
                        <input type="number" name="Nivel_Dificul" id="Nivel_Dificul" class="form-control" required min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label for="Calidad_Ensenan">Calidad de enseñanza</label>
                        <input type="number" name="Calidad_Ensenan" id="Calidad_Ensenan" class="form-control" required min="0" max="100">
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
                    </div>
                    <div class="col-md-6">
                        <label for="Opinion">Opiniones</label>
                        <input type="text" name="Opinion" id="Opinion" class="form-control" maxlength="500" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="submit">Guardar</button>
            </div>
        </form>
        
        <?php include("template/pie.php"); ?>
    </div>
</body>
