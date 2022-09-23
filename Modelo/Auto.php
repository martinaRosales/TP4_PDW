<?php
include_once 'Persona.php';
include_once '../Modelo/conector/BaseDatos.php';
class Auto
{
    private $patente;
    private $marca;
    private $modelo;
    private $rDniDuenio; //Referencia al objeto persona
    private $mensaje;

    public function __construct()
    {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->rDniDuenio = '';
        $this->mensaje = "";
    }

    public function cargar($patente, $marca, $modelo, $dniDuenio)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setRDniDuenio($dniDuenio);
    }

    //Metodos de acceso
    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getPatente()
    {
        return $this->patente;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    /**
     * @return Persona
     */
    public function getRDniDuenio()
    {
        return $this->rDniDuenio;
    }

    public function setRDniDuenio($rDniDuenio)
    {
        $this->rDniDuenio = $rDniDuenio;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function __toString()
    {
        return "Patente: " . $this->getPatente() .
            "\nMarca: " . $this->getMarca() .
            "\nModelo: " . $this->getModelo() .
            "\nDueño: " . $this->getRDniDuenio();
    }

    //Funciones BD

    //BUSCAR
    public function buscar($patente)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM auto WHERE Patente = '" . $patente . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setPatente($row2['Patente']);
                    $this->setMarca($row2['Marca']);
                    $this->setModelo($row2['Modelo']);
                    //Creo un objeto persona para buscar al duenio y setear el objeto
                    $duenio = new Persona();
                    $duenio->buscar($row2['DniDuenio']);
                    $this->setRDniDuenio($duenio);
                    $resp = true;
                }
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $resp;
    }

    //LISTAR
    public function listar($condicion = '')
    {
        $array = null;
        $base = new BaseDatos();
        $sql =  "select * from auto";
        if($condicion != ''){
            $sql = $sql.' where '.$condicion;
        }
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $array = array();
                while($row2 = $base->Registro()){
                    $objAuto = new Auto();
                    $objAuto->buscar($row2['Patente']);
                    $array[] = $objAuto;
                }
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        
        return $array;
    }

    //INSERTAR
    public function insertar(){
        $base = new BaseDatos();
        $resp = false;
        //Asigno los datos a variables
        $patente = $this->getPatente();
        $marca = $this->getMarca();
        $modelo = $this->getModelo();
        $duenio = $this->getRDniDuenio();
        $dniDuenio = $duenio->getNroDni();
        //Creo la consulta 
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio) VALUES ('{$patente}', '{$marca}'. '{$modelo}', '{$dniDuenio}')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $resp;
    }

    //MODIFICAR
    public function modificar(){
        $base = new BaseDatos();
        $resp = false;
        $patente = $this->getPatente();
        $marca = $this->getMarca();
        $modelo = $this->getModelo();
        $duenio = $this->getRDniDuenio();
        $dniDuenio = $duenio->getNroDni();
        $sql = "UPDATE auto SET Marca = '{$marca}', Modelo = '{$modelo}', DniDuenio = '{$dniDuenio}' WHERE Patente = '{$patente}'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $resp;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $rta = false;
        $consulta = "DELETE FROM auto WHERE Patente = " . $this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $rta;
    }
}

