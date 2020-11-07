<?php

    require_once "DAO.php";
    require_once "Valoracion.php";

    class ValoracionDAO extends DAO{

        const SCHEMA="ProyectoFranciscoManuel";
        const NAME_TABLE="Ratings";

        /*
        *   Devuelve las valoraciones correspondientes a un producto
        */

        public function obtenerValoracionesPorIDProducto($IDProduct){
            //Abrimos la conexion con la BD
            $this->openConection();
            //Definimos la consulta SQL
            $stmt = $this->conexion->prepare(
                "SELECT IDUser, Rating, Review FROM ".self::SCHEMA.".".self::NAME_TABLE.
                "WHERE IDProduct = ".$IDProduct
            );
            //Ejecutamos la consulta SQL
            $stmt->execute();
            //Recibimos los datos de la consulta
            $result = $stmt->get_result();
            //Parseamos los datos recibidos ccomo un array de Valoraciones
            $valoraciones = $this->obtenerArrayValoraciones($result);
            //Cerramos la conexion
            $this->closeConection();
            //Devolvemos el array con las valoraciones
            return $valoraciones;
        }

        public function obtenerArrayValoraciones($result){
            //Definimos el array de productos
            $valoraciones = array();

            //Instanciamos un objeto UsuarioDAO y ProductoDAO
            $usuarioDAO = new UserDAO();
            $productoDAO = new ProductoDAO();

            //Iteramos los resultados obtenidos en una consulta a la BD
            for ($i=0;$i<$result->num_rows;$i++){
                //Obtenemos el registro
                $row = $result->fetch_assoc();
                //Creamos el objeto producto y seteamos los valores

                $usuario = $usuarioDAO->recuperarUser($row["IDUser"]);
                $producto = $productoDAO->obtenerProductoPorID($row["IDProduct"]);

                $valoracion = new Valoracion($usuario,
                                             $producto,
                                             $row["Rating"],
                                             $row["Review"]
                                        );
                
                //Guardamos el objeto persona en la array
                $valoraciones[$i] = $valoracion;
            }
            return $valoraciones;
        }
    }

?>