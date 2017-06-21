<?php

require_once "../classes/user.class.php";

$id_role = (isset($_POST['id_role']) && !empty($_POST['id_role']) ? $_POST['id_role'] : null);

if ($id_role) {

	$u = new user();
	$users = $u->users($id_role);

	echo json_encode($users);

} else {
	echo json_encode("NADA");
}
