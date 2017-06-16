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

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_degree = $_POST['id_degree'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $credits = $_POST['credits'];
    $hours = $_POST['hours'];
    $active = ($_POST['active']) ? true : false;
    $c->insert($id_degree, $code, $fullName, $credits, $hours, $active, 'class_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertClass">
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Cadeiras <small>Inserir Nova Cadeira</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" action="class_new.php" method="post">
          <div class="form-group">
            <label for="id_degree">Curso</label><br>
            <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um curso..">
              <option value=""></option>
              <?php
                $degrees = $d->degrees();
                foreach ($degrees as $key => $value) {
              ?>
              <option value="<?php echo $value['id_degree']; ?>"><?php echo $value['designation'] . '(' . $value['code'] . ') - ' . $value['fullName']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="code">Código</label><br>
            <input type="text" id="code" name="code" class="form-control" placeholder="Código da cadeira..." required>
          </div>
          <div class="form-group">
            <label for="fullName">Designação da cadeira</label><br>
            <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Nome completo da cadeira" required>
          </div>
          <div class="form-group">
            <label for="hours">Número total de horas</label><br>
            <input type="number" id="hours" name="hours" class="form-control" min="0" max="1000" placeholder="Insira o valor em horas..." required>
          </div>
          <div class="form-group">
            <label for="credits">Créditos</label><br>
            <input type="number" id="credits" name="credits" class="form-control" min="0" max="20" placeholder="Número de créditos..." required>
          </div>
          <div class="form-group">
            <label for="active">Cadeira ativa</label>
            <input type="checkbox" id="active" name="active" checked="true">
          </div>
          <hr>
          <button type="submit" class="btn btn-md btn-success">Inserir</button>
        </form>
      </div><!-- .Form -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>