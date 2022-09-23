<?php

use function PHPSTORM_META\type;

include_once '../Modelo/Auto.php';

class C_Auto{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
        if(array_key_exists('Patente',$param) ){

            //Busco el objeto dueño que coincida el dni
            $objDuenio = new C_Persona();
            $objPrueba = $objDuenio->buscar(['NroDni'=>$param['DniDuenio']])[0];
            //echo gettype($objPrueba);
            $obj=New Auto();
            $obj->cargar($param['Patente'], 
            $param['Marca'],
            $param['Modelo'],
            //$param['DniDuenio']);
            $objPrueba);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['id']) ){
            $obj = new Auto();
            $obj->cargar($param['Patente'], null, null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
            $resp = true;
        return $resp;
    }

    /**
     * Inserta un objeto
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //$param['patente'] = null; <- NO SE SI VA
        $objAuto = $this->cargarObjeto($param);
        if ($objAuto!=null and $objAuto->insertar()){
            $resp = true;
        }
        return $resp;
    }

    
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objAuto = $this->cargarObjetoConClave($param);
            if ($objAuto!=null and $objAuto->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            
            $objAuto = $this->cargarObjeto($param);
            if($objAuto!=null && $objAuto->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true "; 
        if ($param<>NULL){
            $where .= '';
            if  (isset($param['Patente']))
                $where.=" and Patente ='".$param['Patente']."'"; 
            if  (isset($param['Marca']))
                    $where.=" and Marca ='".$param['Marca']."'";
            if  (isset($param['Modelo']))
                    $where.=" and Modelo ='".$param['Modelo'] ."'";
            if  (isset($param['DniDuenio']))
                    $where.=" and DniDuenio =".$param['DniDuenio'];
        }
        $objAuto = new Auto();
        $arreglo =  $objAuto->listar($where);  
        
        return $arreglo;
    }
}