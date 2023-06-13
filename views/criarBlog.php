<?php
include("../models/conexao.php");
include("blades/header.php");
?>

<div class="container border rounded mt-5 pt-3 ps-3 pb-3 pe-3 bg-white">
    <form name="upload" enctype="multipart/form-data" action="../controllers/adicionarBlog.php" method="post">
        
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
        <input class="form-control" type="text" name="tituloBlog"><br>

        <label class="form-label">Sobre</label><br>
        <textarea class="form-control" rows="5" type="text" name="sobreBlog"></textarea><br>

        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br>

        <input class="btn btn-success" type="submit" value="Cadastrar">

    </form>

    <!---
    <form name="upload" enctype="multipart/form-data" method="post" action="upload.php">
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" />
        <input name="enviar" type="submit" value="Enviar">	
    </form>
    -->
</div>

<?php
include("blades/footer.php");
?>