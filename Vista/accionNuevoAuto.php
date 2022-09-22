<?php
include('Common/Header.php');

$datos = data_submitted();
$objControlador = new C_Auto();
$exito = $objControlador->alta($datos); 
?>
<div class="container-fluid">
    <h1>Nuevo auto</h1>
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