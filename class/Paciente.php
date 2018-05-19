<?php
include "Conexao.php";

/**
 * Classe Paciente
 */
class Paciente {

    // Atributos de Paciente
    private $idPaciente;
    private $nomePaciente;
    private $cpfPaciente;
    private $dataNascimentoPaciente;
    private $telefonePaciente;
    private $enderecoPaciente;
    private $bairroPaciente;
    private $cidadePaciente;
    private $ufPaciente;
    private $pesoPaciente;
    private $alturaPaciente;
    private $imcPaciente;

    // Atributo especial que retorna true se o paciente foi incluido
    private $inclusaoEfetuada = false;

    // Atributo especial que retorna true se o paciente foi atualizado
    private $atualizacaoEfetuada = false;

    // Métodos acessores SET e GET
    public function getIdPaciente() {
        return $this->idPaciente;
    }

    public function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;
    }

    public function getNomePaciente() {
        return $this->nomePaciente;
    }

    public function setNomePaciente($nomePaciente) {
        $this->nomePaciente = $nomePaciente;
    }

    public function getCpfPaciente() {
        return $this->cpfPaciente;
    }

    public function setCpfPaciente($cpfPaciente) {
        $this->cpfPaciente = $cpfPaciente;
    }

    public function getDataNascimentoPaciente() {
        return $this->dataNascimentoPaciente;
    }

    public function setDataNascimentoPaciente($dataNascimentoPaciente) {
        $this->dataNascimentoPaciente = $dataNascimentoPaciente;
    }

    public function getTelefonePaciente() {
        return $this->telefonePaciente;
    }

    public function setTelefonePaciente($telefonePaciente) {
        $this->telefonePaciente = $telefonePaciente;
    }

    public function getEnderecoPaciente() {
        return $this->enderecoPaciente;
    }

    public function setEnderecoPaciente($enderecoPaciente) {
        $this->enderecoPaciente = $enderecoPaciente;
    }

    public function getBairroPaciente() {
        return $this->bairroPaciente;
    }

    public function setBairroPaciente($bairroPaciente) {
        $this->bairroPaciente = $bairroPaciente;
    }

    public function getCidadePaciente() {
        return $this->cidadePaciente;
    }

    public function setCidadePaciente($cidadePaciente) {
        $this->cidadePaciente = $cidadePaciente;
    }

    public function getUfPaciente() {
        return $this->ufPaciente;
    }

    public function setUfPaciente($ufPaciente) {
        $this->ufPaciente = $ufPaciente;
    }

    public function getPesoPaciente() {
        return $this->pesoPaciente;
    }

    public function setPesoPaciente($pesoPaciente) {
        $this->pesoPaciente = $pesoPaciente;
    }

    public function getAlturaPaciente() {
        return $this->alturaPaciente;
    }

    public function setAlturaPaciente($alturaPaciente) {
        $this->alturaPaciente = $alturaPaciente;
    }

    public function getImcPaciente() {
        return $this->imcPaciente;
    }

    public function setImcPaciente($imcPaciente) {
        $this->imcPaciente = $imcPaciente;
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
     * Método para calcular IMC do paciente
     * ESTÁ PRONTO ESTE MÉTODO
     */
    public function calculaImcPaciente() {
        $imc = $this->getPesoPaciente() / ($this->getAlturaPaciente() * $this->getAlturaPaciente());
        return $imc;
    }

    /**
     * Método para cadastro de pacientes
     */
    public function incluirPaciente() {
        $strSql = "
            INSERT INTO paciente
            (nome_paciente, cpf_paciente, data_nasc_paciente, telefone_paciente, endereco_paciente,
             bairro_paciente, cidade_paciente, uf_paciente, peso_paciente, altura_paciente, imc_paciente)
            VALUES
            ('".$this->getNomePaciente()."',
             '".$this->getCpfPaciente()."',
             '".$this->getDataNascimentoPaciente()."',
             '".$this->getTelefonePaciente()."',
             '".$this->getEnderecoPaciente()."',
             '".$this->getBairroPaciente()."',
             '".$this->getCidadePaciente()."',
             '".$this->getUfPaciente()."',
              ".$this->getPesoPaciente().",
              ".$this->getAlturaPaciente().",
              ".$this->getImcPaciente().")
        ";

        $rs = Conexao::executaSqlInsert($strSql);
        $this->setInclusaoEfetuada(true);
        return $rs;
    }

    /**
     * Método para listagem de pacientes
     */
    public function listarPaciente() {

        $strSql = "SELECT * FROM paciente";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para listagem de um paciente específico pelo id
     */
    public function listarPacienteId() {

        $strSql = "SELECT * FROM paciente WHERE id_paciente = ".$this->getIdPaciente()."";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para excluir pacientes
     */
    public function excluirPaciente() {

        $strSql = "DELETE FROM paciente WHERE id_paciente = ".$this->getIdPaciente()."";

        $rs = Conexao::executaSql($strSql);
        return $rs;
    }

    /**
     * Método para atualizar pacientes
     */
    public function atualizarPaciente() {
        $strSql = "
        UPDATE paciente SET
            nome_paciente = '".$this->getNomePaciente()."',
            cpf_paciente = '".$this->getCpfPaciente()."',
            data_nasc_paciente = '".$this->getDataNascimentoPaciente()."',
            telefone_paciente = '".$this->getTelefonePaciente()."',
            endereco_paciente = '".$this->getEnderecoPaciente()."',
            bairro_paciente = '".$this->getBairroPaciente()."',
            cidade_paciente = '".$this->getCidadePaciente()."',
            uf_paciente = '".$this->getUfPaciente()."',
            peso_paciente = ".$this->getPesoPaciente().",
            altura_paciente = ".$this->getAlturaPaciente().",
            imc_paciente = ".$this->getImcPaciente()."
        WHERE
            id_paciente = ".$this->getIdPaciente().";
        ";

        $rs = Conexao::executaSql($strSql);
        $this->setAtualizacaoEfetuada(true);
        return $rs;
    }

}
