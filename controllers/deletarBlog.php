<?php
include("../models/conexao.php");
$diretorio = "../files/imgs/blog/";
$idb = $_GET["idb"];
$file = $_GET["imagemNome"];
$varNoticiaInfoCodigo = $_GET["noticiaInfoCodigo"];
unlink($diretorio . $file);
mysqli_query($conexao, "DELETE from blogimg where blogimg_nomerandom = '$file'");
mysqli_query($conexao, "DELETE from bloginfo where bloginfo_codigo = $varNoticiaInfoCodigo");
mysqli_query($conexao, "DELETE from blog where blog_codigo = $idb");
header("location:../views/painel.php");
?>