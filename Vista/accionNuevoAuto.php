<?php
include('Common/Header.php');
include ('../Control/C_Auto.php');
include ('../Util/funciones.php');

$datos = data_submitted();
$objControlador = new ControlAuto();
$exito = $objControlador->alta($datos); 
?>
<div class="container-fluid">
    <h1>Nueva persona</h1>
    <?php 
        if($exito){
            ?>
            <div class="card bg-success">
                Nuevo auto cargado con exito.
            </div>
            <?php
        } else {
            ?>
            <div class="card bg-danger">
                No se pudo cargar el auto.
            </div>
            <?php
        }
    ?>
</div>
<?php
include('Common/Footer.php');
?>