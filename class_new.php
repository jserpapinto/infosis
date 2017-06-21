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

  //form
  if (isset($_POST['fullName']) && $_POST['fullName'] != null) {
    $id_degree = $_POST['id_degree'];
    $code = $_POST['code'];
    $fullName = $_POST['fullName'];
    $credits = $_POST['credits'];
    $hours = $_POST['hours'];
    $semester = $_POST['semester'];
    $n_classes = $_POST['n_classes'];
    $active = ($_POST['active']) ? true : false;
    $c->insert($id_degree, $code, $fullName, $credits, $hours, $semester, $n_classes, $active, 'class_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body id="InsertClass">
    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>
    
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Nova Cadeira</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Cadeiras</a></li>
          <li class="active">Nova Cadeira</li>
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
                        <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um Curso..">
                          <option value=""></option>
                          <?php
                            foreach ($degrees as $degree) {
                          ?>
                          <option value="<?= $degree['id_degree'] ?>"><?= $degree['designation'] . '(' . $degree['code'] . ') - ' . $degree['fullName'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div><!-- .Curso --> 

                    <!-- Codigo de disciplina -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="code">Código</label>
                      <div class="col-sm-9">
                        <input type="text" id="code" name="code" class="form-control empty" placeholder="" required>
                      </div>
                    </div><!-- .Codigo de disciplina -->

                    <!-- Designação da cadeira -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="fullName">Designação da cadeira</label>
                      <div class="col-sm-9">
                        <input type="text" id="fullName" name="fullName" class="form-control empty" placeholder="" required>
                      </div>
                    </div><!-- .Designação da cadeira -->

                    <!-- Número total de horas -->
                    <div class="form-group pmd-textfield  col-sm-6">
                      <label class="col-sm-6 control-label" for="hours">Total de horas</label>
                      <div class="col-sm-6">
                        <input type="number" id="hours" name="hours" class="form-control" min="0" max="1000" required>
                      </div>
                    </div><!-- .Número total de horas -->


                    <!-- Créditos -->
                    <div class="form-group pmd-textfield col-sm-6">
                      <label class="col-sm-6 control-label" for="credits">Créditos</label>
                      <div class="col-sm-6">
                        <input type="number" id="credits" name="credits" class="form-control empty" min="0" max="20" required>
                      </div>
                    </div><!-- .Créditos -->


                    <!-- Semester -->
                    <div class="form-group pmd-textfield col-sm-6">
                      <label class="col-sm-6 control-label" for="semester">Semestre</label>
                      <div class="col-sm-6">
                        <select id="semester" name="semester" class="chosen" disabled required="">
                            <option value=""></option>
                        </select>
                      </div>
                    </div><!-- .Semester -->


                    <!-- Créditos -->
                    <div class="form-group pmd-textfield col-sm-6">
                      <label class="col-sm-6 control-label" for="n_classes">Nº Aulas</label>
                      <div class="col-sm-6">
                        <input type="number" id="n_classes" name="n_classes" class="form-control empty" min="0" max="50" required>
                      </div>
                    </div><!-- .Créditos -->

                    <!-- Activo -->
                    <div class="form-group checkbox pmd-default-theme pmd-textfield col-sm-12">
                      <label for="active" class="pmd-checkbox pmd-checkbox-ripple-effect col-sm-12">
                        <span class="col-sm-3 text-right ">Ativa</span>
                        <div class="col-sm-9">
                          <input type="checkbox" id="active" name="active" checked="true">
                        </div>
                      </label>
                    </div><!-- .Activo -->

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
    <script> 
      $(".chosen").chosen({width:'85%', allow_single_deselect:true}); 

       // AJAX get professores associados a curso
      $('#id_degree').on('change', function() {

        var idDegree = $(this).val();

        if (idDegree == "") {
          $('#semester').html('');
          $('#semester').prop('disabled', true);
          $('#semester').trigger('chosen:updated');

          return false;
        }

        $.ajax({
          url: "ajax/class_new.php",
          method: "POST",
          dataType: "json",
          data: {
            id_degree: idDegree
          }
        }).done(function(res) {

          $('#semester').html('');

          $('#semester').append($('<option>', {
              value: "",
              text: ""
          }));

          // iterate and add as option
          for (var i = 1; i <= res; i++) {
            $('#semester').append($('<option>', {
              value: i,
              text: i
            }));
          }

          // enable/disable
          $('#semester').prop('disabled', false);

          // update select box
          $('#semester').trigger('chosen:updated');
          

        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });
      })

    </script>
  </body>
</html>