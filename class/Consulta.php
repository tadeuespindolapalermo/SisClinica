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
    private $dataConsulta;
    private $horaConsulta;
    private $valorConsulta;
    private $observacaoConsulta;

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

}
