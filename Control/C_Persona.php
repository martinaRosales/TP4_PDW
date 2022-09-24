<?php
include_once("../Modelo/Persona.php");
class C_Persona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */

    private function cargarObjeto($param){
        $obj=null;

        if(array_key_exists('NroDni', $param) ){
        //if($param['NroDni']!='null' ){

        $obj=New Persona();
        $obj->cargar($param['NroDni'], 
        $param['Nombre'],
        $param['Apellido'],
        $param['fechaNac'], 
        $param['Telefono'], 
        $param['Domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['NroDni']) ){
            $obj = new Persona();
            $obj->cargar($param['NroDni'], null, null, null, null, null);
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
        $elObjtPersona = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtPersona!=null && $elObjtPersona->insertar()){
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
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona!=null and $elObjtPersona->eliminar()){
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
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona!=null and $elObjtPersona->modificar()){
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

    public function existeDni($dni){
        $personasObj=$this->buscar(null);
        $dniPersonas=[];
        foreach($personasObj as $persona){
            array_push($dniPersonas, $persona->getNroDni());
        }
        $existe=false;
        $i=0;
        while(!$existe && $i<count($dniPersonas)){
            if($dni==$dniPersonas[$i]){
                $existe=true;
            }
            $i++;
        }
        return $existe;
    }
}
