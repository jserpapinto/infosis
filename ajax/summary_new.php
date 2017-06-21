<?php
require_once "../classes/user.class.php";
require_once "../classes/classs.class.php";

// validate post
$id_class = (isset($_POST['id_class']) && !empty($_POST['id_class']) ? $_POST['id_class'] : null);
$id_year = (isset($_POST['id_year']) && !empty($_POST['id_year']) ? $_POST['id_year'] : null);

if ($id_class) {

	$u = new user();
	$users = $u->usersClass($id_class, 3);
	echo json_encode($users);

} elseif ($id_year) {

	$c = new classs();
	$classes = $c->classesYear($id_year);
	echo json_encode($classes);

} else {
	echo json_encode("NADA");
}
