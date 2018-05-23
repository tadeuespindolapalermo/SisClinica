<?php
    include 'class/Consulta.php';

    $consulta = new Consulta();

    $consulta->setIdConsulta($_GET['idConsulta']);

    $resultado = $consulta->excluirConsulta();

    if ($resultado != 0) {
        echo "
            <script type=\"text/javascript\">
            alert(\"Consulta excluída com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_consulta.php'
        ";
    } else {
        echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao excluir consulta!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_consulta.php'
        ";
    }
