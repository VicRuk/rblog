<?php
include("models/conexao.php");
include("views/blades/header.php");
?>

<div class="container-fluid border rounded mt-5 mb-5 bg-white col-12 px-0" id="blog" style="background-color:#FF0000">
    <div class="container-fluid row px-0 justify-content-center">
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo ORDER BY blog_codigo desc limit 1;");
        while($exibe = mysqli_fetch_array($query)){
        ?>
        <div class="col-6 mb-2 border rounded shadow-sm h-md-250" style="width">
            <div class="row align-items-center justify-content-center px-0">
                <div class="card d-flex align-items-center justify-content-center col-md-6 flex-md-row mb-4">
                    <img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="200">
                </div>
                <div class="col-md-6">
                    <div class="column">
                        <div class="">
                             <a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo $exibe[5] ?></a>
                        </div>
                        <div class="">
                            <a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a>
                        </div>
                        <div class="">
                            <p class="nav-link disabled"><?php echo "Criado por $exibe[13]"?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="col-5 mb-2 border rounded shadow-sm h-md-250" style="background-color: #FF9990;">
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo ORDER BY blog_codigo desc limit 1,2;");
        while($exibe = mysqli_fetch_array($query)){
        ?>
            <div class="row align-items-center justify-content-center px-0">
                <div class="card col-md-6 flex-md-row mb-4 align-self-center align-items-center justify-content-center">
                    <img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="100">
                </div>
                <div class=" card col-md-6">
                    <div class="column">
                        <div class="">
                             <a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo $exibe[5] ?></a>
                        </div>
                        <div class="">
                            <a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        
    </div>
</div>
<?php

include("views/blades/footer.php");
?>