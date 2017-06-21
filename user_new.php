<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //form
  if (isset($_POST['username']) && $_POST['username'] != null) {
    $id_role = $_POST['role'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $picture = 'picture';
    $active = ($_POST['active']) ? true : false;
    $u->insert($id_role, $username, $password, $name, $picture, $active,'user_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertUser">

    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>

    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Novo Utilizador</span>
        </h1>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Utilizador</a></li>
          <li class="active">Novo utilizador</li>
        </ol>

        <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <!-- Form -->
              <form id="formInsertUser" class="form-chosen form-horizontal" method="post" enctype="multipart/form-data">
                <div class="row">

                  <!-- Profile pic -->
                  <div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
                    <div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
                      <img src="img/placeholder.jpg">
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
                        <select id="role" name="role" class="form-control chosen" data-placeholder="Escolha um tipo de utilizador..">
                          <option value=""></option>
                          <?php
                            $r = $u->roles();
                            foreach ($r as $key => $value) {
                          ?>
                          <option value="<?= $value['id_role'] ?>"><?= $value['role'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <!-- Nome completo -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="code">Nome Completo</label>
                      <div class="col-sm-9">
                        <input type="text" id="name" name="name" class="form-control empty" required="required">
                      </div>
                    </div>

                    <!-- Username -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="username">Username</label>
                      <div class="col-sm-9">
                        <input type="text" id="username" name="username" class="form-control empty" required="required">
                        <p class="help-block"></p>
                      </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="password">Palavra-passe</label>
                      <div class="col-sm-9">
                        <input type="password" id="password" name="password" class="form-control empty" required="required">
                      </div>
                    </div>

                    <!-- Active -->
                    <div class="form-group checkbox pmd-default-theme pmd-textfield">
                      <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect col-sm-12">
                        <span class="col-sm-3 ">Utilizador ativo</span>
                        <div class="col-sm-9">
                          <input type="checkbox" id="active" name="active" checked="true">
                        </div>
                      </label>
                    </div>

                    <div class="form-group btns margin-bot-30">
                      <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect">Inserir</button>
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
    <script> 
      $(".chosen").chosen({width:'85%', allow_single_deselect:true}); 

      //Username verify
      $('#username').on('keyup', function() {
        var username = $(this).val().trim();
        $este = $(this);

        if (username.length < 3) {
          $este.closest('.pmd-textfield').removeClass('has-success has-error');
          $este.closest('.pmd-textfield').find('.help-block').html('');
          return false;
        }

        // continua
        $.ajax({
          url: "ajax/username.php",
          method: "POST",
          dataType: "json",
          data: {
            username: username
          }
        }).done(function(res) {
          if (!res) {
            $este.closest('.pmd-textfield').removeClass('has-error').addClass('has-success');
            $este.closest('.pmd-textfield').find('.help-block').html('Username válido');
          } else {
            $este.closest('.pmd-textfield').removeClass('has-success').addClass('has-error');
            $este.closest('.pmd-textfield').find('.help-block').html('Username inválido');
          }
        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });
      })
    </script>
  </body>
</html>