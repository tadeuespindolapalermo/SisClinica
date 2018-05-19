<?php
    include 'class/Paciente.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulario
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

        // Instancie a classe paciente
        $paciente = new Paciente();

        // Atribua os valores do formulário na classe cliente
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

        // Execute o método incluir paciente
        $paciente->atualizarPaciente();
        if($paciente->getAtualizacaoEfetuada()) {
            echo "
                <script type=\"text/javascript\">
                alert(\"Paciente atualizado com sucesso!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=listar_paciente.php'
            ";
        } else {
            echo "
                <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar paciente!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=incluir_paciente.php'
            ";
        }
    }
