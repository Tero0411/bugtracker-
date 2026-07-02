<?php

include("conexion.php");

$titulo = $_POST["titulo"];

$descripcion = $_POST["descripcion"];

$prioridad = $_POST["prioridad"];

$estado = $_POST["estado"];

$fecha = $_POST["fecha"];

$sql = "INSERT INTO incidencias
(titulo, descripcion, prioridad, estado, fecha)

VALUES

(?,?,?,?,?)";

$consulta = $conexion->prepare($sql);

$consulta->execute([

$titulo,

$descripcion,

$prioridad,

$estado,

$fecha

]);

header("Location:index.php");

?>