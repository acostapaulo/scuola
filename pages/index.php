<?php
require('menu.php');
require('head.php');
require('footer.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php print head() ?>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php print menu() ?>

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