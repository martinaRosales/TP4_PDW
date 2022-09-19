<?php

include_once('../Control/C_Auto.php');
include_once('../Util/funciones.php');
include_once('Common/Header.php');

$datos = data_submitted();

$objAuto = new ControlAuto();

$buscar = $objAuto->buscar($datos);

if(isset($buscar)){
    echo '<table> <tr> <th> Patente: </th> <td>'.$buscar[0]->getPatente().'</td> </tr>
                    <tr> <th> Marca: </th> <td>'.$buscar[0]->getMarca().'</td> </tr>
                    <tr> <th> Modelo: </th> <td>'.$buscar[0]->getModelo().'</td> </tr>
                    <tr> <th> Dni del duenio: </th> <td>'.$buscar[0]->getRDniDuenio()->getNro_dni().'</td> </tr>
          </table>'; 
}else{
    echo 'No se ha encontrado el auto correspondiente a la patente ingresada';
}

?>