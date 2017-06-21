<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged("Admin");
  
  //delete class
  require_once 'classes/classs.class.php';
  $c = new classs();
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) $c->delete($id, 'class_manage.php');
?>