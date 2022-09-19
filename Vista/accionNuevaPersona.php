<?php
include('Common/Header.php');
include ('../Control/C_Persona.php');
include ('../Util/funciones.php');

$datos = data_submitted();
$objControlador = new C_Persona();
print_r($datos);
?>
<div>


</div>
<?php
include('Common/Footer.php');
?>