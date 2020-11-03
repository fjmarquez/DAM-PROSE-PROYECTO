<?php

    require_once "DAO.php";
    require_once "Producto.php";

    /*Clase Data Access Object para manipular la clase Usuario en una base de datos MySQL*/
    class ProductoDAO extends DAO{

        const SCHEMA="ProyectoFranciscoManuel";
        const NAME_TABLE="Productos";

        /*
        *   Devuelve todos los productos que estan registrados en la base de datos
        */

        public function obtenerTodosLosProductos(){
            //Abrimos la conexion con la BD
            $this->openConection();
            //Definimos la consulta SQL
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ". self::SCHEMA.".".self::NAME_TABLE
            );
            //Ejecutamos la consulta SQL
            $stmt->execute();
            //Recibimos los datos de la consulta
            $result = $stmt->get_result();
            //Parseamos los datos recibidos como un array de productos
            $products = $this->obtenerArrayProductos($result);
            //Cerramos la conexion
            $this->closeConection();
            //Devolvemos el array de Productos
            return $products;
        }

        /*
        *   Devuelve el producto cuyo ID sea igual al que pasamos a la funcion por parametros
        */

        public function obtenerProductoPorID($id){
            //Abrimos la conexion
            $this->openConection();
            //Definimos la consulta SQL
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ". self::SCHEMA.".".self::NAME_TABLE.
                " WHERE id = ?"                
            );
            //Especificamos los parametros necesarios para la consulta
            $stmt->bind_param('i', $id);
            //Ejecutamos la consulta SQL
            $stmt->execute();
            //Recibimos los datos de la consulta
            $result = $stmt->get_result();
            //Parseamos los datos recibidos como un array de productos
            $products = $this->obtenerArrayProductos($result);
            //Cerramos la conexion
            $this->closeConection();
            //Devolvemos el array con el Producto
            return $products;
        }

        /*
        *   Devuelve los productos pertenecientes a una categoria especificada mediante parametros
        */

        public function obtenerProductoPorCategoria($IDCategoria){
            //Abrimos la conexion
            $this->openConection();
            //Definimos la consulta SQL
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ". self::SCHEMA.".".self::NAME_TABLE.
                " WHERE IDCategoria = ?"                
            );
            //Especificamos los parametros necesarios para la consulta
            $stmt->bind_param('i', $IDCategoria);
            //Ejecutamos la consulta SQL
            $stmt->execute();
            //Recibimos los datos de la consulta
            $result = $stmt->get_result();
            //Parseamos los datos recibidos como un array de productos
            $products = $this->obtenerArrayProductos($result);
            //Cerramos la conexion
            $this->closeConection();
            //Devolvemos el array con los productos
            return $products;
        }

        /*
        *   Inserta un nuevo producto en la base de datos
        */

        private function insertarNuevoProducto($producto){
            //Abrimos la conexion
            $this->openConection();
            //Definimos el INSERT
            $stmt = $this->conexion->prepare(
                "INSERT INTO ".self::SCHEMA.".".self::NAME_TABLE.
                "(ID, Nombre, Stock, Descuento, Prime, Precio,
                 Descripcion_Corta, Descripcion_Larga, Imagen, IDCategoria) 
                 VALUES (".$producto->getID().", ".$producto->getNombre().", ".
                 $producto->getStock().", ".$producto->getDescuento().", ".
                 $producto->getPrime().", ".$producto->getPrecio(),", ".
                 $producto->getDescipcionCorta().", ".$producto->getDescripcionLarga().", ".
                 $producto->getImagen().", ".$producto->getValoracion().", ".
                 $producto->getIDCategoria().")"
            );
            //Realizamos el INSERT
            $stmt->execute();
            //Cerramos la conexion
            $this->closeConection();
            
        }

        /*
        *   Edita un producto existente con los nuevos valores indicados
        */

        private function editarProducto($producto){
            //Abrimos la conexion
            $this->openConection();
            //Definimos el UPDATE
            $stmt = $this->conexion->prepare(
                "UPDATE ".self::SCHEMA.".".self::NAME_TABLE.
                "SET ID = ".$producto->getID().", Nombre = ".$producto->getNombre().
                ", Stock = ".$producto->getStock().", Descuento = ".$producto->getDescuento().", Prime = ".
                $producto->getPrime().", Precio = ".$producto->getPrecio().", Descripcion_Corta = "
                .$producto->getDescripcionCorta.", Descripcion_Larga = ".$producto->getDescripcionLarga().", Imagen = "
                .$producto->getImagen().", IDCategoria = ".$producto->getIDCategoria().
                "WHERE ID = ".$producto->getID()
            );
            //Realizamos el UPDATE
            $stmt->execute();
            //Cerramos la conexion
            $this->closeConection();
            
        }


        /*
        *   Recibe un array de datos obtenidos en una consulta SQL y devuelve un array de Productos
        */

        private function obtenerArrayProductos($result){
            //Definimos el array de productos
            $products = array();
            //Iteramos los resultados obtenidos en una consulta a la BD
            for ($i=0;$i<$result->num_rows;$i++){
                //Obtenemos el registro
                $row = $result->fetch_assoc();
                //Creamos el objeto producto y seteamos los valores
                $product = new Producto($row["id"],
                                        $row["nombre"], 
                                        $row["stock"], 
                                        $row["descuento"],
                                        $row["prime"],
                                        $row["precio"],
                                        $row["descripcion_corta"],
                                        $row["descripcion_larga"],
                                        $row["imagen"],
                                        $row["valoracion"],
                                        $row["idcategoria"]);
                
                //Guardamos el objeto persona en la array
                $products[$i] = $product;
            }
            return $products;
        }
    

    }

    
?>