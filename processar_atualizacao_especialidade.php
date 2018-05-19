<?php
    include 'class/Especialidade.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $descricaoEspecialidade = $_POST['descricao'];

        // Instancie a classe Especialidade
        $especialidade = new Especialidade();

        // Atribua os valores do formulário na classe Especialidade
        $especialidade->setDescricaoEspecialidade($descricaoEspecialidade);
        $especialidade->setIdEspecialidade($_GET['idEspecialidade']);

        // Execute o método atualizar especialidade
        $especialidade->atualizarEspecialidade();
        if($especialidade->getAtualizacaoEfetuada()) {
            echo "
                <script type=\"text/javascript\">
                alert(\"Especialidade atualizada com sucesso!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=listar_especialidade.php'
            ";
        } else {
            echo "
                <script type=\"text/javascript\">
                alert(\"Erro ao atualizar especialidade!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=incluir_especialidade.php'
            ";
        }
    }
