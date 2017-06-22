<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body>
    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>
    
    <!-- Container -->
    <div id="content" class="pmd-content content-area dashboard">
      <div class="container-fluid">

      <!-- Header -->
      <div class="row">
        <div class="jumbotron">
          <h1>Backoffice <?= $GLOBALS['appname'] ?></h1>
          <small>Sistema de Informação v<?= $GLOBALS['version'] ?></small>
        </div>
      </div><!-- .Header -->


          <?php include_once('includes/stats.inc.php'); ?>


      </div>
    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
  </body>
</html>