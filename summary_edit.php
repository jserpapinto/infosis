<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

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
    $s->update($id_summary, $summary, $class_date, 'summary_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="UpdateClass">
  
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>
    
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

                    <!-- Class -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_degree" class="control-label col-sm-3">Cadeira</label>
                      <div class="col-sm-9">
                        <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha uma Cadeira..">
                          <option value=""></option>
                          <?php
                            foreach ($classes as $class) {
                          ?>
                            <option <?= ($class['id_class'] == $summary['id_class']) ? "selected" : "" ?> value="<?= $class['id_class'] ?>"><?=  '(' . $class['code'] . ') - ' . $class['fullName'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div><!-- .Class -->

                    <!-- Professor -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_teacher" class="control-label col-sm-3">Professor</label>
                      <div class="col-sm-9">
                        <select id="id_teacher" name="id_teacher" class="form-control chosen" data-placeholder="Escolha um Professor.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div><!-- .Professor -->

                    <!-- Summary -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="summary">Sumário</label>
                      <div class="col-sm-9">
                        <textarea rows="4" id="summary" name="summary" class="form-control empty"  required><?= $summary['summary'] ?></textarea>
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


      <!-- Form -->
        <form class="form-chosen" method="post">
          <div class="form-group col-xs-12">
            <label for="summary">Sumário</label><br>
            <textarea rows="4" id="summary" name="summary" class="form-control col-xs-12" required><?= $summary['summary'] ?></textarea>
          </div>
          <div class="form-group col-xs-4">
            <label for="class_date">Data</label><br>
            <input type="date" id="class_date" name="class_date" class="form-control" required value="<?= $summary['class_date'] ?>">
          </div>
          <div class="form-group col-xs-12">
            <input type="hidden" value='<?= $_GET['id'] ?>' name="id_summary" id="id_summary">
            <button type="submit" class="btn btn-md btn-success">Editar</button>
            <button type="submit" class="btn btn-md btn-default" onmousedown="history.back();">Voltar</button>
          </div>
        </form>



      </div>
    </div><!-- .Container -->



    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script>
      $(".chosen").chosen(); 


      // Update professores da cadeira e seleciona o correto
    </script>
  </body>
</html>