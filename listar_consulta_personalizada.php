<?php
    include 'class/Consulta.php';

    // Instancie a classe Consulta
    $consulta = new Consulta();
    $consultaPaciente = new Consulta();
    $consultaMedico = new Consulta();
    $consultaData = new Consulta();

    // Recupere os dados do formulário
    $pacienteConsulta = $_POST['pacienteConsulta'];
    $medicoConsulta = $_POST['medicoConsulta'];
    $dataConsulta = $_POST['dataConsulta'];

    // Atribua os valores do formulário na classe Consulta
    $consulta->setIdPacienteConsulta($pacienteConsulta);
    $consulta->setIdMedicoConsulta($medicoConsulta);
    $consulta->setDataConsulta($dataConsulta);

    echo '
    <div class="container">
        <legend><div style="text-align: center;">Selecione o tipo de busca desejada para Consultas:</div></legend>

        <form action="index.php?pagina=listar_consulta_personalizada.php" method="post" style="margin-left: 390px;">
            <div class="form-inline">
                <div class="col-lg-13">
                    <label class="form-group">Paciente</label>
                    <select name="pacienteConsulta" style="width: 182px;" class="form-control" placeholder="Paciente..." required>
                        <option value="">-Selecione-</option>';
                            $resultadoPac = $consultaPaciente->listarPaciente();
    					    while($linha = mysqli_fetch_array($resultadoPac, MYSQLI_ASSOC)) {
                                $consultaPaciente->setIdPacienteConsulta($linha['id_paciente']);
                                $consultaPaciente->setNomePacienteConsulta($linha['nome_paciente']);
    							echo '<option value="'.$consultaPaciente->getIdPacienteConsulta().'">'.$consultaPaciente->getNomePacienteConsulta().'</option>';
    						}
                            echo '
                    </select>
                    <button style="width: 70px; margin-left: px;" type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
        <hr/>
        <form action="index.php?pagina=listar_consulta_personalizada.php" method="post" style="margin-left: 398px;">
            <div class="form-inline">
                <div class="col-lg-13">
                <label class="form-group">Médico</label>
                <select name="medicoConsulta" style="width: 184px;" class="form-control" placeholder="Médico..." required>
                    <option value="">-Selecione-</option>';
                        $resultadoMed = $consultaMedico->listarMedico();
                        while($linha = mysqli_fetch_array($resultadoMed, MYSQLI_ASSOC)) {
                            $consultaMedico->setIdMedicoConsulta($linha['id_medico']);
                            $consultaMedico->setNomeMedicoConsulta($linha['nome_medico']);
                            $consultaMedico->setIdMedicoEspecialidadeConsulta($linha['id_especialidade']);
                            echo '<option value="'.$consultaMedico->getIdMedicoConsulta().'">'.$consultaMedico->getNomeMedicoConsulta().'</option>';
                        }
                        echo '
                </select>
                <button style="width: 70px; margin-left: px;" type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
        <hr/>
        <form action="index.php?pagina=listar_consulta_personalizada.php" method="post" style="margin-left: 416px;">
            <div class="form-inline">
                <div class="col-lg-13">
                <label class="form-group">Data</label>
                <select name="dataConsulta" style="width: 184px;" class="form-control" placeholder="Data..." required>
                    <option value="">-Selecione-</option>';
                        $resultadoDat = $consultaData->listarData();
                        while($linha = mysqli_fetch_array($resultadoDat, MYSQLI_ASSOC)) {
                            $consultaData->setDataConsulta($linha['data_consulta']);
                            echo '<option value="'.$consultaData->getDataConsulta().'">'.$consultaData->getDataConsulta().'</option>';
                        }
                        echo '
                </select>
                <button style="width: 70px; margin-left: px;" type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
        <hr/>
    </div>';

    if ($consulta->getIdPacienteConsulta() >= 1) {
        $listar = $consulta->listarConsultaPaciente();
    } elseif ($consulta->getIdMedicoConsulta() >= 1) {
        $listar = $consulta->listarConsultaMedico();
    } elseif ($consulta->getDataConsulta() >= 1) {
        $listar = $consulta->listarConsultaData();
    }

    if($listar >= 1) {
        echo '
        <div class="container">
            <legend>Buscas Personalizadas de Consulta</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table cabecalho table-striped">
                                <legend>Resultado da Busca</legend>
                                    <thead>
                                        <tr>
                                            <th class="cabecalho">Id</th>
                                            <th class="cabecalho">Data da Consulta</th>
                                            <th class="cabecalho">Hora da Consulta</th>
                                            <th class="cabecalho">Valor R$</th>
                                            <th class="cabecalho">Paciente</th>
                                            <th class="cabecalho">Médico</th>
                                            <th class="cabecalho">Especialidade</th>
                                            <th class="cabecalho">Observações</th>
                                            <th class="cabecalho">Excluir</th>
                                            <th class="cabecalho">Editar</th>
                                        </tr>
                                    </thead>';

                                    // Recupere o resultado da consulta
                                    while($linha = mysqli_fetch_array($listar, MYSQLI_ASSOC)) {

                                        $consulta->setIdConsulta($linha['id_consulta']);
                                        $consulta->setDataConsulta($linha['data_consulta']);
                                        $consulta->setHoraConsulta($linha['hora_consulta']);
                                        $consulta->setValorConsulta($linha['valor_consulta']);
                                        $consulta->setIdPacienteConsulta($linha['paciente_id_paciente']);
                                        $consulta->setNomePacienteConsulta($linha['nome_paciente']);
                                        $consulta->setIdMedicoConsulta($linha['medico_id_medico']);
                                        $consulta->setNomeMedicoConsulta($linha['nome_medico']);
                                        $consulta->setIdMedicoEspecialidadeConsulta($linha['medico_especialidade_id_especialidade']);
                                        $consulta->setDescricaoMedicoEspecialidade($linha['descricao_especialidade']);
                                        $consulta->setObservacaoConsulta($linha['observacao_consulta']);

                                        $alert = 'msgConfirmaDeleteConsulta('.$consulta->getIdConsulta().')';

                                        // Preencha as colunas da tabela com o resultado da consulta
                                        echo '
                                        <tbody>
                                            <tr>
                                                <td>'.$consulta->getIdConsulta().'</td>
                                                <td>'.$consulta->getDataConsulta().'</td>
                                                <td>'.$consulta->getHoraConsulta().'</td>
                                                <td>'.$consulta->getValorConsulta().'</td>
                                                <td>'.$consulta->getNomePacienteConsulta().'</td>
                                                <td>'.$consulta->getNomeMedicoConsulta().'</td>
                                                <td>'.$consulta->getDescricaoMedicoEspecialidade().'</td>
                                                <td>'.$consulta->getObservacaoConsulta().'</td>
                                                <td><a href="javascript:void(null);" onclick="'.$alert.'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                                <td><a href="index.php?pagina=atualizar_consulta.php&idConsulta='.$consulta->getIdConsulta().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
                                            </tr>
                                        </tbody>';
                                    }
                                    echo '
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        echo "
        <script type=\"text/javascript\">
        alert(\"Busca realizada com sucesso!!!\");
        </script>";
    } else {
        echo "";
    }
