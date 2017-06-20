<?php
//se o formulário foi submetido
if (isset($_POST['username']) && $_POST['username'] != null) {
  require_once 'classes/user.class.php';
  //faz login
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $u = new user();
  if ($u->login($user, $pass)) header('Location:admin.php');
  else header('Location:index.php?error=true');
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>
  <body>
    <!-- Container -->
    <div class="container">

      <!-- Header -->
      <div class="row">
        <div class="jumbotron">
          <h1><?php echo $GLOBALS['appname']; ?></h1>
          <small>Sistema de Informação v<?php echo $GLOBALS['version']; ?></small>
        </div>
      </div><!-- .Header -->

      <!-- Login Form -->
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 pmd-card pmd-z-depth pmd-card-default">
          <form action="index.php" method="post">
            <div class="pmd-card-title">
              <h2 class="pmd-card-title-text">Autenticação</h2>
              <hr>
            </div>
            <div class="pmd-card-body">
              <div class="form-group pmd-textfield  pmd-textfield-floating-label">
                <label class="pmd-input-group-label control-label" for="username">Nome de utilizador</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="material-icons md-dark pmd-sm">perm_identity</i>
                  </div>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
              </div>
              <div class="form-group pmd-textfield  pmd-textfield-floating-label">
                <label class="pmd-input-group-label control-label" for="password">Palavra-passe</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="material-icons md-dark pmd-sm">https</i>
                  </div>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
            </div>
            <div class="pmd-card-actions">
              <div class="form-group">
                <hr>
                <button type="submit" class="btn btn-primary pmd-btn-raised pmd-ripple-effect">Entrar</button>
                <button type="reset" class="btn btn-warning pmd-btn-raised pmd-ripple-effect">Limpar</button>
              </div>
            </div>
          </form>
          <!-- Errors -->
          <?php
            $e = new error();
            if (isset($_GET['error']) && $_GET['error']) echo $e->errorMessage('danger', 'ACESSO NEGADO!', 'Nome de utilizador ou palavra-passe errados, por favor reveja os dados...');
            if (isset($_GET['error2']) && $_GET['error2']) echo $e->errorMessage('warning', 'VIOLAÇÃO DE ACESSO!', 'Está a tentar entrar numa área reservada, contacte o administrador !!!');
          ?><!-- .Errors -->
        </div>
      </div><!-- .Login Form -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
  </body>
</html>