<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/inscription.class.php';
  $i = new inscription();

  //form
  if (isset($_POST['id_class']) && $_POST['id_user'] != null) {
    $id_class = $_POST['id_class'];
    $id_user = $_POST['id_user'];
    $inscription_year = $_POST['inscription_year'];
    $i->insert($id_class, $id_user, $inscription_year, 'inscription_new.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertSummary">
  
    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>

    <!-- Container -->
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Inscrições <small>Inserir Nova Inscrições</small></h1>
      </div>

      <!-- Form -->
      <div class="row">
        <form class="form-chosen" action="inscription_new.php" method="post">
          <div class="col-sm-6">
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
          <div class="col-sm-6">
            <label for="id_class">Cadeira</label>
            <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
              <option value="0"></option>
              <?php
                  $classes = $c->classes();
                  foreach ($classes as $key => $value) {
                ?>
                <option value="<?= $value['id_class'] ?>"><?=  '(' . $value['code'] . ') - ' . $value['fullName'] ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="id_role">Role</label>
            <select id="id_role" name="id_role" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
              <option value="0"></option>
              <?php
                  $role = $u->roles();
                  foreach ($role as $key => $value) {
                ?>
                <option value="<?= $value['id_role'] ?>"><?=  $value['role'] ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="id_user">Utilizador</label>
            <select id="id_user" name="id_user" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
              <option value="0"></option>
              <?php
                  $user = $u->users();
                  foreach ($user as $key => $value) {
                ?>
                <option value="<?= $value['id_user'] ?>"><?=  $value['name'] ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group col-xs-2">
            <label for="inscription_year">Data de Inscrição</label><br>
            <input type="date" id="inscription_year" name="inscription_year" class="form-control" required>
          </div>
          <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-md btn-success">Inserir</button>
          </div>
        </form>
      </div><!-- .Filters -->
    </div>
  </body>
</html>