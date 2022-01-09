<?php
    /**
     * Interfaz básica que agrega una nueva canción.
     */

    require_once dirname(__DIR__, 1)."../clases/procesos.php";


    $db = new Procesos();


    $selAudios = $db->seleccionar("SELECT * FROM audio WHERE idAudio=$_GET[editar]");

    $filas = $db->selectArray($selAudios, MYSQLI_ASSOC);  
    
    echo "
    <form action='../procesos/editSong.php?id=$_GET[editar]' method='POST'>
        <label>Título canción</label>
        <input name='title' type='text' value=$filas[titulo]>
        <label>Nombre autor</label>
        <input name='author' type='text' value=$filas[nombreAutor]>
    
        <input type='submit' name='enviar' value='Modificar'>
    </form>";

?>