<?php

require_once "../classes/classs.class.php";
require_once "../classes/inscription.class.php";

$id_year = (isset($_POST['id_year']) && !empty($_POST['id_year']) ? $_POST['id_year'] : -1);
$id_class = (isset($_POST['id_class']) && !empty($_POST['id_class']) ? $_POST['id_class'] : -1);
$id_user = (isset($_POST['id_user']) && !empty($_POST['id_user']) ? $_POST['id_user'] : -1);

if($id_year != -1 || $id_class != -1 || $id_user != -1) {

	$i = new inscription();
	$inscriptions = $i->inscriptions($id_year, $id_user, $id_class);

	echo json_encode($inscriptions);

} else {
	echo json_encode("NADA");
}
