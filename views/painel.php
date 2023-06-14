<?php
session_start();
if(empty($_SESSION))
{
print "<script>location.href='../cms/index.php';</script>";
}

include("../models/conexao.php");
include("blades/header2.php");
?>

<div class="container border rounded m-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <h1 class="fw-bold">Painel</h1>
    <label class="form-label lbl-input mt-4 fs-5">Bem Vindo <?php echo $_SESSION["usuario"]?></label>
    
    <hr class="border border-dark border-2 opacity-75">
    <form name="upload" enctype="multipart/form-data" action="../controllers/adicionarBlog.php" method="post">
        <input class="hidden" type="text" value="<?php $exibe[1]?>">
        <label class="form-label">Título</label><br>
        <input class="form-control" type="text" name="tituloBlog"><br>

        <label class="form-label">Sobre</label><br>
        <textarea class="form-control" rows="5" type="text" name="sobreBlog"></textarea><br>
        
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br>

        <input class="btn btn-success" type="submit" value="Cadastrar">
    </form>
</div>

<?php
include("blades/footer.php");
?>