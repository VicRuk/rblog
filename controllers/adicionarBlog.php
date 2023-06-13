<?php
include("../models/conexao.php");

$varBlogTitulo = $_POST["tituloBlog"];
$varBlogCorpo = $_POST["sobreBlog"];
$PostagemUsuarioCodigo = $_POST["UsuarioCodigo"];
$diretorio = "../files/imgs";


$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

for ($k = 0; $k < count($arquivo['name']); $k++) {
	$destino = $diretorio . "/" . $arquivo['name'][$k];

	$extension = pathinfo($destino, PATHINFO_EXTENSION);
	$varImgName = $arquivo['name'][$k];

	$varImgNameRandom = uniqid(). "." . $extension;

	if($extension == "png"){

	if (move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $varImgNameRandom)) {

		mysqli_query($conexao, "INSERT INTO blogimg(blogimg_nome, blogimg_nomerandom) VALUES ('$varImgName', '$varImgNameRandom')");
		$id_imgTable_last = mysqli_insert_id($conexao);

		mysqli_query($conexao, "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo) VALUES ('$varBlogTitulo', '$varBlogCorpo')");
		$id_noticiaInfo_last = mysqli_insert_id($conexao);

		mysqli_query($conexao, "INSERT INTO blog (blog_bloginfo_codigo, blog_blogimg_codigo, blog_usuario_codigo) VALUES ('$id_noticiaInfo_last', '$id_imgTable_last', '$PostagemUsuarioCodigo')");
	} else {
		echo "Falha ao enviar o arquivo.";
		}
	} else {
		echo "Arquivo não é compatível com o tipo 'PNG' ";
	}

	

	


	//mysqli_query($conexao, "INSERT INTO noticias (noticiaImgId, noticiaInfoId, noticiaUsuarioId) 
	//VALUES (, '' , '$PostagemUsuarioCodigo');");
}
//mysqli_query($conexao, "INSERT INTO blogimg (blogimg_nome, blogimg_nomerandom) VALUES ('$varImgName', '$varImgNameRandom')");
//INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo) VALUES ('$varBlogTitulo', '$varBlogCorpo');
					

header("location:../index.php");
?>

