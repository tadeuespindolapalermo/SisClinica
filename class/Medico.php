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

}
