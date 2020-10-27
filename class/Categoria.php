<?php

    /*
     * Nombre de la clase: Categoria
     *
     * Propiedades Básicas:
     *
     *      - ID -> int, Consultable
     *      - categoria -> String, Consultable y Modificable
     *
     * Propiedades Derivadas: No hay
     *
     * Propiedades Compartidas: No hay
     *
     * Métodos Añadidos: No hay
     */

    class Categoria
    {
        //Declaración de los atributos de la clase
        private $ID;
        private $categoria;

        //Constructor
        public function __construct($ID, $categoria)
        {
            $this->ID = $ID;
            $this->categoria = $categoria;
        }

        //Declaración de las propiedades de la clase

        //ID
        public function getID()
        {
            return $this->ID;
        }

        public function getCategoria()
        {
            return $this->categoria;
        }

        public function setCategoria($categoria)
        {
            $this->categoria = $categoria;
        }
    }