<?php
/**
 * Classe para conexão com o Banco de Dados
 */
class Conexao {

	/**
	 * Método que abre a conexão no banco
	 */
	public static function abrirConexao() {

		$mysql_usuario = "root";
		$mysql_password = "mysql1985";
		$mysql_database = "clinica";
		$mysql_host  = "localhost";

		//Cria a conexão com o banco de dados
		$varcon = mysqli_connect($mysql_host, $mysql_usuario, $mysql_password, $mysql_database);

		if ($varcon)
			return($varcon);
		  else
			return(false);
	}

	/**
	 * Método que fecha a conexão no banco
	 */
	public static function fecharConexao($varcon) {
		// Fecha a conexão com o banco de dados
		if(mysqli_close($varcon))
			return(true);
		else
			return(false);
	}

	/**
	 * Método que executa um comando SQL de insert e retorna o ultimo id (id do último registro)
	 */
	public static function executaSqlInsert($strSql) {

		$linkCon = Conexao::abrirConexao();

		// Executa a query no banco de dados
		mysqli_query($linkCon, $strSql);

		// Retorna o último id da consulta no banco de dados
		$intId = mysqli_insert_id();

		Conexao::fecharConexao($linkCon);
	   	return $intId;
	}

	/**
	 * Método que executa um comando SQL e retorna 1 para sucesso 0 para falha, ou um array de resultados
	 * SELECT, DELETE e UPDATE
	 */
	public static function executaSql($strSql) {

		$linkCon = Conexao::abrirConexao();

		// Retorna o resultado da consulta no banco de dados
		$resultado = mysqli_query($linkCon, $strSql);

		Conexao::fecharConexao($linkCon);
	   	return $resultado;
	}

}
