<?php

include "../config.php";
$usu_per = $_GET['idacudiente'];
$sql = "select * from acudientes where idacudiente='$idacudiente'";
$per = mysql_query($sql);
$num_rs_per = mysql_num_rows($per);
if ($num_rs_per == 0)
    echo "true";
else
    echo "false";

?>