<?php
    include 'class/Especialidade.php';

    // Instancie a classe Especialidade
    $especialidade = new Especialidade();

    // Execute a consulta listar especialidade
    $consulta = $especialidade->listarEspecialidade();

?>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">Listagem de Especialidades</h3>
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
                                    <th class="cabecalho">Descrição</th>
                                    <th class="cabecalho">Excluir</th>
                                    <th class="cabecalho">Editar</th>
                                </tr>
                            </thead>
                            <?php
                            // Recupere o resultado da consulta
                            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {

                                $especialidade->setIdEspecialidade($linha['id_especialidade']);
                                $especialidade->setDescricaoEspecialidade($linha['descricao_especialidade']);

                                // Preencha as colunas da tabela com o resultado da consulta
                                echo '
                                <tbody>
                                    <tr>
                                        <td>'.$especialidade->getIdEspecialidade().'</td>
                                        <td>'.$especialidade->getDescricaoEspecialidade().'</td>
                                        <td><a href="index.php?pagina=excluir_especialidade.php&idEspecialidade='.$especialidade->getIdEspecialidade().'"><img src="icones/open-iconic/svg/x.svg" alt="remover"></a></td>
                                        <td><a href="index.php?pagina=atualizar_especialidade.php&idEspecialidade='.$especialidade->getIdEspecialidade().'"><img src="icones/open-iconic/svg/brush.svg" alt="editar"></a></td>
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
