<?php
include_once('Common/Header.php');
include_once('Common/Footer.php');
?>

<div class="container-fluid">

    <h1>Agregar Persona</h1>

    <form action="accionBuscarAuto.php" class="m-3">
        <div class="row gap-2 justify-content-center">
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                <label for="floatingInput">Apellido</label>
            </div>
            <div class="form-floating col-3">
                <input type="number" class="form-control" id="nroDocumento" placeholder="Numero Documento">
                <label for="floatingInput">Documento</label>
            </div>
            <div class="form-floating col-3">
                <input type="date" class="form-control" id="fechaNac">
                <label for="floatingInput">Fecha Nacimiento</label>
            </div>
            <div class="form-floating col-3">
                <input type="number" class="form-control" id="apellido" placeholder="Numero Telefono">
                <label for="floatingInput">Numero Telefono</label>
            </div>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="apellido" placeholder="Direccion">
                <label for="floatingInput">Direccion</label>
            </div>
        </div>

        <div>
            
            <button class="btn btn-secondary" type="reset">Borrar</button>
            <button class="btn btn-primary"  type="Submit">Enviar</button>
        </div>
    </form>


</div>