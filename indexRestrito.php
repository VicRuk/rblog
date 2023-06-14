<?php
include("models/conexao.php");
include("views/blades/header.php");
?>

<div class="container border rounded mt-5 mb-5pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <div class="container" style="background-color: #fff000">
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo ORDER BY blog_codigo desc");
        while($exibe = mysqli_fetch_array($query)){
        ?>
        <div class="row mb-2 border rounded shadow-sm h-md-250" style="background-color: #FF0000">
            <div class="col-md-6 align-items-center justify-content-center" style="background-color: #AAAA">
                <div class="card flex-md-row mb-4 align-self-center align-items-center justify-content-center">
                    <img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="200">
                </div>
                <div class="col-md-6">
                    <div class="column">
                        <div class="" style="background-color: #AAAA">
                             <a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo $exibe[5] ?></a>
                        </div>
                        <div class="" style="background-color: #fff000">
                            <a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
    <!--<table class="table table-bordered table-striped table-hover">

        
            
        <tr>
            <td><img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="200"></td>
            <td width="200" height="200"><?php echo $exibe[5] ?></td>
            <td><a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a></td>
        </tr>
        
    </table>
    -->


<?php

include("views/blades/footer.php");
?>