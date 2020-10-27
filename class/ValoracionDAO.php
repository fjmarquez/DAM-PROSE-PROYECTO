<?php

    require_once "DAO.php";
    require_once "Valoracion.php";

    class ValoracionDAO extends DAO{

        const SCHEMA="TiendaElectronicaFranciscoManuel";
        const NAME_TABLE="Valoraciones";

        /*
        *   Devuelve las valoraciones correspondientes a un producto
        */

        public function obtenerValoracionesPorIDProducto($IDProducto){
            //Abrimos la conexion con la BD
            $this->openConection();
            //Definimos la consulta SQL
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ".self::SCHEMA.".".self::NAME_TABLE.
                "WHERE IDProducto = ".$IDProducto
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
            //Iteramos los resultados obtenidos en una consulta a la BD
            for ($i=0;$i<$result->num_rows;$i++){
                //Obtenemos el registro
                $row = $result->fetch_assoc();
                //Creamos el objeto producto y seteamos los valores
                $valoracion = new Valoracion($row["IDUsuario"],
                                             $row["IDProducto"], 
                                             $row["Valoracion"], 
                                             $row["Reseña"]
                                        );
                
                //Guardamos el objeto persona en la array
                $valoraciones[$i] = $valoracion;
            }
            return $valoraciones;
        }
    }

?>