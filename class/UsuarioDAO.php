<?php

    require_once "DAO.php";
    require_once  "Usuario.php";

    /*Clase Data Access Object para manipular la clase Usuario en una base de datos MySQL*/
    class UsuarioDAO extends DAO
    {
        const SCHEMA="`TiendaElectronicaFranciscoManuel`";
        const NAME_TABLE="`Usuarios`";

        /*
         * Comprobar si existe un registro de usuario con el nombre y la contraseña pasada por parámetros.
         * Si existe el registro, se devolverá el ID del usuario, en caso contrario devolverá false.
         */

        public function esUsuarioRegistrado($nombre, $contraseña){

            //Abrimos la conexión   
            $this->openConection();

            //Preparamos la consulta
            $stmt=$this->conexion->prepare(
                "SELECT ID FROM ".self::SCHEMA.".".self::NAME_TABLE.
                " WHERE Nombre = ? AND Contraseña = ?");

            //Añadimos los datos
            $stmt->bind_param('s,s', $nombre, $contraseña);

            //Ejecutamos la consulta y recogemos el resultado
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows > 0)
            {
                $usuario = $result->fetch_assoc()["ID"];
            }
            else
            {
                $usuario = false;
            }

            //Cerramos la conexión
            $this->closeConection();

            //Devolvemos el resultado
            return $usuario;
        }

        //Inserta un objeto de la clase persona en la BD
        public function insertarUsuario($usuario){

            $sql="INSERT INTO ".self::SCHEMA.".".self::NAME_TABLE.
                " (`Correo`, `Contraseña`, `Nombre`, `Admin`) VALUES ('".$usuario->getCorreo()."', '".$usuario->getContraseña()."', '".$usuario->getNombre()."','".$usuario->getAdmin()."')";

            parent::query($sql);
        }

    }