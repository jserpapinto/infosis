<?php
require_once "../classes/classs.class.php";
require_once "../classes/degree.class.php";

// validate post
$idl = (isset($_POST['idl']) && !empty($_POST['idl']) ? $_POST['idl'] : -1);
$id = (isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : -1);
$type = (isset($_POST['type']) && !empty($_POST['type']) ? $_POST['type'] : null);

if ($idl && $type == 'classes') {
	$c = new classs();
	$classes = $c->classes($idl);
	echo json_encode($classes);
} elseif ($idl && $type == 'degrees') {
	$d = new degree();
	$degrees = $d->degrees($idl);
	echo json_encode($degrees);
} elseif ($id && $idl){
	$c = new classs();
	$classes = $c->classes($idl, $id);
	echo json_encode($classes);
} else {
	echo json_encode("NADA");
}
