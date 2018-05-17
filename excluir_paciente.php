<?php
    include 'class/Paciente.php';

    $paciente = new Paciente();

    $paciente->setIdPaciente($_GET['idPaciente']);

    $resultado = $paciente->excluirPaciente();

    if ($resultado != 0) {
        echo "
            <script type=\"text/javascript\">
            alert(\"Paciente excluído com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII_Tadeu/index.php?pagina=listar_paciente.php'
        ";
    } else {
        echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao excluir paciente!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII_Tadeu/index.php?pagina=listar_paciente.php'
        ";
    }
