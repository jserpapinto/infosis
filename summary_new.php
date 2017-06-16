<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/summary.class.php';
  $s = new summary();

  //form
  if (isset($_POST['summary']) && $_POST['summary'] != null) {
    $id_class = $_POST['id_class'];
    $id_user = $_SESSION['id_user'];
    $summary = $_POST['summary'];
    $class_date = $_POST['class_date'];
    $s->insert($id_class, $id_user, $summary, $class_date, 'summary_new.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertSummary">
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Sumário <small>Inserir Novo Sumário</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" action="summary_new.php" method="post">
          <div class="form-group col-xs-12">
            <label for="id_class">Cadeira</label><br>
            <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha uma cadeira..">
              <option value=""></option>
              <?php
                $classes = $c->classesUser($_SESSION['id_user']);
                foreach ($classes as $key => $value) {
              ?>
              <option value="<?= $value['id_class'] ?>"><?=  '(' . $value['code'] . ') - ' . $value['fullName'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-xs-12">
            <label for="summary">Sumário</label><br>
            <textarea rows="4" id="summary" name="summary" class="form-control" placeholder="Sumário da cadeira..." required></textarea>
          </div>
          <div class="form-group col-xs-4">
            <label for="class_date">Data</label><br>
            <input type="date" id="class_date" name="class_date" class="form-control" required>
          </div>
          <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-md btn-success">Inserir</button>
          </div>
        </form>
      </div><!-- .Form -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>