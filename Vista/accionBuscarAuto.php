<?php

include_once('../Control/C_Auto.php');
include_once('../Util/funciones.php');
include_once('Common/Header.php');

$datos = data_submitted();

$objAuto = new ControlAuto();

$buscar = $objAuto->buscar($datos);

if(isset($buscar)){
    echo '<table> <tr> <th> Patente </th> <td>'.$buscar['Patente'].'</td> </tr>
                    <tr> <th> Marca </th> <td>'.$buscar['Marca'].'</td> </tr>
                    <tr> <th> Modelo </th> <td>'.$buscar['Marca'].'</td> </tr>
                    <tr> <th> Dni del duenio </th> <td>'.$buscar['DniDuenio'].'</td> </tr>
          </table>'; 
}else{
    echo 'No se ha encontrado el auto correspondiente a la patente ingresada';
}

?>