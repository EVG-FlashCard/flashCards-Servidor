<?php
    require_once dirname(__DIR__, 1)."../clases/procesos.php";
    //Borramos datos
    if(isset($_GET["id"])) {
        $db = new Procesos();

        $db->borrarDatos("audio", "idAudio=$_GET[id]");

        //Redirect a audio al finalizar.
        header("Location: ../audio.php");
    }
    

?>