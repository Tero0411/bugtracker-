<?php

include("conexion.php");

$id = $_GET["id"];

$sql = "SELECT * FROM incidencias WHERE id=?";

$consulta = $conexion->prepare($sql);

$consulta->execute([$id]);

$incidencia = $consulta->fetch();

?>
<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Editar</title>

<link rel="stylesheet" href="css/styles.css">

</head>

<body>

<h1>Editar incidencia</h1>

<form action="actualizar.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $incidencia["id"] ?>">

<label>Título</label>

<input

type="text"

name="titulo"

value="<?= $incidencia["titulo"] ?>"

required>
<label>Descripción</label>

<textarea

name="descripcion"

required><?= $incidencia["descripcion"] ?></textarea>

<select name="prioridad">

<option
<?= $incidencia["prioridad"]=="Alta"?"selected":"" ?>>
Alta
</option>

<option
<?= $incidencia["prioridad"]=="Media"?"selected":"" ?>>
Media
</option>

<option
<?= $incidencia["prioridad"]=="Baja"?"selected":"" ?>>
Baja
</option>

</select>
<select name="estado">

<option
<?= $incidencia["estado"]=="Pendiente"?"selected":"" ?>>
Pendiente
</option>

<option
<?= $incidencia["estado"]=="En proceso"?"selected":"" ?>>
En proceso
</option>

<option
<?= $incidencia["estado"]=="Resuelto"?"selected":"" ?>>
Resuelto
</option>

</select>

<input

type="date"

name="fecha"

value="<?= $incidencia["fecha"] ?>">

<button>

Actualizar

</button>

</form>

</body>

</html>