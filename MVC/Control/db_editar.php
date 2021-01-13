<?php 
	session_start();

	//-----------CONECTANDO AO BANCO DE DADOS-------------
	include('db_conectar.php');
	include('crud.php');

	//Recebendo o input do usuario
	$EditNome = mysqli_real_escape_string($conexao, trim($_POST['EditNome']));
	//$EditEmail = mysqli_real_escape_string($conexao, trim($_POST['EditEmail']));
	$EditPass = mysqli_real_escape_string($conexao, trim($_POST['EditPass']));
	$EditConfirmPass = mysqli_real_escape_string($conexao, trim($_POST['EditConfirmPass']));

	//validando as informacoes para saber se os campos estao vazios ou nao
	if(empty($_POST['EditNome']) && empty($_POST['EditEmail']) && empty($_POST['EditPass']))
	{
		$_SESSION['campo_vazio'] = true;
		header("Location: ../View/editar.php");
		exit();
	}
	else
	{
		if($EditConfirmPass != $EditPass)
		{
			$_SESSION['senha_invalida'] = true;
			header("Location: ../View/editar.php");
			exit();
		}
		else
		{
			$id = $_SESSION['id_usuario'];
			//Caso nao me retorne 1, entao atualize
			$crud = new crud();
			$row = $crud->update($EditNome, $EditPass, $id);
			if($row == 1){
				$_SESSION['atualizando'] = $row;
				header("Location: db_painel_usuario.php");
				exit();
			}else{
				echo "Nao foi possivel atualizar";
				header("Location: db_painel_usuario.php");
				exit();	
			}
		}
	}