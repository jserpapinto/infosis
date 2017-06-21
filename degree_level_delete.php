<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //delete degree level
  require_once 'classes/degree.class.php';
  $d = new degree();
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) {
  	if (!$d->levelDepend($id)) $d->deleteLevel($id, 'degree_level_manage.php');
  	else header('Location:degree_level_manage.php?error=true');
  }
?>