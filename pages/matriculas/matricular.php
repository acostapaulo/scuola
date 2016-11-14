<?php

include "../config.php";
include "../extras/php/basico.php";

/*modificar el registro*/

//$sql = "UPDATE `matriculas` SET  `nombres` =  '{$_POST['nombres']}' ,  `apellidos` =  '{$_POST['apellidos']}' ,  `direccion` =  '{$_POST['direccion']}' ,  `telefono` =  '{$_POST['telefono']}' ,  `telefonotrabajo` =  '{$_POST['telefonotrabajo']}' ,  `celular` =  '{$_POST['celular']}' ,  `email` =  '{$_POST['email']}' ,  `ocupacion` =  '{$_POST['ocupacion']}'    WHERE `idacudiente` = '{$_POST['idacudiente']}' ";
$sql = "UPDATE `matriculas` set  `fecha` =  ".date('Y-m-d')." ,  `idgrupo` =  '{$_POST['idgrupo']}' ,   `estado` =  '{$_POST['estado']}'   WHERE `idmatricula` = '{$_POST['idmatricula']}' ";

if (!mysql_query($sql)){
    echo "Error al modificar la matricula:\n$sql" . mysql_error();
    exit;
}else{
    header("Location: index.php");
    exit;
}

?>