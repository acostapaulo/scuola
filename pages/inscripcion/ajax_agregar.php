<?php

include "../config.php";
include "../extras/php/basico.php";

/*verificamos si las variables se envian*/
/*if (empty($_POST['anio']) || empty($_POST['idgrado']) || empty($_POST['idgrupo']) ||    empty($_POST['idestudiante']))
{
    echo "Usted no ha llenado todos los campos";
    exit;
}*/
if ($_POST['anio'] < date("Y")) {
    echo "No puede matricular en un año anterior al actual";
    exit;
} else {
    $sql = "select * from matriculas m inner join estudiantes e on m.idestudiante=e.idestudiante and anio=" . date("Y") . " and m.idestudiante=" . $_POST['idestudiante'];
    $q = mysql_query($sql);
    if (mysql_num_rows($q) > 0) {
        echo "Este estudiante ya está matriculado para este período";
        exit;
    } else {
        $sql = "INSERT INTO `matriculas` ( `anio` ,  `idestudiante`,`idgrado`,`estado` ) VALUES(  '{$_POST['anio']}' ,   '{$_POST['idestudiante']}', '{$_POST['idgrado']}','Inscrito') ";
        if (!mysql_query($sql))
            echo "Error al insertar la nueva matrícula:\n$sql" . mysql_error();
        exit;
    }
}
?>