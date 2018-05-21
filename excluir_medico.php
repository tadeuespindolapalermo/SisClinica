<?php
    include 'class/Medico.php';

    $medico = new Medico();

    $medico->setIdMedico($_GET['idMedico']);

    $resultado = $medico->excluirMedico();

    if ($resultado != 0) {
        echo "
            <script type=\"text/javascript\">
            alert(\"Médico excluído com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_medico.php'
        ";
    } else {
        echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao excluir médico!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_medico.php'
        ";
    }
