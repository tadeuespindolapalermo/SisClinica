<?php
    include 'class/Consulta.php';

    $consultaMedico = new Consulta();
    $consultaPaciente = new Consulta();

    // Instancie a classe Consulta
    $consulta = new Consulta();

    // Seta o id da Consulta via GET
    $consulta->setIdConsulta($_GET['idConsulta']);

    // Lista os dados da consulta selecionada
    $rs = $consulta->listarConsultaId();

    // Array com os dados da consulta
    $linha = mysqli_fetch_array($rs, MYSQLI_ASSOC);

    $consultaMedicoAuxiliar = $linha['nome_medico'];
    $consultaPacienteAuxiliar = $linha['nome_paciente'];
echo '
<div class="container">
    <legend>Atualizar Médico</legend>
    <form action="index.php?pagina=processar_atualizacao_consulta.php&idConsulta='.$linha['id_consulta'].'" method="post">
        <div class="form-inline ">
            <div class="col-lg-13">
                <label class="form-group">Data</label>
                <input style="width: 157px;" type="date" name="dataConsulta" class="form-control" value="'.$linha['data_consulta'].'" required>

                <label class="form-group">Hora</label>
                <input maxlength="8" style="width: 110px;" type="text" name="horaConsulta" class="form-control" placeholder="00:00:00" value="'.$linha['hora_consulta'].'" required>

                <label class="form-group">Valor</label>
                <input min="0" step=".01" style="width: 120px;" type="number" name="valorConsulta" class="form-control" placeholder="Ex.: 000,00" value="'.$linha['valor_consulta'].'" required>

                <label class="form-group">Médico</label>
                <select name="idMedicoConsulta" style="width: 182px;" class="form-control" required>
                    <option value="'.$linha['medico_id_medico'].'">'.$linha['nome_medico'].'</option>';
                        $consultaMed = $consultaMedico->listarMedico();
                        while($linhaMed = mysqli_fetch_array($consultaMed, MYSQLI_ASSOC)) {
                            $consultaMedico->setIdMedicoConsulta($linhaMed['id_medico']);
                            $consultaMedico->setNomeMedicoConsulta($linhaMed['nome_medico']);
                            $consultaMedico->setIdMedicoEspecialidadeConsulta($linhaMed['id_especialidade']);
                            if ($consultaMedico->getNomeMedicoConsulta() === $consultaMedicoAuxiliar) {
                                $medicoCombo = '';
                            } else {
                                $medicoCombo = '<option value="'.$consultaMedico->getIdMedicoConsulta().'">'.$consultaMedico->getNomeMedicoConsulta().'</option>';
                            }
                            echo $medicoCombo;
                        }
                        echo '
                </select>

                <label class="form-group">Paciente</label>
                <select name="idPacienteConsulta" style="width: 182px;" class="form-control" required>
                    <option value="'.$linha['paciente_id_paciente'].'">'.$linha['nome_paciente'].'</option>';
                        $consultaPac = $consultaPaciente->listarPaciente();
                        while($linhaPac = mysqli_fetch_array($consultaPac, MYSQLI_ASSOC)) {
                            $consultaPaciente->setIdPacienteConsulta($linhaPac['id_paciente']);
                            $consultaPaciente->setNomePacienteConsulta($linhaPac['nome_paciente']);
                            if ($consultaPaciente->getNomePacienteConsulta() === $consultaPacienteAuxiliar) {
                                $pacienteCombo = '';
                            } else {
                                $pacienteCombo = '<option value="'.$consultaPaciente->getIdPacienteConsulta().'">'.$consultaPaciente->getNomePacienteConsulta().'</option>';
                            }
                            echo $pacienteCombo;
                        }
                        echo '
                </select>

                <label class="form-group">OBS</label>
                <textarea class="form-control" rows="5" cols="61" name="observacaoConsulta" placeholder="Observação...">';echo $linha['observacao_consulta']; echo '</textarea><br/><br/>

                <button style="width: 185p; margin-left: 65px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
';
