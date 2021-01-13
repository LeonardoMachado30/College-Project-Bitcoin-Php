<?php 
	session_start();
	//--------------Conectando ao banco de dados---------------------------
	include('db_conectar.php');
	//--------------Recebendo o nome do usuario para consulta no DB
	$nome = mysqli_real_escape_string($conexao, trim($_SESSION['usuario']));
	//--------------Fazendo consulta para receber o ID do usuario-----------
	//Pegando o id do usuario por meio do nome digitado no login
	$sql = "SELECT id_usuario FROM usuarios WHERE nome = '{$nome}'";
	$query_search = mysqli_query($conexao, $sql);
	//percorrendo todos os vetores para achar o id
	while($sql = mysqli_fetch_array($query_search)){
	 	//Recebendo o id_usuario do banco de dados
	 	$_SESSION['id_usuario'] = $sql['id_usuario'];
	}
	//--------------Consultando o nome para receber o ID--------------------
	/*Chamando o id do usuario para fazer a consulta no banco de dados*/
	$id_usuario = $_SESSION['id_usuario'];
	//Consultando as informacoes no banco de dados e retornando true
	$consulta = "SELECT * FROM usuarios WHERE id_usuario = '{$id_usuario}'";
	$query = mysqli_query($conexao, $consulta);
	$row = mysqli_num_rows($query);

	if ($row == 1) {
		//mysqli_fetch_assoc() = essa função busca uma string de linhas
		while($consulta = mysqli_fetch_array($query)){
			//incluindo todos os dados em uma sessão para ser apresentada no arquivo painel_usuario.php
			$_SESSION['id'] = $consulta['id_usuario'];
			$_SESSION['usuario'] = $consulta['nome'];
		 	$_SESSION['email'] = $consulta['email'];
		 	$_SESSION['senha'] = $consulta['senha'];
		 	header("Location: painel.php");
		 	exit();
		}
	}else{
		//caso de erro na verificação das informações
		$_SESSION['Erro'] = true;
		header("Location: logout.php");
		exit();
	}