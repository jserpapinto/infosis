<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("AdminProfessor");

  //page
  require_once 'classes/year.class.php';
  $y = new year();
  require_once 'classes/degree.class.php';
  $d = new degree();
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/summary.class.php';
  $s = new summary();

  //form
  if (isset($_POST['summary']) && $_POST['summary'] != null) {
    print_r($_POST);
    die();
    $id_class = $_POST['id_class'];
    $id_user = $_POST['id_user']; // porque é admin, senao tem de ser o da session
    $summary = $_POST['class_n'];
    $summary = $_POST['summary'];
    $class_date = $_POST['class_date'];
    $summary = $_POST['id_year'];
    $s->insert($id_class, $id_user, $class_n, $summary, $class_date, $id_year, 'summary_manage.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/datetime.css">
    <style type="text/css">
      .pmd-checkbox-label {
        float: right;
      }
    </style>
  </head>

  <body id="InsertSummary">

    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>
    
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

                    <!-- Year -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_year" class="control-label col-sm-3">Ano Lectivo</label>
                      <div class="col-sm-9">
                        <select id="id_year" name="id_year" class="form-control chosen" data-placeholder="Escolha um ano lectivo..">
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


                    <!-- Class -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_class" class="control-label col-sm-3">Cadeira</label>
                      <div class="col-sm-9">
                        <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha uma Cadeira.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <!-- Professor -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="id_user" class="control-label col-sm-3">Professor</label>
                      <div class="col-sm-9">
                        <select id="id_user" name="id_user" class="form-control chosen" data-placeholder="Escolha um Professor.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <!-- Class number -->
                    <div class="form-group prousername pmd-textfield">
                      <label for="class_n" class="control-label col-sm-3">Número da aula</label>
                      <div class="col-sm-9">
                        <select id="class_n" name="class_n" class="form-control chosen" data-placeholder="Escolha a aula.." disabled="">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <!-- Summary -->
                    <div class="form-group pmd-textfield">
                      <label class="col-sm-3 control-label" for="summary">Sumário</label>
                      <div class="col-sm-9">
                        <textarea rows="4" id="summary" name="summary" class="form-control empty"  required></textarea>
                      </div>
                    </div>
                    
                    <!-- Date -->
                    <div class="form-group pmd-textfield ">
                      <label for="class_date" class="control-label col-sm-3 control-label">Data</label>
                      <div class="col-sm-9">
                        <input type="text" name="class_date" id="class_date" class="datetimepicker form-control"><span class="pmd-textfield-focused"></span>
                      </div>
                    </div><!-- .Date -->

                    <h3 class="heading">Presenças <small>Marque as presenças</small></h3>
                    <!--single line list with avtar --> 
                    <ul id="attendencies" class="list-group pmd-list pmd-list-avatar pmd-card-list">
                      
                      sem alunos
                    </ul>

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

      //AJAX get classes by year
      $('#id_year').on('change', function() {

        var idYear = $(this).val();
          console.log(idYear);

        if (idYear == "") {
          $('#id_class').html('');
          $('#id_class').prop('disabled', true);
          $('#id_class').trigger('chosen:updated');
          $('#id_user').html('');
          $('#id_user').prop('disabled', true);
          $('#id_user').trigger('chosen:updated');
          $('#class_n').html('');
          $('#class_n').prop('disabled', true);
          $('#class_n').trigger('chosen:updated');
          return false;
        }

        $.ajax({
          url: "ajax/summary_new.php",
          method: "POST",
          dataType: "json",
          data: {
            id_year: idYear
          }
        }).done(function(res) {
          console.log(res);
          $('#id_class').html('');

          // iterate and add as option
          $('#id_class').append($('<option>', {
            value: "",
            text: ""
          }));
          res.forEach(function(el, i) {
            $('#id_class').append(`
              <option value="${el.id_class}" data-nclasses="${el.n_classes}">${el.fullName}</option>
            `);
          });

          // enable/disable
          if (res.length > 0) $('#id_class').prop('disabled', false);
          else $('#id_class').prop('disabled', true);

          // update select box
          $('#id_class').trigger('chosen:updated');
          

        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });
      })

      // AJAX get professores associados a curso + numero da aula
      $('#id_class').on('change', function() {

        var idClass = $(this).val();
        var nClasses = $(this).find(':selected').data('nclasses');
        var idYear = $('#id_year').val();

        console.log(idClass, $(this).find(':selected').data('nclasses'));

        if (idClass == "") {
          $('#id_user').html('');
          $('#id_user').prop('disabled', true);
          $('#id_user').trigger('chosen:updated');
          $('#class_n').html('');
          $('#class_n').prop('disabled', true);
          $('#class_n').trigger('chosen:updated');
          return false;
        }

        $.ajax({
          url: "ajax/summary_new.php",
          method: "POST",
          dataType: "json",
          data: {
            id_class: idClass,
            id_year: idYear
          }
        }).done(function(res) {

          /**
           *
           * Professores
           *
           */
          $('#id_user').html('');

          // iterate and add as option
          $('#id_user').append($('<option>', {
            value: "",
            text: ""
          }));
          res.users.forEach(function(el, i) {
            $('#id_user').append($('<option>', {
              value: el.id_user,
              text: el.name
            }));
          });

          // enable/disable
          if (res.users.length > 0) $('#id_user').prop('disabled', false);
          else $('#id_user').prop('disabled', true);

          // update select box
          $('#id_user').trigger('chosen:updated');


          /**
           *
           * Classes number
           *
           */
          $('#class_n').html('');

          // iterate and add as option
          $('#class_n').append($('<option>', {
            value: "",
            text: ""
          }));

          var summarizedArr = res.summarized.map(function(el) {
            return parseInt(el.class_n);
          });

          for (var i = 1; i <= nClasses; i++) {
            if (summarizedArr.indexOf(i) < 0) {
              $('#class_n').append($('<option>', {
                value: i,
                text: i
              }));
            }
          }

          // enable/disable
          if (res.summarized.length > 0) $('#class_n').prop('disabled', false);
          else $('#class_n').prop('disabled', true);

          // update select box
          $('#class_n').trigger('chosen:updated');

          /**
           *
           * Alunos
           *
           */
          console.log(res.students);

          $('#attendencies').html("");

          res.students.forEach(function(el, i) {
            $('#attendencies').append(`
              <li class="col-sm-6 list-group-item">
                <div class="media-left">
                    <a class="avatar-list-img" href="javascript:void(0);">
                      <img data-holder-rendered="true" src="${el.picture}" class="img-responsive" data-src="holder.js/40x40" alt="40x40">
                    </a>
                </div>
                <div class="media-body media-middle">
                    <label style="width:100%;" class="pmd-checkbox pmd-checkbox-ripple-effect">
                        <span> ${el.name}</span>
                        <input class="pull-right" type="checkbox" name="attendancy[]" value="${el.id_user}">
                        <input type="hidden" name="students[]" value="${el.id_user}">
                    </label>
                </div>
              </li>
            `);
          });

          /**
           *
           * Repeated code because of dynamic append
           *
           */
          $('.pmd-checkbox input').after('<span class="pmd-checkbox-label">&nbsp;</span>');
          // Ripple Effect //
          $(".pmd-checkbox-ripple-effect").on('mousedown', function(e) {
            var rippler = $(this);
            $('.ink').remove();
            // create .ink element if it doesn't exist
            if(rippler.find(".ink").length === 0) {
              rippler.append('<span class="ink"></span>');
            }
            var ink = rippler.find(".ink");
            // prevent quick double clicks
            ink.removeClass("animate");
            // set .ink diametr
            if(!ink.height() && !ink.width())
            {
            //  var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
              ink.css({height: 20, width: 20});
            }
            // get click coordinates
            var x = e.pageX - rippler.offset().left - ink.width()/2;
            var y = e.pageY - rippler.offset().top - ink.height()/2;
            // set .ink position and add class .animate
            ink.css({
              top: y+'px',
              left:x+'px'
            }).addClass("animate");
            setTimeout(function(){ 
              ink.remove();
            }, 1500);

          })
          

        }).fail(function(xhr) {
          console.log(xhr, xhr.statusText);
        });


      })
    </script>
  </body>
</html>