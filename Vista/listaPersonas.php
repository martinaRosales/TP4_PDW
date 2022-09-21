<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';

$objControlPersona=new C_Persona();
$arrayPersonas=$objControlPersona->buscar(NULL);
$cantPersonas=count($arrayPersonas);
?>
<div class="container-md my-4 mt-5">
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
    <?php 
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
<div class="container-md">
    <div class="row justify-content-center">
      <form class="w-50 mt-3" action="autosPersona.php" method="post">
      <h6>Seleccione el dni de la persona a buscar</h6>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" 
                name="dni[]" id="dni">
        <?php 
            $i=0;
            while ($i<$cantPersonas){
                echo "<option value=".$arrayPersonas[$i]->getNro_dni().">"
                        .$arrayPersonas[$i]->getNro_dni()."</option>";
                $i++;
            }
        ?>
        </select>
        <div class="text-center">
        <button type="submit" class="btn btn-primary my-3">VER AUTOS</button>
        </div>
      </form >
    </div>
</div>
<script type="text/javascript" src="Assets/Javascript/verPersonas.js"></script>