<?php
/*Generae 200 registros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$nombres[1] = "Jesus";
$nombres[2] = "Maria";
$nombres[3] = "luis";
$nombres[4] = "luis";

$apellidos[1] = "zuliga";
$apellidos[2] = "Matamores";
$apellidos[3] = "Caceres";
$apellidos[4] = "Salgado";
$generos[1] = "Hombre";
$generos[2] = "Mujer";
$generos[3] = "No Especificar";

include_once('conexion.php');

for ($i=1; $i<=200;$i++)
{

    $nombre  = $nombres[rand(1, 4)];
    $apellido  = $apellidos[rand(1, 4)];
    $edad     = rand(1, 67);
    $genero   = $generos[rand(1, 3)];
    $sql = "INSERT INTO usuarios (nombre,apellido,edad,genero) VALUES ('$nombre','$apellido','$edad','$genero')";

    if ($conexion->query($sql) === TRUE) {

        echo 'Registro Ingresado Correctamente'.$i."<br>";
    }


}

exit();
*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>

    <?php
    include_once('cabecera.php');
    ?>

    <pre>



    <form action="insertar.php" method="post">

        <label>Nombre</label>
        <input type="text" name='nombre'></input>

        <label>Apellido</label>
        <input type="text" name="apellido"></input>

        <label>Edad</label>
        <input type="number"  maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name='edad'></input>

        <label>Genero</label>
        <select name="genero" id="genero">
            <option value="">Selecciona</option>    
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="No Especificar">No Especificar</option>
        </select>




        <button>Enviar</button>


    </form>

    </pre>
    <?php
    include_once('conexion.php');

    ?>

</body>

</html>