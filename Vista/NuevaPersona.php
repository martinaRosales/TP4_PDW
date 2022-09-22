<?php
include_once('Common/Header.php');
?>

<div class="container-fluid">

    <h1>Agregar Persona</h1>

    <form action="accionNuevaPersona.php" class="needs-validation m-3" novalidate id="form-nuevaPersona" name="form-nuevaPersona" method="post">
        <div class="row gap-2 justify-content-center">
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" required pattern="[a-zA-Z ]{5,30}">
                <label for="floatingInput">Nombre</label>
                <div class="invalid-feedback">
                    Debe ingresar mas de 5 caracteres y solamente letras.
                </div>
            </div>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Apellido" required pattern="[a-zA-Z ]{5,30}">
                <div class="invalid-feedback">
                    Debe ingresar mas de 5 caracteres y solamente letras.
                </div>
                <label for="floatingInput">Apellido</label>
            </div>
            <div class="form-floating col-3">
                <input type="number" class="form-control" id="NroDni" name="NroDni" placeholder="Numero Documento" required pattern="[0-9]{8,12}"  >
                <label for="floatingInput">Documento</label>
                <div class="invalid-feedback">
                    Debe ingresar un documento.
                </div>
                
            </div>
            <div class="form-floating col-3">
                <input type="date" class="form-control" name="fechaNac" id="fechaNac">
                <label for="floatingInput">Fecha Nacimiento</label>
            </div>
            <div class="form-floating col-3">
                <input type="number" class="form-control" id="Telefono" name="Telefono" placeholder="Numero Telefono">
                <label for="floatingInput">Numero Telefono</label>
            </div>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="Domicilio" name="Domicilio" placeholder="Direccion">
                <label for="floatingInput">Direccion</label>
            </div>
        </div>

        <div>

            <button class="btn btn-secondary" type="reset">Borrar</button>
            <button class="btn btn-primary" type="Submit">Enviar</button>
        </div>
    </form>


</div>
<script src="Assets/Javascript/validarPersona.js"></script>
<?php
include_once('Common/Footer.php');
?>