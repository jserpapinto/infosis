<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
  <ul class="nav pmd-sidebar-nav">
    
    <!-- User -->
    <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <div class="media-left">
          <img src="<?= $_SESSION['picture'] ?>" class="avatarmenu"> 
        </div>
        <div class="media-body media-middle"><?= $_SESSION['name'] ?></div>
        <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="user_edit.php?id=<?= $_SESSION['id_user'] ?>">Editar Perfil</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </li>
    
    <!-- School Years -->
    <li>
      <a href="year_manage.php">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Anos Letivos</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
    </li>

    <!-- Degrees -->
    <li class="dropdown pmd-dropdown">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Cursos</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="degree_new.php">Inserir Novo Curso</a></li>
        <li><a href="degree_manage.php">Gerir Cursos</a></li>
        <li><a href="degree_level_manage.php">Gerir Níveis de Curso</a></li>
      </ul>
    </li>
    
    <!-- Classes -->
    <li class="dropdown pmd-dropdown">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Cadeiras</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="class_new.php">Inserir Nova Cadeira</a></li>
        <li><a href="class_manage.php">Gerir Cadeiras</a></li>
      </ul>
    </li>

    <!-- Summarys -->
    <li class="dropdown pmd-dropdown">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Sumários</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="summary_new.php">Inserir Novo Sumário</a></li>
        <li><a href="summary_manage.php">Gerir Sumários</a></li>
      </ul>
    </li>

    <!-- Inscriptions -->
    <li class="dropdown pmd-dropdown">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Inscrições</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="inscription_new.php">Inserir Novas Inscrições</a></li>
        <li><a href="inscription_manage.php">Gerir Inscrições</a></li>
      </ul>
    </li>

    <!-- Class Schedules -->
    <li>
      <a href="#">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Horários</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
    </li>

    <!-- Users -->
    <li class="dropdown pmd-dropdown">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Utilizadores</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="user_new.php">Inserir Novo Utilizador</a></li>
        <li><a href="user_manage.php">Gerir Utilizadores</a></li>
      </ul>
    </li>
    
  </ul>
</aside><!-- .Left sidebar -->
<!-- Sidebar Ends -->  