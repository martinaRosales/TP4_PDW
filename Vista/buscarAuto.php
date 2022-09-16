<?php

include_once('Common/Header.php');
include_once('../Modelo/Auto.php');
include_once('../Modelo/Persona.php');

?>

<!-- container -->
<div  class="container-fluid">
    
    <!-- container formulario -->
    <div class="container col-md-5" style="margin:30px;height: 150vh;">
        <h2>Ejercicio 4</h2>
        <h3>Buscar Auto</h3>

        <form class="needs-validation" novalidate id="from_horarios" name="from_horarios" method="post" action="accionBuscarAuto.php">
    
        <!-- input -->
        <div class="mb-3">
        <label for="" class="form-label">Ingrese número de patente del auto: </label>
        <input type="text" class="form-control" id="patente" name="patente" min="0" required>

            <!-- invalid feedback -->
            <div class="invalid-feedback">
                Ingrese patente válida!
            </div>
            <!-- invalid feedback -->

            <!-- valid feedback -->
            <div class="valid-feedback">
                 Patente válida!
            </div>
            <!-- valid feedback -->
    
        </div>    
        <!-- input -->

        <!-- submit -->
        <div class="mb-3">
        <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
        <!-- submit -->

        </form>

        <script src="Assets/Javascript/buscarAuto.js"></script>

    </div>
    <!-- container formulario -->

</div>
<!-- container -->
    

<?php include_once('Common/Footer.php'); ?>