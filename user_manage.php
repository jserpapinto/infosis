<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  $roles = $u->roles();
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
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Gerir Utilizador</span>
        </h1>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Utilizador</a></li>
          <li class="active">Gerir Utilizador</li>
        </ol>

        <!-- Page -->
        <div class="row">
          
          <!-- Filters -->
          <div class="col-xs-12">
            <div class="btn-group">
              <button class="btn pmd-ripple-effect btn-default" data-filter="*" type="button">Todos</button>
              <?php
                foreach ($roles as $role) { 
              ?>
              <button class="btn pmd-ripple-effect btn-primary" data-filter=".<?= strtolower($role['role']) ?>" type="button"><?= $role['role'] ?></button>
              <?php } ?>
            </div>
            <hr/>
          </div>

          <!-- Grid -->
          <div class="col-xs-12">
            <div class="grid row">

              <?php
                $users = $u->users();
                foreach($users as $key => $value) {
              ?>

              <!-- Card -->
              <div class="element-item <?= strtolower($value['role']) ?> <?= ($value['active']) ? 'activo' : 'desativo' ?> col-xs-6 col-sm-4 col-md-3">
                <div class="<?= (!$value['active']) ? 'pmd-card-inverse' : '' ?> pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">

                  <!-- Card media-->
                  <div class="pmd-card-media">
                    <div class="media-body">
                      <h2 class="pmd-card-title-text pmd-tooltip"  data-toggle="tooltip" data-placement="top" title="<?= $value['name'] ?>"><?= $value['username'] ?></h2>
                      <span class="pmd-card-subtitle-text"><?= $value['role'] ?></span>  
                    </div>
                    <div class="media-right media-middle">
                      <a href="javascript:void(0);">
                        <img width="80" height="80" src="<?= $value['picture'] ?>">
                      </a>
                    </div>
                  </div>

                  <!-- Card action -->
                  <div class="pmd-card-actions">
                    <a href="user_edit.php?id=<?= $value['id_user'] ?>">
                      <button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Editar</button>
                    </a>
                    <button data-destination="user_delete.php?id=<?= $value['id_user'] ?>" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default sweet-delete">Apagar</button>
                  </div>
                </div>

              </div><!-- .Card -->

              <?php } ?>

            </div>
          </div><!-- .Grid -->

        </div><!-- .Page -->

      </div>
    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });

      // Isotope
      var $grid = $('.grid').isotope({});

      $('.btn-group').on( 'click', 'button', function() {
        $('.btn-group .btn-default').removeClass('btn-default').addClass('btn-primary');
        $(this).removeClass('btn-primary').addClass('btn-default');
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
      });
    </script>
  </body>
</html>