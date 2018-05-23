<?php
    include 'class/Consulta.php';

    // Instancie a classe Consulta
    $consulta = new Consulta();

    // Execute a consulta listar consulta
    $listar = $consulta->listarConsulta();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Consultas Agendadas</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table cabecalho table-striped" >
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
                            </thead>
                            <?php
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
                                        <td><a href="index.php?pagina=excluir_consulta.php&idConsulta='.$consulta->getIdConsulta().'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_consulta.php&idConsulta='.$consulta->getIdConsulta().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
                                    </tr>
                                </tbody>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
