<nav class="navbar pmd-navbar navbar-default">
  <!-- Container -->
  <div class="container-fluid">

    <!-- Header/Mobile -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle pmd-navbar-toggle pmd-ripple-effect collapsed" data-toggle="collapse" data-target="#menuAdmin" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php">Backoffice <?php echo $GLOBALS['appname']; ?></a>
    </div><!-- .Header/Mobile -->

    <!-- Navbar -->
    <div class="collapse navbar-collapse" id="menuAdmin">
      <ul class="nav navbar-nav navbar-right">

        <!-- Home -->
        <li><a href="admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início </a></li>

        <!-- Courses -->
        <li class="dropdown pmd-dropdown">
          <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Cursos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="degree_new.php">Inserir Novo Curso</a></li>
            <li><a href="degree_manage.php">Gerir Cursos</a></li>
            <li><a href="degree_level_manage.php">Gerir Níveis de Curso</a></li>
          </ul>
        </li>

        <!-- Classes -->
        <li class="dropdown pmd-dropdown">
          <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Cadeiras <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="class_new.php">Inserir Nova Cadeira</a></li>
            <li><a href="class_manage.php">Gerir Cadeiras</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Associar Professores/Cadeiras</a></li>
            <li><a href="#">Gerir Associações</a></li>
          </ul>
        </li>

        <!-- Sumários -->
        <li class="dropdown pmd-dropdown">
          <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Sumário <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="summary_new.php">Inserir Novo Sumário</a></li>
            <li><a href="summary_manage.php">Gerir Sumários</a></li>
          </ul>
        </li>
        
        <!-- Class Schedules -->
        <li><a href="#"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Horários </a></li>

        <!-- Users -->
        <li class="dropdown pmd-dropdown">
          <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilizadores <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="user_new.php">Inserir Novo Utilizador</a></li>
            <li><a href="user_manage.php">Gerir Utilizadores</a></li>
          </ul>
        </li>

        <!-- User -->
        <li class="dropdown pmd-dropdown pmd-user-info">
          <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo $_SESSION['picture']; ?>" class="img-responsive avatarmenu"> <b><?php echo $_SESSION['name']; ?></b> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="user_edit.php?id=<?php echo $_SESSION['id_user']; ?>">Editar Perfil</a></li>
            <li><a href="logout.php">Sair</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- .Navbar -->

  </div><!-- .Container -->

</nav>