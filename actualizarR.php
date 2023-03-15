<?php

include_once('conexion.php');
//actualizar registros


$id         = $_POST['id'];
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];
$edad       = $_POST['edad'];
$genero     = $_POST['genero'];

//print_r($_POST);

$sql = "UPDATE usuarios  SET nombre     = '$nombre' , apellido   = '$apellido' ,edad       = '$edad',genero     = '$genero' WHERE    id          = '$id'";



if (
    $conexion->query($sql) === TRUE
) {
    $respuesta['ok'] = "Registro actualizado correctamente";
} else {

    $respuesta['ko'] = $conexion->error;
};

echo json_encode(array($respuesta));
$conexion->close();
exit(0);

header('Location:listar.php');
