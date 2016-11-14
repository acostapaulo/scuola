<?php

if (empty($_POST['ide_per'])) {
    echo "Por favor no altere el fuente";
    exit;
}

include "../extras/php/basico.php";
include "../config.php";

$sql = sprintf("select * from matriculas m inner join grado g on m.idgrado=g.idgrado inner join grupos gr on m.idgrupo=gr.idgrupo where idmatricula=%d",
    (int)$_POST['ide_per']);
$per = mysql_query($sql);
$num_rs_per = mysql_num_rows($per);
if ($num_rs_per == 0) {
    echo "No existen matriculas con este codigo";
    exit;
}

$rs_per = mysql_fetch_assoc($per);

?>
<h3>Modificar Inscripción</h3>
<form action="javascript: fn_modificar();" method="post" id="frm_per">
    <input type="hidden" id="ide_per" name="ide_per" value="<?php echo $rs_per['ide_per']; ?>"/>
    <table class="Table">
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
                    <option value="<?php echo $rs_per['idgrupo']; ?>"><?php echo $rs_per['grupo']; ?></option>
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
            <td><input name='idestudiante' type='text' size="15" readonly="readonly"/>
                <a href="javascript:abreVentana()">Seleccionar</a></td>
        </tr>
        <tr>
            <td>Opciones:</td>
            <td>Promovido<input type="radio" name="promovido" value="Si" checked="checked"/><br/>
                Repitente<input type="radio" name="promovido" value="No"/></td>
        </tr>
        <tfoot>
        <tr>
            <td colspan="2">
                <input name="modificar" type="submit" class="btn btn-default" id="modificar" value="Modificar"/>
                <input name="cancelar" type="button" class="btn btn-default" id="cancelar" value="Cancelar" onclick="fn_cerrar();"/>
            </td>
        </tr>
        </tfoot>
    </table>
</form>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $("#frm_per").validate({
            submitHandler: function (form) {
                var respuesta = confirm('\xBFDesea realmente modificar a este nuevo acudiente?')
                if (respuesta)
                    form.submit();
            }
        });
    });

    function fn_modificar() {
        var str = $("#frm_per").serialize();
        $.ajax({
            url: 'ajax_modificar.php',
            data: str,
            type: 'post',
            success: function (data) {
                if (data != "")
                    alert(data);
                fn_cerrar();
                fn_buscar();
            }
        });
    }
    ;
</script>