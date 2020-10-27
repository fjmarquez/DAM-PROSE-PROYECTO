<?php

    /*
     * Nombre de la clase: Valoracion
     *
     * Propiedades Básicas:
     *
     *      - IDUsuario -> int, Consultable
     *      - IDProducto -> int, Consultable
     *      - Valoracion -> double, Consultable y Modificable
     *      - Reseña -> string, Consultable y Modificable    
     *
     * Propiedades Derivadas: No hay
     *
     * Propiedades Compartidas: No hay
     *
     * Métodos Añadidos: No hay
     */

    class Valoracion{
        private $IDUsuario;
        private $IDProducto;
        private $Valoracion;
        private $Reseña;

        function __construct($IDUsuario, $IDProducto, $Valoracion, $Reseña)
        {
            $this -> $IDUsuario = $IDUsuario;
            $this -> $IDProducto = $IDProducto;
            $this -> $Valoracion = $Valoracion;
            $this -> $Reseña = $Reseña;
        }

        public function getIDUsuario()
        {
                return $this->IDUsuario;
        }

        public function setIDUsuario($IDUsuario)
        {
                $this->IDUsuario = $IDUsuario;

                return $this;
        }

        public function getIDProducto()
        {
                return $this->IDProducto;
        }

        public function setIDProducto($IDProducto)
        {
                $this->IDProducto = $IDProducto;

                return $this;
        }

        public function getValoracion()
        {
                return $this->Valoracion;
        }

        public function setValoracion($Valoracion)
        {
                $this->Valoracion = $Valoracion;

                return $this;
        }

        public function getReseña()
        {
                return $this->Reseña;
        }

        public function setReseña($Reseña)
        {
                $this->Reseña = $Reseña;

                return $this;
        }
    }



?>