<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");

  //delete year level
  require_once 'classes/year.class.php';
  $y = new year();
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) {
  	if (!$y->yearDepend($id)) $y->delete($id, 'year_manage.php');
  	else header('Location:year_manage.php?error=true');
  }
?>