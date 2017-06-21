<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/inscription.class.php';
  $i = new inscription();
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
    <div class="container">

      <!-- Header -->
      <div class="row">
        <h1>Inscrições <small>Gerir Inscrições</small></h1>
      </div>

      <!-- Filters -->
      <div class="row">
        <h3>Cadeiras Inscritas</h3>
        <div class="col-sm-8">
          <label for="i_year">Ano de Inscrição</label>
          <select id="i_year" name="i_year" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
            <option value="0"></option>
            <?php
                $iyear = $i->inscriptionYears($_SESSION['id_user']);
                foreach ($iyear as $key => $value) {
              ?>
              <option value="<?= $value['inscription_year'] ?>"><?=  '(' . $value['inscription_year'] . ')' ?></option>
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
            <th>Data de Inscrição</th>
          </thead>
          <tbody class="inscription">
            <?php
                                  // 2017 tem de ser o valor do select que esta a cima
              $inscription = $i->inscription($_SESSION['id_user'],'2017');
              foreach($inscription as $key => $value) {
            ?>
            <!-- Class item -->
            <tr>
              <td><?= $value['dcode'] ?></td>
              <td><?= $value['code'] ?></td>
              <td><?= $value['fullName'] ?></td>
              <td><?= $value['inscription_year'] ?></td>

              <!-- MOSTRA DELETE SE FOR SECRETARIA


              <td>
                <a href="summary_edit.php?id=<?= $value['id_summary'] ?>"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                <button data-destination="summary_delete.php?id=<?= $value['id_summary'] ?>" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
              </td>


              -->
            </tr><!-- .Class item -->
            <?php } ?>
          </tbody>
        </table>
      </div><!-- .Datatable -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> 
      $(".chosen").chosen({width:'85%', allow_single_deselect:true}); 
    </script>
  </body>
</html>