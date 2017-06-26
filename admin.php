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
          <div class="col-xs-12">
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
              <div class="pmd-card-title">
                <h1 class="pmd-card-title-text pmd-display3">Backoffice <?= $GLOBALS['appname'] ?></h1>
                <span class="pmd-card-subtitle-text">Sistema de Informação v<?= $GLOBALS['version'] ?></span>
                <p class="lead"></p>
              </div>
            </div>
          </div>
        </div><!-- .Header -->

      </div>
    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
  </body>
</html>