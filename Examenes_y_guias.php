<?php include("template/cabecera.php"); ?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos ?>

<h2>Nada mejor que adelantarse a lo que viene...</h2>
<div class="mb-3">
    <a href="Materias.php" class="btn btn-primary btn-sm mt-3">Si no ves una materia, haz click aquí para agregarla</a>
    <a href="Agregar_Examen.php" class="btn btn-primary btn-sm mt-3">Ayúdanos con algún material de estudio</a>

    <form action="" method="get" class="form-inline justify-content-center">
        <label for="searchExa" class="mr-2">Buscar por materia:</label>
        <select name="searchExa" id="searchExa" class="form-control mr-2">
            <option value="">Todos las materias</option>
            <?php
            $materias = mysqli_query($con, "SELECT * FROM materia ORDER BY Nombre_Materia") or die("Error en la consulta SQL");
            while ($row_materia = mysqli_fetch_array($materias)) {
                echo "<option value='" . $row_materia['Nombre_Materia'] . "'>" . $row_materia['Nombre_Materia'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Profesor</th>
            <th>Materia</th>
            <th>Fecha de aplicación</th>
            <th>Tipo de examen</th>
            <th>Archivo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Código PHP para mostrar los archivos en la tabla
        $searchExa = isset($_GET['searchExa']) ? $_GET['searchExa'] : "";

        $query = "SELECT * FROM examen";
        if ($searchExa != "") {
            $query .= " WHERE Nombre_Materia LIKE '%$searchExa%'";
        }

        $result = mysqli_query($con, $query) or die("Error en la consulta SQL");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Nombre_Profesor'] . "</td>";
            echo "<td>" . $row['Nombre_Materia'] . "</td>";
            echo "<td>" . $row['Fecha_Publicacion'] . "</td>";
            echo "<td>" . $row['Tipo_Examen'] . "</td>";
            echo "<td><a href='./files_examen/" . $row['archivo'] . "' target='_blank'>Ver</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php include("template/pie.php"); ?>
