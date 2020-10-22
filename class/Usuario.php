<?php
    /*
     * Nombre de la clase: Usuario
     *
     * Propiedades Básicas:
     *
     *      - ID -> int, Consultable
     *      - Correo -> String, Consultable y Modificable
     *      - Contraseña -> String, Consultable y Modificable
     *      - Admin -> Boolean, Consultable y Modificable
     *
     * Propiedades Derivadas: No hay
     *
     * Propiedades Compartidas: No hay
     *
     * Métodos Añadidos: No hay
     */

    class Usuario
    {
        //Declaración de los atributos de la clase
        private $ID;
        private $correo;
        private $contraseña;
        private $admin;

        //Constructor
        public function __construct($ID, $correo, $contraseña, $admin)
        {
            $this->ID = $ID;
            $this->correo = $correo;
            $this->contraseña = $contraseña;
            $this->admin = $admin;
        }

        //Declaración de las propiedades de la clase

        //ID
        public function getID()
        {
            return $this->ID;
        }

        public function setID($ID)
        {
            $this->ID = $ID;
        }

        public function getCorreo()
        {
            return $this->correo;
        }

        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }

        public function getContraseña()
        {
            return $this->contraseña;
        }

        public function setContraseña($contraseña)
        {
            $this->contraseña = $contraseña;
        }

        public function getAdmin()
        {
            return $this->admin;
        }

        public function setAdmin($admin)
        {
            $this->admin = $admin;
        }
    }
