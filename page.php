<?php
include("models/conexao.php");
include("views/blades/header.php");
$idb = $_GET["idb"];
?>
    <div class="container border rounded mt-5 mb-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo WHERE blog_codigo = $idb ORDER BY blog_codigo DESC");
        while($exibe = mysqli_fetch_array($query)){
        ?>
        <h1 class='fw-semibold mb-4'><?php echo $exibe[5] ?></h1>
        <hr class='my-4'>
        <div class='col-12'>
            <div class='d-flex justify-content-center align-items-center'>
                <img src="files/imgs/blog/<?php echo $exibe[10] ?>" class="img-fluid mb-5 col-5">
            </div>
            <div class='mb-5'>
                <?php echo "<p> $exibe[6]</p>"?>
            </div>
        </div>
        <?php } ?>
    </div>
<?php
    include("views/blades/footer.php");
?>