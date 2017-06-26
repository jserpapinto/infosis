<?php
//form
if (isset($_POST['username']) && $_POST['username'] != null) {
  require_once 'classes/user.class.php';
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $u = new user();
  if ($u->login($user, $pass)) header('Location:' . strtolower($_SESSION['role']) . '.php');
  else header('Location:index.php?error=true');
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>
 
 <?php /*
  <body>

    <!-- Container -->
    <div class="container">

      <!-- Header -->
      <div class="row">
        <div class="jumbotron">
          <h1><?= $GLOBALS['appname'] ?></h1>
          <small>Sistema de Informação v<?= $GLOBALS['version'] ?></small>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 pmd-card pmd-z-depth pmd-card-default">

          <!-- Login Form -->
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
          </form><!-- .Login Form -->

          <!-- Errors -->
          <?php
            require_once 'classes/error.class.php';
            $e = new error();
            if (isset($_GET['error']) && $_GET['error']) echo $e->errorMessage('danger', 'ACESSO NEGADO!', 'Nome de utilizador ou palavra-passe errados, por favor reveja os dados...');
            if (isset($_GET['error2']) && $_GET['error2']) echo $e->errorMessage('warning', 'VIOLAÇÃO DE ACESSO!', 'Está a tentar entrar numa área reservada, contacte o administrador !!!');
            if (isset($_GET['error3']) && $_GET['error3']) echo $e->errorMessage('danger', 'VIOLAÇÃO DE ACESSO!', 'A sua tentativa foi registada, contacte um administrador o mais rapidamente possível');
          ?><!-- .Errors -->

        </div>
      </div>

    </div><!-- .Container -->
    */?>

  <body class="body-custom">
    <div class="logincard">
        <div class="pmd-card card-default pmd-z-depth">
        <div class="login-card">
          <form action="index.php" method="post">  
            <p class="redirection-link"></p>
            <div class="pmd-card-title card-header-border text-center">
              <h3>Autentique-se <span>no <strong><?= $GLOBALS['appname'] ?></strong></span></h3>
            </div>
            
            <div class="pmd-card-body">
              <div class="form-group pmd-textfield pmd-textfield-floating-label">
                  <label for="username" class="control-label pmd-input-group-label">Nome de utilizador</label>
                  <div class="input-group">
                      <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                      <input type="text" class="form-control" id="username" name="username"><span class="pmd-textfield-focused"></span>
                  </div>
              </div>
              
              <div class="form-group pmd-textfield pmd-textfield-floating-label">
                  <label for="password" class="control-label pmd-input-group-label">Palavra-passe</label>
                  <div class="input-group">
                      <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                      <input type="password" class="form-control" id="password" name="password"><span class="pmd-textfield-focused"></span>
                  </div>
              </div>
            </div>
            <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
              <div class="form-group clearfix">
                <div class="checkbox pull-left">
                  <label class="pmd-checkbox checkbox-pmd-ripple-effect">
                    <input type="checkbox" checked="" value=""><span class="pmd-checkbox-label">&nbsp;</span>
                    <span class="pmd-checkbox"> Lembrar-me</span>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">Login</button>
                        
              <p class="redirection-link"></p>
                        
            </div>
            
          </form>
        </div>
        
        
          <!-- Errors -->
          <?php
            require_once 'classes/error.class.php';
            $e = new error();
            if (isset($_GET['error']) && $_GET['error']) echo $e->errorMessage('danger', 'ACESSO NEGADO!', 'Nome de utilizador ou palavra-passe errados, por favor reveja os dados...');
            if (isset($_GET['error2']) && $_GET['error2']) echo $e->errorMessage('warning', 'VIOLAÇÃO DE ACESSO!', 'Está a tentar entrar numa área reservada, contacte o administrador !!!');
            if (isset($_GET['error3']) && $_GET['error3']) echo $e->errorMessage('danger', 'VIOLAÇÃO DE ACESSO!', 'A sua tentativa foi registada, contacte um administrador o mais rapidamente possível');
          ?><!-- .Errors -->
        </div>
      </div>


    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
  </body>
</html>