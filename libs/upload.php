<?php
require_once 'includes/app.inc.php';
function uploadUPicture($picture, $username) {
	$currentDir = getcwd();
	$uploadDirectory = $GLOBALS['upload'];
	$errors = [];
	$fileExtensions = ['jpg', 'jpeg', 'png'];

	$fileName = $_FILES[$picture]['name'];
	$fileSize = $_FILES[$picture]['size'];
	$fileTempName = $_FILES[$picture]['tmp_name'];
	$fileType = $_FILES[$picture]['type'];
	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

	$newFileName = uniqid() . "." . $fileExtension;
	$uploadPath = $currentDir . '/' . $uploadDirectory . $username . '/' . basename($newFileName);
	$path = $currentDir . '/' . $uploadDirectory . $username;

	if (!file_exists($path)) mkdir($path, 0700);
	if (!in_array($fileExtension, $fileExtensions)) $errors[] = "Extensão de ficheiro não permitida. Por favor use JPEG ou PNG";
	if ($fileSize > 2000000) $errors[] = "Este ficheiro ultrapassa 2MB. Insira uma imagem mais pequena";
	if (empty($errors)) {
		$didUpload = move_uploaded_file($fileTempName, $uploadPath);
		if ($didUpload) return $uploadDirectory . $username . '/' . basename($newFileName);
		else echo "Erro ao gravar o ficheiro";
	} 
	else foreach ($errors as $error) echo $error . "Lista de Erros" . "\n";
}

?>