<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>BugTracker</title>

<link rel="stylesheet" href="css/styles.css">

</head>

<body>

<h1>Sistema de Gestión de Incidencias</h1>

<form action="guardar.php" method="POST">

<label>Título</label><br>

<input
type="text"
name="titulo"
required>

<br><br>

<label>Descripción</label><br>

<textarea
name="descripcion"
rows="5"
required></textarea>

<br><br>

<label>Prioridad</label><br>

<select name="prioridad">

<option>Alta</option>

<option>Media</option>

<option>Baja</option>

</select>

<br><br>

<label>Estado</label><br>

<select name="estado">

<option>Pendiente</option>

<option>En proceso</option>

<option>Resuelto</option>

</select>

<br><br>

<label>Fecha</label><br>

<input
type="date"
name="fecha"
required>

<br><br>

<button type="submit">

Guardar

</button>

</form>

</body>

</html>

<hr>

<h2>Listado de incidencias</h2>

<?php

$sql = "SELECT *

FROM incidencias

WHERE prioridad='Alta';";

$consulta = $conexion->prepare($sql);

$consulta->execute();

$incidencias = $consulta->fetchAll();


?>
<table border="1">

<tr>

<th>ID</th>

<th>Título</th>

<th>Descripción</th>

<th>Prioridad</th>

<th>Estado</th>

<th>Fecha</th>

<th>Acciones</th>

</tr>

<?php foreach($incidencias as $incidencia){ ?>

<tr>

<td><?= $incidencia["id"] ?></td>

<td><?= $incidencia["titulo"] ?></td>

<td><?= $incidencia["descripcion"] ?></td>

<td><?= $incidencia["prioridad"] ?></td>

<td><?= $incidencia["estado"] ?></td>

<td><?= $incidencia["fecha"] ?></td>

<td>

<a href="editar.php?id=<?= $incidencia["id"] ?>">

Editar

</a>

|

<a
href="eliminar.php?id=<?= $incidencia["id"] ?>"
onclick="return confirm('¿Eliminar incidencia?')">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</table>

