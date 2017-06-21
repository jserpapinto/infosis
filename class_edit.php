<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  $degrees = $d->degrees();
  require_once 'classes/classs.class.php';
  $c = new classs();
  $class = $c->fetch($_GET['id']);

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_class = $_POST['id_class'];
    $id_degree = $_POST['id_degree'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $credits = $_POST['credits'];
    $hours = $_POST['hours'];
    $active = ($_POST['active']) ? true : false;
    $c->update($id_class, $id_degree, $code, $fullName, $credits, $hours, $active, 'class_manage.php');
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
        
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Editar Cadeira</span>
        </h1>

        <!-- Breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a>Cadeiras</a></li>
          <li class="active">Editar Cadeira</li>
        </ol>

        <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <!-- Form -->
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
                          <option <?= ($degree['id_degree'] == $class['id_degree']) ? 'selected="true"' : '' ?> value="<?= $degree['id_degree'] ?>"><?= $degree['designation'] . '(' . $degree['code'] . ') - ' . $degree['fullName'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- .Curso --> 


                    <!-- Codigo de disciplina -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="code">Código</label>
                      <div class="col-sm-9">
                        <input type="text" id="code" name="code" class="form-control empty" placeholder="" required value="<?= $class['code'] ?>">
                      </div>
                    </div><!-- .Codigo de disciplina -->

                    <!-- Designação da cadeira -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="fullName">Designação da cadeira</label>
                      <div class="col-sm-9">
                        <input type="text" id="fullName" name="fullName" class="form-control empty" placeholder="" required value="<?= $class['fullName'] ?>">
                      </div>
                    </div><!-- .Designação da cadeira -->

                    <!-- Número total de horas -->
                    <div class="form-group pmd-textfield  col-sm-6">
                      <label class="col-sm-6 control-label" for="hours">Total de horas</label>
                      <div class="col-sm-6">
                        <input type="number" id="hours" name="hours" class="form-control" min="0" max="1000" required value="<?= $class['hours'] ?>">
                      </div>
                    </div><!-- .Número total de horas -->


                    <!-- Créditos -->
                    <div class="form-group pmd-textfield col-sm-6">
                      <label class="col-sm-6 control-label" for="credits">Créditos</label>
                      <div class="col-sm-6">
                        <input type="number" id="credits" name="credits" class="form-control empty" min="0" max="1000" required value="<?= $class['credits'] ?>">
                      </div>
                    </div><!-- .Créditos -->

                    <!-- Activo -->
                    <div class="form-group checkbox pmd-default-theme pmd-textfield col-sm-12">
                      <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect col-sm-12">
                        <span class="col-sm-3 text-right ">Ativa</span>
                        <div class="col-sm-9">
                          <input type="checkbox" id="active" name="active" <?= ($class['active']) ? 'checked="true"' : '' ?>>
                        </div>
                      </label>
                    </div><!-- .Activo -->


                    <div class="form-group btns margin-bot-30">
                      <div class="col-sm-9 col-sm-offset-3">
                        <input type="hidden" value='<?= $_GET['id'] ?>' name="id_class" id="id_class">
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

    <!-- Custom scripts -->
    <script> $(".chosen").chosen({width:'85%', allow_single_deselect:true}); </script>
  </body>
</html>