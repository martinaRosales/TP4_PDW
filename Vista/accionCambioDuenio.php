<?php
include_once('Common/Header.php');

$datos = data_submitted();

$objAuto = new C_Auto();
$objPersona = new C_Persona();

$auto = $objAuto->buscar($datos);
$personaNew = $objPersona->buscar($datos);
?>
<div  class="container col-md-5 " style="margin:30px;height:300vh;">
<?php
if(isset($auto,$personaNew)){

    $auto[0]->setRDniDuenio($personaNew[0]);
    
    $datosModificar = ['Patente'=> $auto[0]->getPatente(), 'Marca'=> $auto[0]->getMarca(), 'Modelo' => $auto[0]->getModelo(), 'DniDuenio' => $personaNew[0]->getNroDni()];

    $modificado = $objAuto->modificacion($datosModificar);
   
    if($modificado){
        echo '<h2>Se ha podido realizar la modificación con éxito, los nuevos datos son: </h2>'.
        '<table class="table table-primary table-striped table-bordered " > <tr> <th> <h3>Patente:</h3> </th> <td>'.$auto[0]->getPatente().'</td> </tr>
        <tr> <th > <h3>Marca:</h3> </th> <td>'.$auto[0]->getMarca().'</td> </tr>
        <tr> <th> <h3>Modelo:</h3> </th> <td>'.$auto[0]->getModelo().'</td> </tr>
        <tr> <th> <h3>Dni del duenio:</h3>  </th> <td>'.$auto[0]->getRDniDuenio()->getNroDni().'</td> </tr>
</table>'; 
    }else{
        echo '<h2  class="alert alert-danger" role="alert">No se ha podido realizar la modificación</h2>';
    }
}else{
    echo '<h2  class="alert alert-danger" role="alert">No se ha encontrado el auto o la persona ingresada</h2>';
}
?>

<div class="mb-3">
    
       <a href= "cambiarDuenio.php" class="btn btn-primary">Volver</a>
    </div>
</div>

<?php include_once('Common/Footer.php'); ?>