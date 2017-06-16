<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  // get roles -> page
  $roles = $u->roles();

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
    <div class="container">

      <!-- Header -->
      <div class="row">

        <div class="col-xs-12">
          <h1 class="pmd-display3">Utilizador <small class="text-muted">Gerir Utilizadores</small></h1>
          <hr/>
        </div>

        <!-- FILTERS -->
        <div class="col-xs-12">
          <div class="btn-group">
            <button class="btn pmd-ripple-effect btn-default" data-filter="*" type="button">Todos</button>
          <?php
            foreach ($roles as $role) { ?>
              <button class="btn pmd-ripple-effect btn-primary" data-filter=".<?= strtolower($role['role']) ?>" type="button"><?= $role['role'] ?></button>
          <?php } ?>
          </div>
          <hr/>
        </div>
        <!-- .FILTERS -->

        <!-- GRID -->
        <div class="col-xs-12">
          <div class="grid row">

              <?php
                $users = $u->users();
                foreach($users as $key => $value) {
              ?>
              <div class="element-item <?= strtolower($value['role']) ?> <?= ($value['active']) ? 'activo' : 'desativo' ?> col-xs-6 col-sm-4 col-md-3">

                <div class="<?php if(!$value['active']) echo 'checked="true"'; ?> pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
                  <!-- Card media-->
                    <div class="pmd-card-media">
                      <!-- Card media heading -->
                        <div class="media-body">
                            <h2 class="pmd-card-title-text pmd-tooltip"  data-toggle="tooltip" data-placement="top" title="<?= $value['name'] ?>"><?= $value['username'] ?></h2>
                            <span class="pmd-card-subtitle-text"><?= $value['role'] ?></span>  
                        </div>
                        <!-- Card media image -->
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

              </div>
              <?php } ?>

          </div>
        </div>

      </div><!-- .Grid -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });

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