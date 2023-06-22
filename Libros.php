<?php include("template/cabecera.php"); ?>
<?php include('conexion_base_de_datos.php'); // incluimos el archivo de conexión a la Base de Datos ?>

<h2>ESIMEteca, aquí encontrarás los mejores libros para estudiar</h2>
<div class="mb-3">
    <a href="Materias.php" class="btn btn-primary btn-sm mt-3">Si no ves una materia, haz click aquí para agregarla</a>
    <a href="agregar_libro.php" class="btn btn-primary btn-sm mt-3">Ayúdanos con algún material de estudio</a>

    <form action="" method="get" class="form-inline justify-content-center">
        <label for="searchLibro" class="mr-2">Buscar por materia:</label>
        <select name="searchLibro" id="searchLibro" class="form-control mr-2">
            <option value="">Todos las materias</option>
            <?php
            $libros = mysqli_query($con, "SELECT * FROM materia ORDER BY Nombre_Materia") or die("Error en la consulta SQL");
            while ($row_libro = mysqli_fetch_array($libros)) {
                echo "<option value='" . $row_libro['Nombre_Materia'] . "'>" . $row_libro['Nombre_Materia'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Edición</th>
            <th>Editorial</th>
            <th>Nombre de Materia</th>
            <th>Archivo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Código PHP para mostrar los archivos en la tabla
        $searchLibro = isset($_GET['searchLibro']) ? $_GET['searchLibro'] : "";

        $query = "SELECT * FROM materialapoyo";
        if ($searchLibro != "") {
            $query .= " WHERE Nombre_Materia LIKE '%$searchLibro%'";
        }

        $result = mysqli_query($con, $query) or die("Error en la consulta SQL");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Nombre_Doc'] . "</td>";
            echo "<td>" . $row['Fecha_Publi'] . "</td>";
            echo "<td>" . $row['Edicion'] . "</td>";
            echo "<td>" . $row['Editorial'] . "</td>";
            echo "<td>" . $row['Nombre_Materia'] . "</td>";
            echo "<td><a href='./files_books/" . $row['archivo'] . "' target='_blank'>Ver</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php include("template/pie.php"); ?>
