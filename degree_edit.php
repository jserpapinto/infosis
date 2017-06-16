<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  $degree = $d->fetch($_GET['id']);
  
  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_degree = $_POST['id_degree'];
    $id_degree_level = $_POST['id_degree_level'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $d->update($id_degree, $id_degree_level, $code, $fullName, 'degree_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="UpdateDegree">
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Curso <small>Gerir cursos - Editar</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" method="post">
          <div class="form-group">
            <label for="id_degree_level">Nível do curso</label><br>
            <select id="id_degree_level" name="id_degree_level" class="form-control chosen">
              <?php
                $l = $d->levels();
                foreach ($l as $key => $value) {
              ?>
              <option value="<?php echo $value['id_degree_level']; ?>" <?php if ($value['id_degree_level'] == $degree['id_degree_level']) echo 'selected="true"'; ?>><?php echo $value['designation']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="code">Código do Curso</label><br>
            <input type="text" id="code" name="code" class="form-control" value="<?php echo $degree['code']; ?>" required>
          </div>
          <div class="form-group">
            <label for="fullName">Designação do Curso</label><br>
            <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $degree['fullName']; ?>" required>
          </div>
          <hr>
          <input type="hidden" value='<?php echo $_GET['id']; ?>' name="id_degree" id="id_degree">
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