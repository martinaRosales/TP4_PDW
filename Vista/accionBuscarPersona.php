<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';
include_once '../Util/funciones.php';

$objControladorPersona=new C_Persona();
$datos = data_submitted();
$dniPersona=$datos["dni"][0];
$param['NroDni']=$dniPersona;
//Busca la persona según el dni ingresado:
$personaDatos=$objControladorPersona->buscar($param);

?>
<div class="container-md m-5 mx-auto">
            <form method="post" action="actualizarDatosPersona.php">
            <div class="row justify-content-center g-3 px-5">
            <div class="col-6 col-lg-4">
                    <label for="NroDni" class="form-label">DNI</label>
                    <input type="number" class="form-control" 
                    value=<?php echo $personaDatos[0]->getNro_dni()?> name="NroDni" id="NroDni" readonly>
                </div>
                <div class="col-6 col-lg-4">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" 
                    value="<?php echo $personaDatos[0]->getNombre()?>" name="Nombre" id="Nombre">
                </div>
                <div class="col-6 col-lg-4">
                    <label for="Apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" 
                    value="<?php echo $personaDatos[0]->getApellido()?>" name="Apellido" id="Apellido">
                </div>
                <div class="col-6 col-lg-4">
                    <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" 
                    value="<?php echo $personaDatos[0]->getFechaNac()?>" name="fechaNac" id="fechaNac">
                </div>
                <div class="col-6 col-lg-4">
                    <label for="Telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" 
                    value="<?php echo $personaDatos[0]->getTelefono()?>" name="Telefono" id="Telefono">
                </div>
                <div class="col-6 col-lg-4">
                    <label for="Domicilio" class="form-label">Domicilio</label>
                    <input type="text" class="form-control" 
                    value="<?php echo $personaDatos[0]->getDomicilio()?>" name="Domicilio" id="Domicilio">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary my-3">MODIFICAR</button>
                </div>
            </div>
            
            </form>
</div>