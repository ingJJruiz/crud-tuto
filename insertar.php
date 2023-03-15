<?php
include_once('conexion.php');

$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];
$edad       = $_POST['edad'];
$genero     = $_POST['genero'];


$sql = "INSERT INTO usuarios (nombre,apellido,edad,genero)
VALUES ('$nombre','$apellido','$edad','$genero')";


if ($conexion->query($sql) === TRUE) {

    echo 'Registro Ingresado Correctamente';
} else {

    echo $conexion->error;
}


$conexion->close();

header('Location:listar.php');
