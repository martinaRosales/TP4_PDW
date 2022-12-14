<?php

include_once('Common/Header.php');

?>

<!-- container -->
<div  class="container-fluid">
    
    <!-- container formulario -->
    <div class="container col-md-3" style="margin:30px;height:300px;">
        <h2>Cambiar Dueño</h2>

        <form class="needs-validation" novalidate id="form_patente" name="form_patente" method="post" action="accionCambioDuenio.php">
    
        <!-- cont input patente-->
        <div class="mb-4">
        <label for="" class="form-label">Ingrese número de patente del auto: </label>
        <input type="text" class="form-control" id="Patente" pattern="[A-Z]{3}\s[0-9]{3}" name="Patente" minlength='6' maxlength='7' required>

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
        <label for="" class="form-label">Ingrese dni del dueño nuevo: </label>
        <input type="text" pattern="[0-9]{8}" class="form-control" id="NroDni" name="NroDni" min="0" minlength='7' maxlength='15' required>

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

        <script src="Assets/Javascript/validarRequeridos.js"></script>

    </div>
    <!-- container formulario -->

</div>
<!-- container -->
    

<?php include_once('Common/Footer.php'); ?>