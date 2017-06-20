<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/summary.class.php';
  $s = new summary();

  //form
  if (isset($_POST['summary']) && $_POST['summary'] != null) {
    $id_class = $_POST['id_class'];
    $id_user = $_SESSION['id_user'];
    $summary = $_POST['summary'];
    $class_date = $_POST['class_date'];
    $s->insert($id_class, $id_user, $summary, $class_date, 'summary_new.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/datetime.css">
  </head>

  <body id="InsertSummary">

    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>
    
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Novo Sumário</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Sumários</a></li>
          <li class="active">Novo Sumário</li>
        </ol>

        <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <!-- Form -->
              <form class="form-chosen form-horizontal" method="post">
                <div class="row">
                  <div class="col-lg-9 custom-col-9">

                    <!-- Class -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_degree" class="control-label col-sm-3">Curso</label>
                      <div class="col-sm-9">
                        <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um Curso..">
                          <option value=""></option>
                          <?php
                            $classes = $c->classes();
                            foreach ($classes as $class) {
                          ?>
                            <option value="<?= $class['id_class'] ?>"><?=  '(' . $class['code'] . ') - ' . $class['fullName'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div><!-- .Class -->

                    <!-- Professor -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_degree" class="control-label col-sm-3">Professor</label>
                      <div class="col-sm-9">
                        <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um Professor..">
                          <option value=""></option>
                          <?php
                            $users = $c->classes();
                            foreach ($classes as $class) {
                          ?>
                            <option value="<?= $class['id_class'] ?>"><?=  '(' . $class['code'] . ') - ' . $class['fullName'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div><!-- .Professor -->

                    <!-- Summary -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="summary">Sumário</label>
                      <div class="col-sm-9">
                        <textarea rows="4" id="summary" name="summary" class="form-control empty"  required></textarea>
                      </div>
                    </div><!-- .Summary -->
                    
                    <!-- Date -->
                    <div class="form-group pmd-textfield ">
                      <label for="regular1" class="control-label col-sm-3 control-label">Data</label>
                      <div class="col-sm-9">
                        <input type="text" class="datetimepicker form-control"><span class="pmd-textfield-focused"></span>
                      </div>
                    </div><!-- .Date -->

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
    <script type="text/javascript" src="js/datetime.js"></script>

    <!-- Custom scripts -->
    <script> 
      $(".chosen").chosen(); 
      $('.datetimepicker').datetimepicker();
    </script>
  </body>
</html>