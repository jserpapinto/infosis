<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //delete user
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) $u->delete($id, 'user_manage.php');
?>