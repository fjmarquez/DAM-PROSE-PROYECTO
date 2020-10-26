<?php

    /*
     * Nombre de la clase: Producto
     *
     * Propiedades Básicas:
     *
     *      - ID -> int, Consultable
     *      - Nombre -> String, Consultable y Modificable
     *      - Stock -> int, Consultable y Modificable
     *      - Descuento -> double, Consultable y Modificable
     *      - Prime -> boolean, Consultable y Modificable
     *      - Precio -> int, Consultable y Modificable
     *      - DescripcionCorta -> String, Consultable y Modificable
     *      - DescripcionLarga -> String, Consultable y Modificable
     *      - Imagen -> String, Consultable y Modificable    
     *      - Valoracion -> Double, Consultable y Modificable      
     *
     * Propiedades Derivadas: No hay
     *
     * Propiedades Compartidas: No hay
     *
     * Métodos Añadidos: No hay
     */

class Producto {
    private $ID;
    private $Nombre;
    private $Stock;
    private $Descuento;
    private $Prime;
    private $Precio;
    private $DescripcionCorta;
    private $DescripcionLarga;
    private $Imagen;
    private $Valoracion;
    private $IDCategoria;

    function __construct( $ID, $Nombre, $Stock, $Descuento, $Prime, $Precio, $DescripcionCorta, $DescripcionLarga, $Imagen, $Valoracion, $IDCategoria) {
       $this -> ID = $ID;
       $this -> Nombre = $Nombre;
       $this -> Stock = $Stock;
       $this -> Descuento = $Descuento;
       $this -> Prime = $Prime;
       $this -> Precio = $Precio;
       $this -> DescripcionCorta = $DescripcionCorta;
       $this -> DescripcionLarga = $DescripcionLarga;
       $this -> Imagen = $Imagen;
       $this -> Valoracion = $Valoracion;
       $this -> IDCategoria = $IDCategoria;
   }
   

   
    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getStock()
    {
        return $this->Stock;
    }

    public function setStock($Stock)
    {
        $this->Stock = $Stock;

        return $this;
    }

    public function getDescuento()
    {
        return $this->Descuento;
    }

    public function setDescuento($Descuento)
    {
        $this->Descuento = $Descuento;

        return $this;
    }

    public function getPrime()
    {
        return $this->Prime;
    }

    public function setPrime($Prime)
    {
        $this->Prime = $Prime;

        return $this;
    }

    public function getPrecio()
    {
        return $this->Precio;
    }

    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;

        return $this;
    }

    public function getDescripcionCorta()
    {
        return $this->DescripcionCorta;
    }

    public function setDescripcionCorta($DescripcionCorta)
    {
        $this->DescripcionCorta = $DescripcionCorta;

        return $this;
    }

    public function getDescripcionLarga()
    {
        return $this->DescripcionLarga;
    }

    public function setDescripcionLarga($DescripcionLarga)
    {
        $this->DescripcionLarga = $DescripcionLarga;

        return $this;
    }

    public function getImagen()
    {
        return $this->Imagen;
    }

    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;

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
}

?>
