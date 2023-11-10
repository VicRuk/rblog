<?php
include("models/conexao.php");
include("views/blades/header.php");
?>

<div class="container rounded mb-5 col-12 h-100 flex-column justify-content-center" id="home">
    <div class="container row justify-content-center">
        <h6 class="mb-3">Olá! Escolha seu delicioso cookie</h6>
        <form action="index.php" method="post">
            <input class="form-control" type="text" name="buscar" placeholder="Digite a busca">
        </form>
        <hr>
        <?php
            if(empty($_POST["buscar"])){
                echo "Nenhum resultado";
            } else{
                $varBuscar = $_POST["buscar"];
        ?>
        <table class="table table-bordered table-striped table-hover justify-content-center">
        <tr>
            <td class="text-center"><b>Imagem</b></td>
            <td class="text-center"><b>Título</b></td>
            <td class="text-center"><b>Sobre</b></td>
        </tr>

        <?php
            $query = mysqli_query($conexao, "SELECT * FROM cookie WHERE nome LIKE '%$varBuscar%' ORDER BY cod DESC");
            while($exibe = mysqli_fetch_array($query)){
            ?>
        <tr>
            <td class="d-flex justify-content-center"><img class="img-fluid" src="files/imgs/<?php echo $exibe[4]?>.png" width="200"></td>
            <td><b><?php echo $exibe[5]?></b></td>
            <td><a class="fw-semibold text-dark text-justify" href="index.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a></td>
        </tr>
            <?php } ?>
        </table>
        <?php } ?>

        <!-- <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo ORDER BY blog_codigo desc limit 1;");
        while($exibe = mysqli_fetch_array($query)){
        $Data = new DateTime($exibe[7]);
        $stringDate = $Data -> format('d/m/Y, H:i:s');
        ?>
        <div class="col-md-7 col-sm-12 my-2">
            <div class="card-container border rounded shadow-sm h-100 d-flex flex-column justify-content-center">
                <div class="row align-items-center justify-content-center m-2">
                    <div class="card-image col-md-6 mb-2 d-flex flex-column justify-content-center">
                        <a href="page.php?idb=<?php echo $exibe[0]?>"><img src="files/imgs/blog/<?php echo $exibe[10] ?>" class="img-fluid" alt="ImgBlog"></a>
                    </div>
                    <div class="card-corpo col-md-6 d-flex flex-column">
                        <div class="card-title">
                            <a class="text-dark text-decoration-none fw-bold" href="page.php?idb=<?php echo $exibe[0]?>"><?php echo $exibe[5] ?></a>
                        </div>
                        <div class="card-sobre mb-2">
                            <a class="text-dark" href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a>
                        </div>
                        <div class="card-usuario">
                            <p class="fst-italic fw-light mb-0"><?php echo "Criado por $exibe[13]"?></p>
                            <p class="fst-italic fw-light mb-0"><?php echo "$stringDate"?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="col-md-5 col-sm-12 my-2">
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo ORDER BY blog_codigo desc limit 1,2;");
        while($exibe = mysqli_fetch_array($query)){
        $Data = new DateTime($exibe[7]);
        $stringDate = $Data -> format('d/m/Y, H:i:s');
        ?>
            <div class="row align-items-center justify-content-center">
                <div class="card-container border rounded shadow-sm h-100 d-flex flex-column justify-content-center">
                    <div class="row align-items-center justify-content-center m-2">
                        <div class="card-image2 col-md-6 d-flex flex-column justify-content-center">
                            <a href="page.php?idb=<?php echo $exibe[0]?>"><img src="files/imgs/blog/<?php echo $exibe[10] ?>" class="img-fluid" alt="ImgBlog"></a>
                        </div>
                        <div class="card-corpo col-md-6 d-flex flex-column">
                            <div class="card-title">
                                <a class="text-dark text-decoration-none fw-bold" href="page.php?idb=<?php echo $exibe[0]?>"><?php echo $exibe[5] ?></a>
                            </div>
                            <div class="card-sobre mb-2">
                                <a class="text-dark" href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a>
                            </div>
                            <div class="card-usuario">
                                <p class="fst-italic fw-light mb-0"><?php echo "Criado por $exibe[13]"?></p>
                                <p class="fst-italic fw-light mb-0"><?php echo "$stringDate"?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?> -->
        </div>
    </div>
</div>

<?php
include("views/blades/footer.php");
?>