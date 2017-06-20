<?php
require_once "../classes/user.class.php";

// validate post
$id_degree = (isset($_POST['id_degree']) && !empty($_POST['id_degree']) ? $_POST['id_degree'] : null);

if ($id_degree) {
	$u = new user();
	$users = $u->usersClass($id_degree);
	echo json_encode($users);
} else {
	echo json_encode("NADA");
}
