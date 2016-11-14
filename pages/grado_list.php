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

            <!-- /.col-lg-12 -->
            <div align="right"><a href="grado_add.php" class="btn btn-default btn">Nuevo</a></div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Grado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $factory = new DAOFactory();
                $items = $factory->getGradoDAO()->queryAll();
                //print_r($items);
                foreach ($items as $items) {
                    echo '<tr><td>' . $items->idgrado . '</td><td>' . $items->grado . '</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php print footer() ?>
</body>
</html>