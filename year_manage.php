<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/year.class.php';
  $y = new year();
  $years = $y->years();

  //form crate
  if(isset($_POST['beginningCreate']) && $_POST['beginningCreate'] != null){
    $beginning = $_POST['beginningCreate'];
    $ending = $_POST['endingCreate'];
    $current = $_POST['current'] ? 1: 0;
    $y->insert($beginning, $ending, $current, 'year_manage.php');
  }
  
  //form edit
  elseif (isset($_POST['beginningEdit']) && $_POST['beginningEdit'] != null) {
    $id_year = $_POST['id_year'];
    $beginning = $_POST['beginningEdit'];
    $ending = $_POST['endingEdit'];
    $current = $_POST['current'] ? 1: 0;
    $y->update($id_year, $beginning, $ending, $current, 'year_manage.php');
  }

  //delete error
  if (isset($_GET['error']) && $_GET['error']) {
    require_once 'classes/error.class.php';
    $e = new error();
    echo $e->errorMessage('danger', 'O ano não foi apagado!', 'Remova as inscrições associadas antes de apagar o ano.');
  }

?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/datetime.css">
  </head>

  <body>

    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>

    <!-- Page -->
    <div id="content" class="pmd-content inner-page">

      <!-- Container -->
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Gerir Anos Letivos</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="#">Anos Letivos</a></li>
          <li class="active">Gerir Anos Letivos</li>
        </ol>

        <!-- Grid -->
        <div class="row">
          <div class="col-xs-12">
            <div class="grid row">
              <?php
                foreach($years as $year) {
              ?>

              <!-- Card -->
              <div class="element-item col-xs-6 col-sm-4 col-md-3">
                <div class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
                    
                    <!-- Card media-->
                    <div class="pmd-card-media">
                        <div class="media-body">
                            <h2 class="pmd-card-title-text" ><?= date("Y",strtotime($year['beginning'])) . '/' . date("Y",strtotime($year['ending'])) ?></h2>
                            <span class="pmd-card-subtitle-text">
                                <i class="material-icons" style="vertical-align:bottom; color:green;">play_arrow</i> <?= $year['beginning'] ?> <br/>
                                <i class="material-icons" style="vertical-align:bottom; color:red;">stop</i> <?= $year['ending'] ?>
                            </span>
                        </div>
                    </div>

                    <!-- Card action -->
                    <div class="pmd-card-actions">
                        <button data-target="#modal-edit-year" data-id="<?= $year['id_year'] ?>" data-beginning="<?= $year['beginning'] ?>" data-ending="<?= $year['ending'] ?>" data-toggle="modal" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Editar</button>
                        <button data-destination="year_delete.php?id=<?= $year['id_year'] ?>" type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-default sweet-delete">Apagar</button>
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
        <button data-target="#modal-create-year" data-toggle="modal"  class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" data-title="Add" href="javascript:void(0);" type=button> 
          <span class="pmd-floating-hidden">Primary</span>
          <i class="material-icons pmd-sm">add</i> 
        </button> 
      </div><!-- .Floating button -->

    </div><!-- .Page -->

    <!-- Modal create -->
    <div tabindex="-1" class="modal fade" id="modal-create-year" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Form -->
          <form class="form-horizontal" method="post">
            <div class="modal-header pmd-modal-bordered">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h2 class="pmd-card-title-text">Criar Ano Letivo</h2>
            </div>
            <div class="modal-body">
              <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="beginningCreate">Data de Inicio</label>
                  <input type="text" name="beginningCreate" id="beginningCreate" class="mat-input datetimepicker form-control" required><span class="pmd-textfield-focused"></span>
              </div>
            </div>
            <div class="modal-body">
              <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="endingCreate">Data de Fim</label>
                  <input type="text" name="endingCreate" id="endingCreate" class="mat-input datetimepicker form-control" required><span class="pmd-textfield-focused"></span>
              </div>
            </div>
            <div class="pmd-modal-action">
            <!-- Activo -->
              <div class="form-group checkbox pmd-default-theme pmd-textfield">
                <label for="current" class="pmd-checkbox pmd-checkbox-ripple-effect ">
                  <label>Ano Corrente</label>
                  <input type="checkbox" id="current" name="current" checked="true">
                </label>
              </div><!-- .Activo -->
            </div>
            <div class="pmd-modal-action">
              <button class="btn pmd-ripple-effect btn-primary" type="submit">Criar</button>
              <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Cancelar</button>
            </div>
          </form><!-- .Form -->

        </div>
      </div>
    </div>
    <!-- .Modal create -->

    <!-- Modal edit -->
    <div tabindex="-1" class="modal fade" id="modal-edit-year" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Form -->
          <form class="form-horizontal" method="post">
            <div class="modal-header pmd-modal-bordered">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h2 class="pmd-card-title-text">Editar Ano Letivo</h2>
            </div>
            <div class="modal-body">
              <div class="form-group pmd-textfield">
                <label for="beginningEdit">Data de Inicio</label>
                  <input type="text" name="beginningEdit" id="beginningEdit" class="mat-input datetimepicker form-control" required><span class="pmd-textfield-focused"></span>
              </div>
            </div>
            <div class="modal-body">
              <div class="form-group pmd-textfield">
                <label for="endingEdit">Data de Fim</label>
                  <input type="text" name="endingEdit" id="endingEdit" class="mat-input datetimepicker form-control" required><span class="pmd-textfield-focused"></span>
              </div>
            </div>
            <div class="pmd-modal-action">
              <input type="hidden" id="id_year" name="id_year">
              <button class="btn pmd-ripple-effect btn-primary" type="submit">Editar</button>
              <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Cancelar</button>
            </div>
          </form><!-- .Form -->

        </div>
      </div>
    </div>
    <!-- .Modal edit -->

    <?php require_once('includes/scripts.inc.php'); ?>
    <script type="text/javascript" src="js/datetime.js"></script>


    <!-- Custom scripts -->
    <script> 
    $('.datetimepicker').datetimepicker({format: 'YYYY-MM-DD'});
    $('#modal-edit-year').on('show.bs.modal', function(e) {
      var $btn = $(e.relatedTarget);
      $(this).find('#beginningEdit').val($btn.data('beginning'));
      $(this).find('#endingEdit').val($btn.data('ending'));
      $(this).find('#id_year').val($btn.data('id'));
    });
    </script>
  </body>
</html>