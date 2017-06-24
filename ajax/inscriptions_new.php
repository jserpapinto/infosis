<?php

require_once "../classes/user.class.php";
require_once "../classes/classs.class.php";

$id_degree = (isset($_POST['id_degree']) && !empty($_POST['id_degree']) ? $_POST['id_degree'] : null);
$id_year = (isset($_POST['id_year']) && !empty($_POST['id_year']) ? $_POST['id_year'] : null);
$id_role = (isset($_POST['id_role']) && !empty($_POST['id_role']) ? $_POST['id_role'] : null);

if ($id_degree && $id_year) {

	$c = new classs();
	$classes = $c->classesYear($id_year, $id_degree);

	echo json_encode($classes);

} else if ($id_role) {

	$u = new user();
	$users = $u->users($id_role);

	echo json_encode($users);

} else {
	echo json_encode("NADA");
}
