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
  $class = $c->fetch($_GET['id']);

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_class = $_POST['id_class'];
    $id_degree = $_POST['id_degree'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $credits = $_POST['credits'];
    $hours = $_POST['hours'];
    $active = ($_POST['active']) ? true : false;
    $c->update($id_class, $id_degree, $code, $fullName, $credits, $hours, $active, 'class_manage.php');
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
        <h1>Cadeira <small>Gerir cadeiras - Editar</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" action="class_edit.php" method="post">
          <div class="form-group">
            <label for="id_degree">Curso</label><br>
            <select id="id_degree" name="id_degree" class="form-control chosen">
              <?php
                $degrees = $d->degrees();
                foreach ($degrees as $key => $value) {
              ?>
              <option value="<?php echo $value['id_degree']; ?>"<?php if($value['id_degree'] == $class['id_degree']) echo 'selected="true"'; ?>><?php echo $value['designation'] . '(' . $value['code'] . ') - ' . $value['fullName']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="code">Código</label><br>
            <input type="text" id="code" name="code" class="form-control" value="<?php echo $class['code']; ?>" required>
          </div>
          <div class="form-group">
            <label for="fullName">Designação da cadeira</label><br>
            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $class['fullName']; ?>" required>
          </div>
          <div class="form-group">
            <label for="hours">Número total de horas</label><br>
            <input type="number" id="hours" name="hours" class="form-control" min="0" max="1000" value="<?php echo $class['hours']; ?>" required>
          </div>
          <div class="form-group">
            <label for="credits">Créditos</label><br>
            <input type="number" id="credits" name="credits" class="form-control" min="0" max="20" value="<?php echo $class['credits']; ?>" required>
          </div>
          <div class="form-group">
            <label for="active">Cadeira ativa</label>
            <input type="checkbox" id="active" name="active" <?php if ($class['active']) echo 'checked="true"'; ?>>
          </div>
          <hr>
          <input type="hidden" value='<?= $_GET['id'] ?>' name="id_class" id="id_class">
          <button type="submit" class="btn btn-md btn-success">Editar</button>
          <button type="submit" class="btn btn-md btn-default" onmousedown="history.back();">Voltar</button>
        </form>
      </div><!-- .Form -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>