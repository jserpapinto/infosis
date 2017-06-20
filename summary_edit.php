<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/summary.class.php';
  $s = new summary();
  $summary = $s->fetch($_GET['id']);

  //form
  if (isset($_POST['summary']) && $_POST['summary'] != null) {
    $id_summary = $_POST['id_summary'];
    $summary = $_POST['summary'];
    $class_date = $_POST['class_date'];
    $s->update($id_summary, $summary, $class_date, 'summary_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="UpdateClass">
  
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Sumário <small>Gerir sumário - Editar</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" action="summary_edit.php" method="post">
          <div class="form-group col-xs-12">
            <label for="summary">Sumário</label><br>
            <textarea rows="4" id="summary" name="summary" class="form-control col-xs-12" required><?= $summary['summary'] ?></textarea>
          </div>
          <div class="form-group col-xs-4">
            <label for="class_date">Data</label><br>
            <input type="date" id="class_date" name="class_date" class="form-control" required value="<?= $summary['class_date'] ?>">
          </div>
          <div class="form-group col-xs-12">
            <input type="hidden" value='<?= $_GET['id'] ?>' name="id_summary" id="id_summary">
            <button type="submit" class="btn btn-md btn-success">Editar</button>
            <button type="submit" class="btn btn-md btn-default" onmousedown="history.back();">Voltar</button>
          </div>
        </form>
      </div><!-- .Form -->
    </div>

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>