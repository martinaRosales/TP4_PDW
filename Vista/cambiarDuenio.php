<?php

include_once('Common/Header.php');
include_once('../Modelo/Auto.php');
include_once('../Modelo/Persona.php');

?>

<!-- container -->
<div  class="container-fluid">
    
    <!-- container formulario -->
    <div class="container col-md-3" style="margin:30px;height:300px;">
        <h2>Cambiar Dueño</h2>

        <form class="needs-validation" novalidate id="form_patente" name="form_patente" method="post" action="accionBuscarAuto.php">
    
        <!-- cont input patente-->
        <div class="mb-4">
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
        <!-- cont input patente-->   

        <!-- cont input doc-->
        <div class="mb-3">
        <label for="" class="form-label">Ingrese dni del dueño a quitar: </label>
        <input type="text" class="form-control" id="NroDni" name="NroDni" min="0" required>

            <!-- invalid feedback -->
            <div class="invalid-feedback">
                Ingrese número de documento válido!
            </div>
            <!-- invalid feedback -->

            <!-- valid feedback -->
            <div class="valid-feedback">
                 Número de documento válido!
            </div>
            <!-- valid feedback -->

        </div>    
        <!-- cont input doc-->

        <!-- submit -->
        <div class="mb-3">
        <input class="btn btn-primary" type="submit" value='Guardar'></input>
        </div>
        <!-- submit -->

        </form>

        <script src="Assets/Javascript/buscarAuto.js"></script>

    </div>
    <!-- container formulario -->

</div>
<!-- container -->
    

<?php include_once('Common/Footer.php'); ?>