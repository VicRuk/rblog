<?php
include("../models/conexao.php");
include("blades/header.php");
?>

<?php
$varida = $_GET["ida"];
$query = mysqli_query($conexao, "SELECT * FROM alunos WHERE codigo = $varida");
$exibe = mysqli_fetch_array($query);
?>

<div class="container p-5 mt-5 border bg-white rounded">
    <a href="../index.php" class="btn btn-secondary">Voltar</a><br>

    <form action="../controllers/atualizarAluno.php" method="post">
        <input class="form-control" type="hidden" name="alunoCodigo" value="<?php echo $exibe[0]?>"><br>

        <label class="form-label">Nome</label><br>
        <input class="form-control" type="text" name="alunoNome" value="<?php echo $exibe[1]?>"><br>

        <label class="form-label">Cidade</label><br>
        <input class="form-control" type="text" name="alunoCidade" value="<?php echo $exibe[2]?>">

        <div class="my-3 row">
            <div class="my-3 col">
                <input class="form-check-input" name="alunoSexo" type="radio" value="m" <?php echo ($exibe[3]=="m")?"checked":""; ?>>
                <label class="form-label">Masculino</label>
                <input class="form-check-input" name="alunoSexo" type="radio" value="f" <?php echo ($exibe[3]=="f")?"checked":""; ?>>
                <label class="form-label">Feminino</label>
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Atualizar">
    </form>
</div>

<?php
include("blades/footer.php")
?>