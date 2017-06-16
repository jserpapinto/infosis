<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_degree_level = $_POST['id_degree_level'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $d->insert($id_degree_level, $code, $fullName, 'degree_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertDegree">
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>
    
    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Curso <small>Inserir Novo Curso</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" method="post">
          <div class="form-group">
            <label for="id_degree_level">Nível do curso</label><br>
            <select id="id_degree_level" name="id_degree_level" class="form-control chosen" data-placeholder="Escolha um nível de curso..">
              <option value=""></option>
              <?php
                $l = $d->levels();
                foreach ($l as $key => $value) {
              ?>
              <option value="<?php echo $value['id_degree_level']; ?>"><?php echo $value['designation']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="code">Código do Curso</label><br>
            <input type="text" id="code" name="code" class="form-control" placeholder="Código do curso..." required>
          </div>
          <div class="form-group">
            <label for="fullName">Designação do Curso</label><br>
            <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Nome completo do curso..." required>
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