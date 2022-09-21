<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';

$objControlPersona=new C_Persona();
$arrayPersonas=$objControlPersona->buscar(NULL);
$cantPersonas=count($arrayPersonas);
?>

<div class="container-md my-4">
    <div class="row justify-content-center">
      <form class="w-50 mt-3" action="accionBuscarPersona.php" method="post">
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
        <button type="submit" class="btn btn-primary my-3">VER PERSONA</button>
        </div>
      </form >
    </div>
</div>