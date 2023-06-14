<?php
include("../models/conexao.php");
include("blades/header2.php");
$idb = $_GET["idb"];
?>

<div class="container border rounded m-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <form name="upload" enctype="multipart/form-data" action="../controllers/atualizarBlog.php" method="post">
        <?php
            $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo WHERE blog_codigo = $idb ORDER BY blog_codigo DESC");
            while($exibe = mysqli_fetch_array($query)){
        ?>
        <input type="hidden" name="usuarioCodigo" value="<?php echo $_SESSION["usuarioCodigo"]?>">
        <label class="form-label">Título</label><br>
        <input class="form-control" type="text" name="tituloBlog" value="$exibir[1]"><br>

        <label class="form-label">Sobre</label><br>
        <textarea class="form-control" rows="5" type="text" name="sobreBlog"></textarea><br>
        
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br>

        <input class="btn btn-success" type="submit" value="Cadastrar">
        <input class="btn btn-success" type="submit" value="Atualizar">
        <?php } ?>
    </form>
</div>

<?php
include("blades/footer.php");
?>