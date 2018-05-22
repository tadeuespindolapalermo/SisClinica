<?php
    include 'class/Medico.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulario
        $nomeMedico = $_POST['nome'];
        $crmMedico = $_POST['crm'];
        $dataNascimentoMedico = $_POST['dataNascimento'];
        $especialidadeMedico = $_POST['especialidade'];

        // Instancie a classe Médico
        $medico = new Medico();

        // Atribua os valores do formulário na classe cliente
        $medico->setNomeMedico($nomeMedico);
        $medico->setCrmMedico($crmMedico);
        $medico->setDataNascimentoMedico($dataNascimentoMedico);
        $medico->setIdMedicoEspecialidade($especialidadeMedico);
        $medico->setIdMedico($_GET['idMedico']);            

        // Execute o método atualizar médico
        $medico->atualizarMedico();
        if($medico->getAtualizacaoEfetuada()) {
            echo "
                <script type=\"text/javascript\">
                alert(\"Médico atualizado com sucesso!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=listar_medico.php'
            ";
        } else {
            echo "
                <script type=\"text/javascript\">
                alert(\"Erro ao atualizar médico!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=incluir_medico.php'
            ";
        }
    }
