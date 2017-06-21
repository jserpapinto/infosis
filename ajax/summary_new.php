<?php
require_once "../classes/user.class.php";

// validate post
$id_class = (isset($_POST['id_class']) && !empty($_POST['id_class']) ? $_POST['id_class'] : null);

if ($id_class) {
	$u = new user();
	$users = $u->usersClass($id_class, 3);
	echo json_encode($users);
} else {
	echo json_encode("NADA");
}
