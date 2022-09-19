<?php

include_once('../Control/C_Auto.php');
include_once('../Util/funciones.php');
include_once('Common/Header.php');

$datos = data_submitted();

$objAuto = new ControlAuto();

$buscar = $objAuto->buscar($datos);
?>

<div  class="container col-md-5 " style="margin:30px;height:150vh;">
<?php
if(isset($buscar)){
    echo '<table class="table table-primary table-striped table-bordered " > <tr> <th> <h3>Patente:</h3> </th> <td>'.$buscar[0]->getPatente().'</td> </tr>
                    <tr> <th > <h3>Marca:</h3> </th> <td>'.$buscar[0]->getMarca().'</td> </tr>
                    <tr> <th> <h3>Modelo:</h3> </th> <td>'.$buscar[0]->getModelo().'</td> </tr>
                    <tr> <th> <h3>Dni del duenio:</h3>  </th> <td>'.$buscar[0]->getRDniDuenio()->getNro_dni().'</td> </tr>
          </table>'; 
}else{
    echo '<h2>No se ha encontrado el auto correspondiente a la patente ingresada<h2>';
}
?>
</div>