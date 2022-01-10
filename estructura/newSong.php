<?php
    /**
     * Interfaz básica que agrega una nueva canción.
     */

    echo '
    <form action="../procesos/insertSong.php" method="POST" enctype="multipart/form-data">
        <label>Título canción</label>
        <input name="title" type="text">
        <label>Nombre autor</label>
        <input name="author" type="text">
        <br>
        <br>
        <label>Subir archivo</label>
        <input type="file" name="file">
        <br>
        <br>
        <input type="submit" name="enviar" value="Crear">
    </form>';

?>