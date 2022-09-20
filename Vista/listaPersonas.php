<?php
include_once 'Common/Header.php';
include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';

$objControlPersona=new C_Persona();
$arrayPersonas=$objControlPersona->buscar(NULL);
$cantPersonas=count($arrayPersonas);
?>
<div class="container-md">
<table class="table">
  <thead>
    <tr>
      <th scope="col">NroDoc</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Telefono</th>
      <th scope="col">Domicilio</th>
    </tr>
  </thead>
  <h1>
    <?php echo $cantPersonas;
            $i=0;
            while ($i<$cantPersonas){
                ?>
                <tbody>
                <tr>
                  <th><?php echo $arrayPersonas[$i]->getNro_dni()?></th>
                  <td><?php echo $arrayPersonas[$i]->getNombre()?></td>
                  <td><?php echo $arrayPersonas[$i]->getApellido()?></td>
                  <td><?php echo $arrayPersonas[$i]->getFechaNac()?></td>
                  <td><?php echo $arrayPersonas[$i]->getTelefono()?></td>
                  <td><?php echo $arrayPersonas[$i]->getDomicilio()?></td>
                </tr>
                </tbody>
                <?php
                $i++;
            }
    ?>
    </h1>
  
</table>
</div>

<script type="text/javascript" src="Assets/Javascript/verPersonas.js"></script>