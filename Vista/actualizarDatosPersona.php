<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';
include_once '../Util/funciones.php';

$objControladorPersona=new C_Persona();
$datos = data_submitted();
$modifico=$objControladorPersona->modificacion($datos);


if($modifico){
    ?>
    <div class="container-md my-5 w-75">
        <div class="alert alert-info text-center" role="alert">
            ¡Persona modificada correctamente!
        </div>
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-10 col-md-6" id="persona">               
                <h6 class="display-6"> <?php echo $datos['Nombre']?> <?php echo $datos['Apellido']?></h6>
                <h6>Fecha de Nacimiento: <?php echo $datos['fechaNac']?></h6>
                <h6>Telefono: <?php echo $datos['Telefono']?></h6>
                <h6>Domicilio: <?php echo $datos['Domicilio']?></h6>
            </div>
        </div>
    </div>
<?php
}else{
    ?>
    <div class="container-md my-5 w-75">
    <div class="alert alert-danger text-center" role="alert">
        Error al modificar persona
    </div>
    </div>
    <?php
}
?>


