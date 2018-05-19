<?php
    include 'class/Especialidade.php';

    $especialidade = new Especialidade();

    $especialidade->setIdEspecialidade($_GET['idEspecialidade']);

    $resultado = $especialidade->excluirEspecialidade();

    if ($resultado != 0) {
        echo "
            <script type=\"text/javascript\">
            alert(\"Especialidade excluída com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_especialidade.php'
        ";
    } else {
        echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao excluir especialidade!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_especialidade.php'
        ";
    }
