<?php

require_once "../classes/classs.class.php";
require_once "../classes/summary.class.php";

$id_degree = (isset($_POST['id_degree']) && !empty($_POST['id_degree']) ? $_POST['id_degree'] : null);
$id_class = (isset($_POST['id_class']) && !empty($_POST['id_class']) ? $_POST['id_class'] : null);
$type = (isset($_POST['type']) && !empty($_POST['type']) ? $_POST['type'] : null);
$id_user = (isset($_POST['id_user']) && !empty($_POST['id_user']) ? $_POST['id_user'] : null);

if ($id_degree && $type == "get_classes") {

	$c = new classs();
	$classes = $c->classesUser($id_user, $id_degree);

	echo json_encode($classes);

} elseif($id_class && $type == "get_summarys") {

	$s = new summary();
	$summarys = $s->summarys($id_class);

	echo json_encode($summarys);

} else {
	echo json_encode("NADA");
}
