<?php

include_once('conexion.php');
//actualizar registros


$id         = $_POST['id'];
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];
$edad       = $_POST['edad'];
$genero     = $_POST['genero'];

//print_r($_POST);

$sql = "delete FROM usuarios  where  nombre     = '$nombre' and  apellido   = '$apellido'  and edad       = '$edad' and genero     = '$genero' and   id          = '$id'";





if (
    $conexion->query($sql) === TRUE
) {
    $respuesta['ok'] = "Registro Eliminado correctamente";
} else {

    $respuesta['ko'] = $conexion->error;
};

echo json_encode(array($respuesta));
$conexion->close();
exit(0);

header('Location:listar.php');
