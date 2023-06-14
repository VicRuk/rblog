<?php
include("models/conexao.php");
include("views/blades/header.php");
$idb = $_GET["idb"];
?>
    <div class="container border rounded mt-5 pt-3 ps-3 pb-3 pe-3 bg-white">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <td><b>Imagem</b></td>
            <td><b>Título</b></td>
            <td><b>Sobre</b></td>
        </tr>

        <?php
            $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo WHERE blog_codigo = $idb ORDER BY blog_codigo DESC");
            while($exibe = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="200"></td>
            <td width="200" height="200"><?php echo $exibe[5] ?></td>
            <td><?php echo $exibe[6]?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
    
<?php
    include("views/blades/footer.php");
?>