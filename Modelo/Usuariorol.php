<?php

include_once('conector/BaseDatos.php');

class Usuariorol{
    private $idrol;
    private $idusuario;
    private $mensajeoperacion;


    /** CONSTRUCTOR **/
    public function __construct()
    {
        $this->idusuario = new Usuario();
        $this->idrol = new Rol();
        $this->mensajeoperacion = "";
    }


    /** SETEAR **/
    public function setear($idusuario, $idrol)
    {
        $this->setobjusuario($idusuario);
        $this->setobjrol($idrol);
    }


    /** GETS **/
    public function getobjusuario()
    {
        return $this->idusuario;
    }

    public function getobjrol()
    {
        return $this->idrol;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }


    /** SETS **/
    public function setobjusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setobjrol($idrol)
    {
        $this->idrol = $idrol;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }


    /** CARGAR **/
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuariorol WHERE idusuario = " . $this->getobjusuario() . "and idrol =" . $this->getobjrol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $objUsuario = NULL;
                    if ($row['idsuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdusuario($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdrol($row['idrol']);
                        $objRol->cargar();
                    }
                    $this->setear($row['idusuario'], $row['idrol']);
                }
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->listar: " . $base->getError());
        }
        return $resp;
    }


    /** INSERTAR **/
    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO usuariorol (idusuario,idrol)  VALUES ('" . $this->getobjusuario()->getIdusuario() . "','" . $this->getobjrol()->getIdrol() . "')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuariorol->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->insertar: " . $base->getError());
        }
        return $resp;
    }


    /** ELIMINAR **/
    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM usuariorol WHERE idusuario = " . $this->getobjusuario() . "and idrol =" . $this->getobjrol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Usuariorol->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuariorol->eliminar: " . $base->getError());
        }
        return $resp;
    }


    /** LISTAR **/
    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $consultasql = "SELECT * FROM usuariorol ";
        if ($parametro != "") {
            $consultasql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($consultasql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdusuario($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdrol($row['idrol']);
                        $objRol->cargar();
                    }
                    $obj = new Usuariorol();
                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
            }
        }
        
        return $arreglo;
    }
}