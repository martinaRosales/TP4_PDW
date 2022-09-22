<?php
include_once('Common/Header.php');
?>

<div class="container-fluid">

    <h1>Agregar Auto</h1>

    <form action="accionNuevoAuto.php" class="needs-validation m-3" novalidate id="form-nuevoAuto" name="form-nuevoAuto" method="post">
        <div class="row gap-2 justify-content-center">
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="marca" name="Marca" placeholder="Marca">
                <label for="floatingInput">Marca</label>
            </div>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="modelo" name="Modelo" placeholder="Modelo">
                <label for="floatingInput">Modelo</label>
            </div>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="patente" name="Patente" placeholder="Patente" required>
                <label for="floatingInput">Patente</label>
                <div class="invalid-feedback">
                    Debe ingresar una patente.
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
                <div class="form-floating col-3">
                <input type="number" class="form-control" id="dniDuenio" name="dniDuenio" placeholder="Numero Documento del dueño" required>
                <label for="floatingInput">Documento del dueño</label>
                <div class="invalid-feedback">
                    Debe ingresar un documento.
                </div>
                <div class="valid-feedback">
                    Todo correcto!
                </div>
                </div>
        <div>

            <button class="btn btn-secondary" type="reset">Borrar</button>
            <button class="btn btn-primary" type="Submit">Enviar</button>
        </div>
    </form>


</div>

<?php
include_once('Common/Footer.php');
?>