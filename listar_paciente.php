<?php
    include 'class/Paciente.php';

    // Instancie a classe Paciente
    $paciente = new Paciente();

    // Execute a consulta listar paciente
    $consulta = $paciente->listarPaciente();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Pacientes</h3>
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
                                    <th class="cabecalho">Nome</th>
                                    <th class="cabecalho">CPF</th>
                                    <th class="cabecalho">Data de Nascimento</th>
                                    <th class="cabecalho">Telefone</th>
                                    <th class="cabecalho">Endereço</th>
                                    <th class="cabecalho">Bairro</th>
                                    <th class="cabecalho">Cidade</th>
                                    <th class="cabecalho">UF</th>
                                    <th class="cabecalho">Peso</th>
                                    <th class="cabecalho">Altura</th>
                                    <th class="cabecalho">IMC</th>
                                    <th class="cabecalho">Excluir</th>
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

                                $paciente->setIdPaciente($linha['id_paciente']);
                                $paciente->setNomePaciente($linha['nome_paciente']);
                                $paciente->setCpfPaciente($linha['cpf_paciente']);
                                $paciente->setDataNascimentoPaciente($linha['data_nasc_paciente']);
                                $paciente->setTelefonePaciente($linha['telefone_paciente']);
                                $paciente->setEnderecoPaciente($linha['endereco_paciente']);
                                $paciente->setBairroPaciente($linha['bairro_paciente']);
                                $paciente->setCidadePaciente($linha['cidade_paciente']);
                                $paciente->setUfPaciente($linha['uf_paciente']);
                                $paciente->setPesoPaciente($linha['peso_paciente']);
                                $paciente->setAlturaPaciente($linha['altura_paciente']);
                                $paciente->setImcPaciente($linha['imc_paciente']);

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$paciente->getIdPaciente().'</td>
                                        <td>'.$paciente->getNomePaciente().'</td>
                                        <td>'.$paciente->getCpfPaciente().'</td>
                                        <td>'.$paciente->getDataNascimentoPaciente().'</td>
                                        <td>'.$paciente->getTelefonePaciente().'</td>
                                        <td>'.$paciente->getEnderecoPaciente().'</td>
                                        <td>'.$paciente->getBairroPaciente().'</td>
                                        <td>'.$paciente->getCidadePaciente().'</td>
                                        <td>'.$paciente->getUfPaciente().'</td>
                                        <td>'.$paciente->getPesoPaciente().'</td>
                                        <td>'.$paciente->getAlturaPaciente().'</td>
                                        <td>'.$paciente->getImcPaciente().'</td>
                                        <td><a href="index.php?pagina=excluir_paciente.php&idPaciente='.$paciente->getIdPaciente().'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_paciente.php&idPaciente='.$paciente->getIdPaciente().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
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
