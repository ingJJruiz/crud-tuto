<?php

$servidor = 'localhost';
$usuario = 'root';
$contrasena = '';
$bd = 'insertarCrud';



$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conexion->connect_error) {

    die($conexion->connect_error);
}
