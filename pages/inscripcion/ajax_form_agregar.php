<?php

include "../config.php";

?>
<h3>Nueva Inscripci&oacute;n</h3>
<p>Para matricular busque la inscripción en matrículas y cambie el estado a 'Activo'</p>
<form action="javascript: fn_agregar();" method="post" id="frm_per" name="matriculas">
    <table class="table">
        <tbody>
        <tr>
            <td>A&ntilde;o</td>
            <td><input name="anio" type="text" id="usu_per" size="16" class="required" value="<?php echo date("Y"); ?>"
                       required="required"/></td>
        </tr>
        <tr>
            <td>Grado</td>
            <td><select name="idgrado">
                    <?php

                    $qq = mysql_query("select * from grado order by 1 asc");
                    while ($rr = mysql_fetch_array($qq)) {
                        echo "<option value=" . $rr['idgrado'] . ">" . $rr['grado'] . "</option>";
                    }

                    ?>
                </select></td>
        </tr><!--
        <tr>
            <td>Grupo</td>
            <td><select name="idgrupo">
                    <?php

                    $qq = mysql_query("select * from grupos");
                    while ($rr = mysql_fetch_array($qq)) {
                        echo "<option value=" . $rr['idgrupo'] . ">" . $rr['grupo'] . "</option>";
                    }

                    ?>
                </select></td>
        </tr>-->
        <tr>
            <td>C&oacute;digo Estudiante</td>
            <td><input name='idestudiante' type='text' size="15" readonly="readonly"/>
                <a href="javascript:abreVentana()">Seleccionar</a></td>
        </tr>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2">
                <input name="agregar" type="submit" class="btn btn-default" id="agregar" value="Agregar"/>
                <input name="cancelar" type="button" class="btn btn-default" id="cancelar" value="Cancelar" onclick="fn_cerrar();"/>
            </td>
        </tr>
        </tfoot>
    </table>
</form>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $("#frm_per").validate({
            rules: {
                usu_per: {
                    required: true,
                    remote: "ajax_verificar_usu_per.php"
                }
            },
            messages: {
                usu_per: "x"
            },
            onkeyup: false,
            submitHandler: function (form) {
                var respuesta = confirm('\xBFDesea realmente agregar a esta nueva persona?')
                if (respuesta)
                    form.submit();
            }
        });
    });

    function fn_agregar() {
        var str = $("#frm_per").serialize();
        $.ajax({
            url: 'ajax_agregar.php',
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