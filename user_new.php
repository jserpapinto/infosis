<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

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
      <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div class="container">

      <!-- Header -->
      <div class="row">
      </div>

      <!-- Form -->
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 pmd-card pmd-z-depth pmd-card-default">
          <div class="pmd-card-title">
            <h1 class="pmd-card-title-text">Utilizador </h1>
            <span class="pmd-card-subtitle-text">Inserir Novo Utilizador</span>
          </div>
          <div class="pmd-card-body">
            <form id="formInsertUser" class="form-chosen" method="post" enctype="multipart/form-data">
              <div class="form-group pmd-textfield">
                <label for="role">Tipo de utilizador</label><br>
                <select id="role" name="role" class="form-control chosen" data-placeholder="Escolha um tipo de utilizador..">
                  <option value=""></option>
                  <?php
                    $r = $u->roles();
                    foreach ($r as $key => $value) {
                  ?>
                  <option value="<?php echo $value['id_role']; ?>"><?php echo $value['role']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group pmd-textfield  pmd-textfield-floating-label">
                <label for="name">Nome</label><br>
                <input type="text" id="name" name="name" class="form-control" required="required">
              </div>
              <div id="username-holder" class="form-group pmd-textfield  pmd-textfield-floating-label">
                <label for="username">Nome de utilizador</label><br>
                <input type="text" id="username" name="username" class="form-control" required="required">
                <div class="helper"></div>
              </div>
              <div class="form-group pmd-textfield  pmd-textfield-floating-label">
                <label for="password">Palavra-passe</label><br>
                <input type="password" id="password" name="password" class="form-control" required="required">
              </div>
              <div class="form-group   pmd-textfield form-group-lg">
                <label for="picture">Imagem</label>
                <input type="file" id="picture" name="picture">
                <p class="help-block">Escolha uma imagem para associar ao utilizador..</p>
              </div>
              <div class="form-group checkbox pmd-default-theme">
                <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect">
                  <input type="checkbox" id="active" name="active" checked="true">
                  <span>Utilizador ativo</span>
                </label>
              </div>
            </div>
            <div class="pmd-card-actions">
              <hr>
              <button type="submit" class="btn pmd-ripple-effect pmd-btn-raised btn-success">Inserir</button>
            </form>
          </div>
        </div>
      </div><!-- .Form -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> 
      $(".chosen").chosen(); 

      //Username verify
      $('#username').on('keyup', function() {
        var username = $(this).val().trim();
        if (username.length < 3) {
          $('#username-holder').find('.helper').removeClass('alert-danger alert alert-success').html("");
          return false;
        }
        // continua
        $.ajax({
          url: "<?= $GLOBALS['root'] ?>/ajax/username.php",
          method: "POST",
          dataType: "json",
          data: {
            username: username
          }
        }).done(function(res) {
          if (!res) {
            $('#username-holder').find('.helper').removeClass('alert-danger').addClass('alert alert-success').html("Nome de utilizador válido");
          } else {
            $('#username-holder').find('.helper').removeClass('alert-success').addClass('alert alert-danger').html("Nome de utilizador inválido");
          }
        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });
      })
    </script>
  </body>
</html>