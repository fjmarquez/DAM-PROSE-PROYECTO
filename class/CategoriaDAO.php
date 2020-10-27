<?php
    require_once "DAO.php";
    require_once  "Categoria.php";

    /*Clase Data Access Object para manipular la clase Categoria en una base de datos MySQL*/
    class CategoriaDAO extends DAO
    {
        const SCHEMA="`TiendaElectronicaFranciscoManuel`";
        const NAME_TABLE="`Categorias`";

        /*
         * Recuperar un registro de categoria por ID y devolver un objeto Categoria.
         */

        public function recuperarCategoria($IDCategoria){

            //Abrimos la conexión
            $this->openConection();

            //Preparamos la consulta
            $stmt=$this->conexion->prepare(
                "SELECT Categoria FROM ".self::SCHEMA.".".self::NAME_TABLE.
                " WHERE ID = ?");

            //Añadimos los datos
            $stmt->bind_param('s', $IDCategoria);

            //Ejecutamos la consulta y recogemos el resultado
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows > 0)
            {
                $categoria = new Categoria($IDCategoria, $result->fetch_assoc()["Categoria"]);
            }
            else
            {
                $categoria = false;
            }

            //Cerramos la conexión
            $this->closeConection();

            //Devolvemos el resultado
            return $categoria;
        }
    }