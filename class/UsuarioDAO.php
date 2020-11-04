<?php

    require_once "DAO.php";
    require_once  "Usuario.php";

    /*Clase Data Access Object para manipular la clase Usuario en una base de datos MySQL*/
    class UsuarioDAO extends DAO
    {
        const SCHEMA="ProyectoFranciscoManuel";
        const NAME_TABLE="Usuarios";

        /*
         * Comprobar si existe un registro de usuario con el nombre y la contraseña pasada por parámetros.
         * Si existe el registro, se devolverá el ID del usuario, en caso contrario devolverá false.
         */

        public function esUsuarioRegistrado($nombre, $contrasena){

            //Abrimos la conexión   
            $this->openConection();

            $sql = "SELECT ID FROM ".self::SCHEMA.".".self::NAME_TABLE.
            " WHERE Nombre = ? AND Contrasena = ?";

            //Preparamos la consulta
            $stmt=$this->conexion->prepare($sql);
            
            //Añadimos los datos
            $stmt->bind_param('ss', $nombre, $contrasena);
            
            //Ejecutamos la consulta y recogemos el resultado
            $stmt->execute();
            
            $result = $stmt->get_result();
            
            if($result->num_rows > 0)
            {
                $usuario = $this->recuperarUsuario($result->fetch_assoc()["ID"]);
                
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

        /*
         * Recuperar un registro de usuario por ID y devolver un objeto Usuario.
         */

        public function recuperarUsuario($IDUsuario){

            //Abrimos la conexión
            //$this->openConection();

            $sql = "SELECT Correo, Contrasena, Nombre, Admin FROM ".self::SCHEMA.".".self::NAME_TABLE.
            " WHERE ID = ?";
            echo $sql;

            //Preparamos la consulta
            $stmt=$this->conexion->prepare($sql);

            //Añadimos los datos
            $stmt->bind_param('i', $IDUsuario);

            //Ejecutamos la consulta y recogemos el resultado
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows > 0)
            {
                //Obtenemos el registro
                $row = $result->fetch_assoc();

                $usuario = new Usuario($IDUsuario,
                                       $row["Correo"],
                                       $row["Contrasena"],
                                       $row["Admin"]);
            }
            else
            {
                $usuario = false;
            }

            //Cerramos la conexión
            //$this->closeConection();

            //Devolvemos el resultado
            return $usuario;
        }

        //Inserta un objeto de la clase persona en la BD
        public function insertarUsuario($usuario){

            $sql="INSERT INTO ".self::SCHEMA.".".self::NAME_TABLE.
                " (`Correo`, `Contrasena`, `Nombre`, `Admin`) VALUES ('".$usuario->getCorreo()."', '".$usuario->getContrasena()."', '".$usuario->getNombre()."','".$usuario->getAdmin()."')";

            parent::query($sql);
        }

    }