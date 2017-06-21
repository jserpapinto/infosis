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
    <?php require_once('includes/menuManager.inc.php'); ?>

    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Editar Utilizador</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Utilizador</a></li>
          <li class="active">Editar utilizador</li>
        </ol>

        <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <!-- Form -->
              <form class="form-chosen form-horizontal" method="post" enctype="multipart/form-data">
                <div class="row">

                  <!-- Profile pic -->
                  <div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
                    <div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
                      <img src="<?= $user['picture']?>">
                    </div>
                    <div class="action-button"> 
                      <span class="btn btn-default btn-raised btn-file ripple-effect">
                        <span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>
                        <span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>
                        <input type="file" name="picture">
                      </span> 
                      <a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
                    </div>
                  </div><!-- .Profile pic -->
                  
                  <div class="col-lg-9 custom-col-9">

                    <!-- Tipo de utilizador -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="role" class="control-label col-sm-3">Tipo de utilizador</label>
                      <div class="col-sm-9">
                        <select id="role" name="role" class="form-control chosen" data-placeholder="Escolha um tipo de utilizador.." <?= ($_SESSION('role') != "Admin") ? 'readonly' : '' ?>>
                          <option value=""></option>
                          <?php
                            $r = $u->roles();
                            foreach ($r as $key => $value) {
                          ?>
                          <option <?= ($value['id_role'] == $user['id_role']) ? 'selected="true"' : '' ?> value="<?= $value['id_role'] ?>"><?= $value['role'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <!-- Nome completo -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="code">Nome Completo</label>
                      <div class="col-sm-9">
                        <input type="text" id="name" name="name" value="<?= $user['name'] ?>" class="form-control empty" required="required">
                      </div>
                    </div>


                    <!-- Username -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="username">Username</label>
                      <div class="col-sm-9">
                        <input type="text" id="username" name="username" value="<?= $user['username'] ?>" class="readonly form-control empty" readonly required="required">
                        <p class="help-block"></p>
                      </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="password">Palavra-passe</label>
                      <div class="col-sm-9">
                        <input type="password" id="password" name="password" value="<?= $user['password'] ?>" class="form-control empty" required="required">
                      </div>
                    </div>

                    <!-- Activo -->
                    <div class="form-group checkbox pmd-default-theme pmd-textfield">
                      <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect col-sm-12">
                        <span class="col-sm-3 ">Utilizador ativo</span>
                        <div class="col-sm-9">
                          <input type="checkbox" <?= ($user['active']) ? 'checked="true"' : '' ?> id="active" name="active" checked="true">
                        </div>
                      </label>
                    </div><!-- .Activo -->

                    <input type="hidden" name="picture_old" value='<?= $user['picture']; ?>'>
                    <input type="hidden" value='<?= $_GET['id']; ?>' name="id_user" id="id_user">

                    <div class="form-group btns margin-bot-30">
                      <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect">Atualizar</button>
                      </div>
                    </div>

                  </div>
                </div>
              </form><!-- .Form -->

            </div>
          </div>
        </div><!-- .Card -->

      </div>
    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
    
    <!-- Upload files -->
    <script src="js/upload-file.js"></script>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>