<?php
    /**
     * @author Sergio Matamoros Delgado
    */
    require_once __DIR__."/operacionesBd.php";
    class Procesos extends OperacionesBd {
        //Vars
        private $mysql = null;

        function __construct()
        {
            $this->mysql = $this->inicioBd();
        }

        /**
         * Selecciona lo especificado por el sistema.
         * @param customSQL Permite introducir nombres de columna
         * @param where Parametro que permite introducir un WHERE statement.
        */
        function seleccionar($customSQL) {

            //SQL custom especificado en param
            $sql = $customSQL;

            $consulta = $this->consultar($sql);
            if($consulta) 
                return $consulta;
            return $this->mysql->error;

        }

        /**
         * Selecciona lo especificado por el sistema.
         * @param customSQL Permite introducir nombres de columna
         * @param where Parametro que permite introducir un WHERE statement.
        */
        function loginAccount($user,$pass) {

            //SQL custom especificado en param
            $sql = "SELECT nombre, pw, idUsuario FROM usuarios WHERE nombre=? LIMIT 1";

            $consulta = $this->prepararConsulta($sql);
            $consulta->bind_param("s", $user);

            if($consulta->execute()) echo $this->mysql->error;

            //El get result funcionará con *
            $resultado = $consulta->get_result();

            $fila = $resultado->fetch_assoc();

            //Si hay resultados...
            if($resultado->num_rows > 0) {

                $pwHash = password_verify($pass, $fila["pw"]);

                if($pwHash) {
                    session_start();
                    $_SESSION["id"] = $fila["idUsuario"];
                    $_SESSION["userName"] = $fila["nombre"];
                    //$_SESSION["tipoPerfil"] = $filaLogin["tipoPerfil"];

                    //Cerramos la consulta
                    $consulta->close();
                    return true;
                }
            }
            $consulta->close();
            return false;
        }

        /**
         * Inserta los datos de una nueva puntuación
        */
        function crearCuenta($nombre,$apellido,$correo,$pw,$tipoPerfil=0) {

            $sql = "INSERT INTO usuarios(nombre,apellido,correo,pw) VALUES (?, ?, ?, ?);";
            //INSERT INTO usuarios(nombre,apellido,correo,pw) VALUES ('aa', 'ee', 'ee', '1234');

            $consulta = $this->prepararConsulta($sql);

            $pwHash = password_hash($pw, PASSWORD_DEFAULT);

            $consulta->bind_param("ssss", $nombre, $apellido, $correo, $pwHash);
            if(!$consulta->execute()) return $this->mysql->errno;

            //Cerramos la consulta preparada
            $consulta->close();
            return $this->mysql->insert_id; //Devolvemos la id.
        }

        /**
         * Inserta los datos de una nueva puntuación
        */
        function insertarDatos($sql) {

            //$sql = "INSERT INTO partidas(idUsuario, idMinijuego, puntuacion) VALUES ($idUsuario,$idMinijuego,$puntuacion)";

            $consulta = $this->consultar($sql);
            if(!$consulta)
                return $this->mysql->errno;
        }


        /**
         * Modifica una puntuacion
        */
        function modificar($puntuacion, $id) {
            $sql = "UPDATE partidas SET puntuacion=$puntuacion WHERE idPartida=$id";

            $consulta = $this->consultar($sql);
            if($consulta)
                return 'Datos modificados correctamente';
            return $this->mysql->errno;

        }

        /**
         * Modifica una puntuacion
        */
        function modificarAudio($title, $authorName, $id) {
            $sql = "UPDATE audio SET titulo='$title', nombreAutor='$authorName' WHERE idAudio=$id";

            $consulta = $this->consultar($sql);
            if($consulta)
                return 'Datos modificados correctamente';
            return $this->mysql->errno;

        }

        /**
         * Borra datos de la B.D
         * @param tabla -> tabla a borrar datos
         * @param condicion -> Condición, id u otro parametro a identificar el dato que borrar.
         */
        function borrarDatos($tabla, $condicion) {
            $sql = "DELETE FROM $tabla WHERE $condicion";


            $consulta = $this->consultar($sql);

            if(!$consulta) return $this->mysql->errno;
        }
    }
?>