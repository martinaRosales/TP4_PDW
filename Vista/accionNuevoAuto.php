<?php
include('Common/Header.php');

$datos = data_submitted();
$dni=$datos['DniDuenio'];
$objControlPersona=new C_Persona();
$existeDni=$objControlPersona->existeDni($dni);
$objControlAuto = new C_Auto();
?>
<div class="container-md m-5 justify-content-center" style="display:flex">
    <?php 
        if($existeDni){
            $exito = $objControlAuto->alta($datos); 
            if($exito){
                ?>
                <div class="w-50 text-center">
                <div class="alert alert-success">
                    Nuevo auto cargado con exito.
                </div>
                </div>
                <?php
            } else {
                ?>
                <div class="w-50 text-center">
                <div class="alert alert-warning">
                    No se pudo cargar el auto.
                </div>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="w-50 text-center">
            <div class="alert alert-warning" role="alert">
                No existe la persona con el dni ingresado. Si desea crear un nuevo registro de persona, haga click en el siguiente botón.
                También puede ver <a href="listaPersonas.php">aquí</a> las personas registradas.
                </div>
                <a type="button" class="btn btn-primary" href="NuevaPersona.php">CREAR PERSONA</a>
            </div>
            <?php
        }
        
    ?>
</div>
<?php
include('Common/Footer.php');
?>