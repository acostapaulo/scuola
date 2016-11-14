<?php

include "../config.php";
include "../extras/php/basico.php";

/*verificamos si las variables se envian*/
if (empty($_POST['idacudiente']) || empty($_POST['nombres']) || empty($_POST['apellidos']) ||
    empty($_POST['direccion']) || empty($_POST['telefono']))
{
    echo "Usted no a llenado todos los campos";
    exit;
}

/*modificar el registro*/

$sql = "UPDATE `acudientes` SET  `nombres` =  '{$_POST['nombres']}' ,  `apellidos` =  '{$_POST['apellidos']}' ,  `direccion` =  '{$_POST['direccion']}' ,  `telefono` =  '{$_POST['telefono']}' ,  `telefonotrabajo` =  '{$_POST['telefonotrabajo']}' ,  `celular` =  '{$_POST['celular']}' ,  `email` =  '{$_POST['email']}' ,  `ocupacion` =  '{$_POST['ocupacion']}'    WHERE `idacudiente` = '{$_POST['idacudiente']}' ";
if (!mysql_query($sql))
    echo "Error al modificar la matricula:\n$sql" . mysql_error();
exit;

?>