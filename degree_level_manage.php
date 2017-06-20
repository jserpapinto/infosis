<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  $levels = $d->levels();

  //form crate
  if(isset($_POST['designationCreate']) && $_POST['designationCreate'] != null){
    $designation = $_POST['designationCreate'];
    $d->insertLevel($designation, 'degree_level_manage.php');
  }
  
  //form edit
  elseif (isset($_POST['designationEdit']) && $_POST['designationEdit'] != null) {
    $id_degree_level = $_POST['id_degree_level'];
    $designation = $_POST['designationEdit'];
    $d->updateLevel($id_degree_level, $designation, 'degree_level_manage.php');
  }

  //delete error
  if (isset($_GET['error']) && $_GET['error']) {
    require_once 'classes/error.class.php';
    $e = new error();
    echo $e->errorMessage('danger', 'O nível não foi apagado!', 'Remova os cursos associados antes de apagar o nível.');
  }

?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body>

    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Page -->
    <div id="content" class="pmd-content inner-page">

      <!-- Container -->
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Gerir Níveis de Cursos</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Cursos</a></li>
          <li class="active">Gerir Níveis de Cursos</li>
        </ol>

        <!-- Grid -->
        <div class="row">
          <div class="col-xs-12">
            <div class="grid row">
              <?php
                foreach($levels as $level) {
              ?>

              <!-- Card -->
              <div class="element-item col-xs-6 col-sm-4 col-md-3">
                <div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
                    
                    <!-- Card media-->
                    <div class="pmd-card-media">
                        <div class="media-body">
                            <h2 class="pmd-card-title-text" ><?= $level['designation'] ?></h2>
                        </div>
                    </div>

                    <!-- Card action -->
                    <div class="pmd-card-actions">
                        <button data-target="#modal-edit-level" data-id="<?= $level['id_degree_level'] ?>" data-designation="<?= $level['designation'] ?>" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Editar</button>
                        <button data-destination="degree_level_delete.php?id=<?= $level['id_degree_level'] ?>" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default sweet-delete">Apagar</button>
                    </div>

                </div>
              </div><!-- .Card -->

              <?php } ?>

            </div>
          </div>
        </div><!-- .Grid -->

      </div><!-- .Container -->

      <!-- Floating button -->
      <div class="menu pmd-floating-action"  role="navigation">   
        <button data-target="#modal-create-level" data-toggle="modal"  class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" data-title="Add" href="javascript:void(0);" type=button> 
          <span class="pmd-floating-hidden">Primary</span>
          <i class="material-icons pmd-sm">add</i> 
        </button> 
      </div><!-- .Floating button -->

    </div><!-- .Page -->

    <!-- Modal create -->
    <div tabindex="-1" class="modal fade" id="modal-create-level" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Form -->
          <form class="form-horizontal" method="post">
            <div class="modal-header pmd-modal-bordered">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h2 class="pmd-card-title-text">Criar Nível de Curso</h2>
            </div>
            <div class="modal-body">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                  <label for="designationCreate">Designação</label>
                  <input type="text" class="mat-input form-control" id="designationCreate" name="designationCreate" required>
                </div>
            </div>
            <div class="pmd-modal-action">
              <button class="btn pmd-ripple-effect btn-primary" type="submit">Criar</button>
              <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Cancelar</button>
            </div>
          </form><!-- .Form -->

        </div>
      </div>
    </div><!-- .Modal create -->

    <!-- Modal edit -->
    <div tabindex="-1" class="modal fade" id="modal-edit-level" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Form -->
          <form class="form-horizontal" method="post">
            <div class="modal-header pmd-modal-bordered">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h2 class="pmd-card-title-text">Editar Nível de Curso</h2>
            </div>
            <div class="modal-body">
                <div class="form-group pmd-textfield ">
                  <label for="designationEdit">Designação</label>
                  <input type="text" class="mat-input form-control" id="designationEdit" name="designationEdit" value="" required>
                </div>
            </div>
            <div class="pmd-modal-action">
              <input type="hidden" id="id_degree_level" name="id_degree_level">
              <button class="btn pmd-ripple-effect btn-primary" type="submit">Editar</button>
              <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Cancelar</button>
            </div>
          </form><!-- .Form -->

        </div>
      </div>
    </div><!-- .Modal edit -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> 
    $('#modal-edit-level').on('show.bs.modal', function(e) {
      var $btn = $(e.relatedTarget);
      $(this).find('#designationEdit').val($btn.data('designation'));
      $(this).find('#id_degree_level').val($btn.data('id'));
    });
    </script>
  </body>
</html>