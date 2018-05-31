<?php
include "Conexao.php";

/**
 * Classe Consulta
 */
class Consulta {

    // Atributos de Consulta
    private $idConsulta;
    private $idPacienteConsulta;
    private $idMedicoConsulta;
    private $idMedicoEspecialidadeConsulta;
    private $dataConsulta;
    private $horaConsulta;
    private $valorConsulta;
    private $observacaoConsulta;

    // Atributo especial que retorna true se a consulta foi incluida
    private $inclusaoEfetuada = false;

    // Atributo especial que retorna true se a consulta foi atualizada
    private $atualizacaoEfetuada = false;

    // Atributo especial que seta o nome da especialidade do médico de acorco com o id da especialidade
    private $descricaoMedicoEspecialidade;

    // Atributo especial que seta o nome do médico de acorco com o id da consulta
    private $nomeMedicoConsulta;

    // Atributo especial que seta o nome do paciente de acorco com o id da consulta
    private $nomePacienteConsulta;

    // Métodos acessores SET e GET
    public function getIdConsulta() {
        return $this->idConsulta;
    }

    public function setIdConsulta($idConsulta) {
        $this->idConsulta = $idConsulta;
    }

    public function getIdPacienteConsulta() {
        return $this->idPacienteConsulta;
    }

    public function setIdPacienteConsulta($idPacienteConsulta) {
        $this->idPacienteConsulta = $idPacienteConsulta;
    }

    public function getIdMedicoConsulta() {
        return $this->idMedicoConsulta;
    }

    public function setIdMedicoConsulta($idMedicoConsulta) {
        $this->idMedicoConsulta = $idMedicoConsulta;
    }

    public function getIdMedicoEspecialidadeConsulta() {
        return $this->idMedicoEspecialidadeConsulta;
    }

    public function setIdMedicoEspecialidadeConsulta($idMedicoEspecialidadeConsulta) {
        $this->idMedicoEspecialidadeConsulta = $idMedicoEspecialidadeConsulta;
    }

    public function getDataConsulta() {
        return $this->dataConsulta;
    }

    public function setDataConsulta($dataConsulta) {
        $this->dataConsulta = $dataConsulta;
    }

    public function getHoraConsulta() {
        return $this->horaConsulta;
    }

    public function setHoraConsulta($horaConsulta) {
        $this->horaConsulta = $horaConsulta;
    }

    public function getValorConsulta() {
        return $this->valorConsulta;
    }

    public function setValorConsulta($valorConsulta) {
        $this->valorConsulta = $valorConsulta;
    }

    public function getObservacaoConsulta() {
        return $this->observacaoConsulta;
    }

    public function setObservacaoConsulta($observacaoConsulta) {
        $this->observacaoConsulta = $observacaoConsulta;
    }

    // --------------------
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

    public function getNomeMedicoConsulta() {
        return $this->nomeMedicoConsulta;
    }

    public function setNomeMedicoConsulta($nomeMedicoConsulta) {
        $this->nomeMedicoConsulta = $nomeMedicoConsulta;
    }

    public function getNomePacienteConsulta() {
        return $this->nomePacienteConsulta;
    }

    public function setNomePacienteConsulta($nomePacienteConsulta) {
        $this->nomePacienteConsulta = $nomePacienteConsulta;
    }

    /**
     * Método para agendamento de consultas
     */
    public function agendarConsulta() {
        $strSql = "
            INSERT INTO consulta
            (data_consulta, hora_consulta, valor_consulta, observacao_consulta,
             paciente_id_paciente, medico_id_medico, medico_especialidade_id_especialidade)
            VALUES
            ('".$this->getDataConsulta()."',
             '".$this->getHoraConsulta()."',
              ".$this->getValorConsulta().",
             '".$this->getObservacaoConsulta()."',
              ".$this->getIdPacienteConsulta().",
              ".$this->getIdMedicoConsulta().",
              ".$this->getIdMedicoEspecialidadeConsulta().")
        ";
        $rs = Conexao::executaSqlInsert($strSql);
        $this->setInclusaoEfetuada(true);
        return $rs;
    }

