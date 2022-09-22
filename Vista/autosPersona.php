<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';
include_once '../Control/C_Auto.php';
include_once '../Util/funciones.php';

$datos = data_submitted();
$dniPersona=$datos["dni"][0];
$param['NroDni']=$dniPersona;
$objControladorPersona = new C_Persona();
$personaDatos=$objControladorPersona->buscar($param);
$objControladorAuto= new ControlAuto();
$param['dniDuenio']=$dniPersona;
$autosPersona=$objControladorAuto->buscar($param);
if($autosPersona!=null){
  $cantAutos=count($autosPersona);
}else{
  $cantAutos=-1;
}

?>

<div class="container-md my-5">
    <div class="text-center">
        <a href="listaPersonas.php" class="btn btn-primary mb-3">VOLVER A PERSONAS</a>
    </div>

    <div class="row align-items-center justify-content-center">
    <div class="col-10 col-md-6 col-xl-4" id="persona">               
        <h6 class="display-6"> <?php echo $personaDatos[0]->getNombre()?> <?php echo $personaDatos[0]->getApellido()?></h6>
        <h6>Fecha de Nacimiento: <?php echo $personaDatos[0]->getFechaNac()?></h6>
        <h6>Telefono: <?php echo $personaDatos[0]->getTelefono()?></h6>
        <h6>Domicilio: <?php echo $personaDatos[0]->getDomicilio()?></h6>
    </div>
    <div class="col-10 col-md-6" id="autos">
  <?php 
      if($cantAutos!=-1){ 
    ?>
    <h6 class="display-6">Autos que posee:</h6>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Patente</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
    </tr>
  </thead>
  <h1>
    <?php 
              $i=0;
              while ($i<$cantAutos){
                  ?>
                  <tbody>
                  <tr>
                    <th><?php echo $autosPersona[$i]->getPatente()?></th>
                    <td><?php echo $autosPersona[$i]->getMarca()?></td>
                    <td><?php echo $autosPersona[$i]->getModelo()?></td>
                  </tr>
                  </tbody>
                  <?php
                  $i++;
              }
      }else{
        ?>
        <h6 class='display-6'>No posee auto</h6>
        <?php
        }
           
        ?>
    </h1>
  
</table>
</div>
</div>

<?php
include('Common/Footer.php');
?>