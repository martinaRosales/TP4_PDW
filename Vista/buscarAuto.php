<?php
include_once('Common/Header.php');
?>

<!-- container -->
<div  class="container-fluid">
    
    <!-- container formulario -->
    <div class="container col-md-5" style="margin:50px;height:200px;">
        <h2>Buscar Auto</h2>

        <form class="needs-validation" novalidate id="form_patente" name="form_patente" method="post" action="accionBuscarAuto.php">
    
        <!-- cont input -->
        <div class="mb-3">
        <label for="" class="form-label">Ingrese número de patente del auto: </label>
        <input type="text" class="form-control" minlength='6' id="Patente" name="Patente" min="0" required>

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
        <!-- cont input -->

        <!-- submit -->
        <div class="mb-3">
        <input class="btn btn-primary" type="submit" value='Guardar'></input>
        </div>
        <!-- submit -->

        </form>

        <script src="Assets/Javascript/validarRequeridos.js"></script>

    </div>
    <!-- container formulario -->

</div>
<!-- container -->
    

<?php include_once('Common/Footer.php'); ?>