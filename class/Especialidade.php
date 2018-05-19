<?php
include "Conexao.php";

/**
 * Classe Especialidade
 */
class Especialidade {

    // Atributos da Especialidade
    private $idEspecialidade;
    private $descricaoEspecialidade;

    // Atributo especial que retorna true se a especialidade foi incluida
    private $inclusaoEfetuada = false;

    // Atributo especial que retorna true se a especialidade foi atualizada
    private $atualizacaoEfetuada = false;

    // Métodos acessores SET e GET
    public function getIdEspecialidade() {
        return $this->idEspecialidade;
    }

    public function setIdEspecialidade($idEspecialidade) {
        $this->idEspecialidade = $idEspecialidade;
    }

    public function getDescricaoEspecialidade() {
        return $this->descricaoEspecialidade;
    }

    public function setDescricaoEspecialidade($descricaoEspecialidade) {
        $this->descricaoEspecialidade = $descricaoEspecialidade;
    }

    public function getInclusaoEfetuada() {
        return $this->inclusaoEfetuada;
    }

    public function setInclusaoEfetuada($inclusaoEfetuada) {
        $this->inclusaoEfetuada = $inclusaoEfetuada;
    }

    public function getAtualizacaoEfetuada() {
        return $this->atualizacaoEfetuada;
    }

    public function setAtualizacaoEfetuada($atualizacaoEfetuada) {
        $this->atualizacaoEfetuada = $atualizacaoEfetuada;
    }

    /**
     * Método para cadastro de especialidades
     */
    public function incluirEspecialidade() {
        $strSql = "
            INSERT INTO especialidade
            (descricao_especialidade)
            VALUES
            ('".$this->getDescricaoEspecialidade()."')
        ";

        $rs = Conexao::executaSqlInsert($strSql);
        $this->setInclusaoEfetuada(true);
        return $rs;
    }

    /**
     * Método para listagem de especialidades
     */
    public function listarEspecialidade() {

        $strSql = "SELECT * FROM especialidade";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de uma especialidade específica pelo id
     */
    public function listarEspecialidadeId() {

        $strSql = "SELECT * FROM especialidade WHERE id_especialidade = ".$this->getIdEspecialidade()."";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para excluir especialidades
     */
    public function excluirEspecialidade() {

        $strSql = "DELETE FROM especialidade WHERE id_especialidade = ".$this->getIdEspecialidade()."";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para atualizar especialidades
     */
    public function atualizarEspecialidade() {
        $strSql = "
        UPDATE especialidade SET
            descricao_especialidade = '".$this->getDescricaoEspecialidade()."'
        WHERE
            id_especialidade = ".$this->getIdEspecialidade().";
        ";

        $rs = Conexao::executaSql($strSql);
        $this->setAtualizacaoEfetuada(true);
        return $rs;
    }

}
