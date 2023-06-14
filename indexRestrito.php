<?php
include("models/conexao.php");
include("views/blades/header.php");
?>
<?php
$query = mysqli_query($conexao, "SELECT * FROM blog INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN blogimg ON blog_blogimg_codigo = blogimg_codigo ORDER BY blog_codigo desc");
while($exibe = mysqli_fetch_array($query)){
?>
    <div class="container border rounded m-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <div class="container">
        <div class="row">
                <div class="col-sm-3">
                    Level 1: .col-sm-3
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-8 col-sm-6">
                            Level 2: .col-8 .col-sm-6
                        </div>
                        <div class="col-4 col-sm-6">
                            Level 2: .col-4 .col-sm-6
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
    <table class="table table-bordered table-striped table-hover">

        
            
        <tr>
            <td><img src="files/imgs/blog/<?php echo $exibe[10] ?>" width="200"></td>
            <td width="200" height="200"><?php echo $exibe[5] ?></td>
            <td><a href="page.php?idb=<?php echo $exibe[0]?>"><?php echo substr($exibe[6],0,50)."..." ?></a></td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php

include("views/blades/footer.php");
?>