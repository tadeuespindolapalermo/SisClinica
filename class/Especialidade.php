<?php
include "Conexao.php";

/**
 * Classe Especialidade
 */
class Medico {

    // Atributos da Especialidade
    private $idEspecialidade;
    private $descricaoEspecialidade;

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

}
