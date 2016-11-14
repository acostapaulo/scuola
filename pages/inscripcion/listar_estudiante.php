<?php

require_once ("../extras/php/head.php");

?>
<?php

/*session_start();
if($_SESSION['tipo']!="Administrador"){
$msj="Error";
header("Location:../login/index.php?msj=$msj");
exit(0);
}*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php

cabecera();

?>
</head>


<script> 
function ponPrefijo(pref){ 
   	opener.document.matriculas.idestudiante.value = pref 
   	window.close() 
} 
</script> 


<?php

include ('../config.php');
echo "Seleccione el c&oacute;digo del Estudiante para agregarlo al formulario";
/*echo "<table border=1 align='center' >";
echo "<thead><tr>"; 
echo "<th><b>Idestudiante</b></th>"; 
echo "<th><b>Apellidos</b></th>"; 
echo "<th><b>Nombres</b></th>"; 
echo "</tr></thead>"; */

?>
<center>
<form action="" method="post">
<input type="text" name="ape" /><button type="submit">Buscar</button>
</form>
</center>
<table id="grilla" class="lista" >
 <thead>
        <tr>
            <th>Id Estudiante</th>
            <th>Apellidos</th>
            <th>Nombres</th>                      
			  </tr>
			</thead>
              <tbody>
			<?php

            if(isset($_POST['ape'])){
                $result = mysql_query("SELECT * FROM `estudiantes` where apellidos like '%" . $_POST['ape'] . "%' ") or trigger_error(mysql_error
                ());
            }else {
                $result = mysql_query("SELECT * FROM `estudiantes` ") or trigger_error(mysql_error
                ());
            }
while ($row = mysql_fetch_array($result))
{
    foreach ($row as $key => $value)
    {
        $row[$key] = stripslashes($value);
    }
    echo "<tr>";
    echo "<td valign='top'><a href='javascript:ponPrefijo(" . nl2br($row['idestudiante']) .
        ")'>" . nl2br($row['idestudiante']) . "</td>";
    echo "<td valign='top'>" . nl2br($row['apellidos']) . "</td>";
    echo "<td valign='top'>" . nl2br($row['nombres']) . "</td>";
    echo "</tr>";
}
echo "</table>";

?>
</tbody>
</table>

</body>
</html>