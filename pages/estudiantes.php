<?php
require('menu.php');
require('head.php');
require('footer.php');
include('../models/Estudiante.php');
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
                <h1 class="page-header">Estudiantes</h1>
            </div>
            <!-- /.col-lg-12 -->
            Listado
            <?php
            $estu = new Estudiante();
            print_r($estu->load());
            ?>
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php print footer() ?>
</body>
</html>