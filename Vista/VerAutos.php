<?php
include_once 'Common/Header.php';
//include_once '../Control/C_Auto.php';

$objControlAuto = new C_Auto();
$arrayAutos = $objControlAuto->buscar(NULL);
if($arrayAutos!=null){
    $cantidadAutos = count($arrayAutos);
}else{
    $cantidadAutos=-1;
}
$i = 0;
//print_r($arrayAutos);
?>

<div class="container-fluid">
    <div class="container row gap-1 justify-content-center g-3 my-3">
    <h1 class="text-center">Ver Autos</h1>

        <?php
        if($cantidadAutos!=-1){
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
        }else{
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