<?php
include("../models/conexao.php");
session_start();
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$query = mysqli_query($conexao, "SELECT * FROM usuario where usuario_nome = '$usuario' and usuario_senha = '$senha';");

if($exibe = mysqli_fetch_array($query)){
    $_SESSION['usuario']= $exibe['usuario_nome'];
    $_SESSION['senha']= $exibe['usuario_senha'];
    $_SESSION['usuarioCodigo']= $exibe['usuario_codigo'];
    header("location: ../views/painel.php");

}else{
    echo "Usuário não encontrado ou senha incorreta";
}
?>