<?php
include "Conexao.php";

/**
 * Classe Medico
 */
class Medico {

    // Atributos do Medico
    private $idMedico;
    private $idMedicoEspecialidade;
    private $nomeMedico;
    private $crmMedico;
    private $dataNascimentoMedico;

    // Atributo especial que retorna true se o médico foi incluido
    private $inclusaoEfetuada = false;

    // Atributo especial que retorna true se o médico foi atualizado
    private $atualizacaoEfetuada = false;

    // Atributo especial que seta o nome da especialidade do médico de acorco com o id da especialidade
    private $descricaoMedicoEspecialidade;

    // Métodos acessores SET e GET
    public function getIdMedico() {
        return $this->idMedico;
    }

    public function setIdMedico($idMedico) {
        $this->idMedico = $idMedico;
    }

    public function getIdMedicoEspecialidade() {
        return $this->idMedicoEspecialidade;
    }

    public function setIdMedicoEspecialidade($idMedicoEspecialidade) {
        $this->idMedicoEspecialidade = $idMedicoEspecialidade;
    }

    public function getNomeMedico() {
        return $this->nomeMedico;
    }

    public function setNomeMedico($nomeMedico) {
        $this->nomeMedico = $nomeMedico;
    }

    public function getCrmMedico() {
        return $this->crmMedico;
    }

    public function setCrmMedico($crmMedico) {
        $this->crmMedico = $crmMedico;
    }

    public function getDataNascimentoMedico() {
        return $this->dataNascimentoMedico;
    }

    public function setDataNascimentoMedico($dataNascimentoMedico) {
        $this->dataNascimentoMedico = $dataNascimentoMedico;
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

    public function getDescricaoMedicoEspecialidade() {
        return $this->descricaoMedicoEspecialidade;
    }

    public function setDescricaoMedicoEspecialidade($descricaoMedicoEspecialidade) {
        $this->descricaoMedicoEspecialidade = $descricaoMedicoEspecialidade;
    }

    /**
     * Método para cadastro de médicos
     */
    public function incluirMedico() {
        $strSql = "
            INSERT INTO medico
            (nome_medico, crm_medico, data_nasc_medico, especialidade_id_especialidade)
            VALUES
            ('".$this->getNomeMedico()."',
             '".$this->getCrmMedico()."',
             '".$this->getDataNascimentoMedico()."',
              ".$this->getIdMedicoEspecialidade().")
        ";

        $rs = Conexao::executaSqlInsert($strSql);
        $this->setInclusaoEfetuada(true);
        return $rs;
    }

    /**
     * Método para listagem de médicos
     */
    public function listarMedico() {

        $strSql = "SELECT * FROM medico INNER JOIN especialidade ON medico.especialidade_id_especialidade = especialidade.id_especialidade";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de um médico específico pelo id
     */
    public function listarMedicoId() {

        $strSql = "SELECT * FROM medico INNER JOIN especialidade ON medico.especialidade_id_especialidade = especialidade.id_especialidade WHERE id_medico = ".$this->getIdMedico()."";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para excluir médicos
     */
    public function excluirMedico() {

        $strSql = "DELETE FROM medico WHERE id_medico = ".$this->getIdMedico()."";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para atualizar médicos
     */
    public function atualizarMedico() {
        $strSql = "
        UPDATE medico SET
            nome_medico = '".$this->getNomeMedico()."',
            crm_medico = '".$this->getCrmMedico()."',
            data_nasc_medico = '".$this->getDataNascimentoMedico()."',
            especialidade_id_especialidade = '".$this->getIdMedicoEspecialidade()."'
        WHERE
            id_medico = ".$this->getIdMedico().";
        ";

        $rs = Conexao::executaSql($strSql);
        $this->setAtualizacaoEfetuada(true);
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

}
