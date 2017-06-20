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
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <?php require_once('includes/head.inc.php'); ?>
  </head>

  <body>
    <!-- Menu -->
    <?php require_once('includes/menuAdmin.inc.php'); ?>

    <!-- Container -->
    <div id="content" class="pmd-content inner-page">
      <div class="container-fluid full-width-container">

        <!-- Title -->
        <h1 class="section-title" id="services">
          <span>Gerir Cadeiras</span>
        </h1>

        <!-- Breadcrumb -->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">Cadeiras</a></li>
          <li class="active">Gerir Cadeiras</li>
        </ol>

        <!-- Table card -->
        <section class="row component-section">
          <div class="col-sm-12">
            <div class="component-box">
              <div  class="pmd-card pmd-z-depth pmd-card-custom-view">
                <div class="table-responsive">
                  <table id="table-class" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Curso</th>
                        <th>Código</th>
                        <th>Designação</th>
                        <th>Horas</th>
                        <th>Créditos</th>
                        <th>Estado</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody class="classes">

                      <?php
                        $classes = $c->classes();
                        foreach($classes as $class) {
                      ?>

                      <tr>
                        <td><?= $class['dcode'] ?></td>
                        <td><?= $class['code'] ?></td>
                        <td><?= $class['fullName'] ?></td>
                        <td><?= $class['hours'] ?></td>
                        <td><?= $class['credits'] ?></td>
                        <td><input type="checkbox" id="active" name="active" <?= ($class['active']) ? 'checked="true"' : '' ?> disabled="true"></td>
                        <td>
                          <a href="class_edit.php?id=<?= $class['id_class'] ?>"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                          <button data-destination="class_delete.php?id=<?= $class['id_class'] ?>" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
                        </td>
                      </tr>

                      <?php } ?>

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

      $(document).ready(function() {

        // trigger data table 
        var exampleDatatable = $('#table-class').DataTable({
          responsive: {
            details: {
              type: 'column',
              target: 'tr'
            }
          },
          /*columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   1
          } ],*/
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
          dom:
            "<'pmd-card-title'<'data-table-responsive pull-left'><'search-paper pmd-textfield'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
        });
      });
    </script>
  </body>
</html>