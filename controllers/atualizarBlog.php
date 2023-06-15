<?php
echo "<html lang='pt-br'>";
include("../models/conexao.php");

$BlogInfoCodigo = $_POST["infoCodigo"];
$BlogTitulo = $_POST["tituloBlog"];
$BlogCorpo = $_POST["sobreBlog"];

$diretorio = "../files/imgs/blog";
$arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

mysqli_query($conexao, "UPDATE bloginfo SET bloginfo_titulo = '$BlogTitulo', bloginfo_corpo = '$BlogCorpo' WHERE bloginfo_codigo = '$BlogInfoCodigo'");
$id_noticiaInfo_last = mysqli_insert_id($conexao);

echo count($arquivos['name']);

for ($i = 0; $i < count($arquivos['name']); $i++) {
    $codigoImg = $_POST["codigoImagem"];
    $varBlogImg = $arquivos['name'][$i];
    $temp = $arquivos['tmp_name'][$i];
    $tipo = $arquivos['type'][$i];
    $erro = $arquivos['error'][$i];
    $extensao = pathinfo($varBlogImg, PATHINFO_EXTENSION);

    if ($extensao == 'png') {
        $varBlogImgRandom = md5(uniqid()) . "." . $extensao;
        $destino = $diretorio . "/" . $varBlogImgRandom;

        if (move_uploaded_file($temp, $destino)) {
            mysqli_query($conexao, "UPDATE blogimg SET blogimg_nome = '$varBlogImg', blogimg_nomerandom = '$varBlogImgRandom' where fk_codigo_img = '$codigoImg'");
            die("<script> alert('Blog atualizado!'); window.location='../views/painel.php'; </script>");
        }
    }
	else{
		die("<script> alert('Blog atualizado!'); window.location='../views/painel.php'; </script>");
	}
}
header("location:../views/painel.php");
?>