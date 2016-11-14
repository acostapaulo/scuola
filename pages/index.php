<?php
require('menu.php');
require('head.php');
require('footer.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php echo head() ?>
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php echo menu() ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php print footer() ?>
</body>
</html>