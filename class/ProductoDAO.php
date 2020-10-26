<?php

    require_once "DAO.php";
    require_once "Producto.php";

    class ProductoDAO extends DAO{

        const SCHEMA="TiendaElectronicaFranciscoManuel";
        const NAME_TABLE="Productos";

        public function getAllProducts(){
            $this->openConection();
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ". self::SCHEMA.".".self::NAME_TABLE
            );
            $stmt->execute();
            $result = $stmt->get_result();
            $products = $this->getArrayProductsFromResulSet($result);
            $this->closeConection();
            return $products;
        }

        public function getProductByID($id){
            $this->openConection();
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ". self::SCHEMA.".".self::NAME_TABLE.
                " WHERE id = ?"                
            );
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $products = $this->getArrayProductsFromResulSet($result);
            $this->closeConection();
            return $products;
        }

        public function getProductByCat($IDCategoria){
            $this->openConection();
            $stmt = $this->conexion->prepare(
                "SELECT * FROM ". self::SCHEMA.".".self::NAME_TABLE.
                " WHERE IDCategoria = ?"                
            );
            $stmt->bind_param('i', $IDCategoria);
            $stmt->execute();
            $result = $stmt->get_result();
            $products = $this->getArrayProductsFromResulSet($result);
            $this->closeConection();
            return $products;
        }

        private function getArrayProductsFromResulSet($result){
            $products = array();
    
            for ($i=0;$i<$result->num_rows;$i++){
                //Obtenemos el registro
                $row = $result->fetch_assoc();
                //Creamos el objeto persona y seteamos los valores
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
        }
    

    }

    
?>