    /**
     * Método para listagem de consultas (view de listagem de consultas)
     */
    public function listarConsulta() {
        $strSql = "SELECT * FROM consulta
                   INNER JOIN paciente ON consulta.paciente_id_paciente = paciente.id_paciente
                   INNER JOIN medico ON consulta.medico_id_medico = medico.id_medico
                   INNER JOIN especialidade ON consulta.medico_especialidade_id_especialidade = especialidade.id_especialidade";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de uma consulta específica pelo id (formulário de update de consultas)
     */
    public function listarConsultaId() {
        $strSql = "SELECT * FROM consulta
                   INNER JOIN paciente ON consulta.paciente_id_paciente = paciente.id_paciente
                   INNER JOIN medico ON consulta.medico_id_medico = medico.id_medico
                   INNER JOIN especialidade ON consulta.medico_especialidade_id_especialidade = especialidade.id_especialidade
                   WHERE id_consulta = ".$this->getIdConsulta()."";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de uma consulta específica pelo paciente (view de busca personalizada)
     */
    public function listarConsultaPaciente() {
        $strSql = "SELECT * FROM consulta
                   INNER JOIN paciente ON consulta.paciente_id_paciente = paciente.id_paciente
                   INNER JOIN medico ON consulta.medico_id_medico = medico.id_medico
                   INNER JOIN especialidade ON consulta.medico_especialidade_id_especialidade = especialidade.id_especialidade
                   WHERE id_paciente = ".$this->getIdPacienteConsulta()."";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de uma consulta específica pelo médico (view de busca personalizada)
     */
    public function listarConsultaMedico() {
        $strSql = "SELECT * FROM consulta
                   INNER JOIN paciente ON consulta.paciente_id_paciente = paciente.id_paciente
                   INNER JOIN medico ON consulta.medico_id_medico = medico.id_medico
                   INNER JOIN especialidade ON consulta.medico_especialidade_id_especialidade = especialidade.id_especialidade
                   WHERE id_medico = ".$this->getIdMedicoConsulta()."";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de uma consulta específica pela data (view de busca personalizada)
     */
    public function listarConsultaData() {
        $strSql = "SELECT * FROM consulta
                   INNER JOIN paciente ON consulta.paciente_id_paciente = paciente.id_paciente
                   INNER JOIN medico ON consulta.medico_id_medico = medico.id_medico
                   INNER JOIN especialidade ON consulta.medico_especialidade_id_especialidade = especialidade.id_especialidade
                   WHERE data_consulta = '".$this->getDataConsulta()."'";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem da especialidade de um médico pelo seu id (formulário de update de consultas)
     */
    public function listarEspecialidadeMedicoId($idMedico) {
        $strSql = "SELECT especialidade_id_especialidade FROM medico WHERE id_medico = $idMedico";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para excluir consultas
     */
    public function excluirConsulta() {
        $strSql = "DELETE FROM consulta WHERE id_consulta = ".$this->getIdConsulta()."";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para atualizar consultas
     */
    public function atualizarConsulta() {
        $strSql = "
        UPDATE consulta SET
            data_consulta = '".$this->getDataConsulta()."',
            hora_consulta = '".$this->getHoraConsulta()."',
            valor_consulta = ".$this->getValorConsulta().",
            observacao_consulta = '".$this->getObservacaoConsulta()."',
            paciente_id_paciente = ".$this->getIdPacienteConsulta().",
            medico_id_medico = ".$this->getIdMedicoConsulta().",
            medico_especialidade_id_especialidade = ".$this->getIdMedicoEspecialidadeConsulta()."
        WHERE
            id_consulta = ".$this->getIdConsulta().";
        ";
        $rs = Conexao::executaSql($strSql);
        $this->setAtualizacaoEfetuada(true);
        return $rs;
    }

    /**
     * Método para listagem de médicos (formulário de insert e update) e (view de busca personalizada)
     */
    public function listarMedico() {
        $strSql = "SELECT * FROM medico
        INNER JOIN especialidade ON medico.especialidade_id_especialidade = especialidade.id_especialidade";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de pacientes (formulário de insert e update) e (view de busca personalizada)
     */
    public function listarPaciente() {
        $strSql = "SELECT * FROM paciente";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de datas de consultas (view de busca personalizada)
     */
    public function listarData() {
        $strSql = "SELECT data_consulta FROM consulta";
        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

}
