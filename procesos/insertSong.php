<?php
    /**
     * Método que inserta los datos en la B.D y reedirige a audios.
     */
    require_once dirname(__DIR__, 1)."../clases/procesos.php";


    //Llegan datos de nueva canción
    if(isset($_POST["enviar"])) {
        $db = new Procesos();

        /*print_r($_POST);

        if(isset($_POST["file"])) {
            $file = $_FILES["file"];
            echo $_FILES["file"]["name"];
        }*/

        $datos = $db->insertarDatos("INSERT INTO audio(titulo, nombreAutor) VALUES ('$_POST[title]', '$_POST[author]');");
        if($datos > 0) echo 'Se produjo un error inesperado '.$datos;

        //Redirect a audio al finalizar.
        header("Location: ../audio.php");
    }

?>