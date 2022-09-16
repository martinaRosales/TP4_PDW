<?php
class Persona{
    private $Nro_dni;
    private $Nombre;
    private $Apellido;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;
    private $Mensaje;

    public function __construct()
    {
        $this->Nro_dni="";
        $this->Nombre="";
        $this->Apellido="";
        $this->fechaNac="";
        $this->Telefono="";
        $this->Domicilio="";
        $this->Mensaje="";
    }

    public function cargar($dni, $nombre, $apellido, $nacimiento, $telefono, $domicilio)
    {
        $this->setNro_dni($dni);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setFechaNac($nacimiento);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);

    }

    public function getNro_dni()
    {
        return $this->Nro_dni;
    }

    public function setNro_dni($Nro_dni)
    {
        $this->Nro_dni = $Nro_dni;

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

 
    public function getApellido()
    {
        return $this->Apellido;
    }


    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;

        return $this;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    public function getTelefono()
    {
        return $this->Telefono;
    }

    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getDomicilio()
    {
        return $this->Domicilio;
    }

    public function setDomicilio($Domicilio)
    {
        $this->Domicilio = $Domicilio;

        return $this;
    }
    
    public function getMensaje()
    {
        return $this->Mensaje;
    }

    public function setMensaje($Mensaje)
    {
        $this->Mensaje = $Mensaje;

        return $this;
    }

     //funciones bd
     public function buscar($dni){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM persona WHERE NroDni= " . $dni;
        $rta = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2 = $base->Registro()){
                    $this->setNro_dni($row2['NroDni']);
                    $this->setNombre($row2['Nombre']);
                    $this->setApellido($row2['Apellido']);
                    $this->setTelefono($row2['Telefono']);
                    $this->setDomicilio($row2['Domicilio']);
                    $this->setFechaNac($row2['fechaNac']);
                    $rta = true;
                }
            }else{
                $this->setMensaje($base->getError());
            }
        }else{
            $this->setMensaje($base->getError());
        }
        return $rta;
    }

    
    public static function listar($condicion = ''){
        $array = null;
        $base = new BaseDatos();
        $consulta = "SELECT * FROM persona";
        if($condicion != ''){
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $array = array();
                while($row2 = $base->Registro()){
                    $persona = new Persona();
                    $persona->buscar($row2['NroDni']);
                    $array[] = $persona;
                }
            }else{
                Persona::setMensaje($base->getError());
            }
        }else{
            Persona::setMensaje($base->getError());
        }
        return $array;
    }

    public function insertar(){
        $base = new BaseDatos();
        $rta = false;
        $consulta = "INSERT INTO persona (NroDni, Nombre, Apellido, Telefono, Domicilio) VALUES( '{$this->getNro_dni()}' , '{$this->getNombre()}' ,'{$this->getApellido()}' , '{$this->getTelefono()}' , '{$this->getDomicilio()}', '{$this->getFechaNac()}')";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $rta = true;
            }else{
                $this->setMensaje($base->getError());    
            }
        }else{
            $this->setMensaje($base->getError());
        }
        return $rta;
    }

    public function modificar(){
        $rta = false;
        $base = new BaseDatos();
        $consulta = "UPDATE persona SET Nombre = '{$this->getNombre()}', Apellido = '{$this->getApellido()}', Telefono = '{$this->getTelefono()}', Domicilio = '{$this->getDomicilio()}', fechaNac = '{$this->getFechaNac()}' WHERE NroDni =  '{$this->getNro_dni()}'";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $rta = true;
            }else{
                $this->setMensaje($base->getError());
            }
        }else{
            $this->setMensaje($base->getError());
        }
        return $rta;
    }

    public function eliminar(){
        $base = new BaseDatos();
        $rta = false;
        $consulta = "DELETE FROM persona WHERE NroDni = " . $this->getNro_dni();
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $rta = true;
            }else{
                $this->setMensaje($base->getError());
            }
        }else{
            $this->setMensaje($base->getError());
        }
        return $rta;
    }
 
}