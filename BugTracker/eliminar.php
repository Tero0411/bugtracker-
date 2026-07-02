<?php

include("conexion.php");

$id=$_GET["id"];

$sql="DELETE

FROM incidencias

WHERE id=?";

$consulta=$conexion->prepare($sql);

$consulta->execute([$id]);

header("Location:index.php");

?>