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
    <div class="container">

    <!-- Header -->
      <div class="row">
        <h1>Cadeiras <small>Gerir Cadeiras</small></h1>
      </div>

      <!-- Filters -->
      <div class="row">
        <h3>Lista de Cadeiras no Sistema</h3>
        <div class="col-sm-6">
          <label for="id_degree_level">Nível do curso</label>
          <select id="id_degree_level" name="id_degree_level" class="form-control chosen" data-placeholder="Escolha um nível de curso...">
            <option value=""></option>
                <?php
                  $l = $d->levels();
                  foreach ($l as $key => $value) {
                ?>
                <option value="<?= $value['id_degree_level'] ?>"><?= $value['designation'] ?></option>
                <?php } ?>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="id_degree">Curso</label>
          <select id="id_degree" name="id_degree" class="form-control chosen" data-placeholder="Escolha um Curso..." disabled>
            <option value="0"></option>
          </select>
        </div>
      </div><!-- .Filters -->

      <!-- Datatable -->
      <div class="row">
        <table class="table table-hover">
          <thead>
            <th>Curso</th>
            <th>Código</th>
            <th>Designação</th>
            <th>Horas</th>
            <th>Créditos</th>
            <th>Estado</th>
            <th>Opções</th>
          </thead>
          <tbody class="classes">
            <?php
              $classes = $c->classes();
              foreach($classes as $key => $value) {
            ?>
            <!-- Class item -->
            <tr>
              <td><?= $value['dcode'] ?></td>
              <td><?= $value['code'] ?></td>
              <td><?= $value['fullName'] ?></td>
              <td><?= $value['hours'] ?></td>
              <td><?= $value['credits'] ?></td>
              <td><input type="checkbox" id="active" name="active" <?php if($value['active']) echo 'checked="true"'; ?> disabled="true"></td>
              <td>
                <a href="class_edit.php?id=<?= $value['id_class'] ?>"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                <button data-destination="class_delete.php?id=<?= $value['id_class'] ?>" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
              </td>
            </tr><!-- .Class item -->
            <?php } ?>
          </tbody>
        </table>
      </div><!-- .Datatable -->

    </div><!-- .Container -->

    <!-- Scripts -->
    <?php require_once('includes/scripts.inc.php'); ?>

    <!-- Custom scripts -->
    <script> 
      $(".chosen").chosen({width:'65%', allow_single_deselect:true}); 

      $(document).ready(function() {

        //class template
        var template = `
          <tr>
            <td>[DCODE]</td>
            <td>[CODE]</td>
            <td>[FULLNAME]</td>
            <td>[HOURS]</td>
            <td>[CREDITS]</td>
            <td><input type="checkbox" id="active" name="active" [CHECKED] disabled="true"></td>
            <td>
              <a href="class_edit.php?id=[IDCLASS]"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
              <button data-destination="class_delete.php?id=[IDCLASS]" type="button" class="btn btn-sm btn-danger sweet-delete">Apagar</button>
            </td>
          </tr>
        `;

        //fetch classes and degrees based on degree_level selects
        $('#id_degree_level').on('change', function() {
          var idl = $(this).val();

          //fetch classes
          $.ajax({
            url: "<?= $GLOBALS['root'] ?>/ajax/class_manage.php",
            method: "POST",
            dataType: "json",
            data: {
              type: 'classes',
              idl: idl
            }
          }).done(function(res) {
            $('tbody.classes').html("");

            res.forEach(function(el, i) {
              var t = template;
              t = t.replace('[DCODE]', el.dcode)
                .replace('[CODE]', el.code)
                .replace('[FULLNAME]', el.fullName)
                .replace('[HOURS]', el.hours)
                .replace('[CREDITS]', el.credits)
                .replace('[CHECKED]', (el.active == 1 ? 'checked' : ''))
                .replace(/\[IDCLASS\]/g, el.id_class);

              $('tbody.classes').append(t);
            });
          }).fail(function(xhr) {
            console.log(xhr, xhr.statusText);
          });

          if (idl != "") {
          //fetch degrees
            $.ajax({
              url: "<?= $GLOBALS['root'] ?>/ajax/class_manage.php",
              method: "POST",
              dataType: "json",
              data: {
                type: 'degrees',
                idl: idl
              }
            }).done(function(res) {
              $('#id_degree').html("").append('<option value=""></option>');
              res.forEach(function(el, i) {
                $('#id_degree').append(`
                    <option value="${el.id_degree}">${el.code}</option>
                `);
              });
              $('#id_degree').prop('disabled', false).trigger("chosen:updated");
            }).fail(function(xhr) {
              console.log(xhr, xhr.statusText);
            });
          } else {
            $('#id_degree').html("").prop('disabled', true).trigger("chosen:updated");
          }
        });

        //fetch classes based on degree select
        $('#id_degree').on('change', function() {
          var id = $(this).val();
          var idl = $('#id_degree_level').val();

          //fetch classes
          $.ajax({
            url: "<?= $GLOBALS['root'] ?>/ajax/class_manage.php",
            method: "POST",
            dataType: "json",
            data: {
              id: id,
              idl: idl
            }
          }).done(function(res) {

            console.log(res);
            $('tbody.classes').html("");

            res.forEach(function(el, i) {
              var t = template;
              t = t.replace('[DCODE]', el.dcode)
                .replace('[CODE]', el.code)
                .replace('[FULLNAME]', el.fullName)
                .replace('[HOURS]', el.hours)
                .replace('[CREDITS]', el.credits)
                .replace('[CHECKED]', (el.active == 1 ? 'checked' : ''))
                .replace(/\[IDCLASS\]/g, el.id_class);

              $('tbody.classes').append(t);
            });
          }).fail(function(xhr) {
            console.log(xhr, xhr.statusText);
          });
        });

      });
    </script>
  </body>
</html>