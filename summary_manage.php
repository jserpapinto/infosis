<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/summary.class.php';
  $s = new summary();
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
          <span>Gerir Sumários</span>
        </h1><!-- End Title -->

        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Sumários</a></li>
          <li class="active">Gerir Sumários</li>
        </ol><!--breadcrum end-->

      <!-- Filters -->
      <div class="row">
        <div class="col-sm-6">
          <label for="id_class">Cadeira</label>
          <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
            <option value="0"></option>
            <?php
                $classes = $c->classesUser($_SESSION['id_user']);
                foreach ($classes as $key => $value) {
              ?>
              <option value="<?= $value['id_class'] ?>"><?=  '(' . $value['code'] . ') - ' . $value['fullName'] ?></option>
              <?php } ?>
          </select>
        </div>
      </div><!-- .Filters -->

      <!-- Datatable -->
      <div class="row">
        <table class="table table-hover">
          <thead>
            <th>Curso</th>
            <th>Código</th>
            <th>Designação</th>
            <th>Professor</th>
            <th>Sumário</th>
            <th>Data</th>
            <th>Opções</th>
          </thead>
          <tbody class="summarys">
            <?php
              $summarys = $s->summarys($_SESSION['id_user']);
              foreach($summarys as $key => $value) {
            ?>
            <!-- Class item -->
            <tr>
              <td><?= $value['dcode'] ?></td>
              <td><?= $value['code'] ?></td>
              <td><?= $value['fullName'] ?></td>
              <td><?= $value['name'] ?></td>
              <td><?= $value['summary'] ?></td>
              <td><?= $value['class_date'] ?></td>
              <td>
                <a href="summary_edit.php?id=<?= $value['id_summary'] ?>"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                <button data-destination="summary_delete.php?id=<?= $value['id_summary'] ?>" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
              </td>
            </tr><!-- .Class item -->
            <?php } ?>
          </tbody>
        </table>
      </div><!-- .Datatable -->

    </div><!-- .Container -->
    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> 
      $(".chosen").chosen({width:'85%', allow_single_deselect:true}); 
    </script>
  </body>
</html>