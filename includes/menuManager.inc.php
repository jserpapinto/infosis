<?php 

require_once 'menu.inc.php';

switch ($_SESSION['role']) {
	
	case 'Admin':
		require_once 'menuAdmin.inc.php';
		break;
}

?>