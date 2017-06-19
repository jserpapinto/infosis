<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();

  $degrees = $d->degrees();

  $levels = $d->levels();
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
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Gerir Cursos</span>
        </h1><!-- End Title -->

        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Cursos</a></li>
          <li class="active">Gerir Cursos</li>
        </ol><!--breadcrum end-->

        <div class="row">
          <!-- FILTERS -->
          <div class="col-xs-12">
            <div class="btn-group">
              <button class="btn pmd-ripple-effect btn-default" data-filter="*" type="button">Todos</button>
            <?php
              foreach ($levels as $level) { ?>
                <button class="btn pmd-ripple-effect btn-primary" data-filter=".<?= strtolower($level['designation']) ?>" type="button"><?= $level['designation'] ?></button>
            <?php } ?>
            </div>
            <hr/>
          </div>
          <!-- .FILTERS -->

          <!-- GRID -->
          <div class="col-xs-12">
            <div class="grid row">

                <?php
                  foreach($degrees as $degree) {
                ?>
                <div class="element-item <?= strtolower($degree['designation']) ?> <?= ($value['active']) ? 'activo' : 'desativo' ?> col-xs-6 col-sm-4 col-md-3">

                  <div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
                    <!-- Card media-->
                      <div class="pmd-card-media">
                        <!-- Card media heading -->
                          <div class="media-body">
                              <h2 class="pmd-card-title-text pmd-tooltip"  data-toggle="tooltip" data-placement="top" title="<?= $degree['fullName'] ?>"><?= $degree['code'] ?></h2>
                              <span class="pmd-card-subtitle-text"><?= $degree['fullName'] ?></span>  
                          </div>
                      </div>
                      <!-- Card action -->
                      <div class="pmd-card-actions">
                          <a href="degree_edit.php?id=<?= $degree['id_degree'] ?>">
                            <button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Editar</button>
                          </a>
                          <button data-destination="degree_delete.php?id=<?= $degree['id_degree'] ?>" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default sweet-delete">Apagar</button>
                      </div>
                  </div>

                </div>
                <?php } ?>

            </div>
          </div>

        </div><!-- .Grid -->


    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
    <script type="text/javascript">
      // Isotope
      var $grid = $('.grid').isotope({
        // options
      });

      $('.btn-group').on( 'click', 'button', function() {
        $('.btn-group .btn-default').removeClass('btn-default').addClass('btn-primary');
        $(this).removeClass('btn-primary').addClass('btn-default');
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
      });
    </script>
  </body>
</html>