<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>

<table id="example" class="display nowrap" border="1" style="width:100%">
<thead>
    <tr>
        <td>
            ID
        </td>    
        <td>
            Nombre 
        </td>
        <td>
            Apellido
        </td>   
        <td>
            Edad 
        </td>
        <td>
            Genero
        </td>
        <td>
            Acción
        </td>
    </tr>
</thead>


    <?php

    include_once('cabecera.php');
    include_once('conexion.php');

    
    $sql = "SELECT  * FROM usuarios";
    $resultado = $conexion->query($sql);


    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {

            /*
            echo "<form action=actualizarR.php method='post'><input type='text' readonly name='id' value='" . $fila['id'] . "'>";

            echo "<input type='text' name='nombre' value='" . $fila['nombre'] . "'>";

            echo "<input type='text' name='apellido' value='" . $fila['apellido'] . "'>";

            echo "<button>Enviar</button></form><hr>";
            */
            $selecH ="";
            $selecM ="";
            $selecN ="";
            switch ($fila['genero']){
                case "Hombre":
                    $selecH =   "selected='selected'";
                break;
                case "Mujer":
                    $selecM =   "selected='selected'";
                break;
                case "No Especificar":
                    $selecN =   "selected='selected'";
                break;
            }
            echo "<tr>
            <td> <input type='text' readonly id='id_".$fila['id']."'         name='id'        value='" . $fila['id'] . " '></td>
            <td> <input type='text' readonly id='nombre_".$fila['id']."'      name='nombre'   value='" . $fila['nombre'] . "'></td>
            <td> <input type='text' readonly id='apellido_".$fila['id']."'    name='apellido' value='" . $fila['apellido'] . "'></td>
            <td> <input type='number' readonly  maxlength='9' onKeypress='if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;'  id='edad_".$fila['id']."'        name='edad'   value='" . $fila['edad'] . "'> </td>
            <td> <select name='genero' disabled='true'  id='genero_".$fila['id']."'><option ".$selecH." value='Hombre'>Hombre</option><option ".$selecM." value='Mujer'>Mujer</option><option ".$selecN." value='No Especificar'>No Especificar</option></select></td>
            <td> <button onclick='elimiar(".$fila['id'].")'>Eliminar</button></td>
            </tr>";



            


            /*    echo $fila['id'] . " " . $fila['nombre'] . " " . $fila['apellido'] . "<hr>";   */
        }
    } else {
        echo "Sin registros encontrados en la base de datos";
    }






    ?>
</table>

    </body>
    <script>




        function elimiar(idRow){
            
            var nombre      = $("#nombre_"+idRow).val();
            var apellido    = $("#apellido_"+idRow).val();
            var edad        = $("#edad_"+idRow).val();
            var genero      = $("#genero_"+idRow).val();

            var postForm = { //Fetch form data
                'id'        : idRow,
                'nombre'    : nombre,
                'apellido'  : apellido,
                'edad'      : edad,
                'genero'    : genero
   
            };



            $.ajax({
                url: 'eliminarR.php',
                data: postForm, //Forms name
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                //data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    console.log(data);
                    
                    console.log(data[0]);

                    
                    
                    $.each( data[0], function( key, value ) {

                        if(key =="ok"){
                            alert(value);
                            location.reload();

                        }else{
                            alert(value);
                        }
                           
                           
                            
                    });
                    
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log("Error" );
                }
            });
            


        }
    </script>
</html>


