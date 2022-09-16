<?php
include_once 'Common/Header.php';
include_once 'Common/Footer.php';
include_once '../Control/C_Auto.php';

$objControlAuto = new ControlAuto();
$arrayAutos = $objControlAuto->buscar(NULL);
$cantidadAutos = count($arrayAutos);
$i = 0;
?>

<div class="container-fluid">
    <div>
        <div class="container col-md-12" style="margin:30px;height: 150vh;">
            <h1>Ver Autos</h1>
            <?
            ?>
        </div>
    </div>