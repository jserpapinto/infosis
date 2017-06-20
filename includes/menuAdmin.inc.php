<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">
  <!-- Container -->
  <div class="container-fluid">

    <!-- Header/Mobile -->
    <div class="navbar-header">
      <a href="javascript:void(0);" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons">menu</i></a> 
      <a class="navbar-brand" href="admin.php">Backoffice <?php echo $GLOBALS['appname']; ?></a>
    </div><!-- .Header/Mobile -->

    <div class="pmd-navbar-right-icon pull-right navigation">
      <!-- Notifications -->
      <div class="dropdown notification icons pmd-dropdown">
      
        <a href="javascript:void(0)" title="Notification" class="dropdown-toggle pmd-ripple-effect"  data-toggle="dropdown" role="button" aria-expanded="true">
          <div data-badge="3" class="material-icons md-light pmd-sm pmd-badge  pmd-badge-overlap">notifications_none</div>
        </a>
      
        <div class="dropdown-menu dropdown-menu-right pmd-card pmd-card-default pmd-z-depth" role="menu">
          <!-- Card header -->
          <div class="pmd-card-title">
            <div class="media-body media-middle">
              <a href="notifications.html" class="pull-right">3 new notifications</a>
              <h3 class="pmd-card-title-text">Notifications</h3>
            </div>
          </div>
          
          <!-- Notifications list -->
          <ul class="list-group pmd-list-avatar pmd-card-list">
            <li class="list-group-item" style="display:none">
              <p class="notification-blank">
                <span class="dic dic-notifications-none"></span> 
                <span>You don´t have any notifications</span>
              </p>
            </li>
            <li class="list-group-item unread">
              <a href="javascript:void(0)">
                <div class="media-left">
                  <span class="avatar-list-img40x40">
                    <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-1.png" data-holder-rendered="true">
                  </span>
                </div>
                <div class="media-body">
                  <span class="list-group-item-heading"><span>Prathit</span> posted a new challanegs</span>
                  <span class="list-group-item-text">5 Minutes ago</span>
                </div>
              </a>
            </li>
            <li class="list-group-item">
              <a href="javascript:void(0)">
                <div class="media-left">
                  <span class="avatar-list-img40x40">
                    <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-2.png" data-holder-rendered="true">
                  </span>
                </div>
                <div class="media-body">
                  <span class="list-group-item-heading"><span>Keel</span> Cloned 2 challenges.</span>
                  <span class="list-group-item-text">15 Minutes ago</span>
                </div>
              </a>
            </li>
            <li class="list-group-item unread">
              <a href="javascript:void(0)">
                <div class="media-left">
                  <span class="avatar-list-img40x40">
                    <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-3.png" data-holder-rendered="true">
                  </span>
                </div>
              
                <div class="media-body">
                  <span class="list-group-item-heading"><span>John</span> posted new collection.</span>
                  <span class="list-group-item-text">25 Minutes ago</span>
                </div>
              </a>
            </li>
            <li class="list-group-item unread">
              <a href="javascript:void(0)">
                <div class="media-left">
                  <span class="avatar-list-img40x40">
                    <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="themes/images/profile-4.png" data-holder-rendered="true">
                  </span>
                </div>
                <div class="media-body">
                  <span class="list-group-item-heading"><span>Valerii</span> Shared 5 collection.</span>
                  <span class="list-group-item-text">30 Minutes ago</span>
                </div>
              </a>
            </li>
          </ul><!-- End notifications list -->

        </div>
        
        
    </div> <!-- End notifications -->

  </div><!-- .Container -->



</nav>


<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>
<!-- Left sidebar -->
<aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
  <ul class="nav pmd-sidebar-nav">
    
    <!-- User -->
    <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <div class="media-left">
          <img src="<?php echo $_SESSION['picture']; ?>" class="avatarmenu"> 
        </div>
        <div class="media-body media-middle"><?php echo $_SESSION['name']; ?></div>
        <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
      </a>
      <ul class="dropdown-menu">
        <li><a href="user_edit.php?id=<?php echo $_SESSION['id_user']; ?>">Editar Perfil</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </li>
    <!-- .User -->
    
    <!-- Courses -->
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
    <!-- .Courses -->
    
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
        <li><a href="#">Associar Professores/Cadeiras</a></li>
        <li><a href="#">Gerir Associações</a></li>
      </ul>
    </li>
    <!-- .Classes -->

    <!-- Sumários -->
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
    <!-- .Sumários -->

    <!-- Inscrições -->
    <li class="dropdown pmd-dropdown">
      <a href="#" class="dropdown-toggle pmd-ripple-effect" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Inscrições <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="inscription_new.php">Inserir Nova Inscrições</a></li>
        <li><a href="inscription_manage.php">Gerir Inscrições</a></li>
      </ul>
    </li>
    <!-- .Inscrições -->

    <!-- Class Schedules -->
    <li>
      <a href="#">
        <i class="material-icons media-left pmd-sm">swap_calls</i> 
        <span class="media-body">Horários</span>
        <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
      </a>
    </li>
    <!-- .Class Schedules -->

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
    <!-- .Users -->

    
  </ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->  