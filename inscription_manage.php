<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //page
  require_once 'classes/classs.class.php';
  $c = new classs();
  require_once 'classes/year.class.php';
  $y = new year();
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
          <span>Gerir Inscrições</span>
        </h1>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Inscrições</a></li>
          <li class="active">Gerir Inscrições</li>
        </ol>

        <div class="row">

          <!-- Card year -->
          <div class="col-sm-3">
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Ano Letivo</h2>
                    <span class="pmd-card-subtitle-text">Selecione o ano</span>
                </div>
                <div class="pmd-card-body">
                  <select id="id_year" name="id_year" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
                    <option value=""></option>
                    <?php
                      $years = $y->years();
                      foreach ($years as $year) {
                      ?>
                      <option value="<?= $year['id_year'] ?>"><?= date('Y', strtotime($year['beginning'])) . " / " .  date('Y', strtotime($year['ending']))?></option>
                      <?php } ?>
                  </select>
                </div>
            </div>
          </div>


          <!-- Card user -->
          <div class="col-sm-4">
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Utilizador</h2>
                    <span class="pmd-card-subtitle-text">Filtre por utilizador</span>
                </div>
                <div class="pmd-card-body">
                  <select id="id_user" name="id_user" class="form-control chosen" data-placeholder="Escolha um utilizador...">
                    <option value=""></option>
                    <?php
                      $users = $u->users();
                      foreach ($users as $user) {
                        if ($user['role'] != "Admin" && $user['role'] != "Secretaria") {
                    ?>
                    <option value="<?= $user['id_user'] ?>"><?= $user['name'] ?></option>
                    <?php 
                        }
                      } 
                    ?>
                  </select>
                </div>
            </div>
          </div>

          <!-- Card class -->
          <div class="col-sm-5">
            <div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text">Cadeira</h2>
                    <span class="pmd-card-subtitle-text">Filtre por cadeira</span>
                </div>
                <div class="pmd-card-body">
                  <select id="id_class" name="id_class" class="form-control chosen" data-placeholder="Escolha uma disciplina...">
                    <option value=""></option>
                    <?php
                      $classes = $c->classes();
                      foreach ($classes as $class) {
                      ?>
                      <option value="<?= $class['id_class'] ?>"><?= $class['fullName']?></option>
                      <?php } ?>
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
                  <table id="table-inscriptions" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <th>Ano de Inscrição</th>
                      <th>Utilizador</th>
                      <th>Tipo de Utilizador</th>
                      <th>Cadeira</th>
                      <th>Opções</th>
                    </thead>
                    <tbody class="inscriptions">
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
        var inscriptionTable = $('#table-inscriptions').DataTable({
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

        var updateInscritpions = function() {

          var idClass = $('#id_class').val();
          var idYear = $('#id_year').val();
          var idUser = $('#id_user').val();

          if (idClass == "" && idUser == "" && idYear == "") {
            // clear and update datatable 
            inscriptionTable.clear().draw();
            return false;
          }

          // AJAX fetch classes from degree
          $.ajax({
            url: "ajax/inscriptions_manage.php",
            method: "POST",
            dataType: "json",
            data: {
              id_class: idClass,
              id_year: idYear,
              id_user: idUser
            }
          }).done(function(res) {

            // clear table
            inscriptionTable.clear();

            // enable/disable
            if (res.length == 0) {
              inscriptionTable.clear().draw();
              return false;
            }

            // Iterate all results
            res.forEach(function(el, i) {
              // Add each result to table
              inscriptionTable.row.add([
                new Date(el.beginning).getFullYear() + ' / ' + new Date(el.ending).getFullYear(),
                el.name,
                el.role,
                el.fullName,
                `
                  <button data-destination="inscription_delete.php?id=${el.id_class_inscription}" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
                `
              ]);
            })

            // udpate table
            inscriptionTable.draw();
            
          }).fail(function(xhr) {
            console.log(xhr, xhr.statusText);
          });
        }

        $('#id_year').on('change', updateInscritpions);
        $('#id_user').on('change', updateInscritpions);
        $('#id_class').on('change', updateInscritpions);
    
      });
    </script>
  </body>
</html>