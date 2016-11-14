<?php

include ('../config.php');
include ('../extras/php/basico.php');
$sql = sprintf("delete from acudientes where idacudiente=%d", (int)$_POST['ide_per']);
if (!mysql_query($sql))
    echo "No se puede eliminar.";
exit;

?>