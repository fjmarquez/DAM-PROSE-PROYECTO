<?php
    /*
     * Nombre de la clase: Usuario
     *
     * Propiedades Básicas:
     *
     *      - ID -> int, Consultable
     *      - name -> string, Consultable y modificable
     *      - mail -> String, Consultable y Modificable
     *      - password -> String, Consultable y Modificable
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
        private $name;
        private $mail;
        private $password;
        private $admin;

        //Constructor
        public function __construct($ID, $name, $mail, $password, $admin)
        {
            $this->ID = $ID;
            $this->name = $name;
            $this->mail = $mail;
            $this->password = $password;
            $this->admin = $admin;
        }

        //Declaración de las propiedades de la clase

        
        public function getID()
        {
            return $this->ID;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getmail()
        {
            return $this->mail;
        }

        public function setmail($mail)
        {
            $this->mail = $mail;
        }

        public function getpassword()
        {
            return $this->password;
        }

        public function setpassword($password)
        {
            $this->password = $password;
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
