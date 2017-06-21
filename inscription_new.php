<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");
  $roles = $u->roles();

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  $degrees = $d->degrees();
  require_once 'classes/classs.class.php';
  $c = new classs();
  $classes = $c->classes();
  require_once 'classes/inscription.class.php';
  $i = new inscription();

  //form
  if (isset($_POST['id_class']) && $_POST['id_user'] != null) {
    $id_class = $_POST['id_class'];
    $id_user = $_POST['id_user'];
    $inscription_year = $_POST['inscription_year'];
    $i->insert($id_class, $id_user, $inscription_year, 'inscription_new.php');
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
                    <h3 class="heading">Informações de Curso</h3>
                  
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
                    </div>
                    <!-- .Curso --> 
                  
                    <!-- Cadeira -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_class" class="control-label col-sm-3">Cadeira</label>
                      <div class="col-sm-9">
                        <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha um Curso.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>
                    <!-- .Cadeira --> 

                    <h3 class="heading">Informações de Utilizador</h3>
                    <!-- Role -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_role" class="control-label col-sm-3">Role</label>
                      <div class="col-sm-9">
                        <select id="id_role" name="id_role" class="form-control chosen" data-placeholder="Escolha um Curso..">
                          <option value=""></option>
                          <?php
                            foreach ($roles as $role) {
                          ?>
                          <option value="<?= $role['id_role'] ?>"><?= $role['role'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- .Role --> 


                    <!-- User -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_user" class="control-label col-sm-3">Utilizador</label>
                      <div class="col-sm-9">
                        <select id="id_user" name="id_user" class="form-control chosen" data-placeholder="Escolha um Curso.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>
                    <!-- .User --> 


                    <!-- Date -->
                    <div class="form-group pmd-textfield ">
                      <label for="inscription_year" class="control-label col-sm-3 control-label">Data de Inscrição</label>
                      <div class="col-sm-9">
                        <input type="text" name="inscription_year" id="inscription_year" class="datetimepicker form-control" required><span class="pmd-textfield-focused"></span>
                      </div>
                    </div>
                    <!-- .Date -->


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
      $('.datetimepicker').datetimepicker();

      $('#id_degree').on('change', function() {

        var idDegree = $(this).val();

        if (idDegree == "") {
          $('#id_class').html('');
          $('#id_class').prop('disabled', true);
          // update select box
          $('#id_class').trigger('chosen:updated');
          summaryTable.clear().draw();
          return false;
        }
        // AJAX fetch classes from degree
        $.ajax({
          url: "ajax/summary_manage.php",
          method: "POST",
          dataType: "json",
          data: {
            id_user: <?= ($_SESSION['role'] == "Professor") ? $_SESSION['id_user'] : -1 ?>,
            id_degree: idDegree,
            type: 'get_classes'
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
          summaryTable.clear().draw();
          return false;
        }

        // AJAX fetch users from role
        $.ajax({
          url: "ajax/inscriptions_new.php",
          method: "POST",
          dataType: "json",
          data: {
            id_role: idRole,
            type: 'get_classes'
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