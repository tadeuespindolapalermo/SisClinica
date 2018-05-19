<?php
    include 'class/Especialidade.php';

    // Instancie a classe Especialidade
    $especialidade = new Especialidade();

    // Seta o id da Especialidade via GET
    $especialidade->setIdEspecialidade($_GET['idEspecialidade']);

    // Lista os dados da especialidade selecionada
    $rs = $especialidade->listarEspecialidadeId();

    // Array com os dados da especialidade
    $linha = mysqli_fetch_array($rs, MYSQLI_ASSOC);

echo '
<div class="container">
    <legend>Atualizar Especialidade</legend>
    <form action="index.php?pagina=processar_atualizacao_especialidade.php&idEspecialidade='.$linha['id_especialidade'].'" method="post">
        <div class="form-inline ">
            <div class="col-lg-13">
                <label class="form-group">Descrição</label>
                <input maxlength="40" style="width: 325px; margin-left: 6px;" type="text" name="descricao" class="form-control" placeholder="Máximo 40 caracteres..." required value="'.$linha['descricao_especialidade'].'"><br/>

                <button style="width: 185p; margin-left: 107px;" type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
';
