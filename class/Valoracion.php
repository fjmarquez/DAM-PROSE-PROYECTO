<?php

    /*
     * Nombre de la clase: Valoracion
     *
     * Propiedades Básicas:
     *
     *      - user -> User, Consultable
     *      - product -> Product, Consultable
     *      - rating -> double, Consultable y Modificable
     *      - review -> string, Consultable y Modificable
     *
     * Propiedades Derivadas: No hay
     *
     * Propiedades Compartidas: No hay
     *
     * Métodos Añadidos: No hay
     */

    class Valoracion{
        private $User;
        private $Product;
        private $Rating;
        private $Review;

        function __construct($User, $Product, $Rating, $Review)
        {
            $this -> $User = $User;
            $this -> $Product = $Product;
            $this -> $Rating = $Rating;
            $this -> $Review = $Review;
        }

        public function getUser()
        {
                return $this->User;
        }

        public function setUser($User)
        {
                $this->User = $User;

                return $this;
        }

        public function getProduct()
        {
                return $this->Product;
        }

        public function setProduct($Product)
        {
                $this->Product = $Product;

                return $this;
        }

        public function getRating()
        {
                return $this->Rating;
        }

        public function setRating($Rating)
        {
                $this->Rating = $Rating;

                return $this;
        }

        public function getReview()
        {
                return $this->Review;
        }

        public function setReview($Review)
        {
                $this->Review = $Review;

                return $this;
        }
    }



?>