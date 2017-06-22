<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("AdminProfessor");

  //page
  require_once 'classes/summary.class.php';
  $s = new summary();
  $summary = $s->fetch($_GET['id']);

  require_once 'classes/classs.class.php';
  $c = new classs();
  $classes = $c->classes();

  //form
  if (isset($_POST['summary']) && $_POST['summary'] != null) {
    $id_summary = $_POST['id_summary'];
    $summary = $_POST['summary'];
    $class_date = $_POST['class_date'];
    $id_user = $_POST['id_user'];
    $s->update($id_summary, $summary, $id_user, $class_date, 'summary_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="UpdateClass">
  
    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/datetime.css">
    
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Editar Sumário</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Sumários</a></li>
          <li class="active">Editar Sumário</li>
        </ol>

         <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <!-- Form -->
              <form class="form-chosen form-horizontal" method="post">
                <div class="row">
                  <div class="col-lg-9 custom-col-9">

                    <!-- Year -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_year" class="control-label col-sm-3">Ano Lectivo</label>
                      <div class="col-sm-9">
                        <input type="text" id="classid_year" name="id_year" value="<?= date('Y', strtotime($summary['beginning'])) ?> / <?= date('Y', strtotime($summary['ending'])) ?>" class="form-control empty" readonly>
                      </div>
                    </div>


                    <!-- Class -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="class" class="control-label col-sm-3">Cadeira</label>
                      <div class="col-sm-9">
                        <input type="text" id="class" name="class" value="(<?= $summary['code'] ?>) <?= $summary['fullName'] ?>" class="form-control empty" readonly>
                      </div>
                    </div>

                    <!-- Professor -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_user" class="control-label col-sm-3">Professor</label>
                      <div class="col-sm-9">
                        <select id="id_user" name="id_user" class="form-control chosen" data-placeholder="Escolha um Professor.." >
                          <option value=""></option>
                          <?php 
                          $users = $u->usersClass($summary['id_class'], 3, $summary['id_year']);
                          foreach ($users as $user) { ?>
                            <option <?= ($user['id_user'] == $summary['id_user']) ? "selected" : "" ?> value="<?= $user['id_user'] ?>"><?= $user['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <!-- Summary -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="summary">Sumário</label>
                      <div class="col-sm-9">
                        <textarea rows="4" id="summary" name="summary" class="form-control empty"  required><?= $summary['summary'] ?></textarea>
                      </div>
                    </div>
                    
                    <!-- Date -->
                    <div class="form-group pmd-textfield ">
                      <label for="class_date" class="control-label col-sm-3 control-label">Data</label>
                      <div class="col-sm-9">
                        <input type="text" name="class_date" id="class_date" class="datetimepicker form-control"><span class="pmd-textfield-focused"></span>
                      </div>
                    </div>

                    <input type="hidden" name="id_summary" id="id_summary" value="<?= $_GET['id'] ?>">

                    <div class="form-group btns margin-bot-30">
                      <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-success pmd-ripple-effect">Atualizar</button>
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
      $(".chosen").chosen({width:'85%', allow_single_deselect:true}); 
      $('.datetimepicker').datetimepicker({
        date: new Date('<?= $summary['class_date'] ?>')
      });
    </script>
  </body>
</html>