<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();

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

    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Curso <small>Gerir Níveis de Cursos</small></h1>
      </div>

      <!-- Datatable -->
      <div class="row">
        <h3>Lista de Níveis de Curso no Sistema</h3>
        <table class="table table-hover">
          <thead>
            <th>Designação</th>
            <th>Opções</th>
          </thead>
          <tbody>
            <?php
              $levels = $d->levels();
              foreach($levels as $key => $value) {
            ?>
            <!-- Degree level item -->
            <tr>
              <td><?= $value['designation'] ?></td>
              <td>
                <button data-target="#modal-edit-level" data-id="<?= $value['id_degree_level'] ?>" data-designation="<?= $value['designation'] ?>" data-toggle="modal" type="button" class="btn btn-sm btn-info">Editar</button>
                <button data-destination="degree_level_delete.php?id=<?= $value['id_degree_level'] ?>" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>




                <!-- Mensagens sobre ter de desassociar primeiro -->
                <!--<a href="degree_level_delete.php?id=<?php //echo $value['id_degree']; ?>"><button type="button" class="btn btn-sm btn-danger">Apagar</button></a>-->
              </td>
            </tr><!-- .Degree level item -->
            <?php } ?>
          </tbody>
        </table>
      </div><!-- .Datatable -->

      <!-- Create -->
      <div class="row">
        <button data-target="#modal-create-level" data-toggle="modal" type="button" class="btn btn-sm btn-primary">Criar Novo Nível</button>
      </div>

    </div><!-- .Container -->

    <!-- Modal create -->
    <div tabindex="-1" class="modal fade" id="modal-create-level" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
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
          </form>
        </div>
      </div>
    </div><!-- .Modal create -->

    <!-- Modal edit -->
    <div tabindex="-1" class="modal fade" id="modal-edit-level" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" method="post">
            <div class="modal-header pmd-modal-bordered">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h2 class="pmd-card-title-text">Editar Nível de Curso</h2>
            </div>
            <div class="modal-body">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                  <label for="designationEdit">Designação</label>
                  <input type="text" class="mat-input form-control" id="designationEdit" name="designationEdit" value="" required>
                </div>
            </div>
            <div class="pmd-modal-action">
              <input type="hidden" id="id_degree_level" name="id_degree_level">
              <button class="btn pmd-ripple-effect btn-primary" type="submit">Editar</button>
              <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Cancelar</button>
            </div>
          </form>
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