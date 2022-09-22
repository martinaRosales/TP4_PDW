<?php
include('Common/Header.php');
include('../Control/C_Persona.php');
include('../Util/funciones.php');

$datos = data_submitted();
$objControlador = new C_Persona();
$exito = $objControlador->alta($datos);
?>
<div class="container-fluid row justify-content-center">
    <div class="container col-md-12 " style="margin:30px;">
        <?php
        if ($exito) {
        ?>
            <div class="alert alert-success" role="alert">
                Nueva persona cargada con exito!
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                No se pudo cargar la persona.
            </div>
        <?php
        }
        ?>
        <a href="NuevaPersona.php" class="text-decoration-none">
            <button type="button" class="btn btn-primary">Cargar nueva persona.</button>
        </a>  
        <a href="listaPersonas.php" class="text-decoration-none">
            <button type="button" class="btn btn-primary">Ver personas cargadas.</button>
        </a>
    </div>

</div>
<?php
include('Common/Footer.php');
?>