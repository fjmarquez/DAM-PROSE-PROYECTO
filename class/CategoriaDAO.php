<?php
    require_once "DAO.php";
    require_once  "Categoria.php";

    /*Clase Data Access Object para manipular la clase Categoria en una base de datos MySQL*/
    class CategoriaDAO extends DAO
    {
        const SCHEMA="ProyectoFranciscoManuel";
        const NAME_TABLE="Categories";

        /*
         * Recuperar un registro de categoria por ID y devolver un objeto Categoria.
         */

        public function recuperarCategoria($IDCategory){

            //Abrimos la conexión
            $this->openConection();

            //Preparamos la consulta
            $stmt=$this->conexion->prepare(
                "SELECT Category FROM ".self::SCHEMA.".".self::NAME_TABLE.
                " WHERE ID = ?");

            //Añadimos los datos
            $stmt->bind_param('s', $IDCategory);

            //Ejecutamos la consulta y recogemos el resultado
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows > 0)
            {
                $category = new Categoria($IDCategory, $result->fetch_assoc()["Category"]);
            }
            else
            {
                $category = false;
            }

            //Cerramos la conexión
            $this->closeConection();

            //Devolvemos el resultado
            return $category;
        }
    }