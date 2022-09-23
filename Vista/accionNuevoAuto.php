<?php
include('Common/Header.php');

$datos = data_submitted();
$dni=$datos['DniDuenio'];
$objControlPersona=new C_Persona();
$existeDni=$objControlPersona->existeDni($dni);
//echo $existeDni?"SI":"NO";
$objControlAuto = new C_Auto();
?>
<div class="container-md m-5">
    <?php 
        if($existeDni){
            $param['NroDni']=$dni;
            $personaObj=$objControlPersona->buscar($param);
            $datos['DniDuenio']=$personaObj[0];
            $exito = $objControlAuto->alta($datos); 
            if($exito){
                ?>
                <div class="w-50">
                <div class="card bg-success">
                    Nuevo auto cargado con exito.
                </div>
                </div>
                <?php
            } else {
                ?>
                <div class="w-50">
                <div class="card bg-danger">
                    No se pudo cargar el auto.
                </div>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="w-50">
            <div class="alert alert-warning" role="alert">
                No existe la persona con el dni ingresado. Si desea crear un nuevo registro de persona, haga click en el siguiente botón.
                También puede ver <a href="">aquí</a> las personas registradas.
                </div>
                <button type="button" class="btn btn-primary" href="">CREAR PERSONA</button>
            </div>
            <?php
        }
        
    ?>
</div>
<?php
include('Common/Footer.php');
?>