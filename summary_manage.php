<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("AdminProfessor");

  //page
  require_once 'classes/degree.class.php';
  $d = new degree();
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/summary.class.php';
  $s = new summary();
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body>
    <!-- Menu -->
    <?php require_once('includes/menuManager.inc.php'); ?>

    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Gerir Sumários</span>
        </h1>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Sumários</a></li>
          <li class="active">Gerir Sumários</li>
        </ol>

        <!-- Card degree -->
        <div class="row">
          <div class="col-sm-6">
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Curso</h2>
                    <span class="pmd-card-subtitle-text">Filtre por curso</span>
                </div>
                <div class="pmd-card-body">
                  <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
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
          </div>

          <!-- Card class -->
          <div class="col-sm-6">
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Cadeira</h2>
                    <span class="pmd-card-subtitle-text">Filtre por cadeira</span>
                </div>
                <div class="pmd-card-body">
                  <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha uma disciplina..." disabled>
                    <option value=""></option>
                  </select>
                </div>
            </div>
          </div>
        </div>

        <!-- Table card -->
        <section class="row component-section">
          <div class="col-sm-12">
            <div class="component-box">
              <div  class="pmd-card pmd-z-depth pmd-card-custom-view">
                <div class="table-responsive">
                  <table id="table-summarys" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <th>Data</th>
                      <th>Professor</th>
                      <th>Sumário</th>
                      <th>Opções</th>
                    </thead>
                    <tbody class="summarys">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section><!-- .Table card -->

      </div>
    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>
    <script type="text/javascript" src="js/dataTable.js"></script>

    <!-- Custom scripts -->
    <script> 
      $(".chosen").chosen({width:'85%', allow_single_deselect:true}); 

      $(document).ready(function() {

        // trigger data table 
        var summaryTable = $('#table-summarys').DataTable({
          responsive: {
            details: {
              type: 'column',
              target: 'tr'
            }
          },
          order: [ 1, 'asc' ],
          bFilter: true,
          bLengthChange: true,
          pagingType: "simple",
          "paging": true,
          "searching": true,
          "language": {
            "info": " _START_ - _END_ of _TOTAL_ ",
            "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
            "sSearch": "",
            "sSearchPlaceholder": "Search",
            "paginate": {
              "sNext": " ",
              "sPrevious": " "
            },
          },
          "language": {
            "emptyTable": nodataTemplate
          },
          dom:
            "<'pmd-card-title'<'data-table-responsive pull-left'><'search-paper pmd-textfield'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
        });



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
        });

        // AJAX fetch summarys from class
        $('#id_class').on('change', function() {

          var idClass = $(this).val();

          if (idClass == "") {
            // clear and update datatable 
            summaryTable.clear().draw();
            return false;
          }

          // AJAX fetch classes from degree
          $.ajax({
            url: "ajax/summary_manage.php",
            method: "POST",
            dataType: "json",
            data: {
              id_class: idClass,
              type: 'get_summarys'
            }
          }).done(function(res) {

            // clear table
            summaryTable.clear();

            // enable/disable
            if (res.length == 0) {
              summaryTable.clear().draw();
              return false;
            }

            // Iterate all results
            res.forEach(function(el, i) {
              console.log(el);
              // Add each result to table
              summaryTable.row.add([
                el.summary_date,
                el.name,
                el.summary,
                `
                  <a href="summary_edit.php?id=${el.id_summary}"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                  <button data-destination="summary_delete.php?id=${el.id_summary}" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
                `
              ]);
            })

            // udpate table
            summaryTable.draw();
            
          }).fail(function(xhr) {
            console.log(xhr, xhr.statusText);
          });
        });
    });

    </script>
  </body>
</html>