<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //delete inscription
  require_once 'classes/inscription.class.php';
  $s = new inscription();
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) $s->delete($id, 'inscription_manage.php');
?>