<?php
include_once('Common/Header.php');
?>

<div class="container-md justify-content-center" style="height: 80vh;">
    <div class="text-center mt-3">
        <h1>Agregar Auto</h1>
    </div>

    <form action="accionNuevoAuto.php" class="needs-validation m-3" novalidate id="form-nuevoAuto" name="form-nuevoAuto" method="post">
        <div class="row gap-2 justify-content-center">
            <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="Marca" name="Marca" pattern="[a-z,A-Z,0-9]{3,20}$" required>
                <label for="floatingInput">Marca</label>
                <div class="invalid-feedback">
                    Debe ingresar una Marca.
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
            </div>
            <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="Modelo" name="Modelo" pattern="[0-9]{1,10}" required>
                <label for="floatingInput">Modelo</label>
                <div class="invalid-feedback">
                Debe ingresar un modelo valido (solo números hasta 11 carácteres).
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
            </div>
            <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="Patente" name="Patente" pattern="[a-z,A-Z,0-9]{3,10}$" required>
                <label for="floatingInput">Patente</label>
                <div class="invalid-feedback">
                    Debe ingresar una patente válida (solo números y letras hasta 10 carácteres)
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
            </div>
                <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="DniDuenio" name="DniDuenio" pattern="[0-9]{3,10}$" required>
                <label for="floatingInput">Documento del dueño</label>
                <div class="invalid-feedback">
                    Debe ingresar un documento valido (solo números hasta 10 carácteres).
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
                </div>
            <div>
    <div class="text-center mt-3">
        <button class="btn btn-secondary" type="reset">Borrar</button>
        <button class="btn btn-primary" type="Submit">Enviar</button>
    </div>
        </div>
    </form>


</div>
<script src="Assets/Javascript/validarRequeridos.js"></script>
<?php
include_once('Common/Footer.php');
?>