<?php
require('menu.php');
require('head.php');
require('footer.php');
include('../class/include_dao.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php print head() ?>
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <?php print menu() ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Grados</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nuevo Grado
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" name="form1" method="post" action="grado_actions.php">
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input class="form-control" name="idgrado" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Grado</label>
                                            <input class="form-control" name="grado" required>
                                            <!--<p class="help-block">Example block-level help text here.</p>-->
                                        </div>
                                        <input type="hidden" name="action" value="guardar">
                                        <button type="submit" class="btn btn-default">Guardar</button>
                                        <button type=button class="btn btn-default" onclick="location.href='grado_list.php'">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php print footer() ?>
</body>
</html>