<?php
include_once 'Common/Header.php';
//include_once '../Control/C_Auto.php';

$objControlAuto = new C_Auto();
$arrayAutos = $objControlAuto->buscar(NULL);
if ($arrayAutos != null) {
    $cantidadAutos = count($arrayAutos);
} else {
    $cantidadAutos = -1;
}
$i = 0;
//print_r($arrayAutos);
?>

<div class="container-md my-4 mt-5">
    

        <?php
        if ($cantidadAutos != -1) {

        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Patente</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Duenio</th>
                    </tr>
                </thead>
                <?php
                while ($i < $cantidadAutos) {
                ?>
                    <tbody>
                        <tr>
                            <th><?php echo $arrayAutos[$i]->getPatente() ?></th>
                            <td><?php echo $arrayAutos[$i]->getMarca() ?></td>
                            <td><?php echo $arrayAutos[$i]->getModelo() ?></td>
                            <td><?php echo $arrayAutos[$i]->getRDniDuenio()->getNombre() . " " . $arrayAutos[$i]->getRDniDuenio()->getApellido() ?></td>
                            
                        </tr>
                    </tbody>
                <?php
                    $i++;
                }
            } else {
                ?>
                <div class="alert alert-warning" role="alert">
                    No existen autos cargados...
                </div>
            <?php
            }
            ?>


    </div>
</div>

<?php
include_once 'Common/Footer.php'; ?>