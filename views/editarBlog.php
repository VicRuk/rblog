<?php
include("../models/conexao.php");
include("blades/header2.php");
$idb = $_GET["idb"];
$query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo WHERE blog_codigo = $idb ORDER BY blog_codigo DESC");
?>

<div class="container border rounded mt-5 mb-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <?php
        while ($exibe = mysqli_fetch_array($query)) {
    ?>
    <form name="atualizar" enctype="multipart/form-data" action="../controllers/atualizarBlog.php" method="post">
        <input type="hidden" name="infoCodigo" value="<?php echo $exibe[1] ?>">
        <input type="hidden" name="fk_codigoImagem" value="<?php echo $exibe[11] ?>">

        <label class="form-label">Título</label><br>
        <input class="form-control" type="text" name="tituloBlog" value="<?php echo $exibe[5]?>"><br>

        <label class="form-label">Sobre</label><br>
        <textarea class="form-control" rows="5" type="text" name="sobreBlog"><?php echo $exibe[6]?></textarea><br>
        
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br>

        <input class="btn btn-success" type="submit" value="Atualizar">
    </form>
    <?php } ?>
</div>

<?php
include("blades/footer.php");
?>