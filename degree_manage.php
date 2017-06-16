<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
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
        <h1>Curso <small>Gerir Cursos</small></h1>
      </div>

      <!-- Datatable -->
      <div class="row">
        <h3>Lista de Cursos no Sistema</h3>
        <table class="table table-hover">
          <thead>
            <th>Nível</th>
            <th>Código</th>
            <th>Designação</th>
          </thead>
          <tbody>
            <?php
              $degrees = $d->degrees();
              foreach($degrees as $key => $value) {
            ?>
            <!-- Degree item -->
            <tr>
              <td><?= $value['designation'] ?></td>
              <td><?= $value['code'] ?></td>
              <td><?= $value['fullName'] ?></td>
              <td>
                <a href="degree_edit.php?id=<?= $value['id_degree'] ?>"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                <button data-destination="degree_delete.php?id=<?= $value['id_degree'] ?>" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
              </td>
            </tr><!-- .Degree item -->
            <?php } ?>
          </tbody>
        </table>
      </div><!-- .Datatable -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
  </body>
</html>