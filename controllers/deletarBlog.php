<?php
include("../models/conexao.php");
$diretorio = "../files/imgs/blog";
$idb = $_GET["idb"];
$varNoticiaInfoCodigo = $_GET["noticiaInfoCodigo"];

$query = mysqli_query($conexao, "SELECT blogimg_nomerandom FROM blogimg WHERE fk_codigo_img = $idb");
while ($exibe = mysqli_fetch_assoc($query)) {
    $arquivo = $exibe['blogimg_nomerandom'];
    $destino = $diretorio . "/" . $arquivo;
    if (file_exists($destino)) {
        unlink($destino);
    }
}

mysqli_query($conexao, "DELETE FROM blog WHERE blog_codigo = $idb");
mysqli_query($conexao, "DELETE FROM bloginfo WHERE bloginfo_codigo = $varNoticiaInfoCodigo");
mysqli_query($conexao, "DELETE FROM blogimg WHERE fk_codigo_img = $idb");

die("<script> alert('Blog excluído!'); window.location='../views/painel.php'; </script>");
?>