<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  $user = $u->fetch($_GET['id']);

  //form
  if (isset($_POST['username']) && $_POST['username'] != null) {
    $id_user = $_POST['id_user'];
    $id_role = $_POST['role'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $active = ($_POST['active']) ? true : false;
    $picture = 'picture';
    $picture_old = $_POST['picture_old'];
    $u->update($id_user, $id_role, $username, $password, $name, $picture, $picture_old, $active, 'user_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="UpdateUser">
    <!-- Menu -->
      <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div class="container">

      <!-- Form -->
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 pmd-card-media-inline pmd-card pmd-z-depth pmd-card-default">

          <div class="pmd-card-media">
            <div class="media-body">
              <h1 class="pmd-card-title-text">Utilizador </h1>
              <span class="pmd-card-subtitle-text">Gerir utilizadores - Editar</span>
            </div>

            <div class="media-right media-middle">
              <a href="javascript:void(0);">
                  <img width="112" height="112" src="<?= $user['picture']?>">
              </a>
          </div>
          </div>

          <div class="pmd-card-body">
          <form class="form-chosen" method="post" enctype="multipart/form-data">
            <div class="form-group pmd-textfield">
              <label for="role">Tipo de utilizador</label><br>
              <select id="role" name="role" class="form-control chosen">
                <?php
                  $r = $u->roles();
                  foreach ($r as $key => $value) {
                ?>
                <option value="<?php echo $value['id_role']; ?>" <?php if ($value['id_role'] == $user['id_role']) echo 'selected="true"'; ?>><?php echo $value['role']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label for="name">Nome</label><br>
              <input type="text" id="name" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label for="username">Nome de utilizador</label><br>
              <input type="text" id="username" name="username" class="readonly form-control" value="<?php echo $user['username']; ?>" readonly>
            </div>
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label for="password">Palavra-passe</label><br>
              <input type="password" id="password" name="password" class="form-control" value="<?php echo $user['password']; ?>" required>
            </div>
            <div class="form-group pmd-textfield form-group-lg">
              <label for="picture">Imagem</label>
              <input type="file" id="picture" name="picture">
              <p class="help-block">Alterar a imagem do utilizador..</p>
            </div>
              <div class="form-group checkbox pmd-default-theme">
                <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect">
                  <input type="checkbox" id="active" name="active" <?php if ($user['active']) echo 'checked="true"'; ?>>
                  <span>Utilizador ativo</span>
                </label>
            </div>
          </div>

          <div class="pmd-card-actions">
            <hr>
            <input type="hidden" name="picture_old" value='<?= $user['picture']; ?>'>
            <input type="hidden" value='<?= $_GET['id']; ?>' name="id_user" id="id_user">
            <button type="submit" class="btn pmd-ripple-effect pmd-btn-raised btn-success">Editar</button>
            <button type="submit" class="btn pmd-ripple-effect pmd-btn-raised btn-default" onmousedown="history.back();">Voltar</button>
          </form>
        </div>
      </div><!-- .Form -->

    </div><!-- .Container -->
    
    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>