<?php
include("../models/conexao.php");
include("blades/header2.php");
?>

<div class="container border rounded m-5 pt-3 ps-3 pb-3 pe-3 bg-white" id="blog">
    <form name="upload" enctype="multipart/form-data" action="../controllers/atualizarBlog.php" method="post">
        <?php
            $query = mysqli_query($conexao, "SELECT * FROM blog 
            INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo
            INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo
            ORDER BY blog_codigo");
            while($exibe = mysqli_fetch_array($query)){
        ?>
        <label class="form-label lbl-input mt-2">Escolher Usuário:</label>
        <select name="UsuarioCodigo" required="postagemUsuario" class="form-select">
            <?php
            $res = mysqli_query($conexao, "SELECT * FROM usuario;");
            while ($row = mysqli_fetch_array($res)) {
                $usuarioCodigo = $row['usuario_codigo'];
                $co_name = $row['usuario_nome'];
                ?>
                <option value="<?php echo $usuarioCodigo; ?>"><?php echo $co_name; ?></option>
            <?php } ?>
        </select><br>
        <label class="form-label">Título</label><br>
        <input class="form-control" type="text" name="tituloBlog" value="<?php echo $exibe[5]?>"><br>

        <label class="form-label">Sobre</label><br>
        <textarea class="form-control" rows="5" type="text" name="sobreBlog"><?php echo $exibe[6]?></textarea><br>

        <input class="btn btn-success" type="submit" value="Atualizar">
        <?php } ?>
    </form>
</div>

<?php
include("blades/footer.php");
?>