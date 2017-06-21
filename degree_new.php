<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_degree_level = $_POST['id_degree_level'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $d->insert($id_degree_level, $code, $fullName, 'degree_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertDegree">

    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>
    
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Novo Curso</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Curso</a></li>
          <li class="active">Novo Curso</li>
        </ol>

        <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

              <!-- Form -->
              <form class="form-chosen form-horizontal" method="post">
                <div class="row">
                  <div class="col-lg-9 custom-col-9">

                    <!-- Nivel de curso -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_degree_level" class="control-label col-sm-3">Nível do curso</label>
                      <div class="col-sm-9">
                        <select id="id_degree_level" name="id_degree_level" class="form-control chosen" data-placeholder="Escolha um nível de curso..">
                          <option value=""></option>
                          <?php
                            $l = $d->levels();
                            foreach ($l as $key => $value) {
                          ?>
                          <option value="<?= $value['id_degree_level'] ?>"><?= $value['designation'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div><!-- .Nivel de curso -->
                    

                    <!-- Codigo de curso -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="code">Código do Curso</label>
                      <div class="col-sm-9">
                        <input type="text" id="code" name="code" class="form-control empty" required>
                      </div>
                    </div><!-- .Codigo de curso -->

                    <!-- Designação curso -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="fullName">Designação do Curso</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control empty" id="fullName" name="fullName" required>
                      </div>
                    </div><!-- .Designação curso -->

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

    <!-- Custom scripts -->
    <script> $(".chosen").chosen({width:'85%', allow_single_deselect:true}); </script>
  </body>
</html>