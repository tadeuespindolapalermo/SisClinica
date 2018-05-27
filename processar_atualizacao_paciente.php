<?php
    include 'class/Paciente.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $nomePaciente = $_POST['nome'];
        $cpfPaciente = $_POST['cpf'];
        $dataNascimentoPaciente = $_POST['dataNascimento'];
        $telefonePaciente = $_POST['telefone'];
        $enderecoPaciente = $_POST['endereco'];
        $bairroPaciente = $_POST['bairro'];
        $cidadePaciente = $_POST['cidade'];
        $ufPaciente = $_POST['uf'];
        $pesoPaciente = $_POST['peso'];
        $alturaPaciente = $_POST['altura'];

        // Instancie a classe Paciente
        $paciente = new Paciente();

        // Atribua os valores do formulário na classe Paciente
        $paciente->setNomePaciente($nomePaciente);
        $paciente->setCpfPaciente($cpfPaciente);
        $paciente->setDataNascimentoPaciente($dataNascimentoPaciente);
        $paciente->setTelefonePaciente($telefonePaciente);
        $paciente->setEnderecoPaciente($enderecoPaciente);
        $paciente->setBairroPaciente($bairroPaciente);
        $paciente->setCidadePaciente($cidadePaciente);
        $paciente->setUfPaciente($ufPaciente);
        $paciente->setPesoPaciente($pesoPaciente);
        $paciente->setAlturaPaciente($alturaPaciente);
        $paciente->setIdPaciente($_GET['idPaciente']);

        // IMC
        $imcPaciente = $paciente->calculaImcPaciente();
        $paciente->setImcPaciente($imcPaciente);

        // Execute o método atualizar paciente
        $paciente->atualizarPaciente();
        if($paciente->getAtualizacaoEfetuada()) {
            echo '
            <center>
                <div class="alert alert-success" style="width: 455px;">
                    <strong>SUCESSO!</strong> Registro atualizado com sucesso!
                </div>
            </center>';
            echo "
            <script type=\"text/javascript\">
            alert(\"Paciente atualizado com sucesso!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=listar_paciente.php'
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
            alert(\"Erro ao atualizar paciente!\");
            </script>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
            http://localhost/TCD_LPWII/index.php?pagina=atualizar_paciente.php&idPaciente={$paciente->getIdPaciente()}'
            ";
        }
    }
