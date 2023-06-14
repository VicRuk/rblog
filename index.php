<?php
include("models/conexao.php");
include("views/blades/header.php");
?>
<div class="container border rounded m-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <a class="btn btn-success" href="views/criarBlog.php">Cadastrar</a><br><hr>

    <hr>
    <?php
        if(empty($_POST["buscar"])){
            echo "Nenhum resultado";
        } else{  
            $varBuscar = $_POST["buscar"];
    ?>


    <hr>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <td><b>Imagem</b></td>
            <td><b>Título</b></td>
            <td><b>Sobre</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
        </tr>

        <?php
            $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo ORDER BY blog_codigo desc");
            while($exibe = mysqli_fetch_array($query)){
            ?>
        <tr>
            <td><img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="200"></td>
            <td width="200" height="200"><?php echo $exibe[5] ?></td>
            <td><a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a></td>
            <td><a class="btn btn-primary d-flex justify-content-center" href="views/editarBlog.php?ida=<?php echo $exibe[0]?>">Editar</a></td>
            <td><a class="btn btn-danger d-flex justify-content-center" href="controllers/deletarAluno.php?ida=<?php echo $exibe[0]?>">Excluir</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
</div>
<?php

include("views/blades/footer.php");
?>