<?php
include('Common/Header.php');
include ('../Control/C_Persona.php');
include ('../Util/funciones.php');

$datos = data_submitted();
$objControlador = new C_Persona();
$exito = $objControlador->alta($datos);
?>
<div class="container-fluid">
    <h1>Nueva persona</h1>
    <?php 
        if($exito){
            ?>
            <div class="card bg-success">
                Nueva persona cargada con exito.
            </div>
            <?php
        } else {
            ?>
            <div class="card bg-danger">
                No se pudo cargar la persona.
            </div>
            <?php
        }
    ?>
</div>
<?php
include('Common/Footer.php');
?>