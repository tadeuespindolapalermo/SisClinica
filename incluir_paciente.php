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

        // IMC
        $imcPaciente = $paciente->calculaImcPaciente();
        $paciente->setImcPaciente($imcPaciente);

        // Execute o método incluir paciente
        $paciente->incluirPaciente();
        if($paciente->getInclusaoEfetuada()) {
            echo "
                <script type=\"text/javascript\">
                alert(\"Paciente cadastrado com sucesso!\");
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

?>
<div class="container">
    <legend>Incluir Paciente</legend>
    <form action="index.php?pagina=incluir_paciente.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">
                <label class="form-group">Nome</label>
                <input maxlength="40" style="width: 325px; margin-left: 6px;" type="text" name="nome" class="form-control" placeholder="Máximo 40 caracteres..." required>

                <label class="form-group">CPF</label>
                <input style="width: 125px; margin-left: 6px;" id="cpf" type="text" name="cpf" class="form-control" placeholder="999.999.999-99" required>

                <label class="form-group">Endereço</label>
                <input maxlength="80" style="width: 420px; margin-left: 15px;" type="text" name="endereco" class="form-control" placeholder="Máximo 80 caracteres..." required><br/>

                <label class="form-group">Fone</label>
                <input style="width: 136px; margin-left: 12px;" id="telefone" type="text" name="telefone" class="form-control" placeholder="(99) 9 9999-9999" required>

                <label style="margin-left: 190px;" class="form-group">Peso</label>
                <input min="0" max="200" step=".01" value="0.00" style="width: 124px;" type="number" name="peso" class="form-control" required>

                <label class="form-group">Nascimento</label>
                <input style="width: 157px;" type="date" name="dataNascimento" class="form-control" required>

                <label class="form-group">Altura</label>
                <input min="0" max="3" step=".01" value="0.00" style="width: 185px;" type="number" name="altura" class="form-control" required><br/>

                <button style="width: 185p; margin-left: 80px;" type="submit" class="btn btn-success">Salvar</button>

                <label style="margin-left: 260px;" class="form-group">UF</label>
                <select id="estado" name="uf" style="width: 124px; margin-left: 15px;" class="form-control" placeholder="Estado..." required>
                    <option value="">-Selecione-</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                    <option value="ES">ES</option>
                </select>

                <!--<input maxlength="2" style="width: 124px; margin-left: 15px;" type="text" name="uf" class="form-control" placeholder="Máx 2 caracteres..." required>-->

                <label class="form-group">Cidade</label>
                <input maxlength="40" style="width: 157px; margin-left: 32px;" type="text" name="cidade" class="form-control" placeholder="Máximo 40 caracteres..." required>

                <label class="form-group">Bairro</label>
                <input maxlength="40" style="width: 185px;" type="text" name="bairro" class="form-control" placeholder="Máximo 40 caracteres..." required><br/>
            </div>
        </div>
    </form>
</div>
