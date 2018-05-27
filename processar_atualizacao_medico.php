<?php
    include 'class/Medico.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $nomeMedico = $_POST['nome'];
        $crmMedico = $_POST['crm'];
        $dataNascimentoMedico = $_POST['dataNascimento'];
        $especialidadeMedico = $_POST['especialidade'];

        // Instancie a classe Médico
        $medico = new Medico();

        // Atribua os valores do formulário na classe Médico
        $medico->setNomeMedico($nomeMedico);
        $medico->setCrmMedico($crmMedico);
        $medico->setDataNascimentoMedico($dataNascimentoMedico);
        $medico->setIdMedicoEspecialidade($especialidadeMedico);
        $medico->setIdMedico($_GET['idMedico']);

        // Execute o método atualizar médico
        $medico->atualizarMedico();
        if($medico->getAtualizacaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Registro atualizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Médico atualizado com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_medico.php'
            ";
        } else {
            echo '
            <center>
                <div class="alert alert-danger" style="width: 455px;">
                    <strong>ERRO!</strong> Não foi possível atualizar o registro!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Erro ao atualizar médico!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=atualizar_medico.php&idMedico={$medico->getIdMedico()}'
            ";
        }
    }
