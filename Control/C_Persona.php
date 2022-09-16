<?php
include_once("../Modelo/Persona.php");
class C_Persona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */

    private function cargarObjeto($param){
        $obj=null;

        if(array_key_exists('NroDni',$param) && array_key_exists('Nombre',$param) 
                        && array_key_exists('Apellido',$param) && array_key_exists('fechaNac',$param) 
                        && array_key_exists('Telefono',$param) && array_key_exists('Domicilio',$param)){

        $obj=New Persona();
        $obj->cargar($param['NroDni'], $param['Nombre'],$param['Apellido'],$param['fechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Tabla
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['NroDni']) ){
            $obj = new Tabla();
            $obj->cargar($param['NroDni'], null);
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
        if (isset($param['NroDni']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtTabla = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtTabla!=null && $elObjtTabla->insertar()){
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
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
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
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['NroDni']))
                $where.=" and NroDni=".$param['NroDni'];
            if  (isset($param['Nombre']))
                $where.=" and Nombre=".$param['Nombre'];
            if  (isset($param['Apellido']))
                $where.=" and Apellido=".$param['Apellido'];
            if  (isset($param['fechaNac']))
                $where.=" and fechaNac=".$param['fechaNac'];
            if  (isset($param['Telefono']))
                $where.=" and Telefono=".$param['Telefono'];
            if  (isset($param['Domicilio']))
                 $where.=" and Domicilio='".$param['Domicilio']."'";
        }
        $objPersona = new Persona();
        $arreglo = $objPersona->listar($where);  
        return $arreglo;
            
        
    }
}



?>