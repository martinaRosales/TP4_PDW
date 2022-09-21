<?php
include_once 'Common/Header.php';
//include_once 'Common/Footer.php';
include_once '../Control/C_Persona.php';

$objControlPersona=new C_Persona();
$arrayPersonas=$objControlPersona->buscar(NULL);
$cantPersonas=count($arrayPersonas);
?>