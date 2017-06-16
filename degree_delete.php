<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //delete degree
  require_once 'classes/degree.class.php';
  $d = new degree();
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) $d->delete($id, 'degree_manage.php');
?>