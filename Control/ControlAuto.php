<?php
class ControlAuto{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('patente',$param) and array_key_exists('marca',$param) and array_key_exists('modelo',$param) and array_key_exists('rDniDuenio',$param)){
            $obj = new Auto();
            $obj->cargar($param['patente'], $param['marca'], $param['modelo'], $param['dniDuenio']);
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
            $obj->cargar($param['patente'], null, null, null, null);
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
        if (isset($param['patente']))
            $resp = true;
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['patente'] = null;
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
            if($objAuto!=null and $objAuto->modificar()){
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
            if  (isset($param['patente']))
                $where.=" and Patente =".$param['patente'];
            if  (isset($param['marca']))
                    $where.=" and Marca ='".$param['marca'];
            if  (isset($param['modelo']))
                    $where.=" and Modelo ='".$param['modelo'];
            if  (isset($param['dniDuenio']))
                    $where.=" and DniDuenio ='".$param['dniDuenio'];
        }
        $objAuto = new Auto();
        $arreglo =  $objAuto->listar($where);  
        return $arreglo;
    }
}