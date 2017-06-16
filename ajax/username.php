<?php
require_once "../classes/user.class.php";

// validate post
$username = (isset($_POST['username']) && !empty($_POST['username']) ? $_POST['username'] : null);

if ($username) {
	$user = new user();
	$exists = $user->existUser($username);

	echo json_encode($exists);
} else {
	echo json_encode("NADA");
}