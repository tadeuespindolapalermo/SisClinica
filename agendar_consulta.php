<?php
    include 'class/Consulta.php';

    $consultaMedico = new Consulta();

    // Instancie a classe Consulta
    $consulta = new Consulta();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupere os dados do formulário
        $dataConsulta = $_POST['dataConsulta'];
        $horaConsulta = $_POST['horaConsulta'];
        $valorConsulta = $_POST['valorConsulta'];
        $idMedicoConsulta = $_POST['idMedicoConsulta'];
        $idPacienteConsulta = $_POST['idPacienteConsulta'];
        $observacaoConsulta = $_POST['observacaoConsulta'];

        // Setando o Id da Especialidade do Médico selecionado
        $idEspecialidade = $consulta->listarEspecialidadeMedicoId($idMedicoConsulta);
        $linha = mysqli_fetch_array($idEspecialidade, MYSQLI_ASSOC);
        $idMedicoEspecialidadeConsulta = $linha['especialidade_id_especialidade'];

        // Atribua os valores do formulário na classe Medico
        $consulta->setDataConsulta($dataConsulta);
        $consulta->setHoraConsulta($horaConsulta);
        $consulta->setValorConsulta($valorConsulta);
        $consulta->setIdMedicoConsulta($idMedicoConsulta);
        $consulta->setIdPacienteConsulta($idPacienteConsulta);
        $consulta->setObservacaoConsulta($observacaoConsulta);
        $consulta->setIdMedicoEspecialidadeConsulta($idMedicoEspecialidadeConsulta);

        // DEBUG
        /*echo $consulta->getDataConsulta();
        echo "<br>";
        echo $consulta->getHoraConsulta();
        echo "<br>";
        echo $consulta->getValorConsulta();
        echo "<br>";
        echo $consulta->getIdMedicoConsulta();
        echo "<br>";
        echo $consulta->getIdPacienteConsulta();
        echo "<br>";
        echo $consulta->getObservacaoConsulta();
        echo "<br>";
        echo $consulta->getIdMedicoEspecialidadeConsulta();
        echo "<br>";
        exit();*/

        // Execute o método agendar consulta
        $consulta->agendarConsulta();
        if($consulta->getInclusaoEfetuada()) {
            echo "
                <script type=\"text/javascript\">
                alert(\"Consulta agendada com sucesso!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=listar_consulta.php'
            ";
        } else {
            echo "
                <script type=\"text/javascript\">
                alert(\"Erro ao agendar a consulta!\");
                </script>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
                http://localhost/TCD_LPWII/index.php?pagina=agendar_consulta.php'
            ";
        }
    }
echo '
<div class="container">
    <legend>Agendar Consulta</legend>
    <form action="index.php?pagina=agendar_consulta.php" method="post">
        <div class="form-inline">
            <div class="col-lg-13">

                <label class="form-group">Data</label>
                <input style="width: 157px;" type="date" name="dataConsulta" class="form-control" required>

                <label class="form-group">Hora</label>
                <input maxlength="8" style="width: 110px;" type="text" name="horaConsulta" class="form-control" placeholder="00:00:00" required>

                <label class="form-group">Valor</label>
                <input min="0" step=".01" style="width: 120px;" type="number" name="valorConsulta" class="form-control" placeholder="Ex.: 000,00" required>

                <label class="form-group">Médico</label>
                <select name="idMedicoConsulta" style="width: 182px;" class="form-control" placeholder="Médico..." required>
                    <option value="">-Selecione-</option>';
                        $consulta = $consultaMedico->listarMedico();
					    while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                            $consultaMedico->setIdMedicoConsulta($linha['id_medico']);
                            $consultaMedico->setNomeMedicoConsulta($linha['nome_medico']);
                            $consultaMedico->setIdMedicoEspecialidadeConsulta($linha['id_especialidade']);
							echo '<option value="'.$consultaMedico->getIdMedicoConsulta().'">'.$consultaMedico->getNomeMedicoConsulta().'</option>';
						}
                        echo '
                </select>

                <label class="form-group">Paciente</label>
                <select name="idPacienteConsulta" style="width: 182px;" class="form-control" placeholder="Paciente..." required>
                    <option value="">-Selecione-</option>';
                        $consultaPaciente = new Consulta();
                        $consulta = $consultaPaciente->listarPaciente();
					    while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                            $consultaPaciente->setIdPacienteConsulta($linha['id_paciente']);
                            $consultaPaciente->setNomePacienteConsulta($linha['nome_paciente']);
							echo '<option value="'.$consultaPaciente->getIdPacienteConsulta().'">'.$consultaPaciente->getNomePacienteConsulta().'</option>';
						}
                        echo '
                </select>

                <label class="form-group">OBS</label>
                <textarea class="form-control" rows="5" cols="61" name="observacaoConsulta" placeholder="Observação..."></textarea><br/><br/>

                <button style="width: 185p; margin-left: 65px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>';
?>
