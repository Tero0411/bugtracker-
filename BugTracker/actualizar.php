<?php
if(

empty($titulo)

||

empty($descripcion)

){

die("Todos los campos son obligatorios.");

}
include("conexion.php");

$id=$_POST["id"];

$titulo=$_POST["titulo"];

$descripcion=$_POST["descripcion"];

$prioridad=$_POST["prioridad"];

$estado=$_POST["estado"];

$fecha=$_POST["fecha"];

$sql="UPDATE incidencias

SET

titulo=?,

descripcion=?,

prioridad=?,

estado=?,

fecha=?

WHERE id=?";

$consulta=$conexion->prepare($sql);

$consulta->execute([

$titulo,

$descripcion,

$prioridad,

$estado,

$fecha,

$id

]);

header("Location:index.php");

?>