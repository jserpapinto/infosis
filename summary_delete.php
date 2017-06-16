<?php
  //protected page
  require_once 'classes/user.class.php';
  $u = new user();
  $u->logged();

  //delete summary
  require_once 'classes/summary.class.php';
  $s = new summary();
  $id = $_REQUEST['id'];
  if (isset($id) && $id != null) $s->delete($id, 'summary_manage.php');
?>