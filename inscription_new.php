<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  require_once 'classes/year.class.php';
  $y = new year();
  require_once 'classes/inscription.class.php';
  $i = new inscription();

  //form
  if (isset($_POST['id_class']) && $_POST['id_class'] != null && isset($_POST['id_user']) && $_POST['id_user'] != null) {
    $id_class = $_POST['id_class'];
    $id_user = $_POST['id_user'];
    $id_year = $_POST['id_year'];
    $i->insert($id_user, $id_class, $id_year, 'inscription_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/datetime.css">
  </head>

  <body>
  
    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>
    
    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Nova Inscrição</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Inscrições</a></li>
          <li class="active">Nova Inscrição</li>
        </ol>

        <!-- Card -->
        <div class="page-content profile-edit section-custom">
          <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-body">

            <!-- Form -->
              <form class="form-chosen form-horizontal" method="post">
                <div class="row">
                  <div class="col-lg-9 custom-col-9">
                  
                    <!-- Role -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_role" class="control-label col-sm-3">Tipo de Utilizador</label>
                      <div class="col-sm-9">
                        <select id="id_role" name="id_role" class="form-control chosen" data-placeholder="Escolha um Tipo de Utilizador..">
                          <option value=""></option>
                          <?php
                            $roles = $u->roles();
                            foreach ($roles as $role) {
                              if ($role['role'] == "Professor" || $role['role'] == "Aluno") {
                          ?>
                          <option value="<?= $role['id_role'] ?>"><?= $role['role'] ?></option>
                          <?php 
                              }
                            } 
                          ?>
                        </select>
                      </div>
                    </div>

                    <!-- User -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_user" class="control-label col-sm-3">Utilizador</label>
                      <div class="col-sm-9">
                        <select id="id_user" name="id_user[]" class="form-control chosen" multiple data-placeholder="Escolha um Utilizador.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <!-- Year -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_year" class="control-label col-sm-3">Ano</label>
                      <div class="col-sm-9">
                        <select id="id_year" name="id_year" class="form-control chosen" data-placeholder="Escolha um Ano..">
                          <option value=""></option>
                          <?php
                            $years = $y->years();
                            foreach ($years as $year) {
                          ?>
                          <option value="<?= $year['id_year'] ?>"><?= date('Y', strtotime($year['beginning'])) ?>/<?= date('Y', strtotime($year['ending'])) ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  
                    <!-- Degree -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_degree" class="control-label col-sm-3">Curso</label>
                      <div class="col-sm-9">
                        <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um Curso.." disabled>
                          <option value=""></option>
                          <?php
                            $degrees = $d->degrees();
                            foreach ($degrees as $degree) {
                          ?>
                          <option value="<?= $degree['id_degree'] ?>"><?= $degree['fullName'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  
                    <!-- Class -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_class" class="control-label col-sm-3">Cadeira</label>
                      <div class="col-sm-9">
                        <select id="id_class" name="id_class[]" class="form-control chosen" multiple data-placeholder="Escolha uma Cadeira.." disabled="" required>
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

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
      $(".chosen").chosen({width:'85%', allow_single_deselect:true});

      $('#id_year').on('change', function() {

          var idYear = $(this).val();

          if (idYear == "") {
            $('#id_degree').prop('disabled', true);
            $('#id_degree').val('').trigger('chosen:updated');
            $('#id_class').html('');
            $('#id_class').prop('disabled', true);
            $('#id_class').trigger('chosen:updated');
            return false;
          } 

          $('#id_degree').prop('disabled', false);
          $('#id_degree').trigger('chosen:updated');

        });


      $('#id_degree').on('change', function() {

        var idDegree = $(this).val();
        var idYear = $('#id_year').val();

        if (idDegree == "") {
          $('#id_class').html('');
          $('#id_class').prop('disabled', true);
          $('#id_class').trigger('chosen:updated');
          return false;
        }
        // AJAX fetch classes from degree
        $.ajax({
          url: "ajax/inscriptions_new.php",
          method: "POST",
          dataType: "json",
          data: {
            //id_user: <?= ($_SESSION['role'] == "Professor") ? $_SESSION['id_user'] : -1 ?>,
            id_degree: idDegree,
            id_year: idYear,
          }
        }).done(function(res) {
          $('#id_class').html('');

          // Default option
          $('#id_class').append($('<option>', {
            value: "",
            text: ""
          }));

          // iterate and add as option
          res.forEach(function(el, i) {
            $('#id_class').append($('<option>', {
              value: el.id_class,
              text: el.fullName
            }));
          });

          // enable/disable
          if (res.length > 0) $('#id_class').prop('disabled', false);
          else $('#id_class').prop('disabled', true);

          // update select box
          $('#id_class').trigger('chosen:updated');
          
        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });

      }); // on change

      $('#id_role').on('change', function() {

        var idRole = $(this).val();

        if (idRole == "") {
          $('#id_user').html('');
          $('#id_user').prop('disabled', true);
          // update select box
          $('#id_user').trigger('chosen:updated');
          return false;
        }

        // AJAX fetch users from role
        $.ajax({
          url: "ajax/inscriptions_new.php",
          method: "POST",
          dataType: "json",
          data: {
            id_role: idRole
          }
        }).done(function(res) {
          $('#id_user').html('');

          // Default option
          $('#id_user').append($('<option>', {
            value: "",
            text: ""
          }));

          // iterate and add as option
          res.forEach(function(el, i) {
            $('#id_user').append($('<option>', {
              value: el.id_user,
              text: el.name
            }));
          });

          // enable/disable
          if (res.length > 0) $('#id_user').prop('disabled', false);
          else $('#id_user').prop('disabled', true);

          // update select box
          $('#id_user').trigger('chosen:updated');
          
        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });

      }); // on change


    </script>

  </body>
</html>