<?php

include "../config.php";
include "../extras/php/basico.php";
include "../extras/php/PHPPaging.lib.php";

header("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE


$paging = new PHPPaging;
$sql = "select m.idmatricula, m.anio, g.grado, gr.grupo, concat(e.nombres,' ',e.apellidos) as estudiante  from matriculas m left join grado g on m.idgrado=g.idgrado left join grupos gr on m.idgrupo=gr.idgrupo inner join estudiantes e on m.idestudiante=e.idestudiante ";
if (isset($_GET['criterio_usu_per']))
    $sql .= " where estado='Inscrito' and idmatricula like '%" . fn_filtro(substr($_GET['criterio_usu_per'],
            0, 16)) . "%'";
if (isset($_GET['criterio_ordenar_por']))
    $sql .= sprintf(" order by %s %s", fn_filtro($_GET['criterio_ordenar_por']),
        fn_filtro($_GET['criterio_orden']));
else
    $sql .= " order by idmatricula desc";
$paging->agregarConsulta($sql);
$paging->div('div_listar');
$paging->modo('desarrollo');
if (isset($_GET['criterio_mostrar']))
    $paging->porPagina(fn_filtro((int)$_GET['criterio_mostrar']));
$paging->verPost(true);
$paging->mantenerVar("criterio_usu_per", "criterio_ordenar_por",
    "criterio_orden", "criterio_mostrar");
$paging->ejecutar();

?>
<table id="grilla" class="table" width="690px">
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th>C&oacute;digo</th>
        <th>A&ntilde;o</th>
        <th>Grado</th>
        <th>Grupo</th>
        <th>Estudiante</th>
        <!-- <th>&nbsp;</th>-->
        <th width="16px"><a href="javascript: fn_mostrar_frm_agregar();"><img src="../extras/ico/add.png"></a></th>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($rs_per = $paging->fetchResultado()) {

        ?>
        <tr id="tr_<?php echo $rs_per['idmatricula']; ?>">
            <td><a href="../matriculas/matriculas.php?id=<?php echo $rs_per['idmatricula']; ?>" title="Matricular"><img src="../images/matric.png"> </a></td>
            <td><?php echo $rs_per['idmatricula']; ?></td>
            <td><?php echo $rs_per['anio']; ?></td>
            <td><?php echo $rs_per['grado']; ?> </td>
            <td><?php echo $rs_per['grupo']; ?></td>
            <td><?php echo $rs_per['estudiante']; ?></td>
            <td><a href="javascript: fn_mostrar_frm_modificar(<?php echo $rs_per['idmatricula']; ?>);">
                    <img src="../extras/ico/page_edit.png"/></a></td>
            <!--    <td><a href="javascript: fn_eliminar(<?php echo $rs_per['idacudiente']; ?>);"><img src="../extras/ico/delete.png" /></a></td>-->
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="6">
            <?php
            /*
            -- Aqui MOSTRAMOS MAS DETALLADAMENTE EL PAGINADO
            P�gina: <?php=$paging->numEstaPagina()?>, de <?php=$paging->numTotalPaginas()?><br />
            Mostrando: <?php=$paging->numRegistrosMostrados()?> registros, del <?php=$paging->numPrimerRegistro()?> al <?php=$paging->numUltimoRegistro()?><br />
            De un total de: <?php=$paging->numTotalRegistros()?><br />
            */
            ?>
            <div class="col-lg-12"><?php echo $paging->fetchNavegacion(); ?></div>
        </td>
    </tr>
    </tfoot>
</table>