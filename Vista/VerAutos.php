<?php
include_once 'Common/Header.php';

include_once '../Control/C_Auto.php';

$objControlAuto = new ControlAuto();
$arrayAutos = $objControlAuto->buscar(NULL);
$cantidadAutos = count($arrayAutos);
$i = 0;
//print_r($arrayAutos);
?>

<div class="container-fluid">
    <h1>Ver Autos</h1>
    <div class="container row gap-1">


        <?php
        while ($i < $cantidadAutos) {
        ?>

            <div class="card bg-secondary col-md-12" style="width: 18rem; --bs-bg-opacity: .5;">
                <div class="card-body">
                    <div class="card-title fw-bold">
                        Auto n° <?php echo $i + 1 ?>
                    </div>
                    <hr>
                    <div class="card-subtitle mb-2 text-muted">Datos Auto</div>
                    Patente: <?php echo $arrayAutos[$i]->getPatente() ?> <br>
                    Marca: <?php echo $arrayAutos[$i]->getMarca() ?> <br>
                    Modelo: <?php echo $arrayAutos[$i]->getModelo() ?> <br>
                    <hr>
                    <div class="card-subtitle mb-2 text-muted">Datos Dueño</div>
                    Nombre: <?php echo $arrayAutos[$i]->getRDniDuenio()->getNombre() ?> <br>
                    Apellido: <?php echo $arrayAutos[$i]->getRDniDuenio()->getApellido() ?>
                </div>

            </div>
        <?php


            $i++;
        }
        ?>
    </div>
</div>

<?php
include_once 'Common/Footer.php'; ?>