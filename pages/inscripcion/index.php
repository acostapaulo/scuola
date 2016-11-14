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
    <script language="javascript">
        var miPopup
        function abreVentana() {
            miPopup = window.open("listar_estudiante.php", "miwin", "width=400,height=600,scrollbars=yes")
            miPopup.focus()
        }
    </script>
</head>
<body>
<div id="wrapper">
    <?php print menu() ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Inscripciones</h3>
            </div>
            <form action="javascript: fn_buscar();" id="frm_buscar" name="frm_buscar">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Usu<strong>a</strong>rio</td>
                        <td><input name="criterio_usu_per" type="text" id="criterio_usu_per"/></td>
                        <td>Ordenar</td>
                        <td>
                            <select name="criterio_ordenar_por" id="criterio_ordenar_por"
                                    onChange="frm_buscar.submit()">
                                <option value="idmatricula">C&oacute;digo</option>
                                <option value="anio">A&ntilde;o</option>
                                <option value="m.idgrado">Grado</option>
                            </select>
                        </td>
                        <td> En</td>
                        <td>
                            <select name="criterio_orden" id="criterio_orden" onChange="frm_buscar.submit()">
                                <option value="desc">Descendente</option>
                                <option value="asc">Ascendente</option>
                            </select>
                        </td>
                        <td>Registros</td>
                        <td>
                            <select name="criterio_mostrar" id="criterio_mostrar" onChange="frm_buscar.submit()">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20" selected="selected">20</option>
                                <option value="40">40</option>
                            </select>
                        </td>
                        <td><input type="submit" class="btn btn-default" value="Buscar"/></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div id="div_listar"></div>
            <div id="div_oculto" style="display: none;"></div>
        </div>
    </div>
</div>
<?php print footer() ?>
</body>
</html>