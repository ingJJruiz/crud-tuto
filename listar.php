<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>

    


	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>	
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.jqueryui.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.jqueryui.min.css">
</head>


<body>
<table id="example" class="display nowrap" style="width:100%">
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
    </tr>
</thead>

    <?php
    include_once('conexion.php');
    include_once('cabecera.php');
    $sql = "SELECT  * FROM usuarios";
    $resultado = $conexion->query($sql);
    //var_dump($resultado);
    //echo $resultado->num_rows."<br>";
    if ($resultado->num_rows > 0) {
        
        foreach ($resultado->fetch_all(MYSQLI_ASSOC) as $k => $row) {
            echo "<tr>
                    <td> ". $row['id'] ."</td>
                    <td> ". $row['nombre'] ."</td>
                    <td> ". $row['apellido'] ."</td>
                    <td> ". $row['edad'] ."</td>
                    <td> ". $row['genero'] ."</td>
                </tr>";
        }


        /*
        while ($fila = $resultado->fetch_assoc()) {

            
        }*/
        //print_r($resultado->fetch_array());
    } else {
        echo "Sin registros encontrados en la base de datos";
    }

    ?>


</table>
    <div>
        <a title="Regresar " href="index.php"> < < < Volver<a/>
    </div>
</body>


<script>
    $(document).ready(function() {
        $('#example').dataTable();
    } );
</script>
</html>