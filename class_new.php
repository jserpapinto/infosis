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


  $degrees = $d->degrees();

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_degree = $_POST['id_degree'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $credits = $_POST['credits'];
    $hours = $_POST['hours'];
    $active = ($_POST['active']) ? true : false;
    $c->insert($id_degree, $code, $fullName, $credits, $hours, $active, 'class_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertClass">
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>
    
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">
        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Nova Cadeira</span>
        </h1><!-- End Title -->

        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Cadeiras</a></li>
          <li class="active">Nova Cadeira</li>
        </ol><!--breadcrum end-->

        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <form class="form-chosen form-horizontal" method="post">
                <div class="row">
                  <div class="col-lg-9 custom-col-9">

                    <!-- Curso -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_degree" class="control-label col-sm-3">Curso</label>
                      <div class="col-sm-9">
                        <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um nível de curso..">
                          <option value=""></option>
                          <?php
                            foreach ($degrees as $degree) {
                          ?>
                          <option value="<?php echo $degree['id_degree']; ?>"><?php echo $degree['designation'] . '(' . $degree['code'] . ') - ' . $degree['fullName']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- .Curso --> 

                    <!-- Codigo de disciplina -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="code">Código</label>
                      <div class="col-sm-9">
                        <input type="text" id="code" name="code" class="form-control empty" placeholder="" required>
                      </div>
                    </div>
                    <!-- .Codigo de disciplina -->

                    <!-- Designação da cadeira -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="fullName">Designação da cadeira</label>
                      <div class="col-sm-9">
                        <input type="text" id="fullName" name="fullName" class="form-control empty" placeholder="" required>
                      </div>
                    </div>
                    <!-- .Designação da cadeira -->

                    <!-- Número total de horas -->
                    <div class="form-group pmd-textfield  col-sm-6">
                      <label class="col-sm-6 control-label" for="hours">Total de horas</label>
                      <div class="col-sm-6">
                        <input type="number" id="hours" name="hours" class="form-control" min="0" max="1000" required>
                      </div>
                    </div>
                    <!-- .Número total de horas -->


                    <!-- Créditos -->
                    <div class="form-group pmd-textfield col-sm-6">
                      <label class="col-sm-6 control-label" for="credits">Créditos</label>
                      <div class="col-sm-6">
                        <input type="number" id="credits" name="credits" class="form-control empty" min="0" max="1000" required>
                      </div>
                    </div>
                    <!-- .Créditos -->

                    <!-- Activo -->
                    <div class="form-group checkbox pmd-default-theme pmd-textfield col-sm-12">
                      <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect col-sm-12">
                        <span class="col-sm-3 text-right ">Ativa</span>
                        <div class="col-sm-9">
                          <input type="checkbox" id="active" name="active" checked="true">
                        </div>
                      </label>
                    </div>
                    <!-- .Activo -->


                    <div class="form-group btns margin-bot-30">
                      <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary pmd-ripple-effect">Inserir</button>
                      </div>
                    </div>



                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> $(".chosen").chosen(); </script>
  </body>
</html>