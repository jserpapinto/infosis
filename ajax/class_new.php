<?php

require_once "../classes/degree.class.php";

$id_degree = (isset($_POST['id_degree']) && !empty($_POST['id_degree']) ? $_POST['id_degree'] : null);

if ($id_degree) {

	$d = new degree();
	$semesters = $d->fetch($id_degree);

	echo json_encode($semesters['semesters']);

} else {
	echo json_encode("NADA");
}
