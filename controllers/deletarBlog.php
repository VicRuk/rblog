<?php
include("../models/conexao.php");
$diretorio = "../files/imgs/blog";
$idb = $_GET["idb"];
$file = $_GET["imagemNome"];
$destino = $diretorio . "/" . $file;

$varNoticiaInfoCodigo = $_GET["noticiaInfoCodigo"];

unlink($destino);
mysqli_query($conexao, "DELETE from blog where blog_codigo = $idb");
mysqli_query($conexao, "DELETE from bloginfo where bloginfo_codigo = $varNoticiaInfoCodigo");
mysqli_query($conexao, "DELETE from blogimg where blogimg_nomerandom = '$file'");
die("<script> alert('Blog excluido!'); window.location='../views/painel.php'; </script>");

header("location:../views/painel.php");
?>