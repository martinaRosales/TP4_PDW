<?php
include_once('Common/Header.php');

$datos = data_submitted();

$objAuto = new C_Auto();

$buscar = $objAuto->buscar($datos);
?>

<div  class="container col-md-5 " style="margin:30px;height:150vh;">
<?php
if(isset($buscar)){
    echo '<table class="table table-primary table-striped table-bordered " > <tr> <th> <h3>Patente:</h3> </th> <td>'.$buscar[0]->getPatente().'</td> </tr>
                    <tr> <th > <h3>Marca:</h3> </th> <td>'.$buscar[0]->getMarca().'</td> </tr>
                    <tr> <th> <h3>Modelo:</h3> </th> <td>'.$buscar[0]->getModelo().'</td> </tr>
                    <tr> <th> <h3>Nombre del duenio:</h3>  </th> <td>'.$buscar[0]->getRDniDuenio()->getNombre(). " " . $buscar[0]->getRDniDuenio()->getApellido() .'</td> </tr>
                    <tr> <th> <h3>Dni del duenio:</h3>  </th> <td>'.$buscar[0]->getRDniDuenio()->getNroDni().'</td> </tr>
          </table>'; 
}else{
    echo '<h2 class="alert alert-danger" role="alert">No se ha encontrado el auto correspondiente a la patente ingresada</h2>';
}
?>

<div class="mb-3">
       <a href= "buscarAuto.php" class="btn btn-primary">Volver</a>
    </div>
</div>

<?php include_once('Common/Footer.php'); ?>