<?php
include("../models/conexao.php");
$diretorio = "../files/imgs";
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

for ($k = 0; $k < count($arquivo['name']); $k++) {
	$destino = $diretorio . "/" . $arquivo['name'][$k];

	$extension = pathinfo($destino, PATHINFO_EXTENSION);
	$varImgName = $arquivo['name'][$k];

	$varImgNameRandom = uniqid(). "." . $extension;

	if($extension == "png"){

	if (move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $varImgNameRandom)) {

		mysqli_query($conexao, "INSERT INTO img(nome, nome_random) values ('$varImgName', '$varImgNameRandom')");
		echo " <br> Arquivo enviado com sucesso!";
	} else {
		echo "Falha ao enviar o arquivo.";
		}
	} else {
		echo "Arquivo não é compatível com o tipo 'PNG' ";
	}
}
?>