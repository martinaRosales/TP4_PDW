<?php
include_once('Common/Header.php');
?>

<div class="container-md justify-content-center">
    <div class="text-center mt-3">
        <h1>Agregar Auto</h1>
    </div>

    <form action="accionNuevoAuto.php" class="needs-validation m-3" novalidate id="form-nuevoAuto" name="form-nuevoAuto" method="post">
        <div class="row gap-2 justify-content-center">
            <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca" required>
                <label for="floatingInput">Marca</label>
            </div>
                <div class="invalid-feedback">
                    Debe ingresar una Marca.
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
            <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="Modelo" name="Modelo" placeholder="Modelo" required>
                <label for="floatingInput">Modelo</label>
            </div>
            <div class="invalid-feedback">
                    Debe ingresar un Modelo.
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
            <div class="form-floating col-6 col-lg-4">
                <input type="text" class="form-control" id="Patente" name="Patente" placeholder="Patente" required>
                <label for="floatingInput">Patente</label>
                <div class="invalid-feedback">
                    Debe ingresar una patente.
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
            </div>
                <div class="form-floating col-6 col-lg-4">
                <input type="number" class="form-control" id="DniDuenio" name="DniDuenio" placeholder="Numero Documento del dueño" required>
                <label for="floatingInput">Documento del dueño</label>
                <div class="invalid-feedback">
                    Debe ingresar un documento valido.
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