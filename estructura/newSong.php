<?php
    /**
     * Interfaz básica que agrega una nueva canción.
     */

    echo '
    <form action="../procesos/insertSong.php" method="POST">
        <label>Título canción</label>
        <input name="title" type="text">
        <label>Nombre autor</label>
        <input name="author" type="text">
    
        <input type="submit" name="enviar" value="Crear">
    </form>';

?>