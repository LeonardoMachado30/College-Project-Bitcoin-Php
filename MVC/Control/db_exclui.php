<?php
	session_start();

	include('db_conectar.php');
	include('crud.php');
	/*
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
	*/

	$ID = $_SESSION['id_usuario'];

	$crud = new crud();
	$row = $crud->delete($ID);


	if($row == 1){
		echo "<script language='javascript' type='text/javascript'>
			  alert('Você sera direcionado para a área de login. Exclusão realizada com sucesso!');
			  window.location.href='../View/painel.php';
			  </script>";
		exit();
	}else{
		exit();
	}