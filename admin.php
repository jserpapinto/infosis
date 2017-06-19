<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body>
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div id="content" class="pmd-content content-area dashboard">
      <div class="container-fluid">

      <!-- Header -->
      <div class="row">
        <div class="jumbotron">
          <h1>Backoffice <?php echo $GLOBALS['appname']; ?></h1>
          <small>Sistema de Informação v<?php echo $GLOBALS['version']; ?></small>
        </div>
      </div><!-- .Header -->

      </div><!-- .Container -->
    </div>

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
  </body>
</html>