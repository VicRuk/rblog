<?php
session_start();
if(empty($_SESSION))
{
print "<script>location.href='../cms/index.php';</script>";
}
$usuariocodigo = $_SESSION["usuarioCodigo"];
include("../models/conexao.php");
include("blades/header2.php");
?>

<div class="container border rounded mt-5 mb-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <h1 class="fw-bold">Bem Vindo <?php echo $_SESSION["usuario"]?>!</h1>
    <hr class="border border-dark border-2 opacity-75">

    <form name="upload" enctype="multipart/form-data" action="../controllers/adicionarBlog.php" method="post">
        <input type="hidden" name="usuarioCodigo" value="<?php echo $_SESSION["usuarioCodigo"]?>">

        <label class="form-label">Título</label><br>
        <input class="form-control" type="text" name="tituloBlog"><br>

        <label class="form-label">Sobre</label><br>
        <textarea class="form-control" rows="5" type="text" name="sobreBlog"></textarea><br>
        
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br>

        <input class="btn btn-success" type="submit" value="Cadastrar">
    </form>
</div>

<div class="container border rounded mb-5 mt-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <h1 class="fw-bold">Todas Notícias</h1>
    <hr class="border border-dark border-2 opacity-75">
    <table class="table table-bordered table-striped table-hover justify-content-center">
        <tr>
            <td><b>Imagem</b></td>
            <td><b>Título</b></td>
            <td><b>Sobre</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
        </tr>

        <?php
            $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo WHERE blog_usuario_codigo = $usuariocodigo ORDER BY blog_codigo desc");
            while($exibe = mysqli_fetch_array($query)){
            ?>
        <tr>
            <td class="d-flex justify-content-center"><img src="../files/imgs/blog/<?php echo $exibe[10] ?>" width="200"></td>
            <td width="200" height="200"><?php echo $exibe[5] ?></td>
            <td><a href="../page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a></td>
            <td><a class="btn btn-primary d-flex justify-content-center" href="editarBlog.php?ida=<?php echo $exibe[0]?>">Editar</a></td>
            <td><a class="btn btn-danger d-flex justify-content-center" href="../controllers/deletarBlog.php?idb=<?php echo $exibe[0]?>&amp;imagemNome=<?php echo $exibe[10] ?>&amp;noticiaInfoCodigo=<?php echo $exibe[2] ?>">Excluir</a></td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php
include("blades/footer.php");
?>