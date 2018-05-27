//-------------------------------------------------------
/**
 * Mensagens de Confirmação de Deleção de Registros
 */

 // Mensagem exclusão Paciente
function msgConfirmaDeletePaciente(idPaciente) {
    var deletarPaciente = confirm('Deseja realmente excluir este paciente?');
    if (deletarPaciente) {
        location.href = 'index.php?pagina=excluir_paciente.php&idPaciente=' + idPaciente;
    }
}

// Mensagem exclusão Especialidade
function msgConfirmaDeleteEspecialidade(idEspecialidade) {
   var deletarEspecialidade = confirm('Deseja realmente excluir esta especialidade?');
   if (deletarEspecialidade) {
       location.href = 'index.php?pagina=excluir_especialidade.php&idEspecialidade=' + idEspecialidade;
   }
}

// Mensagem exclusão Médico
function msgConfirmaDeleteMedico(idMedico) {
   var deletarMedico = confirm('Deseja realmente excluir este médico?');
   if (deletarMedico) {
       location.href = 'index.php?pagina=excluir_medico.php&idMedico=' + idMedico;
   }
}

// Mensagem exclusão Consulta
function msgConfirmaDeleteConsulta(idConsulta) {
   var deletarConsulta = confirm('Deseja realmente excluir esta consulta?');
   if (deletarConsulta) {
       location.href = 'index.php?pagina=excluir_consulta.php&idConsulta=' + idConsulta;
   }
}
