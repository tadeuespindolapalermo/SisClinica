<?php
    include 'class/Especialidade.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulario
        $descricaoEspecialidade = $_POST['descricao'];

        // Instancie a classe Especialidade
        $especialidade = new Especialidade();

        // Atribua os valores do formulário na classe Especialidade
        $especialidade->setDescricaoEspecialidade($descricaoEspecialidade);

        // Execute o método incluir especialidade
        $especialidade->incluirEspecialidade();
        if($especialidade->getInclusaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Cadastro realizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Especialidade cadastrada com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_especialidade.php'
            ";
        } else {
            echo '
            <center>
                <div class="alert alert-danger" style="width: 455px;">
                    <strong>ERRO!</strong> Não foi possível realizar o cadastro!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao cadastrar especialidade!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=incluir_especialidade.php'
            ";
        }
    }

?>
<div class="container">
    <legend>Incluir Especialidade</legend>
    <form action="index.php?pagina=incluir_especialidade.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">
                <label class="form-group">Descrição</label>
                <input maxlength="60" style="width: 325px; margin-left: 6px;" type="text" name="descricao" class="form-control" placeholder="Máximo 60 caracteres..." required><br/>

                <button style="width: 185p; margin-left: 107px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
