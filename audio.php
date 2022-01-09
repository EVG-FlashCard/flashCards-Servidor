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

    while($filas = $db->selectArray($selAudios, MYSQLI_ASSOC)) {
        echo '<tr>';

        echo "<td>".$filas["titulo"] ."</td>";
        echo "<td>".$filas["nombreAutor"] ."</td>";
        echo "<td><a href='estructura/editSong.php?editar=$filas[idAudio]'>Editar</a>";
        echo " <a href='procesos/borrarSong.php?id=$filas[idAudio]'>Borrar</a>"."</td>";

        echo '</tr>';
    }
    echo '</table>';

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
        <link rel="stylesheet" href="css/audioCrud.css">
    </head>
    <body>
        
    </body>
</html>