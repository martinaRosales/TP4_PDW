<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';
$objControlPersona=new C_Persona();
$arrayPersonas=$objControlPersona->buscar(NULL);
$cantPersonas=count($arrayPersonas);

?>
<div class="container-md mt-5 justify-content-center">
    <div class="text-center">
        <a href="listaPersonas.php" class="btn btn-primary mb-3">VOLVER</a>
    </div>
    <form class="w-50 mt-3" action="accionBuscarAutosdePersona.php" method="post">
        <h5>Seleccione el dni de la persona a buscar</h5>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <?php 
            $i=0;
            while ($i<$cantPersonas){
                echo "<option value='NroDni' name='NroDni'>"
                        .$arrayPersonas[$i]->getNro_dni()."</option>";
                $i++;
            }
        ?>
        </select>
        <button type="submit" class="btn btn-primary mb-3">BUSCAR</button>
    </form >
</div>