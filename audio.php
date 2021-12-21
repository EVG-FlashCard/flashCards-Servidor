<?php
    require_once __DIR__."/clases/procesos.php";

    //Tabla con los audios disponibles
    echo '
    <table>
        <tr>
            <th>Nombre</th>
            <th>Título</th>
            <th>Acciones</th>
        </tr>';

    $db = new Procesos();

    $selAudios = $db->seleccionar("SELECT * FROM audio");

    //$filas = $db->selectArray($selAudios, MYSQLI_ASSOC);

    echo '<tr>';

    while($filas = $db->selectArray($selAudios, MYSQLI_ASSOC)) {
        //echo "<td>".$filas["idAudio"] ."</td>";
        echo "<td>".$filas["titulo"] ."</td>";
        echo "<td>".$filas["nombreAutor"] ."</td>";
        echo "<td><a href='?editar=$filas[idAudio]'>Editar</a>"."</td>";
        echo "<td><a href='?borrar=$filas[idAudio]'>Borrar</a>"."</td>";
    }
    echo '</tr></table>';


    if(isset($_POST["enviar"])) {
        echo 'llega Titulo '.$_POST["title"];
        
    }

    
    if(isset($_GET["editar"])) {
        echo $_GET["editar"];
    }

    if(isset($_GET["borrar"])) {
        echo $_GET["borrar"];
    }

    //Agregar una nueva canción
    echo '<a href="estructura/newSong.php">Nueva canción</a>';



?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión audio</title>
    </head>
    <body>
        
    </body>
</html>