<?php
include("../models/conexao.php");

$varida = $_GET["ida"];
mysqli_query($conexao, "DELETE FROM alunos WHERE codigo = $varida");
header("location:../index.php");

?>