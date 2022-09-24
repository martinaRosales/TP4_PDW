<?php
include_once 'Common/Header.php';


$objControlPersona=new C_Persona();
$objPersonas=$objControlPersona->buscar(NULL);
$cantPersonas=count($objPersonas);
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
                echo "<option value=".$objPersonas[$i]->getNroDni().">"
                        .$objPersonas[$i]->getNroDni()."</option>";
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
<?php
include_once('Common/Footer.php');
?>