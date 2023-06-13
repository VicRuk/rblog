<?php
include("models/conexao.php");
include("views/blades/header.php");
$idb = $_GET["idb"];
?>


    <table border="1" width="1000">
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo WHERE blog_codigo = $idb ORDER BY blog_codigo DESC");
        while($exibe = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><img src="files/imgs/<?php echo $exibe[9] ?>" width="200"></td>
                <td width="200" height="200"><?php echo $exibe[5] ?></td>
                <td><?php echo $exibe[6]?></td>
            </tr>
        <?php } ?>
    </table>
    
<?php
    include("views/blades/footer.php");
?>