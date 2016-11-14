<?php
include('../head.php');
include('../footer.php');
include('../menu.php');
/*
session_start();
if ($_SESSION['tipo'] != "Administrador")
{
$msj = "Debe iniciar sesión como administrador";
header("Location:../login/index.php?msj=$msj");
exit(0);
}
require_once ("../extras/php/head.php");
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php print head() ?>
</head>
<body>
<div id="wrapper">
    <?php print menu() ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Matr&iacute;culas</h3>
            </div>
            <?php
            include "../extras/php/basico.php";
            include "../config.php";

            $sql = sprintf("select * from matriculas m inner join grado g on m.idgrado=g.idgrado inner join grupos gr on m.idgrupo=gr.idgrupo where idmatricula=%d",
                (int)$_GET['id']);
            $per = mysql_query($sql);
            $num_rs_per = mysql_num_rows($per);
            if ($num_rs_per == 0) {
                echo "No existen matriculas con este codigo";
                exit;
            }

            $rs_per = mysql_fetch_assoc($per);

            ?>
            <h3>Matricular Estudiante</h3>
            <form action="matricular.php" method="post" id="frm_per">
                <input type="hidden" id="ide_per" name="ide_per" value="<?php if (isset($rs_per['ide_per'])) {
                    echo $rs_per['ide_per'];
                } ?>"/>
                <input type="hidden" id="idmatricula" name="idmatricula" value="<?php echo $rs_per['idmatricula']; ?>"/>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>A&ntilde;o</td>
                        <td><?php echo $rs_per['anio']; ?></td>
                    </tr>
                    <tr>
                        <td>Grado</td>
                        <td><?php echo $rs_per['grado']; ?>
                            <!--
                <select name="idgrado">
  <?php

                            $qq = mysql_query("select * from grado order by 2 asc");
                            while ($rr = mysql_fetch_array($qq)) {
                                echo "<option value=" . $rr['idgrado'] . ">" . $rr['grado'] . "</option>";
                            }

                            ?>
  </select>--></td>
                    </tr>
                    <tr>
                        <td>Grupo</td>
                        <td><select name="idgrupo">
                                <option
                                    value="<?php echo $rs_per['idgrupo']; ?>"><?php echo $rs_per['grupo']; ?></option>
                                <?php

                                $qq = mysql_query("select * from grupos");
                                while ($rr = mysql_fetch_array($qq)) {
                                    if ($rr['idgrupo'] != $rs_per['idgrupo']) {
                                        echo "<option value=" . $rr['idgrupo'] . ">" . $rr['grupo'] . "</option>";
                                    }
                                }

                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>C&oacute;digo Estudiante</td>
                        <td><input name='idestudiante' type='text' value="<?php echo $rs_per['idestudiante']; ?>"
                                   size="15" readonly="readonly"/>|
                    </tr>
                    <tr>
                        <td>Opciones:</td>
                        <td>Promovido<input type="radio" name="promovido" value="Si" checked="checked"/><br/>
                            Repitente<input type="radio" name="promovido" value="No"/></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td><select name="estado">
                                <option value="Activo">Activo</option>
                                <option value="Activo">Inscrito</option>
                                <option value="Promovido">Promovido</option>
                                <option value="Activo">Retirado</option>
                            </select></td>
                    </tr>
                    <tfoot>
                    <tr>
                        <td colspan="2">
                            <input name="modificar" type="submit" class="btn btn-default" id="modificar"
                                   value="Modificar"/>
                            <input name="cancelar" type="button" class="btn btn-default" id="cancelar" value="Cancelar"
                                   onclick=""/>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div>
<?php print footer() ?>
</body>
</html>